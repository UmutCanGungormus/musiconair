<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="updateActivity" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Referans Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Referans Adı" name="title" value="<?= $item->title; ?>" required>
    </div>

    <div class="form-group">
        <label>Etkinlik Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($category->id == $item->category_id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="datetimepicker1">Etkinlik Tarihi</label>
        <input type="text" name="event_date" class="form-control form-control-sm datetimepicker" value="<?= $item->event_date; ?>" id="datetimepicker1" placeholder="Etkinlik Tarihi" required/>
    </div>
    <div class="form-group">
        <label>Etkinlik Mekan</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Mekan Adı" value="<?= $item->place; ?>" name="place" required>
    </div>
    <div class="form-group">
        <label>Etkinlik Şehri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Şehri" value="<?= $item->city; ?>" name="city" required>
    </div>
    <div class="form-group">
        <label>Etkinlik Bilet Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Bilet Linki" value="<?= $item->url; ?>" name="url" required>
    </div>
    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="info" class="m-0 tinymce" required><?= $item->info; ?></textarea>
    </div>
    <div class="form-group">
        <label>Bilet Fiyatları</label>
        <textarea name="pricing" class="m-0 tinymce" required><?= $item->pricing; ?></textarea>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content; ?></textarea>
    </div>

    <div class="row">
        <!-- END column -->
        <div class="col-3 image_upload_container">
            <img src="<?= get_picture($viewFolder, $item->img_url); ?>" class="img-fluid">
        </div>
        <div class="col-9">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Görsel Seçiniz</span>
                </div>
                <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                        <input type="hidden"><input type="file" name="img_url">
                    </span>
                    <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
    <button role="button" data-url="<?= base_url("activities/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#activityModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>