<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $viewFolder = "";
    public $viewData = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_v";
        $this->viewData = new stdClass();
        $ip_adresi = getUserIP();

        if (!$this->session->userdata("users")):
            $this->session->set_userdata("users", $ip_adresi);
        endif;
        $this->viewData->stories = $this->general_model->get_all("stories",null,"rank ASC",["isActive" => 1]);
        $this->viewData->story_items = $this->general_model->get_all("story_items",null,"rank ASC",["isActive" => 1]);
    }

    public function render()
    {
        $this->load->view("includes/head", (array)$this->viewData);
        $this->load->view("includes/header");
        $this->load->view("includes/sidebar");
        $this->load->view($this->viewFolder);
        $this->load->view("includes/footer");
    }

    public function error(){
        $this->viewFolder = "404_v/index";
        $this->render();
    }

    public function index()
    {
        $this->viewData->news = $this->general_model->get_all("news", null, "rank ASC", ['isActive' => 1]);
        $this->viewData->products = $this->general_model->get_all("products", null, "id DESC", ["isActive" => 1]);
        $this->viewData->slides = $this->general_model->get_all("slides", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->banners = $this->general_model->get_all("homepage_banner", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->writers = $this->general_model->get_all("writers", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->keyifler = [];
        $this->viewData->muzik_haberleri = [];
        $this->viewFolder = "home_v/index";
        $this->viewData->tvler = [];
        $this->render();
    }

    public function about_us()
    {
        $this->viewFolder= "about_v/index";
        $this->render();
    }

    public function service()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->service = $this->general_model->get("services",null,['url' => $seo_url]);
        if (empty($this->viewData->service)) :
            $this->viewFolder= "404_v/index";
        else:
            $this->viewFolder = "service_v/index";
        endif;
        $this->render();
    }

    public function test()
    {
        $this->viewData->test = $this->general_model->get_all("tests",null,["isActive" => 1]);
        if (empty($this->viewData->test)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "test_v/index";
        endif;
        $this->render();
    }

    public function test_detail()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->test = $this->general_model->get("tests",null,['seo_url' => $seo_url,"isActive" => 1]);
        $this->viewData->options = $this->general_model->get_all("options",null,"rank ASC",['test_id' => $this->viewData->test->id, 'isActive' => 1]);
        if (empty($this->viewData->test)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "test_detail_v/index";
        endif;
        $this->render();
    }

    public function news()
    {
        $seo_url = $this->uri->segment(2);
        if(!empty($seo_url) && !is_numeric($seo_url)):
            $category_id = $this->general_model->get("news_categories",null,["seo_url" => $seo_url,"isActive" => 1])->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("haberler/{$seo_url}") : base_url("haberler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3: 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("news",["isActive" => 1,"category_id" => $category_id]) : $this->general_model->rowCount("news",["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if(!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))):
            $uri_segment = $this->uri->segment(3);
        elseif(!empty($seo_url) && is_numeric($seo_url)):
            $uri_segment = $this->uri->segment(2);
        else:
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment-1)*$config['per_page'];
        $this->viewData->news = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news",null,null,['category_id' => $category_id,"isActive" => 1],[],[],[$config["per_page"],$offset]) : $this->general_model->get_all("news",null,null,["isActive" => 1],[],[],[$config["per_page"],$offset]));
        $this->viewData->writers = $this->general_model->get_all("writers",null,null,['isActive' => 1]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news",null,"hit DESC",['category_id' => $category_id,"isActive" => 1],[],[],[5]) : $this->general_model->get_all("news",null,"hit DESC",["isActive" => 1],[],[],[5]));
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "news_v/index";
        endif;
        $this->render();
    }

    public function news_detail($seo_url)
    {
        $this->viewData->news = $this->general_model->get("news",null,['seo_url' => $seo_url,"isActive" => 1]);
        $this->viewData->category = $this->general_model->get("news_categories",null,["id" => $this->viewData->news->category_id,"isActive" => 1]);
        $this->viewData->writer = $this->general_model->get("writers",null,['id' => $this->viewData->news->writer_id,"isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("news",null,"hit DESC",['category_id' => $this->viewData->news->category_id,"isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("news",null,"hit DESC",['category_id' => $this->viewData->news->category_id,"isActive" => 1],[],[],[3,0]);
        $this->general_model->update("news",['seo_url' => $seo_url,"isActive" => 1], ['hit' => $this->viewData->news->hit + 1]);
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "news_detail_v/index";
        endif;
        $this->render();
    }

    public function onair()
    {
        $config = [];
        $config['base_url'] = base_url("onair");
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = $this->general_model->rowCount("brands",["isActive" => 1]);
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if(!empty($this->uri->segment(2))):
            $uri_segment = $this->uri->segment(2);
        else:
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment-1)*$config['per_page'];
        $this->viewData->brands = $this->general_model->get_all("brands",null,null,["isActive" => 1],[],[],[$config["per_page"],$offset]);
        $this->viewData->writers = $this->general_model->get_all("writers",null,null,['isActive' => 1]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = $this->general_model->get_all("news",null,"hit DESC",["isActive" => 1],[],[],[5]);
        if (empty($this->viewData->brands)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "brands_v/index";
        endif;
        $this->render();
    }

    public function activities()
    {
        $seo_url = $this->uri->segment(2);
        $category = null;
        if(!empty($seo_url) && !is_numeric($seo_url)):
            $category = $this->general_model->get("activity_categories",null,["seo_url" => $seo_url,"isActive" => 1]);
            $category_id = $category->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("haberler/{$seo_url}") : base_url("haberler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3: 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("activities",["isActive" => 1,"category_id" => $category_id]) : $this->general_model->rowCount("activities",["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if(!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))):
            $uri_segment = $this->uri->segment(3);
        elseif(!empty($seo_url) && is_numeric($seo_url)):
            $uri_segment = $this->uri->segment(2);
        else:
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment-1)*$config['per_page'];
        $this->viewData->activities = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("activities",null,null,['category_id' => $category_id,"isActive" => 1],[],[],[$config["per_page"],$offset]) : $this->general_model->get_all("activities",null,null,["isActive" => 1],[],[],[$config["per_page"],$offset]));
        $this->viewData->writers = $this->general_model->get_all("writers",null,null,['isActive' => 1]);
        $this->viewData->category = $category;
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("activities",null,"event_date ASC",['category_id' => $category_id,"isActive" => 1],[],[],[5]) : $this->general_model->get_all("activities",null,"event_date ASC",["isActive" => 1],[],[],[5]));
        if (empty($this->viewData->activities)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "activities_v/index";
        endif;
        $this->render();
    }

    public function activity_detail($seo_url)
    {
        $this->viewData->activities = $this->general_model->get("activities",null,['seo_url' => $seo_url,"isActive" => 1]);
        $this->viewData->category = $this->general_model->get("activity_categories",null,["id" => $this->viewData->activities->category_id,"isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("activities",null,"event_date ASC",['category_id' => $this->viewData->activities->category_id,"isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("activities",null,"event_date ASC",["isActive" => 1],[],[],[3,0]);
        if (empty($this->viewData->activities)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "activity_detail_v/index";
        endif;
        $this->render();
    }

    public function advertisements()
    {
        $seo_url = $this->uri->segment(2);
        if(!empty($seo_url) && !is_numeric($seo_url)):
            $type = $seo_url;
            if($type == "is"):
                $type = "job";
            else:
                $type = "estate";
            endif;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("ilanlar/{$seo_url}") : base_url("ilanlar"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3: 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("advertisements",["isActive" => 1,"type" => $type]) : $this->general_model->rowCount("advertisements",["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if(!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))):
            $uri_segment = $this->uri->segment(3);
        elseif(!empty($seo_url) && is_numeric($seo_url)):
            $uri_segment = $this->uri->segment(2);
        else:
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment-1)*$config['per_page'];
        $this->viewData->advertisements = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("advertisements",null,null,['type' => $type,"isActive" => 1],[],[],[$config["per_page"],$offset]) : $this->general_model->get_all("advertisements",null,null,["isActive" => 1],[],[],[$config["per_page"],$offset]));
        $this->viewData->writers = $this->general_model->get_all("writers",null,null,['isActive' => 1]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("advertisements",null,"hit DESC",['type' => $type,"isActive" => 1],[],[],[5]) : $this->general_model->get_all("advertisements",null,"hit DESC",["isActive" => 1],[],[],[5]));
        if (empty($this->viewData->advertisements)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "advertisements_v/index";
        endif;
        $this->render();
    }

    public function advertisement_detail($seo_url)
    {
        $this->viewData->advertisement = $this->general_model->get("advertisements",null,['seo_url' => $seo_url,"isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("advertisements",null,"hit DESC",['type' => $this->viewData->advertisement->type,"isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("advertisements",null,"hit DESC",["isActive" => 1],[],[],[3,0]);
        $this->general_model->update("advertisements",['seo_url' => $seo_url,"isActive" => 1], ['hit' => $this->viewData->advertisement->hit + 1]);
        if (empty($this->viewData->advertisement)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "advertisement_detail_v/index";
        endif;
        $this->render();
    }

    public function galleries()
    {
        $seo_url = $this->uri->segment(2);
        if(!empty($seo_url) && !is_numeric($seo_url)):
            $gallery_id = $this->general_model->get("galleries",null,["url" => $seo_url,"isActive" => 1,"isCover" => 1])->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("galeriler/{$seo_url}") : base_url("galeriler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3: 2);
        $config['use_page_numbers'] = TRUE;
        $config["full_tag_open"] = "<ul class='pagination justify-content-center'>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["prev_link"] = "<i class='fa fa-angle-double-left'></i>";
        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a class='page-link' href='javascript:void(0)'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";
        $config["next_link"] = "<i class='fa fa-angle-double-right'></i>";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["full_tag_close"] = "</ul>";
        $config['attributes'] = array('class' => 'page-link');
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("galleries",["isActive" => 1,"gallery_id" => $gallery_id]) : $this->general_model->rowCount("galleries",["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if(!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))):
            $uri_segment = $this->uri->segment(3);
        elseif(!empty($seo_url) && is_numeric($seo_url)):
            $uri_segment = $this->uri->segment(2);
        else:
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment-1)*$config['per_page'];
        $this->viewData->galleries = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("galleries",null,null,['gallery_id' => $gallery_id,"isActive" => 1],[],[],[$config["per_page"],$offset]) : $this->general_model->get_all("galleries",null,null,["isActive" => 1],[],[],[$config["per_page"],$offset]));
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news",null,"hit DESC",["isActive" => 1],[],[],[5]) : $this->general_model->get_all("news",null,"hit DESC",["isActive" => 1],[],[],[5]));
        $this->viewData->links = $this->pagination->create_links();
        if (empty($this->viewData->galleries)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "galleries_v/index";
        endif;
        $this->render();
    }

    public function gallery_detail($seo_url)
    {
        $this->viewData->gallery = $this->general_model->get("galleries",null,['url' => $seo_url,"isActive" => 1]);
        if($this->viewData->gallery->gallery_type == "image"):
            $table="images";
        elseif($this->viewData->gallery->gallery_type == "file"):
            $table="files";
        elseif($this->viewData->gallery->gallery_type == "video"):
            $table="videos";
        else:
            $table="video_urls";
        endif;
        $this->viewData->gallery_items = $this->general_model->get_all("{$table}",null,"rank ASC",["gallery_id" => $this->viewData->gallery->id,"isActive" => 1]);

        if (empty($this->viewData->gallery_items)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "gallery_detail_v/index";
        endif;
        $this->render();
    }

    public function references()
    {
        $this->viewData->references = $this->general_model->get_all("references",null,null,["isActive" => 1]);
        $this->viewFolder = "references_v/index";
        $this->render();
    }

    public function contact()
    {
        $this->viewFolder = "contact_v/index";
        $this->render();
    }

    public function urlEmotion()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "\"{$key}\" Bilgisini Seçtiğinizden Emin Olup Tekrar Deneyin."]);
        else :
            $ad = $data["ad"];
            $user_id = $this->session->userdata("users");
            $item = $this->general_model->get("news",null,['id' => $data["id"]]);
            $reaction = json_decode($item->reaction);
            $reaction->$ad = $reaction->$ad + 1;
            $user = $this->general_model->get_all("news_emoji",null,"rank ASC",["user_id" => $user_id, "news_id" => $data["id"]]);
            $user = (array) $user;
            if (count($user) <= 1) :
                $this->general_model->add("news_emoji",[
                    'user_id' => $user_id,
                    'news_id' => $data["id"],
                    'type' => $data["ad"]
                ]);
                $reactionn = json_encode($reaction);
                if($this->general_model->update("news",['id' => $data["id"]], ['reaction' => $reactionn])):
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Bu Habere Verdiğiniz Tepki Güncellendi.","response_data"=>$reaction->$ad]);
                else:
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Habere Tepki Verilirken Hata Oluştu."]);
                endif;
            else:
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Bir Habere En Fazla 2 Tepki Verebilirsiniz."]);
            endif;
        endif;
    }

    public function test_check()
    {
        $id = $this->input->post('id');
        $test_id = $this->input->post('test_id');
        $user_id = $this->session->userdata("users");
        $item = $this->general_model->get(['id' => $id]);
        $hit = $item->hit + 1;


        $user = $this->test_answer_model->get_all(["user_id" => $user_id, "test_id" => $test_id]);
        $user = (array) $user;
        if (count($user) == 0) {
            $this->options_model->update(['id' => $id], [


                'hit' => $hit
            ]);
            $this->test_answer_model->add([
                'user_id' => $user_id,
                'test_id' => $test_id,
                'option_id' => $id
            ]);



            echo "create";
        } else {
            $users = $this->test_answer_model->get(["user_id" => $user_id, "test_id" => $test_id]);
            $user = $this->test_answer_model->get_all(["user_id" => $user_id, "option_id" => $id]);
            $user = (array) $user;
            if (count($user) == 0) {
                $answer = $this->test_answer_model->get(["user_id" => $user_id, "test_id" => $test_id]);
                $test = $this->options_model->get(['id' => $answer->option_id]);
                $this->options_model->update(['id' => $answer->option_id], [


                    'hit' => $test->hit - 1
                ]);
                $this->options_model->update(['id' => $id], [


                    'hit' => $hit
                ]);
                $this->test_answer_model->update(['id' => $users->id], [


                    'option_id' => $id
                ]);
                echo "update";
            } else {
                echo "ok";
            }
        }
    }
    public function category()
    {
        $seo_url = $this->uri->segment(2);
        $category_id = $this->product_category_model->get(["seo_url" => $seo_url]);
        $config["base_url"] = base_url("kategori") . "/" . $seo_url;
        $config["total_rows"] = $this->product_model->get_count(["category_id" => $category_id->id]);
        $config["uri_segment"] = 3;
        $config["per_page"] = 10;
        $this->pagination->initialize($config);
        $this->viewData->category = $category_id;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->viewData->links = $this->pagination->create_links();   

        //KATEGORİLER
        if (empty($category_id)) :
            $this->viewFolder = "404_v/index";
        else:
            $this->viewFolder = "category_v/index";
            $this->viewData->products = $this->product_model->get_records($config["per_page"], $page, ["category_id" => $category_id->id]);
        endif;
        $this->render();
    }

    public function teklif()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Ad", "trim|required");
        $this->form_validation->set_rules("email", "E-posta", "trim|required|valid_email");
        $this->form_validation->set_rules("subject", "Konu", "trim|required");
        $this->form_validation->set_rules("message", "Mesaj", "trim|required");
        $this->form_validation->set_rules("phone", "Telefon", "trim|required|min_length[11]|max_length[11]");
        if ($this->form_validation->run() === FALSE) {
            redirect(base_url("iletisim"));
        } else {
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $subject = $this->input->post("subject");
            $message = $this->input->post("message");
            $phone = $this->input->post("phone");
            $email_message = "{$name} İsimli Ziyaretçi. Bir Adet Mesaj Bıraktı</br> <b>Mesaj : </b> {$message}</br> <b>Telefon : </b> {$phone}</br> <b>E-Posta : </b> {$email}";
            if (send_email("", "Site Teklif Formu Mesajı", $email_message)) {
                echo "İşlem Başarılı";
            } else {
                echo "İşlem Başarısız";
            }
        }
    }
}
