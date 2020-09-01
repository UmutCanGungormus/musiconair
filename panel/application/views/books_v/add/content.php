<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createBook" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kitap Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Kitap Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Yazar Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yazar Adı" name="writer_name" required>
    </div>
    <div class="form-group">
        <label>Kitap Dili</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Dili" name="language" required>
    </div>
    <div class="form-group">
        <label>Çevirmen</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Çevirmen" name="translator" required>
    </div>
    <div class="form-group">
        <label>Sayfa Sayısı</label>
        <input class="form-control form-control-sm rounded-0" type="text" placeholder="Sayfa Sayısı" name="page_count" required>
    </div>
    <div class="form-group">
        <label>İlk Baskı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlk Baskı" name="first_print" required>
    </div>
    <div class="form-group">
        <label>Kitap Satın Alma Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Satın Alma Linki" name="url" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required></textarea>
    </div>
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
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s")?>" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?=base_url("book/save")?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#bookModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>