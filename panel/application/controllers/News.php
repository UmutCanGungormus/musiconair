<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "news_v";
        $this->load->model("news_model");
        $this->load->model("news_category_model");
        $this->load->model("writers_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->news_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->categories=$this->news_category_model->get_all();
        $viewData->writers=$this->writers_model->get_all();
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        $this->load->library("form_validation");
        $news_type = $this->input->post("news_type");
        $reaction=[
            'cok_iyi'=>0,
            'helal_olsun'=>0,
            'kizgin'=>0,
            'uzucu'=>0,
            'yerim'=>0,
            'yok_artik'=>0,
            'hos_degil'=>0

        ];
        
            if ($_FILES["img_url"]["name"] == "") {
                $alert = array(
                    "title" => "İşlem Başarısız!",
                    "text" => "Lütfen bir görsel seçiniz..",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("news/new_form"));
            }
     
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
          
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_370x297 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",370,297, $file_name);
                $image_1008x600 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1008,600, $file_name);
                if($image_370x297 && $image_1008x600){
                    $data = array(
                        "title"         => $this->input->post("title"),
                        "content"   => $this->input->post("content"),
                        "seo_url"           => convertToSEO($this->input->post("title")),
                        "tags"      => $this->input->post("tags"),
                        "img_url"     => $file_name,
                        'reaction' => json_encode($reaction),
                        "video_url"     => $this->input->post("video_url"),
                        "emoji"      => $this->input->post("emoji"),
                        "writer_id"      => $this->input->post("writer_id"),
                        "category_id"      => $this->input->post("category_id"),
                        "rank"          => 0,
                        "isActive"      => 1
                    );
                 } else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("news/new_form"));
                }
            
            $insert = $this->news_model->add($data);
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt ekleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("news"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
    	$viewData = new stdClass();
    	$item = $this->news_model->get(
    		array(
    			"id"=>$id
    		)
    	);
		$viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->categories=$this->news_category_model->get_all();
        $viewData->writers=$this->writers_model->get_all();
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
       
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
       
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
    
                if($_FILES["img_url"]["name"] !== ""){
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"],PATHINFO_EXTENSION);
                $image_370x297 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",370,297, $file_name);
                $image_1008x600 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",1008,600, $file_name);

                if($image_370x297 && $image_1008x600){
                    $data = array(
                        "title"         => $this->input->post("title"),
                        "content"   => $this->input->post("content"),
                        "seo_url"           => convertToSEO($this->input->post("title")),
                       
                        "img_url"     => $file_name,
                        "video_url"     => $this->input->post("video_url"),
                        "emoji"      => $this->input->post("emoji"),
                        "writer_id"      => $this->input->post("writer_id"),
                        "tags"      => $this->input->post("tags"),
                        "category_id"      => $this->input->post("category_id"),
                        "rank"          => 0,
                        "isActive"      => 1
                    );
                }else{
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("news/update_form/$id"));
                }
            }else{
                $data = array(
                    "title"         => $this->input->post("title"),
                    "content"   => $this->input->post("content"),
                    "seo_url"           => convertToSEO($this->input->post("title")),
                    "video_url"     => $this->input->post("video_url"),
                    "emoji"      => $this->input->post("emoji"),
                    "writer_id"      => $this->input->post("writer_id"),
                    "tags"      => $this->input->post("tags"),
                    "category_id"      => $this->input->post("category_id"),
                    "rank"          => 0,
                    "isActive"      => 1
                );
            }
        
             
            $update = $this->news_model->update(array("id"=>$id),$data);
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("news"));
        }else {
            $viewData = new stdClass();
            $item = $this->news_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->news_type = $news_type;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
    	$delete = $this->news_model->delete(
    		array(
    			"id" => $id
    		)
    	);
    	if ($delete) {
    		$alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                "type" => "success"
            );
    	}else{
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                "type" => "error"
            );
    	}
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("news"));
    }
    public function isActiveSetter($id){
    	if ($id) {
    		$isActive = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->news_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"isActive" => $isActive
    			)
    		);
    	}
    }
    public function rankSetter(){
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->news_model->update(
    			array(
    				"id" => $id,
    				"rank !=" => $rank
    			),
    			array(
    				"rank" => $rank
    			)
    		);
    	}
    }
}
