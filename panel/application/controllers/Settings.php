<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "settings_v";
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $this->general_model->get("settings");
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_form($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $this->general_model->get("settings",null,["id" => $id]);
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $this->form_validation->set_rules("company_name", "Şirket Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon 1", "required|trim");
        $this->form_validation->set_rules("email", "E-posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_message(["required"  => "<b>{field}</b> alanı doldurulmalıdır","valid_email"  => "Lütfen geçerli bir <b>{field}</b> giriniz"]);
        $validate = $this->form_validation->run();
        if ($validate) {
            $data = [
                "company_name"      => $this->input->post("company_name"),
                "phone_1"           => $this->input->post("phone_1"),
                "phone_2"           => $this->input->post("phone_2"),
                "fax_1"             => $this->input->post("fax_1"),
                "fax_2"             => $this->input->post("fax_2"),
                "address"           => $this->input->post("address"),
                "about_us"          => $this->input->post("about_us"),
                "mission"           => $this->input->post("mission"),
                "vision"            => $this->input->post("vision"),
                "email"             => $this->input->post("email"),
                "facebook"          => $this->input->post("facebook"),
                "twitter"           => $this->input->post("twitter"),
                "instagram"         => $this->input->post("instagram"),
                "linkedin"          => $this->input->post("linkedin"),
                "meta_keywords"     => $this->input->post("metakeyw"),
                "meta_description"  => $this->input->post("metadesc"),
                "lat"               => $this->input->post("lat"),
                "long"              => $this->input->post("long"),
                "analytics"         => $this->input->post("analytics"),
                "metrica"           => $this->input->post("metrica"),
                "live_support"      => $this->input->post("live_support"),
                "updatedAt"         => date("Y-m-d H:i:s")
            ];

            if (!empty($_FILES["logo"]["name"])) {
                $image = upload_picture("logo", "uploads/$this->viewFolder");
                if ($image["success"]) {
                    $data["logo"] = $image["file_name"];
                } else {
                    $alert = [
                        "title" => "İşlem Başarısız!",
                        "text"  => "Masaüstü Görseli Yüklenirken Hata Oluştu.",
                        "type"  => "error"
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                    die();
                }
            }
            if (!empty($_FILES["mobile_logo"]["name"])) {
                $image = upload_picture("mobile_logo", "uploads/$this->viewFolder");
                if ($image["success"]) {
                    $data["mobile_logo"] = $image["file_name"];
                } else {
                    $alert = [
                        "title" => "İşlem Başarısız!",
                        "text"  => "Mobil Görseli Yüklenirken Hata Oluştu.",
                        "type"  => "error"
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                    die();
                }
            }
            if (!empty($_FILES["favicon"]["name"])) {
                $image = upload_picture("favicon", "uploads/$this->viewFolder");
                if ($image["success"]) {
                    $data["favicon"] = $image["file_name"];
                } else {
                    $alert = [
                        "title" => "İşlem Başarısız!",
                        "text"  => "Favicon Görseli Yüklenirken Hata Oluştu.",
                        "type"  => "error"
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("settings/update_form/$id"));
                    die();
                }
            }
            $update = $this->general_model->update("settings",["id" => $id], $data);
            if ($update) {
                $alert = [
                    "title" => "İşlem Başarılı!",
                    "text" => "Site Ayarı Başarıyla Güncelleştirildi.",
                    "type"  => "success"
                ];
            } else {
                $alert = [
                    "title" => "İşlem Başarısız!",
                    "text" => "Site Ayarı Güncelleştirilirken Hata Oluştu.",
                    "type"  => "error"
                ];
            }
            $settings = $this->general_model->get();
            $this->session->set_userdata("settings", $settings);
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->general_model->get("settings",null,["id" => $id]);
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function uploadImage(){
        $image = upload_picture("file", "uploads/tinyMCE");
        if ($image["success"]) {
            $filename = $image["file_name"];
            echo json_encode(['location' => base_url("uploads/tinyMCE/{$filename}")]);
        }else{
            // Notify editor that the upload failed
        header("HTTP/1.1 500 Server Error");
        }
    }
}
