<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galleries extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "galleries_v";
        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
        if (!get_active_user()) :
            redirect(base_url("login"));
        endif;
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function datatable()
    {
        $items = $this->gallery_model->getRows(
            [],
            $_POST
        );
        $data = $row = array();
        $i = (!empty($_POST['start']) ? $_POST['start'] : 0);

        foreach ($items as $item) :
            $i++;
            $j = $i + 1;

            $proccessing = '
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary rounded-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    İşlemler
                </button>
                <div class="dropdown-menu rounded-0 dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="' . base_url("galleries/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-url="' . base_url("galleries/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    <a class="dropdown-item" href="' . base_url("galleries/upload_form/$item->id") . '"><i class="fa ' . ($item->gallery_type == "image" ? "fa-image" : ($item->gallery_type == "video" ? "fa-video" : "fa-file")) . ' mr-2"></i>' . ($item->gallery_type == "image" ? "Resimler" : ($item->gallery_type == "video" ? "Videolar" : "Dosyalar")) . '</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);

            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("galleries/isActiveSetter/{$item->id}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';

            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $item->title, $item->gallery_type, $item->folder_name, $item->url, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt), $proccessing);
        endforeach;



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->gallery_model->rowCount(),
            "recordsFiltered" => $this->gallery_model->countFiltered([], (!empty($_POST) ? $_POST : [])),
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
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        $getRank = $this->gallery_model->rowCount();
        if ($validate) :
            $gallery_type = $this->input->post("gallery_type");
            $path         = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/images/$folder_name";
            elseif ($gallery_type == "file") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/files/$folder_name";
            elseif ($gallery_type == "video") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/videos/$folder_name";
            endif;
            if ($gallery_type != "video_url") :
                if (!mkdir($path, 0755, true)) :
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Galeri Üretilirken problem oluştu. (Yetki Hatası)",
                        "type"  => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                endif;
            endif;
            $insert = $this->gallery_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"  => $this->input->post("gallery_type"),
                    "url"           => seo($this->input->post("title")),
                    "folder_name"   => $folder_name,
                    "rank"          => $getRank + 1,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if ($insert) :
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            else :
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            endif;
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        else :
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        endif;
    }

    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->gallery_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id, $gallery_type, $oldFolderName = "")
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) :
            $path         = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/images";
            elseif ($gallery_type == "file") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/files";
            elseif ($gallery_type == "video") :
                $folder_name = seo($this->input->post("title"));
                $path = "$path/videos";
            endif;
            if ($gallery_type != "video_url") :
                if (!rename("$path/$oldFolderName", "$path/$folder_name")) :
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text"  => "Galeri Üretilirken problem oluştu. (Yetki Hatası)",
                        "type"  => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                endif;
            endif;
            $update = $this->gallery_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => seo($this->input->post("title")),
                )
            );
            if ($update) :
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            else :
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            endif;
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        else :
            $viewData = new stdClass();
            $item = $this->gallery_model->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        endif;
    }

    public function delete($id)
    {
        $gallery = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        if (!empty($gallery)) :
            if ($gallery->gallery_type != "video_url") :
                if ($gallery->gallery_type == "image") :
                    $subViewFolder = "images";
                elseif ($gallery->gallery_type == "video") :
                    $subViewFolder = "videos";
                else :
                    $subViewFolder = "files";
                endif;
                $path = FCPATH . "uploads/$this->viewFolder/$subViewFolder/$gallery->folder_name";
               
                rrmdir($path);
            endif;
            $model = "image_model";
            if ($gallery->gallery_type == "image") :
                $model = "image_model";
            elseif ($gallery->gallery_type == "video") :
                $model = "video_model";
            else :
                $model = "file_model";
            endif;
            $this->$model->delete(["gallery_id" => $id]);
            $delete = $this->gallery_model->delete(
                array(
                    "id"    => $id
                )
            );
            if ($delete) :
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde silindi",
                    "type"  => "success"
                );
            else :
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt silme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            endif;
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        endif;
    }

    public function isActiveSetter($id)
    {
        if (!empty($id)) :
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->gallery_model->update(["id" => $id], ["isActive" => $isActive])) :
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            else :
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            endif;
        endif;
    }

    public function rankSetter()
    {
        $rows = $this->input->post("rows");

        foreach ($rows as $row) {
            $this->gallery_model->update(
                array(
                    "id" => $row["id"]
                ),
                array("rank" => $row["position"])
            );
        }
    }

    public function detailDatatable($gallery_type, $folder_name)
    {
        $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : "video_model"));
        $folderName = ($gallery_type == "image" ? "images" : ($gallery_type == "file" ? "files" : "videos"));
        $items = $this->$modelName->getRows(
            [],
            $_POST
        );
        $data = $row = array();
        $i = (!empty($_POST['start']) ? $_POST['start'] : 0);

        foreach ($items as $item) :
            $i++;
            $j = $i + 1;

            $proccessing = '
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary rounded-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    İşlemler
                </button>
                <div class="dropdown-menu rounded-0 dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    ';
            if ($gallery_type == "image") :
                $proccessing .= '<a href="' . base_url("galleries/fileUpdate/{$item->id}") . '" class="dropdown-item"><i class="fa fa-pen"></i> Resim Açıklaması Ekle</a>';
            endif;
            $proccessing .= '
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-url="' . base_url("galleries/fileDelete/{$item->id}/{$item->gallery_id}/{$gallery_type}") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);

            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("galleries/fileIsActiveSetter/{$item->id}/{$gallery_type}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            if ($folderName == "images") :
                $image = '<img src="' . base_url("uploads/galleries_v/{$folderName}/{$folder_name}/252x156/{$item->url}") . '" width="75">';
                $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $image, $item->url, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt), $proccessing);
            endif;
        endforeach;



        $output = array(
            "draw" => (!empty($_POST['draw']) ? $_POST['draw'] : 0),
            "recordsTotal" => $this->$modelName->rowCount(),
            "recordsFiltered" => $this->$modelName->countFiltered([], (!empty($_POST) ? $_POST : [])),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function upload_form($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $item = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        $viewData->item = $item;
        if ($item->gallery_type == "image") {
            $viewData->items = $this->image_model->get_all(
                array(
                    "gallery_id"    => $id
                ),
                "rank ASC"
            );
            $viewData->folder_name = $item->folder_name;
        } else if ($item->gallery_type == "file") {
            $viewData->items = $this->file_model->get_all(
                array(
                    "gallery_id"    => $id
                ),
                "rank ASC"
            );
        } else {
            $viewData->items = $this->video_model->get_all(
                array(
                    "gallery_id"    => $id
                ),
                "rank ASC"
            );
        }
        $viewData->gallery_type = $item->gallery_type;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function fileUpdate($id)
    {
        $viewData = new stdClass();
        $viewData->category = $this->uri->segment(4);
        $viewData->gallery = $this->gallery_model->get(['id' => $viewData->category]);

        $item = $this->image_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "file_update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function file_update($id)
    {
        $this->load->library("form_validation");
        $category = $this->uri->segment(4);

        $update = $this->image_model->update(
            array(
                "id"    => $id
            ),
            array(
                "description"         => $this->input->post("description")

            )
        );
        redirect(base_url("galleries/upload_form/$category"));
    }

    public function file_upload($gallery_id, $gallery_type, $folderName)
    {
        $file_name = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if ($gallery_type == "image") :
            $image_252x156 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/", 252, 156, $file_name);
            $image_350x216 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/", 350, 216, $file_name);
            $image_851x606 = upload_picture($_FILES["file"]["tmp_name"], "uploads/$this->viewFolder/images/$folderName/", 851, 606, $file_name);
            if ($image_252x156 && $image_350x216 && $image_851x606) :
                $getRank = $this->image_model->rowCount();
                $this->image_model->add(
                    array(
                        "url"           => $file_name,
                        "rank"          => $getRank + 1,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            else :
                echo "islem basarisiz";
            endif;
        elseif ($gallery_type == "video") :
            $config["allowed_types"] = "mpeg|mpg|mpe|qt|mov|avi|movie|3g2|3gp|mp4|f4v|flv|webm|wmv|ogg";
            $config["upload_path"]   = "uploads/$this->viewFolder/videos/$folderName/";
            $config["file_name"]     = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("file");
            if ($upload) :
                $uploaded_file = $this->upload->data("file_name");
                $getRank = $this->video_model->rowCount();
                $this->video_model->add(
                    array(
                        "url"           => $uploaded_file,
                        "rank"          => $getRank + 1,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            else :
                echo $this->upload->display_errors();
            endif;
        else :
            $config["allowed_types"] = "*";
            $config["upload_path"]   = "uploads/$this->viewFolder/files/$folderName/";
            $config["file_name"]     = $file_name;
            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("file");
            if ($upload) :
                $uploaded_file = $this->upload->data("file_name");
                $getRank = $this->file_model->rowCount();
                $this->file_model->add(
                    array(
                        "url"           => $uploaded_file,
                        "rank"          => $getRank + 1,
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s"),
                        "gallery_id"    => $gallery_id
                    )
                );
            else :
                echo $this->upload->display_errors();
            endif;
        endif;
    }

    public function fileDelete($id, $parent_id, $gallery_type)
    {

        $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : "video_model"));
        $gallery = $this->gallery_model->get(["id" => $parent_id]);
        $fileName = $this->$modelName->get(
            array(
                "id"    => $id
            )
        );
        $delete = $this->$modelName->delete(
            array(
                "id"    => $id
            )
        );
        if ($delete) {
            if ($gallery_type == "image") :
                $url = FCPATH . "uploads/galleries_v/images/{$gallery->url}/252x156/{$fileName->url}";
                $url2 = FCPATH . "uploads/galleries_v/images/{$gallery->url}/350x216/{$fileName->url}";
                $url3 = FCPATH . "uploads/galleries_v/images/{$gallery->url}/851x606/{$fileName->url}";
                if (file_exists($url)) :
                    unlink($url);
                endif;
                if (file_exists($url2)) :
                    unlink($url2);
                endif;
                if (file_exists($url3)) :
                    unlink($url3);
                endif;
            elseif ($gallery_type == "video") :
                $url = FCPATH . "uploads/galleries_v/videos/{$fileName->video_url}";
                $url2 = FCPATH . "uploads/galleries_v/videos/{$fileName->img_url}";
                if (file_exists($url)) :
                    unlink($url);
                endif;
                if (file_exists($url2)) :
                    unlink($url2);
                endif;
            else :
                $url = FCPATH . "uploads/galleries_v/files/{$fileName->url}";
                if (file_exists($url)) :
                    unlink($url);
                endif;
            endif;
            redirect(base_url("galleries/upload_form/$parent_id"));
        } else {
            redirect(base_url("galleries/upload_form/$parent_id"));
        }
    }

    public function fileIsActiveSetter($id, $gallery_type)
    {
        if ($id && $gallery_type) {
            $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : "video_model"));
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->$modelName->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }

    public function fileRankSetter($gallery_type)
    {
        $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : "video_model"));
        $rows = $this->input->post("rows");

        foreach ($rows as $row) {
            $this->$modelName->update(
                array(
                    "id" => $row["id"]
                ),
                array("rank" => $row["position"])
            );
        }
    }

    public function gallery_video_list($id)
    {
        $viewData = new stdClass();
        $gallery = $this->gallery_model->get(
            array(
                "id"    => $id
            )
        );
        $items = $this->video_model->get_all(
            array(
                "gallery_id"    => $id
            ),
            "rank ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/list";
        $viewData->items = $items;
        $viewData->gallery = $gallery;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_gallery_video_form($id)
    {
        $viewData = new stdClass();
        $viewData->gallery_id = $id;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function gallery_video_save($id)
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("url", "Video URL", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) {
            $getRank = $this->video_model->rowCount();
            $insert = $this->video_model->add(
                array(
                    "url"           => $this->input->post("url"),
                    "gallery_id"    => $id,
                    "rank"          => $getRank + 1,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
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
            redirect(base_url("galleries/gallery_video_list/$id"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/add";
            $viewData->form_error = true;
            $viewData->gallery_id = $id;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_gallery_video_form($id)
    {
        $viewData = new stdClass();
        $item = $this->video_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "video/update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function gallery_video_update($id, $gallery_id)
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("url", "Video URL", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if ($validate) {
            $update = $this->video_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "url"   => $this->input->post("url"),
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
                    "text" => "Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries/gallery_video_list/$gallery_id"));
        } else {
            $viewData = new stdClass();
            $item = $this->video_model->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "video/update";
            $viewData->form_error = true;
            $viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function rankGalleryVideoSetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id) {
            $this->video_model->update(
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
    public function galleryVideoIsActiveSetter($id)
    {
        if ($id) {
            $isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            if ($this->video_model->update(["id" => $id], ["isActive" => $isActive])) {
                echo json_encode(["success" => True, "title" => "İşlem Başarıyla Gerçekleşti", "msg" => "Güncelleme İşlemi Yapıldı"]);
            } else {
                echo json_encode(["success" => False, "title" => "İşlem Başarısız Oldu", "msg" => "Güncelleme İşlemi Yapılamadı"]);
            }
        }
    }
    public function galleryVideoDelete($id, $gallery_id)
    {
        $delete = $this->video_model->delete(
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
                "title" => "İşlem Başarısız",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("galleries/gallery_video_list/$gallery_id"));
    }
}
/*<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galleries extends CI_Controller {
	public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "galleries_v";
        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
    }
	public function index(){
		$viewData = new stdClass();
		$items = $this->gallery_model->get_all(
			array(),"rank ASC"
		);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function save(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $gallery_type = $this->input->post("gallery_type");
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") {
                $folder_name = seo($this->input->post("title"));
                $path = "$path/images/$folder_name";
            }else if($gallery_type == "file"){
                $folder_name = seo($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }
            if ($gallery_type != "video") {
                if (!mkdir($path,0755,true)) {
                    $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Galeri ekleme sırasında bir problem oluştu! (Yetki Hatası)!",
                    "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $getRank = $this->gallery_model->rowCount();
            $insert = $this->gallery_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"   => $this->input->post("gallery_type"),
                    "url"           => seo($this->input->post("title")),
                    "folder_name" => $folder_name,
                    "rank"          => $getRank+1,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
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
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
    	$viewData = new stdClass();
    	$item = $this->gallery_model->get(
    		array(
    			"id"=>$id
    		)
    	);
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update($id,$gallery_type,$oldFolderName = ""){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Galeri Adı", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        $validate = $this->form_validation->run();
        if($validate){
            $path = "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") {
                $folder_name = seo($this->input->post("title"));
                $path = "$path/images";
            }else if($gallery_type == "file"){
                $folder_name = seo($this->input->post("title"));
                $path = "$path/files";
            }
            if ($gallery_type != "video") {
                if (!rename("$path/$oldFolderName","$path/$folder_name")) {
                    $alert = array(
                    "title" => "İşlem Başarısız Oldu!",
                    "text" => "Galeri ekleme sırasında bir problem oluştu! (Yetki Hatası)!",
                    "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $update = $this->gallery_model->update(
            	array(
            		"id" => $id
            	),
                array(
                    "title"         => $this->input->post("title"),
                    "folder_name"   => $folder_name,
                    "url"           => seo($this->input->post("title"))
                )
            );
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt başarılı bir şekilde güncellendi.",
                    "type" => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt güncelleme sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        } else {
        	$item = $this->gallery_model->get(
    			array(
    				"id"=>$id
    			)
    		);
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
    		$viewData->item = $item;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        $gallery = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );
        if ($gallery) {
            if ($gallery->gallery_type != "video") {
                if ($gallery->gallery_type == "image") {
                    $path = "uploads/$this->viewFolder/images/$gallery->folder_name";
                }else if($gallery->gallery_type == "file"){
                    $path = "uploads/$this->viewFolder/files/$gallery->folder_name";
                }
                $delete_folder = rmdir($path);
                if (!$delete_folder) {
                    $alert = array(
                        "title" => "İşlem Başarısız Oldu.",
                        "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert",$alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }
            $delete = $this->gallery_model->delete(
                array(
                    "id" => $id
                )
            );
            if ($delete) {
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "Kayıt silme işlemi başarılı bir şekilde silindi.",
                    "type" => "success"
                );
            }else{
                $alert = array(
                    "title" => "İşlem Başarısız Oldu.",
                    "text" => "Kayıt silme işlemi sırasında bir problem oluştu!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("galleries"));
        }        
    }
    public function imageDelete($id,$parent_id){
        $delete = $this->galleries_image_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete) {
            $rsil = getFileName($id);
            unlink("uploads/{$this->viewFolder}/$rsil");
            redirect(base_url("galleries/image_form/$parent_id"));
        }else{
            redirect(base_url("galleries/image_form/$parent_id"));
        }
    }
    public function isActiveSetter($id){
    	if ($id) {
    		$isActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
    		$this->gallery_model->update(
    			array(
    				"id" => $id
    			),
    			array(
    				"isActive" => $isActive
    			)
    		);
    	}
    }
    public function imageIsActiveSetter($id){
        if ($id) {
            $imageIsActive = (intval($this->input->post("data")) === 1) ? 1 : 0;
            $this->galleries_image_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $imageIsActive
                )
            );
        }
    }
    public function rankSetter(){
    	$data = $this->input->post("data");
    	parse_str($data,$order);
    	$items = $order["ord"];
    	foreach ($items as $rank => $id) {
    		$this->gallery_model->update(
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
    public function fileRankSetter($gallery_type){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
        foreach ($items as $rank => $id) {
            $this->modelName->update(
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
    public function file_upload($gallery_id, $gallery_type, $folderName){
        $file_name = seo(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png|pdf|doc|docx";
        $config["upload_path"]   = ($gallery_type == "image") ? "uploads/$this->viewFolder/images/$folderName/" : "uploads/$this->viewFolder/files/$folderName/";
        $config["file_name"]     = $file_name;
        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");
        if($upload){
            $uploaded_file = $this->upload->data("file_name");
            $modelName = ($gallery_type == "image") ? "image_model" : "file_model";
            $getRank = $this->$modelName->rowCount();
            $this->$modelName->add(
                array(
                    "url"           => "{$config["upload_path"]}$uploaded_file",
                    "rank"          => $getRank+1,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s"),
                    "gallery_id"    => $gallery_id
                )
            );
        } else {
            echo "islem basarisiz";
        }
    }
    
}*/