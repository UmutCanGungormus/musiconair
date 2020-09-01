<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Options extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "options_v";
        $this->load->model("options_model");
        $this->load->model("test_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $items = $this->options_model->get_all(
            array()
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function datatable()
    {
        $items = $this->options_model->getRows(
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
                    <a class="dropdown-item updateOptionBtn" href="javascript:void(0)" data-url="' . base_url("options/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="optionTable" data-url="' . base_url("options/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);

            $item->img_url = "<img src='" . get_picture($this->viewFolder, $item->img_url) . "' width='60px' height='60px' >";
            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("options/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title,  $item->img_url, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt), turkishDate("d F Y, l H:i:s", $item->sharedAt), $proccessing);
        }



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->options_model->rowCount(),
            "recordsFiltered" => $this->options_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $item = $this->test_model->get_all();
        $viewData->categories = $item;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }

    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($_FILES["img_url"]["name"] == "") :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Eklenirken Hata Oluştu. Test Soru Şıkkı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                die();
            endif;
            $image = upload_picture("img_url", "uploads/$this->viewFolder");
            $getRank = $this->options_model->rowCount();
            if ($image["success"]) :
                $data["img_url"] = $image["file_name"];
                $data["isActive"] = 1;
                $data["rank"] = $getRank + 1;
                $insert = $this->options_model->add($data);
                if ($insert) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Test Soru Şıkkı Başarıyla Eklendi."]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Eklenirken Hata Oluştu. Test Soru Şıkkı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }

    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->options_model->get(
            array(
                "id"    => $id,
            )
        );
        $category = $this->test_model->get_all();
        $viewData->categories = $category;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }

    public function update($id)
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Güncelleştirilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if (!empty($_FILES["img_url"]["name"])) :
                $image = upload_picture("img_url", "uploads/$this->viewFolder");
                if ($image["success"]) :
                    $data["img_url"] = $image["file_name"];
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Güncelleştirilirken Hata Oluştu. Test Soru Şıkkı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                    die();
                endif;
            endif;
            $update = $this->options_model->update(["id" => $id], $data);
            if ($update) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Test Soru Şıkkı Başarıyla Güncelleştirildi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Güncelleştirilirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;

        endif;
    }

    public function delete($id)
    {
        $options = $this->options_model->get(["id" => $id]);
        if (!empty($options)) :
            $delete = $this->options_model->delete(["id"    => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Test Soru Şıkkı Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Test Soru Şıkkı Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->options_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
}
