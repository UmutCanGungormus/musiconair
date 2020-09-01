<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createEstateAdvertisement" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>İlan Başlığı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Başlığı" name="title" required>
    </div>
    <div class="form-group">
        <label>Şehir </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Şehir" name="city" required>
    </div>
    <div class="form-group">
        <label>İlan Şekli</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Şekli" name="estate_type" required>
    </div>
    <div class="form-group">
        <label>Ücret</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Ücret" name="payment" required>
    </div>
    <div class="form-group">
        <label>İlana Dahil Olanlar</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlana Dahil Olanlar" name="advertisement_in" required>
    </div>
    <div class="form-group">
        <label>İlana Sahibi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlana Sahibi" name="advertisement_owner" required>
    </div>
    <div class="form-group">
        <label>İlan Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Linki" name="url" required>
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
    <button role="button" data-url="<?= base_url("estate_advertisement/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#estateAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>