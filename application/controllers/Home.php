<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    /**
     * Variables
     */
    public $viewFolder = "";
    public $viewData = "";
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_v";
        $this->viewData = new stdClass();
        $ip_adresi = getUserIP();

        if (!$this->session->userdata("users")) :
            $this->session->set_userdata("users", $ip_adresi);
        endif;
        $this->viewData->stories = $this->general_model->get_all("stories", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->story_items = $this->general_model->get_all("story_items", null, "rank ASC", ["isActive" => 1]);
    }
    /**
     * Render
     */
    public function render()
    {
        $this->load->view("includes/head", (array)$this->viewData);
        $this->load->view("includes/header");
        $this->load->view("includes/sidebar");
        $this->load->view($this->viewFolder);
        $this->load->view("includes/footer");
    }
    /**
     * Error 
     */
    public function error()
    {
        $this->viewFolder = "404_v/index";
        $this->render();
    }
    /**
     * Index
     */
    public function index()
    {
        $this->viewData->news = $this->general_model->get_all("news", null, "rank ASC", ['isActive' => 1]);
        $this->viewData->slides = $this->general_model->get_all("slides", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->banners = $this->general_model->get_all("homepage_banner", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->news_categories = $this->general_model->get_all("news_categories", null, "rank ASC", ["isActive" => 1]);
        $this->viewFolder = "home_v/index";
        $this->render();
    }
    /**
     * About Us
     */
    public function about_us()
    {
        $this->viewFolder = "about_v/index";
        $this->render();
    }
    /**
     * Services
     */
    public function service()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->service = $this->general_model->get("services", null, ['url' => $seo_url]);
        if (empty($this->viewData->service)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "service_v/index";
        endif;
        $this->render();
    }
    /**
     * Tests
     */
    public function test()
    {
        $this->viewData->test = $this->general_model->get_all("tests", null, "rank ASC", ["isActive" => 1]);
        if (empty($this->viewData->test)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "test_v/index";
        endif;
        $this->render();
    }
    /**
     * Test Detail
     */
    public function test_detail()
    {
        $seo_url = $this->uri->segment(2);
        $this->viewData->test = $this->general_model->get("tests", null, ['seo_url' => $seo_url, "isActive" => 1]);
        $this->viewData->options = $this->general_model->get_all("options", null, "rank ASC", ['test_id' => $this->viewData->test->id, 'isActive' => 1]);
        if (empty($this->viewData->test)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "test_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * News
     */
    public function news()
    {
        $seo_url = $this->uri->segment(2);
        $category_id = null;
        $category = null;
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $category = $this->general_model->get("news_categories", null, ["seo_url" => $seo_url, "isActive" => 1]);
            if (!empty($category)) :
                $category_id = $category->id;
            endif;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("haberler/{$seo_url}") : base_url("haberler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
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
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("news", ["isActive" => 1, "category_id" => $category_id]) : $this->general_model->rowCount("news", ["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->news = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news", null, null, ['category_id' => $category_id, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("news", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        $this->viewData->news_category = $category;
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news", null, "hit DESC", ['category_id' => $category_id, "isActive" => 1], [], [], [5]) : $this->general_model->get_all("news", null, "hit DESC", ["isActive" => 1], [], [], [5]));
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "news_v/index";
        endif;
        $this->render();
    }
    /**
     * News Detail
     */
    public function news_detail($seo_url)
    {
        $this->viewData->news = $this->general_model->get("news", null, ['seo_url' => $seo_url, "isActive" => 1]);
        $this->viewData->category = $this->general_model->get("news_categories", null, ["id" => $this->viewData->news->category_id, "isActive" => 1]);
        $this->viewData->writer = $this->general_model->get("users", null, ['id' => $this->viewData->news->writer_id, "isActive" => 1, "role_id!=" => 2]);
        $this->viewData->writer_role = $this->general_model->get("user_role", null, ["id" => $this->viewData->writer->role_id, "isActive" => 1])->title;
        $this->viewData->similar = $this->general_model->get_all("news", null, "hit DESC", ['category_id' => $this->viewData->news->category_id, "isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("news", null, "hit DESC", ['category_id' => $this->viewData->news->category_id, "isActive" => 1], [], [], [3, 0]);
        $this->general_model->update("news", ['seo_url' => $seo_url, "isActive" => 1], ['hit' => $this->viewData->news->hit + 1]);
        if (empty($this->viewData->news)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "news_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Show Tree
     */
    public function show_tree($ne_id)
    {
        // create array to store all comments ids
        $store_all_id = array();
        // get all parent comments ids by using news id
        $id_result = $this->general_model->get_all("comments", null, "id DESC", ["news_id" => $ne_id]);
        // loop through all comments to save parent ids $store_all_id array
        foreach ($id_result as $comment_id) {
            array_push($store_all_id, $comment_id->answer_id);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return  $this->in_parent(0, $ne_id, $store_all_id);
    }
    /**
     * recursive function to loop
     * through all comments and retrieve it
     */
    public function in_parent($in_parent, $ne_id, $store_all_id)
    {
        // this variable to save all concatenated html
        $html = "";
        // build hierarchy  html structure based on ul li (parent-child) nodes
        if (in_array($in_parent, $store_all_id)) :
            $result = $this->general_model->get_all("comments", null, "id DESC", ["news_id" => $ne_id, "answer_id" => $in_parent]);
            $users = $this->general_model->get_all("users", null, "id ASC", ["isActive" => 1]);
            $html .=  '<ul class="timeline-comments">';
            foreach ($result as $key => $value) :
                $user = null;
                foreach ($users as $k => $v) :
                    if ($value->user_id == $v->id) :
                        $user = $v;
                        break;
                    endif;
                endforeach;
                $user_role = $this->general_model->get("user_role", null, ["id" => $user->role_id, "isActive" => 1])->title;
                $html .= '<li class="timeline-comment">
                            <div class="timeline-comment-wrapper">
                                <div class="card dark">
                                    <div class="card-header d-flex align-items-center">
                                        <div class="ribbon"><span>' . $user_role . '</span></div>
                                        <a href="' . base_url("profil/{$user->user_name}") . '" class="d-flex align-items-center bg-transparent">
                                            <img class="rounded-circle" src="' . get_picture("users_v", $user->img_url) . '" alt="' . $user->full_name . '" />
                                            <h5>' . $user->user_name . '</h5>
                                        </a>
                                        <div class="comment-date">
                                            ' . turkishDate("d F Y, l H:i:s", $value->createdAt) . '
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">' . clean($value->content) . '</p>
                                    </div>
                                    <div class="card-footer p-2">';
                if (get_active_user()) :
                    $html .= '              <button type="button" class="btn btn-secondary btn-sm toggleReply">Yanıtla</button>';
                endif;
                $html .= '              <small class="text-muted ml-2">' . (!empty($value->updatedAt) ? time_ago($value->updatedAt) : time_ago($value->createdAt)) . ' Güncellendi.</small>';
                if (get_active_user()) :
                    $html .= '
                                        <form class="replyForm mt-3" style="display:none" onsubmit="return false" method="POST" enctype="multipart/formdata">
                                            <div class="row mx-0">
                                                <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                                                    <a href="' . base_url("profil/" . get_active_user()->user_name) . '" class="d-block align-items-center text-center justify-content-center bg-transparent">
                                                        <img class="rounded-circle img-fluid text-center justify-content-center bg-white border border-success shadow-lg" width="75" src="' . get_picture("users_v", get_active_user()->img_url) . '" alt="' . get_active_user()->full_name . '" />
                                                        <h6 class="text-center justify-content-center"><small class="text-center justify-content-center">' . get_active_user()->user_name . '</small></h6>
                                                    </a>
                                                </div>
                                                <div class="col-9 col-sm-9 col-md-9 col-lg-11 col-xl-11">
                                                    <div class="form-group mb-1">
                                                        <textarea name="content" class="form-control" placeholder="Yanıtınızı Buraya Yazın..." cols="30" rows="5"></textarea>
                                                        <input type="hidden" name="news_id" value="' . $value->news_id . '">
                                                        <input type="hidden" name="answer_id" value="' . $value->id . '">
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button data-url="' . base_url("yorum-yap") . '" class="btn btn-primary btnReply mx-0">Yanıtı Gönder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>';
                endif;
                $html .= '
                                    </div>
                                </div>
                            </div>';
                $html .= $this->in_parent($value->id, $ne_id, $store_all_id);
                $html .= "</li>";
            endforeach;
            $html .=  "</ul>";
        endif;

        return $html;
    }
    /**
     * Load Comments
     */
    public function loadComments($ne_id){
        if (!empty(clean($ne_id))) :
            echo json_encode(["comments" => $this->show_tree($ne_id),"commentCount" =>$this->general_model->rowCount("comments",["news_id" => $ne_id])]);
        endif;
    }
    /**
     * Reply Comment
     */
    public function reply_comment()
    {
        if (get_active_user()) :
            $data = rClean($this->input->post());
            if (checkEmpty($data)["error"]) :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Yorum Yanıtlanırken Hata Oluştu. Mesaj Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
            else :
                $data["user_id"] = get_active_user()->id;
                $insert = $this->general_model->add("comments", $data);
                if ($insert) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Yorumu Başarıyla Yanıtladınız."]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Yorum Yanıtlanırken Hata Oluştu, Lütfen Tekrar Deneyin."]);
                endif;
            endif;
        else :
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Yorum Yanıtlanırken Hata Oluştu Oturum Açtığınızdan Emin Olup, Lütfen Tekrar Deneyin."]);
        endif;
    }
    /**
     * OnAir
     */
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
        $config['total_rows'] = $this->general_model->rowCount("brands", ["isActive" => 1]);
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($this->uri->segment(2))) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->brands = $this->general_model->get_all("brands", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]);
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = $this->general_model->get_all("news", null, "hit DESC", ["isActive" => 1], [], [], [5]);
        if (empty($this->viewData->brands)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "brands_v/index";
        endif;
        $this->render();
    }
    /**
     * Activities
     */
    public function activities()
    {
        $seo_url = $this->uri->segment(2);
        $category = null;
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $category = $this->general_model->get("activity_categories", null, ["seo_url" => $seo_url, "isActive" => 1]);
            $category_id = $category->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("haberler/{$seo_url}") : base_url("haberler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
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
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("activities", ["isActive" => 1, "category_id" => $category_id]) : $this->general_model->rowCount("activities", ["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->activities = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("activities", null, null, ['category_id' => $category_id, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("activities", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->category = $category;
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("activities", null, "event_date ASC", ['category_id' => $category_id, "isActive" => 1], [], [], [5]) : $this->general_model->get_all("activities", null, "event_date ASC", ["isActive" => 1], [], [], [5]));
        if (empty($this->viewData->activities)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "activities_v/index";
        endif;
        $this->render();
    }
    /**
     * Activity Detail
     */
    public function activity_detail($seo_url)
    {
        $this->viewData->activities = $this->general_model->get("activities", null, ['seo_url' => $seo_url, "isActive" => 1]);
        $this->viewData->category = $this->general_model->get("activity_categories", null, ["id" => $this->viewData->activities->category_id, "isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("activities", null, "event_date ASC", ['category_id' => $this->viewData->activities->category_id, "isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("activities", null, "event_date ASC", ["isActive" => 1], [], [], [3, 0]);
        if (empty($this->viewData->activities)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "activity_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Job Advertisements
     */
    public function job_advertisements()
    {
        $seo_url = $this->uri->segment(2);
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $type = $seo_url;
            if ($type == "is") :
                $type = "job";
            else :
                $type = "estate";
            endif;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("ilanlar/{$seo_url}") : base_url("ilanlar"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
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
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("job_advertisements", ["isActive" => 1, "type" => $type]) : $this->general_model->rowCount("job_advertisements", ["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->job_advertisements = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("job_advertisements", null, null, ['type' => $type, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("job_advertisements", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("job_advertisements", null, "hit DESC", ['type' => $type, "isActive" => 1], [], [], [5]) : $this->general_model->get_all("job_advertisements", null, "hit DESC", ["isActive" => 1], [], [], [5]));
        if (empty($this->viewData->job_advertisements)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "job_advertisements_v/index";
        endif;
        $this->render();
    }
    /**
     * Job Advertisement Detail
     */
    public function job_advertisement_detail($seo_url)
    {
        $this->viewData->job_advertisement = $this->general_model->get("job_advertisements", null, ['seo_url' => $seo_url, "isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("job_advertisements", null, "hit DESC", ["isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("job_advertisements", null, "hit DESC", ["isActive" => 1], [], [], [3, 0]);
        $this->general_model->update("job_advertisements", ['seo_url' => $seo_url, "isActive" => 1], ['hit' => $this->viewData->job_advertisement->hit + 1]);
        if (empty($this->viewData->job_advertisement)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "job_advertisement_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Estate Advertisements
     */
    public function estate_advertisements()
    {
        $seo_url = $this->uri->segment(2);
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $type = $seo_url;
            if ($type == "is") :
                $type = "job";
            else :
                $type = "estate";
            endif;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("ilanlar/{$seo_url}") : base_url("ilanlar"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
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
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("estate_advertisements", ["isActive" => 1, "type" => $type]) : $this->general_model->rowCount("estate_advertisements", ["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->estate_advertisements = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("estate_advertisements", null, null, ['type' => $type, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("estate_advertisements", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        $this->viewData->writers = $this->general_model->get_all("users", null, "rank ASC", ["isActive" => 1, "role_id!=" => 2]);
        $this->viewData->links = $this->pagination->create_links();
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("estate_advertisements", null, "hit DESC", ['type' => $type, "isActive" => 1], [], [], [5]) : $this->general_model->get_all("estate_advertisements", null, "hit DESC", ["isActive" => 1], [], [], [5]));
        if (empty($this->viewData->estate_advertisements)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "estate_advertisements_v/index";
        endif;
        $this->render();
    }
    /**
     * Estate Advertisement Detail
     */
    public function estate_advertisement_detail($seo_url)
    {
        $this->viewData->estate_advertisement = $this->general_model->get("estate_advertisements", null, ['seo_url' => $seo_url, "isActive" => 1]);
        $this->viewData->similar = $this->general_model->get_all("estate_advertisements", null, "hit DESC", ["isActive" => 1]);
        $this->viewData->most_read = $this->general_model->get_all("estate_advertisements", null, "hit DESC", ["isActive" => 1], [], [], [3, 0]);
        $this->general_model->update("estate_advertisements", ['seo_url' => $seo_url, "isActive" => 1], ['hit' => $this->viewData->estate_advertisement->hit + 1]);
        if (empty($this->viewData->estate_advertisement)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "estate_advertisement_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * Galleries
     */
    public function galleries()
    {
        $seo_url = $this->uri->segment(2);
        if (!empty($seo_url) && !is_numeric($seo_url)) :
            $gallery_id = $this->general_model->get("galleries", null, ["url" => "video-url-galerisi", "isActive" => 1, "isCover" => 1])->id;
        endif;
        $config = [];
        $config['base_url'] = (!empty($seo_url) && !is_numeric($seo_url) ? base_url("galeriler/{$seo_url}") : base_url("galeriler"));
        $config['uri_segment'] = (!empty($seo_url) && !is_numeric($seo_url) ? 3 : 2);
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
        $config['total_rows'] = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->rowCount("galleries", ["isActive" => 1, "gallery_id" => $gallery_id]) : $this->general_model->rowCount("galleries", ["isActive" => 1,]));
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $page = $config['uri_segment'] * $config['per_page'];
        $this->pagination->initialize($config);
        if (!empty($seo_url) && !is_numeric($seo_url) && !empty($this->uri->segment(3))) :
            $uri_segment = $this->uri->segment(3);
        elseif (!empty($seo_url) && is_numeric($seo_url)) :
            $uri_segment = $this->uri->segment(2);
        else :
            $uri_segment = 1;
        endif;

        $offset = ($uri_segment - 1) * $config['per_page'];
        $this->viewData->galleries = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("galleries", null, null, ['gallery_id' => $gallery_id, "isActive" => 1], [], [], [$config["per_page"], $offset]) : $this->general_model->get_all("galleries", null, null, ["isActive" => 1], [], [], [$config["per_page"], $offset]));
        $this->viewData->most_read = (!empty($seo_url) && !is_numeric($seo_url) ? $this->general_model->get_all("news", null, "hit DESC", ["isActive" => 1], [], [], [5]) : $this->general_model->get_all("news", null, "hit DESC", ["isActive" => 1], [], [], [5]));
        $this->viewData->links = $this->pagination->create_links();
        if (empty($this->viewData->galleries)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "galleries_v/index";
        endif;
        $this->render();
    }
    /**
     * Gallery Detail
     */
    public function gallery_detail($seo_url)
    {
        $seo_url == "videolar" ? $seo_url = "video-url-galerisi" : $seo_url;
        $this->viewData->gallery = $this->general_model->get("galleries", null, ['url' => $seo_url, "isActive" => 1]);

        $this->viewData->gallery_items = $this->general_model->get_all("{$this->viewData->gallery->gallery_type}", null, "rank ASC", ["gallery_id" => $this->viewData->gallery->id, "isActive" => 1]);
        if (empty($this->viewData->gallery_items)) :
            $this->viewFolder = "404_v/index";
        else :
            $this->viewFolder = "gallery_detail_v/index";
        endif;
        $this->render();
    }
    /**
     * References
     */
    public function references()
    {
        $this->viewData->references = $this->general_model->get_all("references", null, null, ["isActive" => 1]);
        $this->viewFolder = "references_v/index";
        $this->render();
    }
    /**
     * Contact
     */
    public function contact()
    {
        $this->viewFolder = "contact_v/index";
        $this->render();
    }
    /**
     * URL Emotion
     */
    public function urlEmotion()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "\"{$key}\" Bilgisini Seçtiğinizden Emin Olup Tekrar Deneyin."]);
        else :
            $ad = $data["ad"];
            $user_id = $this->session->userdata("users");
            $item = $this->general_model->get("news", null, ['id' => $data["id"]]);
            $reaction = json_decode($item->reaction);
            $reaction->$ad = $reaction->$ad + 1;
            $user = $this->general_model->get_all("news_emoji", null, "rank ASC", ["user_id" => $user_id, "news_id" => $data["id"]]);
            $user = (array) $user;
            if (count($user) <= 1) :
                $this->general_model->add("news_emoji", [
                    'user_id' => $user_id,
                    'news_id' => $data["id"],
                    'type' => $data["ad"]
                ]);
                $reactionn = json_encode($reaction);
                if ($this->general_model->update("news", ['id' => $data["id"]], ['reaction' => $reactionn])) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Bu Habere Verdiğiniz Tepki Güncellendi.", "response_data" => $reaction->$ad]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Habere Tepki Verilirken Hata Oluştu."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Bir Habere En Fazla 2 Tepki Verebilirsiniz."]);
            endif;
        endif;
    }
    /**
     * Test Check
     */
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
    /**
     * Contact Form
     */
    public function contact_form()
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
