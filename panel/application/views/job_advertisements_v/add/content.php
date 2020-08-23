<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="createJobAdvertisement" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>İlan Başlığı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Başlığı" name="title" required>
    </div>
    <div class="form-group">
        <label>Şehir </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Şehir" name="city" required>
    </div>

    <div class="form-group">
        <label>Sektör </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Sektör" name="sector" required>
    </div>
    <div class="form-group">
        <label>Firma Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Firma Adı" name="company_name" required>
    </div>
    <div class="form-group">
        <label>Çalışma Şekli</label>
        <input class="form-control form-control-sm rounded-0" type="text" placeholder="Çalışma Şekli" name="work_type" required>
    </div>
    <div class="form-group">
        <label>Çalışma Saatleri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Çalışma Saatleri" name="work_time" required>
    </div>
    <div class="form-group">
        <label>Tatil Günleri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Tatil Günleri" name="holiday" required>
    </div>
    <div class="form-group">
        <label>Eğitim Seviyesi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Eğitim Seviyesi" name="education_level" required>
    </div>
    <div class="form-group">
        <label>Personel Sayısı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Personel Sayısı" name="personal_count" required>
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
    <button role="button" data-url="<?= base_url("job_advertisement/save/"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#jobAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>