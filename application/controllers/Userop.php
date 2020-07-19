<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userop extends CI_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";
    }
    public function login()
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        $data = rClean($this->input->post());
        $error = false;
        foreach ($data as $key => $value) :
            $value = trim($value);
            if (empty($value))
                $error = true;
        endforeach;
        if ($error) :
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
        $error = false;
        foreach ($data as $key => $value) :
            $value = trim($value);
            if (empty($value))
                $error = true;
        endforeach;
        if ($error) :
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Oturum Açılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $user = $this->general_model->get("users", null, ["isActive" => 1, "email" => $data["email"]]);
            if ($user) :
                $temp_password = random_string();
                $send = send_email($user->email, "MuzikOnAir Şifremi Unuttum", "MuzikOnAir'e geçiçi olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz!");
                if ($send) :
                    if ($this->general_model->update("users", ["id" => $user->id], ["password" => md5($temp_password)])) :
                        echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Şifreniz Başarılı Bir Şekilde Sıfırlandı. Lütfen E-Postanızı Kontrol Ediniz..."]);
                    else :
                        echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Şifreniz Sıfırlanırken Hata Oluştu. Lütfen Tekrar Deneyin..."]);
                    endif;
                else :
                    //echo $this->email->print_debugger();
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sıfırlama Maili Gönderilirken Hata Oluştu. Lütfen Tekrar Deneyin..."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Girmiş Olduğunuz Bilgilerle Eşleşen Kullanıcı Bilgisi Bulunamadı..."]);
            endif;
        endif;
    }

    public function register()
    {
        if (get_active_user()) :
            redirect(base_url());
        endif;
        $data = rClean($this->input->post());
        $error = false;
        foreach ($data as $key => $value) :
            
            $value = trim($value);
            if (empty($value))
                $error = true;
        endforeach;
        if ($error) :
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Oturum Açılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $data["password"] = md5($data["password"]);
            $data["createdAt"] = date("Y-m-d H:i:s");
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
}
