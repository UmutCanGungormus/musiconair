<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userop extends CI_Controller
{
    public $viewFolder = "";
    public $site_settings = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";
        $this->viewData = new stdClass();
        $this->site_settings = get_settings();
    }

    public function render()
    {
        $this->load->view("includes/head", $this->viewData);
        $this->load->view("includes/header");
        $this->load->view("includes/sidebar");
        $this->load->view($this->viewFolder);
        $this->load->view("includes/footer");
    }

    public function login()
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Oturum Açılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $user = $this->general_model->get("users", null, ["email" => $data["email"], "password" => md5($data["password"]), "isActive" => 1, "role_id" => 1]);
            if ($user) :
                $this->session->set_userdata("user", $user);
                userRole();
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "<b>$user->full_name</b> Hoşgeldiniz...", "redirect" => base_url()]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Oturum Açılırken Hata Oluştu. Bilgilerinizi Kontrol Edip Tekrar Deneyin."]);
            endif;
        endif;
    }

    public function register()
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Oturum Açılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $data["password"] = md5($data["password"]);
            //$data["createdAt"] = date("Y-m-d H:i:s");
            $data["isActive"] = 1;
            $data["role_id"] = 1;
            $data["full_name"] = strto("lower|upper", $data["name"]) . " " . strto("lower|upper", $data["surname"]);
            unset($data["name"]);
            unset($data["surname"]);
            $insert = $this->general_model->add("users", $data);
            if ($insert) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Sitemize Başarıyla Kayıt Oldunuz. Artık Giriş Yapabilirsiniz..."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sitemize Kayıt Olurken Hata Oluştu. Lütfen Tekrar Deneyin..."]);
            endif;
        endif;
    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        $this->session->set_flashdata("alert", ["title" => "Başarılı!", "text" => "Başarıyla Çıkış Yaptınız...", "type" => "success"]);
        redirect(base_url());
    }

    public function reset_password()
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Şifre Sıfırlama Linki Gönderilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $user = $this->general_model->get("users", null, ["isActive" => 1, "email" => $data["email"]]);
            if ($user) :
                $email_message = "Sayın {$user->full_name},</br> <b>Şifre Sıfırlama Linkiniz : </b> <a href='" . base_url("sifremi-unuttum/".rawurlencode($user->email)."/{$user->token}") . "'>Şifremi Sıfırla</a>";
                $send = send_email($user->email,"{$this->site_settings->company_name} Şifre Sıfırlama", $email_message, 1);
                if ($send) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Şifre Sıfırlama Mailiniz <b>{$user->email}</b> Mail Adresinize İletildi..."]);
                else :
                    //echo $this->email->print_debugger();
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sıfırlama Maili Gönderilirken Hata Oluştu. Lütfen Tekrar Deneyin..."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Girmiş Olduğunuz Bilgilerle Eşleşen Kullanıcı Bilgisi Bulunamadı..."]);
            endif;
        endif;
    }

    public function reset_password_v($email = null, $token = null)
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        
        if (!empty($email) || !empty($token)) :
            $email = rawurldecode($email);
            $user = $this->general_model->get("users", null, ["email" => $email, "token" => $token]);
            if (!empty($user)) :
                $this->viewData->email = $user->email;
                $this->viewData->token = $user->token;
                $this->viewFolder = "pass_reset_v/index";
                $this->render();
            else :
                die("asdfdf");
                $this->session->set_flashdata('alert', ["success" => false, "title" => "Başarısız!", "msg" => "Bilgilerinizin Doğru Olduğundan Emin Olup Lütfen Tekrar Deneyin."]);
                redirect(base_url("sifremi-unuttum/".rawurlencode($email)."/{$token}"));
            endif;
        else :
            $this->session->set_flashdata('alert', ["success" => false, "title" => "Başarısız!", "msg" => "Geçersiz Parametre. Lütfen Şifrenizi Tekrar Sıfırlamayı Deneyin."]);
            redirect(base_url());
        endif;
    }

    public function reset_password_end()
    {
        $data = $this->input->post();
        $user = $this->general_model->get("users", null, ["email" => $data["email"], "token" => $data["token"]]);
        if (!empty($user)) {
            if ($data["password"] == $data["confirm_password"]) {
                $update_data["token"] = md5(rand(0, 9999999999999999999));
                $update_data["password"] = md5($data["password"]);
                if($this->user_model->update(["email" => $data["email"], "token" => $data["token"]], $update_data)):
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Şifreniz Başarıyla Değiştirildi Giriş Yapabilirsiniz."]);
                    redirect(base_url());
                else:
                    echo json_encode(["success" => false, "title" => "Başarılı!", "message" => "Şifreniz Güncelleştirilirken Hata Oluştu Lütfen Tekrar Deneyin."]);
                    redirect(base_url("sifremi-unuttum/".$data["email"]."/".$data["token"]));
                endif;
            } else {
                $this->viewData["email"] = $data["email"];
                $this->viewData["key"] = $data["token"];
                $this->session->set_flashdata('alert', ["success" => false, "title" => "Başarısız!", "msg" => "Girdiğiniz Şifreler Uyuşmamaktadır."]);
                $this->viewFolder = "pass_reset_v/index";
                $this->render();
            }
        }
    }
}
