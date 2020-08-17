<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_media_talk extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "social_media_talk_v";
        $this->load->model("social_media_talk_model");
        $this->load->model("news_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $items = $this->social_media_talk_model->get_all(
            array(),
            "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function datatable()
    {
        $items = $this->social_media_talk_model->getRows(
            [],
            $_POST
        );
        $data = $row = array();
        $i = (!empty($_POST['start']) ? $_POST['start'] : 0);

        foreach ($items as $item) {
            $i++;
            
            $proccessing = '
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary rounded-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    İşlemler
                </button>
                <div class="dropdown-menu rounded-0 dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="' . base_url("social_media_talk/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-url="' . base_url("social_media_talk/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);
            if($item->video_url!="#"){
                $item->img_url=' <iframe width="200" height="100" src="https://www.youtube.com/embed/'.  $item->video_url.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }else{
                $item->img_url="<img src='".get_picture($this->viewFolder, $item->img_url)."' width='60px' height='60px' >";
            }
            $item->category_title= get_news_title($item->news_id);
            $checkbox= '<div class="custom-control custom-switch"><input data-id="'.$item->id.'" data-url="'.base_url("social_media_talk/isActiveSetter/{$item->id}").'" data-status="'.($item->isActive == 1 ? "checked" : null).'" id="customSwitch'.$i.'" type="checkbox" '.($item->isActive == 1 ? "checked" : null).' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch'.$i.'"></label></div>';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title, $item->category_title, $item->img_url, $checkbox, $proccessing);
        }
        


        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->social_media_talk_model->rowCount(),
            "recordsFiltered" => $this->social_media_talk_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }
    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->categories = $this->news_model->get_all();
        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $this->load->library("form_validation");
        $social_media_talk_type = $this->input->post("social_media_talk_type");

        if ($social_media_talk_type == "image") {
            $this->form_validation->set_rules("news_id", "Haber id", "required|trim");


            if ($_FILES["img_url"]["name"] == "") {
                $alert = array(
                    "title" => "İşlem Başarısız!",
                    "text" => "Lütfen bir görsel seçiniz..",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("social_media_talk/new_form"));
            }
        } else if ($social_media_talk_type == "video") {
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        }
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();

        if ($validate) {

            if ($social_media_talk_type == "image") {
                $image = upload_picture("img_url", "uploads/$this->viewFolder");
                $getRank = $this->brand_model->rowCount();
                if ($image["success"]) {

                    $data = array(

                        "social_media_talk_type"     => $social_media_talk_type,
                        "img_url"     => $image["file_name"],
                        "title"     =>$this->input->post("title"),
                        "video_url"     => "#",
                        "news_id"        => $this->input->post("news_id"),
                        "rank"          => 0,
                        "isActive"      => 1

                    );
                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu!",
                        "text" => "Görsel yüklenirken bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("social_media_talk/new_form"));
                }
            } else if ($social_media_talk_type == "video") {
                $data = array(

                    "social_media_talk_type"     => $social_media_talk_type,
                    "img_url"     => "#",
                    "video_url"     => $this->input->post("video_url"),
                    "news_id"        => $this->input->post("news_id"),
                    "title"     =>$this->input->post("title"),
                    "rank"          => 1,
                    "isActive"      => 1
                );
            }
            $insert = $this->social_media_talk_model->add($data);
            if ($insert) {
                $alert = array(
                    "title" => "İşlem Başarıyla Gerçekleşti.",
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
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("social_media_talk"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->social_media_talk_type = $social_media_talk_type;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->social_media_talk_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->categories = $this->news_model->get_all();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $this->load->library("form_validation");
        $social_media_talk_type = $this->input->post("social_media_talk_type");
        if ($social_media_talk_type == "video") {
            $this->form_validation->set_rules("video_url", "Video URL", "required|trim");
        } else {
            $this->form_validation->set_rules("news_id", "Haber", "required");
        }
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();

        if ($validate) {

            if ($social_media_talk_type == "image") {

                if ($_FILES["img_url"]["name"] !== "") {
                    $image = upload_picture("img_url", "uploads/$this->viewFolder");

                    if ($image["success"]) {


                        $data = array(

                            "social_media_talk_type"     => $social_media_talk_type,
                            "img_url"     => $image["file_name"],
                            "title"     =>$this->input->post("title"),
                            "video_url"     => "#"
                        );
                    } else {
                        $alert = array(
                            "title" => "İşlem Başarısız Oldu!",
                            "text" => "Görsel yüklenirken bir problem oluştu!",
                            "type" => "error"
                        );
                        $this->session->set_flashdata("alert", $alert);
                        redirect(base_url("social_media_talk/update_form/$id"));
                    }
                } else {
                    $data = array(
                        "social_media_talk_type"     => $social_media_talk_type,
                        "title"     =>$this->input->post("title"),
                        "video_url"     => "#"

                    );
                }
            } else if ($social_media_talk_type == "video") {
                $data = array(

                    "social_media_talk_type"     => $social_media_talk_type,
                    "title"     =>$this->input->post("title"),
                    "img_url"     => "#",
                    "video_url"     => $this->input->post("video_url")
                );
            }
            $update = $this->social_media_talk_model->update(array("id" => $id), $data);
            if ($update) {
                $alert = array(
                    "title" => "İşlem Başarıyla Gerçekleşti.",
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
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("social_media_talk"));
        } else {
            $viewData = new stdClass();
            $item = $this->social_media_talk_model->get(
                array(
                    "id" => $id
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->social_media_talk_type = $social_media_talk_type;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id)
    {
        $delete = $this->social_media_talk_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $alert = array(
                "title" => "İşlem Başarıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarıyla Gerçekleşti.",
                "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("social_media_talk"));
    }

    public function rankSetter()
    {
        $rows = $this->input->post("rows");

        foreach ($rows as $row) {
            $this->news_model->update(
                array(
                    "id" => $row["id"]
                ),
                array("rank" => $row["position"])
            );
        }
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->social_media_talk_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
}
