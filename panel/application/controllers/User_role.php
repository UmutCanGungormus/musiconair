<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_role extends MY_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "user_role_v";
        $this->load->model("user_role_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function permissions_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->user_role_model->get(
            array(
                "id"    => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }
    public function update_permissions($id){

        $permissions = json_encode($this->input->post("permissions"));

        // Update Süreci...
        $update = $this->user_role_model->update(
            array("id" => $id),
            array(
                "permissions"      => $permissions
            )
        );

        // TODO Alert sistemi eklenecek...
        if($update){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Yetki Tanımı başarılı bir şekilde güncellendi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Yetki Tanımı Güncelleme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }

        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("user_role/permissions_form/$id"));

    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->user_role_model->get_all(
		
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        $this->load->library("form_validation");
          
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();
        if($validate){
                    $insert = $this->user_role_model->add(
                        array(
                        "title"         => $this->input->post("title"),
                        
                        "isActive"      => 1
                        )
                    );
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
            redirect(base_url("user_role"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
    	$viewData = new stdClass();
    	$item = $this->user_role_model->get(
    		array(
    			"id"=>$id
    		)
    	);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
               
          
                    $data = array(
                        "title"         => $this->input->post("title")
                    );
               
          
            $update = $this->user_role_model->update(array("id"=>$id),$data);
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
            redirect(base_url("user_role"));
        } else {
            $viewData = new stdClass();
            $item = $this->user_role_model->get(
                array(
                    "id"=>$id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
    	$delete = $this->user_role_model->delete(
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
        redirect(base_url("user_role"));
    }
    public function isActiveSetter($id){
    	if ($id) {
    		$isActive = ($this->input->post("data") === "true") ? 1 : 0;
    		$this->user_role_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"isActive" => $isActive
    			)
    		);
    	}
    }

}
