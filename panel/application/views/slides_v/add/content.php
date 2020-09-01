<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="createSlide" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="description" class="m-0 tinymce"></textarea>
    </div>
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
    <div class="custom-control custom-switch form-group">
        <input type="checkbox" class="button_usage_btn btn-sm custom-control-input" id="customSwitchBtn" name="allowButton" checked>
        <label class="custom-control-label " for="customSwitchBtn">Buton Kullanımı</label>
    </div>

    <div class="button-information-container">
        <div class="form-group">
            <label>Buton Başlık</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Butonun üzerindeki yazı" name="button_caption">
        </div>
        <div class="form-group">
            <label>URL Bilgisi</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url">
        </div>
    </div>
    <div class="form-group">
        <label>Gönderi Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Gönderi Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S">
    </div>
    <button role="button" data-url="<?= base_url("slides/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#slideModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>