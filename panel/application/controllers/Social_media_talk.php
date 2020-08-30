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
                    <a class="dropdown-item updateSocialMediaTalkBtn" data-url="' . base_url("social_media_talk/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="socialMediaTalk" data-url="' . base_url("social_media_talk/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);
            if (!empty($item->video_url)) {
                $item->img_url = ' <iframe width="300" height="150" src="' . $item->video_url . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            } else {
                $item->img_url = "<img src='" . get_picture($this->viewFolder, $item->img_url) . "' width='300' height='150' >";
            }
            $item->category_title = get_news_title($item->news_id);
            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("social_media_talk/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
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
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($data["social_media_talk_type"] == "image") :
                if ($_FILES["img_url"]["name"] == "") :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Eklenirken Hata Oluştu. Sosyal Medya Widget Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                    die();
                endif;
            else :
                $image = upload_picture("img_url", "uploads/$this->viewFolder");
                if ($image["success"]) :
                    $data["img_url"] = $image["file_name"];
                else:
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Eklenirken Hata Oluştu. Sosyal Medya Widget Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                    die();
                endif;
            endif;
            $getRank = $this->social_media_talk_model->rowCount();
            $data["isActive"] = 1;
            $data["rank"] = $getRank + 1;
            $data["content"] = $this->input->post("content");
            $insert = $this->social_media_talk_model->add($data);
            if ($insert) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Sosyal Medya Widget Başarıyla Eklendi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
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
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function update($id)
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Güncelleştirilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($data["social_media_talk_type"] == "image") :
                if (!empty($_FILES["img_url"]["name"])) :
                    $image = upload_picture("img_url", "uploads/$this->viewFolder");
                    if ($image["success"]) :
                        $data["img_url"] = $image["file_name"];
                    else:
                        echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Güncelleştirilirken Hata Oluştu. Sosyal Medya Widget Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                        die();
                    endif;
                endif;
            endif;
            $data["content"] = $this->input->post("content");
            $insert = $this->social_media_talk_model->update(["id" => $id],$data);
            if ($insert) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Sosyal Medya Widget Başarıyla Güncelleştirildi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Güncelleştirilirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    public function delete($id)
    {
        $social_media_talk = $this->social_media_talk_model->get(["id" => $id]);
        if (!empty($social_media_talk)) :
            $delete = $this->social_media_talk_model->delete(["id"    => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Sosyal Medya Widget Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Sosyal Medya Widget Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
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
