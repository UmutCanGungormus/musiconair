<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "news_v";
        $this->load->model("news_model");
        $this->load->model("news_category_model");
        $this->load->model("user_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index()
    {
        $viewData = new stdClass();
        $items = $this->news_model->get_all(
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
        $items = $this->news_model->getRows(
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
                    <a class="dropdown-item updateNewsBtn" href="javascript:void(0)" data-url="' . base_url("news/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="newsTable" data-url="' . base_url("news/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);

            $item->img_url = "<img src='" . get_picture($this->viewFolder, $item->img_url) . "' width='60px' height='60px' >";
            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("news/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title,  $item->img_url, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt), turkishDate("d F Y, l H:i:s", $item->sharedAt), $proccessing);
        }



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->news_model->rowCount(),
            "recordsFiltered" => $this->news_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }


    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->categories = $this->news_category_model->get_all();
        $viewData->writers = $this->user_model->get_all(["role_id!=" => 2]);
        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"] && checkEmpty($data)["key"] !== "video_url") :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($_FILES["img_url"]["name"] == "") :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Eklenirken Hata Oluştu. Haber Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                die();
            endif;
            $image = upload_picture("img_url", "uploads/$this->viewFolder");
            $getRank = $this->news_model->rowCount();
            if ($image["success"]) :
                $data["img_url"] = $image["file_name"];
                $data["isActive"] = 1;
                $data["rank"] = $getRank + 1;
                $data["seo_url"] = seo($data["title"]);
                $data["content"] = $this->input->post("content");
                $data["tags"] = implode(",", $data["tags"]);
                $data["reaction"] = json_encode([
                    'cok_iyi' => 0,
                    'helal_olsun' => 0,
                    'kizgin' => 0,
                    'uzucu' => 0,
                    'yerim' => 0,
                    'yok_artik' => 0,
                    'hos_degil' => 0
                ]);
                $insert = $this->news_model->add($data);
                if ($insert) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Haber Başarıyla Eklendi."]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Eklenirken Hata Oluştu. Haber Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->news_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->categories = $this->news_category_model->get_all();
        $viewData->writers = $this->user_model->get_all(["role_id!=" => 2]);
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function update($id)
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"] && checkEmpty($data)["key"] !== "video_url") :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Güncelleştirilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if (!empty($_FILES["img_url"]["name"])) :
                $image = upload_picture("img_url", "uploads/$this->viewFolder");
                if ($image["success"]) :
                    $data["img_url"] = $image["file_name"];
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Güncelleştirilirken Hata Oluştu. Haber Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                    die();
                endif;
            endif;
            $data["seo_url"] = seo($data["title"]);
            $data["content"] = $this->input->post("content");
            $data["tags"] = implode(",", $data["tags"]);
            $update = $this->news_model->update(["id" => $id], $data);
            if ($update) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Haber Başarıyla Güncelleştirildi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Güncelleştirilirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;

        endif;
    }
    public function delete($id)
    {
        $news = $this->news_model->get(["id" => $id]);
        if (!empty($news)) :
            $delete = $this->news_model->delete(["id"    => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Haber Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Haber Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
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
            if ($this->news_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
}
