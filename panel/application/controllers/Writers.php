<?php
class Writers extends MY_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "writers_v";
        $this->load->model("writers_model");
        $this->load->helper("text");
        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $items = $this->writers_model->get_all(
            array(), "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form(){
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save(){
        $this->load->library("form_validation");
        if($_FILES["img_url"]["name"] == ""){
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Lütfen bir görsel seçiniz",
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("writers/new_form"));
            die();
        }
        $this->form_validation->set_rules("name", "Ad", "required|trim");
        $this->form_validation->set_rules("type", "Görev", "required|trim");
        $this->form_validation->set_rules("email", "Mail", "required|trim");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
            $image_90x90 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",90,90, $file_name);
            if($image_90x90){
                $insert = $this->writers_model->add(
                    array(
                        "name"         => $this->input->post("name"),
                        "type"   => $this->input->post("type"),
                        "email"       => $this->input->post("email"),
                        "password"     => md5($this->input->post("password")),
                        "img_url"       => $file_name,
                        "isActive"      => 1
                    )
                );
                if($insert){
                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text" => "Kayıt başarılı bir şekilde eklendi",
                        "type"  => "success"
                    );

                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Görsel yüklenirken bir problem oluştu",
                    "type"  => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("writers/new_form"));
                die();
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("writers"));
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
        $item = $this->writers_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Ad", "required|trim");
        $this->form_validation->set_rules("type", "Görev", "required|trim");
        $this->form_validation->set_rules("email", "Mail", "required|trim");
    
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            if($_FILES["img_url"]["name"] !== "") {
                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);
                $image_90x90 = upload_picture($_FILES["img_url"]["tmp_name"], "uploads/$this->viewFolder",90,90, $file_name);
                if($image_90x90){
                    if($this->input->post("password")!=""){
                        $data = array(
                            "name"         => $this->input->post("name"),
                            "type"   => $this->input->post("type"),
                            "email"       => $this->input->post("email"),
                            "password"     => md5($this->input->post("password")),
                            "img_url"       => $file_name,
                            "isActive"      => 1
                        );
                    }else{
                        $data = array(
                            "name"         => $this->input->post("name"),
                            "type"   => $this->input->post("type"),
                            "email"       => $this->input->post("email"),
                            "img_url"       => $file_name,
                            "isActive"      => 1
                        );
                    }
                  
                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Görsel yüklenirken bir problem oluştu",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("writers/update_form/$id"));
                    die();
                }
            } else {
                if($this->input->post("password")!=""){
                $data = array(
                    "name"         => $this->input->post("name"),
                    "type"   => $this->input->post("type"),
                    "email"       => $this->input->post("email"),
                    "password"     => md5($this->input->post("password")),
                 
                    "isActive"      => 1
                );
            }else{
                $data = array(
                    "name"         => $this->input->post("name"),
                    "type"   => $this->input->post("type"),
                    "email"       => $this->input->post("email"),
                   
                 
                    "isActive"      => 1
                );
            }
            }
            $update = $this->writers_model->update(array("id" => $id), $data);
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("writers"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->writers_model->get(
                array(
                    "id"    => $id,
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        $delete = $this->writers_model->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("writers"));
    }
    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->writers_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->writers_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );
        }
    }
}