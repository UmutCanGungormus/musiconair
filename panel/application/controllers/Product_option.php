<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_option extends MY_Controller
{
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "product_option_v";
        $this->load->model("product_option_model");
        $this->load->model("product_option_category_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index()
    {
        $viewData = new stdClass();
        $items = $this->product_option_model->get_all(
            array()
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function umut()
    {
        $this->load->model("product_options_model");

        $id = $this->input->post("product_id");
        $c = $this->product_options_model->get(["product_id" => $id]);
        $option_id = json_encode($this->input->post("options"));
        $category_id = json_encode($this->input->post("options_category"));
        $count = json_encode($this->input->post("photosCounter"));
        $stock = json_encode($this->input->post("stocks"));
        $price = json_encode($this->input->post("prices"));


        if (!empty($_FILES)) :
            foreach ($_FILES as $key) {
                foreach ($key["name"] as $k => $v) {
                    $file_name[$k] = seo(pathinfo($v, PATHINFO_FILENAME)) . "." . pathinfo($v, PATHINFO_EXTENSION);
                }
                foreach ($key["tmp_name"] as $k => $v) {
                    $image_348x215 = upload_picture($v, "uploads/$this->viewFolder", 348, 215, $file_name[$k]);
                }
            }
            $file_name = json_encode($file_name);
        else :
            $file_name = null;
        endif;
        $data = ["product_id" => $id, "img_count" => $count, "option_id" => $option_id, "category_id" => $category_id, "stock" => $stock, "price" => $price, "img_url" => $file_name];
        if ($this->product_options_model->add($data)) {
            $this->product_options_model->delete(["id" => $c->id]);
            echo true;
        } else {
            echo false;
        }
    }
    public function datatable()
    {
        $items = $this->product_option_model->getRows(
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
                    <a class="dropdown-item" href="' . base_url("product_option/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-url="' . base_url("product_option/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);


            $item->category_id = get_product_option_title($item->category_id);



            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("product_option/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title, $item->category_id, $checkbox, $proccessing);
        }



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->product_option_model->rowCount(),
            "recordsFiltered" => $this->product_option_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }
    public function productAddOrUpdateForm($id)
    {
        $viewData = new stdClass();
        $viewData->option_categories = $this->product_option_category_model->get_all();
        $viewData->options = $this->product_option_model->get_all();
        $this->load->model("product_model");
        $this->load->model("product_options_model");
        $viewData->product = $this->product_model->get(["id" => $id]);
        $viewData->subViewFolder = "option";
        $viewData->viewFolder = "product_v";
        $viewData->option = $this->product_options_model->get([
            "product_id" => $viewData->product->id,
        ]);
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form()
    {
        $viewData = new stdClass();
        $item = $this->product_option_category_model->get_all();
        $viewData->categories = $item;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("category_id", "Option ID", "required|trim");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) {

            $insert = $this->product_option_model->add(
                array(
                    "title"                 => $this->input->post("title"),
                    "category_id"         => $this->input->post("category_id"),

                    "isActive"      => 1

                )
            );
            if ($insert) {
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
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("product_option"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->product_option_model->get(
            array(
                "id"    => $id,
            )
        );
        $category = $this->product_option_category_model->get_all();
        $viewData->categories = $category;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id)
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("category_id", "Haber ID", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        $seo_url = seo($this->input->post("title"));
        if ($validate) {
            $update = $this->product_option_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title"                 => $this->input->post("title"),
                    "category_id"         => $this->input->post("category_id")
                )
            );
            if ($update) {
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
            redirect(base_url("product_option"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->product_option_model->get(
                array(
                    "id"    => $id,
                )
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id)
    {
        $delete = $this->product_option_model->delete(
            array(
                "id"    => $id
            )
        );
        if ($delete) {
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
        redirect(base_url("product_option"));
    }
    public function rankSetter()
    {
        $rows = $this->input->post("rows");

        foreach ($rows as $row) {
            $this->product_option_model->update(
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
            if ($this->product_option_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
}
