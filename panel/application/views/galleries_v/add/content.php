<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createGallery" onsubmit="return false" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input type="text" class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title" required>
    </div>
    <div class="form-group">
        <label for="control-demo-6" class="">Galeri Türü</label>
        <div id="control-demo-6" class="">
            <select class="form-control form-control-sm rounded-0" name="gallery_type" required>
                <option <?= (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                <option <?= (isset($gallery_type) && $gallery_type == "file") ? "selected" : ""; ?> value="file">Dosya</option>
                <option <?= (isset($gallery_type) && $gallery_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                <option <?= (isset($gallery_type) && $gallery_type == "video_url") ? "selected" : ""; ?> value="video_url">Video URL</option>
            </select>
        </div>
    </div>
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="input-group-prepend">
            <span class="input-group-text">Galeri Kapak Görseli</span>
        </div>
        <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
        <span class="input-group-append">
            <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                <input type="hidden"><input type="file" name="img_url" required>
            </span>
            <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
        </span>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s")?>" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <!-- .form-group -->
    <button data-url="<?= base_url("galleries/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#galleryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>