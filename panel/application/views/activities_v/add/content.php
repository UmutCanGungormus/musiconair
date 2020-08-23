<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="createActivity" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Etkinlik Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Etkinlik Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="datetimepicker1">Etkinlik Tarihi</label>
        <input type="text" placeholder="Etkinlik Tarihi Seçin..." name="event_date" class="form-control form-control-sm datetimepicker" required/>
    </div>
    <div class="form-group">
        <label>Etkinlik Mekan</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Mekan Adı" name="place" required>
    </div>
    <div class="form-group">
        <label>Etkinlik Şehri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Şehri" name="city" required>
    </div>
    
    <div class="form-group">
        <label>Etkinlik Bilet Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Bilet Linki" name="url" required>
    </div>
    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="info" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}" required></textarea>
    </div>
    <div class="form-group">
        <label>Bilet Fiyatları</label>
        <textarea name="pricing" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}" required></textarea>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}" required></textarea>
    </div>
    <!-- END column -->
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="input-group-prepend">
            <span class="input-group-text">Görsel Seçiniz</span>
        </div>
        <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
        <span class="input-group-append">
            <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                <input type="hidden"><input type="file" name="img_url" required>
            </span>
            <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
        </span>
    </div>
    <button role="button" data-url="<?= base_url("activities/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#activityModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>