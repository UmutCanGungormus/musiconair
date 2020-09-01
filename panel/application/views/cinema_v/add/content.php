<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createCinema" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Film Kategori</label>
        <select name="category_id[]" class="form-control form-control-sm rounded-0 tagsInput" multiple="multiple" size="4" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Orjinal Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Orjinal Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Film Dili</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Film Dili" name="language" required>
    </div>
    <div class="form-group">
        <label>Yönetmen</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yönetmen" name="director" required>
    </div>
    <div class="form-group">
        <label>Senarist</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Senarist" name="scriptwriter" required>
    </div>

    <div class="form-group">
        <label>Yapım</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yapım" name="production" required>
    </div>
    <div class="form-group">
        <label>Oyuncular</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Oyuncular" name="players" required>
    </div>
    <div class="form-group">
        <label>Bilet Alma Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Bilet Alma Linki" name="url" required>
    </div>

    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" id="editor" class="m-0 tinymce" required></textarea>
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
    <button role="button" data-url="<?= base_url("cinema/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#cinemaModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>