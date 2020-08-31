<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "portfolio_v";
        $this->load->model("portfolio_model");
        $this->load->model("portfolio_image_model");
        $this->load->model("portfolio_category_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index()
    {
        $viewData = new stdClass();
        $items = $this->portfolio_model->get_all(
            array(),
            "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function datatable()
    {
        $items = $this->portfolio_model->getRows(
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
                    <a class="dropdown-item updatePortfolioBtn" href="javascript:void(0)" data-url="' . base_url("portfolio/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="portfolioModal" data-url="' . base_url("portfolio/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);
            $img_url=get_portfolio_cover($item->id);
            $img_url = "<img src='" . get_picture($this->viewFolder, $img_url) . "' width='60px' height='60px' >";
            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("portfolio/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title,  $img_url, $checkbox, $proccessing);
        }



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->portfolio_model->rowCount(),
            "recordsFiltered" => $this->portfolio_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->categories = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }
    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Portfolyo Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $getRank = $this->portfolio_model->rowCount();
                $data["content"] = $this->input->post("content");
                $data["isActive"] = 1;
                $data["rank"] = $getRank + 1;
                $insert = $this->portfolio_model->add($data);
                if ($insert) :
                    echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Portfolyo Başarıyla Eklendi."]);
                else :
                    echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Portfolyo Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
                endif;
        endif;
    }
    public function update_form($id)
    {
        $viewData = new stdClass();
        $viewData->categories = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        $item = $this->portfolio_model->get(
            array(
                "id"    => $id,
            )
        );
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
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Portfolyo Güncelleştirilirken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $data["content"] = $this->input->post("content");
            $update = $this->portfolio_model->update(["id" => $id], $data);
            if ($update) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Portfolyo Başarıyla Güncelleştirildi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Portfolyo Güncelleştirilirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    public function delete($id)
    {
        $portfolio = $this->portfolio_model->get(["id" => $id]);
        if (!empty($portfolio)) :
            $delete = $this->portfolio_model->delete(["id"    => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Portfolyo Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Portfolyo Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }
    
    public function rankSetter()
    {
        $rows = $this->input->post("rows");

        foreach ($rows as $row) {
            $this->portfolio_model->update(
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
            if ($this->portfolio_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
    public function imageIsActiveSetter($id)
    {
        if ($id) {
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->portfolio_image_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
    public function isCoverSetter($id, $parent_id)
    {
        if ($id && $parent_id) {
            $isCover = (intval($this->input->post("data")) === 1) ? 1 : 0;
            $this->portfolio_image_model->update(
                array(
                    "id"         => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => $isCover
                )
            );
            $this->portfolio_image_model->update(
                array(
                    "id !="      => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover"  => 0
                )
            );
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";
            $viewData->item_images = $this->portfolio_image_model->get_all(
                array(
                    "portfolio_id"    => $parent_id
                ),
                "rank ASC"
            );
            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;
        }
    }
    public function imageDelete($id, $parent_id)
    {
        $fileName = $this->portfolio_image_model->get(
            array(
                "id"    => $id
            )
        );
        $delete = $this->portfolio_image_model->delete(
            array(
                "id"    => $id
            )
        );
        if ($delete) {
            unlink("uploads/{$this->viewFolder}/$fileName->img_url");
            redirect(base_url("portfolio/image_form/$parent_id"));
        } else {
            redirect(base_url("portfolio/image_form/$parent_id"));
        }
    }
    public function imageRankSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->portfolio_image_model->update(
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
    public function image_form($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item = $this->portfolio_model->get(
            array(
                "id"    => $id
            )
        );
        $viewData->item_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id"    => $id
            ),
            "rank ASC"
        );
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function image_upload($id)
    {
        $image = upload_picture("file", "uploads/$this->viewFolder");
        $getRank = $this->portfolio_image_model->rowCount();
        if ($image["success"]) {
            $this->portfolio_image_model->add(
                array(
                    "img_url"       => $image["file_name"],
                    "rank"          => $getRank+1,
                    "isActive"      => 1,
                    "isCover"       => 0,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "portfolio_id"    => $id
                )
            );
        } else {
            echo "islem basarisiz";
        }
    }
    public function refresh_image_list($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id"    => $id
            )
        );
        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
        echo $render_html;
    }
}
