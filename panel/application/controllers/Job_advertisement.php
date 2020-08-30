<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_advertisement extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "job_advertisements_v";
        $this->load->model("job_advertisement_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index()
    {
        $viewData = new stdClass();

        $items = $this->job_advertisement_model->get_all(
            [],
            "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function datatable()
    {
        $items = $this->job_advertisement_model->getRows(
            [],
            $_POST
        );
        $data = $row = array();
        $i = (!empty($_POST['start']) ? $_POST['start'] : 0);

        foreach ($items as $item) {
            $i++;
            $j = $i + 1;

            $proccessing = '
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary rounded-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    İşlemler
                </button>
                <div class="dropdown-menu rounded-0 dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item updateJobAdvertisementBtn" href="javascript:void(0)" data-url="' . base_url("job_advertisement/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="jobAdvertisementTable" data-url="' . base_url("job_advertisement/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);
            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("job_advertisement/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            $image = '<img src="' . get_picture($this->viewFolder, $item->img_url) . '" class="img-fluid" width="75">';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title, $image, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt),  $proccessing);
        }



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->job_advertisement_model->rowCount(),
            "recordsFiltered" => $this->job_advertisement_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }
    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;

        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($_FILES["img_url"]["name"] == "") :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Eklenirken Hata Oluştu. İş İlanı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                die();
            endif;
            $image = upload_picture("img_url", "uploads/$this->viewFolder");
            $getRank = $this->job_advertisement_model->rowCount();
            if ($image["success"]) :
                $data["img_url"] = $image["file_name"];
                $data["isActive"] = 1;
                $data["rank"] = $getRank + 1;
                $data["seo_url"] = seo($data["title"]);
                $data["content"] = $this->input->post("content");
                $insert = $this->job_advertisement_model->add($data);
                if ($insert) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "İş İlanı Başarıyla Eklendi."]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
                endif;
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Eklenirken Hata Oluştu. İş İlanı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->job_advertisement_model->get(
            array(
                "id" => $id
            )
        );
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
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Güncelleştirilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            if ($_FILES["img_url"]["name"] !== "") :
                $image = upload_picture("img_url", "uploads/$this->viewFolder");
                if ($image["success"]) :
                    $data["img_url"] = $image["file_name"];
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Güncelleştirilirken Hata Oluştu. İş İlanı Görseli Seçtiğinizden Emin Olup, Lütfen Tekrar Deneyin."]);
                    die();
                endif;
            endif;
            $data["seo_url"] = seo($data["title"]);
            $data["content"] = $this->input->post("content");
            $update = $this->job_advertisement_model->update(["id" => $id], $data);
            if ($update) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "İş İlanı Başarıyla Güncelleştirildi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Güncelleştirilirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;

        endif;
    }

    public function delete($id)
    {
        $job_advertisement = $this->job_advertisement_model->get(["id" => $id]);
        if (!empty($job_advertisement)) :
            $delete = $this->job_advertisement_model->delete(["id"    => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "İş İlanı Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "İş İlanı Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->job_advertisement_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
    public function rankSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->job_advertisement_model->update(
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
