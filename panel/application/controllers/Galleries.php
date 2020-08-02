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
        $this->load->model("video_url_model");
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
                    <a class="dropdown-item updateGalleryBtn" href="javascript:void(0)" data-url="' . base_url("galleries/update_form/$item->id") . '"><i class="fa fa-pen mr-2"></i>Kaydı Düzenle</a>
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="galleryTable" data-url="' . base_url("galleries/delete/$item->id") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    <a class="dropdown-item" href="' . base_url("galleries/upload_form/$item->id") . '"><i class="fa ' . ($item->gallery_type == "image" ? "fa-image" : ($item->gallery_type == "video" ? "fa-video" : "fa-file")) . ' mr-2"></i>' . ($item->gallery_type == "image" ? "Resimler" : ($item->gallery_type == "video" || $item->gallery_type == "video_url" ? "Videolar" : "Dosyalar")) . '</a>
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
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }

    public function save()
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Kaydı Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $getRank = $this->gallery_model->rowCount();
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
            if ($gallery_type != "video_url" && !mkdir($path, 0755, true)) :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Oluşturulurken Hata Oluştu. Klasör Erişim Yetkinizin Olduğundan Emin Olup Tekrar Deneyin."]);
                die();
            endif;
            $insert = $this->gallery_model->add(
                [
                    "title"         => $data["title"],
                    "gallery_type"  => $data["gallery_type"],
                    "url"           => seo($data["title"]),
                    "folder_name"   => $folder_name,
                    "rank"          => $getRank + 1,
                ]
            );
            if ($insert) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Galeri Başarıyla Eklendi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Eklenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }

    public function update_form($id)
    {
        $viewData = new stdClass();
        $item = $this->gallery_model->get(["id" => $id,]);
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/content", $viewData);
    }

    public function update($id, $gallery_type, $oldFolderName = "")
    {
        $data = rClean($this->input->post());
        if (checkEmpty($data)["error"]) :
            $key = checkEmpty($data)["key"];
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Güncellemesi Yapılırken Hata Oluştu. \"{$key}\" Bilgisini Doldurduğunuzdan Emin Olup Tekrar Deneyin."]);
        else :
            $path         = FCPATH . "uploads/$this->viewFolder/";
            $folder_name = "";
            if ($gallery_type == "image") :
                $folder_name = seo($data["title"]);
                $path = "$path/images";
            elseif ($gallery_type == "file") :
                $folder_name = seo($data["title"]);
                $path = "$path/files";
            elseif ($gallery_type == "video") :
                $folder_name = seo($data["title"]);
                $path = "$path/videos";
            endif;
            if ($gallery_type != "video_url" && !rename("$path/$oldFolderName", "$path/$folder_name")) :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Güncellemesi Yapılırken Hata Oluştu. Klasör Erişim Yetkinizin Olduğundan Emin Olup Tekrar Deneyin."]);
                die();
            endif;
            $update = $this->gallery_model->update(["id" => $id], ["title" => $data["title"], "folder_name" => $folder_name, "url" => seo($data["title"]),]);
            if ($update) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Galeri Başarıyla Güncellendi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Güncellenirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
        endif;
    }

    public function delete($id)
    {
        $gallery = $this->gallery_model->get(["id" => $id]);
        if (!empty($gallery)) :
            if ($gallery->gallery_type != "video_url") :
                if ($gallery->gallery_type == "image") :
                    $subViewFolder = "images";
                    $model = "image_model";
                elseif ($gallery->gallery_type == "video") :
                    $subViewFolder = "videos";
                    $model = "video_model";
                else :
                    $subViewFolder = "files";
                    $model = "file_model";
                endif;
                $path = FCPATH . "uploads/$this->viewFolder/$subViewFolder/$gallery->folder_name";
                rrmdir($path);
            else :
                $model = "video_url_model";
            endif;
            $this->$model->delete(["gallery_id" => $id]);
            $delete = $this->gallery_model->delete(["id" => $id]);
            if ($delete) :
                echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Galeri Başarıyla Silindi."]);
            else :
                echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
            endif;
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

    public function detailDatatable($gallery_type, $folder_name=null)
    {
        $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : ($gallery_type == "video" ? "video_model" : "video_url_model")));
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
                    <a class="dropdown-item remove-btn" href="javascript:void(0)" data-table="detailTable" data-url="' . base_url("galleries/fileDelete/{$item->id}/{$item->gallery_id}/{$gallery_type}") . '"><i class="fa fa-trash mr-2"></i>Kaydı Sil</a>
                    </div>
            </div>';



            //array_push($renkler,$renk->negotiation_stage_color);

            $checkbox = '<div class="custom-control custom-switch"><input data-id="' . $item->id . '" data-url="' . base_url("galleries/fileIsActiveSetter/{$item->id}/{$gallery_type}") . '" data-status="' . ($item->isActive == 1 ? "checked" : null) . '" id="customSwitch' . $i . '" type="checkbox" ' . ($item->isActive == 1 ? "checked" : null) . ' class="my-check custom-control-input" >  <label class="custom-control-label" for="customSwitch' . $i . '"></label></div>';
            if ($gallery_type == "image") :
                $image = '<img src="' . base_url("uploads/galleries_v/{$folderName}/{$folder_name}/252x156/{$item->url}") . '" width="75">';
            elseif ($gallery_type == "file") :
                $image = '<a href="'.base_url("uploads/galleries_v/{$folderName}/{$folder_name}/{$item->url}").'" download><i class="fa fa-download fa-2x"></i></a>';
            elseif ($gallery_type == "video" || $gallery_type == "video_url") :
                $image = '<video id="my-video' . $i . '" class="video-js" controls preload="auto" width="300" height="150" data-setup="' . ($gallery_type == "video_url" ? '{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "' . $item->url . '"}] }' : '{}') . '">';
                if ($gallery_type == "video") :
                    $image .= '<source src="' . base_url("uploads/galleries_v/{$folderName}/{$folder_name}/{$item->url}") . '"/>';
                endif;
                $image .= '<p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>';
            endif;
            $data[] = array($item->rank, '<i class="fa fa-arrows" data-id="' . $item->id . '"></i>', $item->id, $image, $item->url, $checkbox, turkishDate("d F Y, l H:i:s", $item->createdAt), turkishDate("d F Y, l H:i:s", $item->updatedAt), $proccessing);

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
        $item = $this->gallery_model->get(["id" => $id]);
        $viewData->item = $item;
        if ($item->gallery_type == "image") :
            $viewData->items = $this->image_model->get_all(["gallery_id" => $id], "rank ASC");
            $viewData->folder_name = $item->folder_name;
        elseif ($item->gallery_type == "file") :
            $viewData->items = $this->file_model->get_all(["gallery_id" => $id], "rank ASC");
            $viewData->folder_name = $item->folder_name;
        elseif ($item->gallery_type == "video") :
            $viewData->items = $this->video_model->get_all(["gallery_id" => $id], "rank ASC");
            $viewData->folder_name = $item->folder_name;
        else :
            $viewData->items = $this->video_url_model->get_all(["gallery_id" => $id], "rank ASC");
        endif;
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

        $modelName = ($gallery_type == "image" ? "image_model" : ($gallery_type == "file" ? "file_model" : ($gallery_type == "video" ? "video_model" : "video_url_model")));
        $gallery = $this->gallery_model->get(["id" => $parent_id]);
        $fileName = $this->$modelName->get(["id" => $id]);
        $delete = $this->$modelName->delete(["id" => $id]);
        if ($delete) :
            if ($gallery_type == "image") :
                $url = FCPATH . "uploads/galleries_v/images/{$gallery->url}/252x156/{$fileName->url}";
                $url2 = FCPATH . "uploads/galleries_v/images/{$gallery->url}/350x216/{$fileName->url}";
                $url3 = FCPATH . "uploads/galleries_v/images/{$gallery->url}/851x606/{$fileName->url}";
                if (!is_dir($url) && file_exists($url)) :
                    unlink($url);
                endif;
                if (!is_dir($url2) && file_exists($url2)) :
                    unlink($url2);
                endif;
                if (!is_dir($url3) && file_exists($url3)) :
                    unlink($url3);
                endif;
            elseif ($gallery_type == "video") :
                $url = FCPATH . "uploads/galleries_v/videos/{$gallery->url}/{$fileName->url}";
                $url2 = FCPATH . "uploads/galleries_v/videos/{$gallery->url}/{$fileName->img_url}";
                if (!is_dir($url) && file_exists($url)) :
                    unlink($url);
                endif;
                if (!is_dir($url2) && file_exists($url2)) :
                    unlink($url2);
                endif;
            else :
                $url = FCPATH . "uploads/galleries_v/files/{$gallery->url}/{$fileName->url}";
                if (!is_dir($url) && file_exists($url)) :
                    unlink($url);
                endif;
            endif;
            echo json_encode(["success" => true, "title" => "Başarılı!", "message" => "Galeri İçeriği Başarıyla Silindi."]);
        else :
            echo json_encode(["success" => false, "title" => "Başarısız!", "message" => "Galeri İçeriği Silinirken Hata Oluştu, Lütfen Tekrar Deneyin."]);
        endif;
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
}
