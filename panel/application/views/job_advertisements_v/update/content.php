<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="updateJobAdvertisement" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>İlan Başlığı</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->title; ?>" placeholder="İlan Başlığı" name="title" required>
    </div>
    <div class="form-group">
        <label>Şehir </label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->city; ?>" placeholder="Şehir" name="city" required>
    </div>
    <div class="form-group">
        <label>Sektör </label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->sector; ?>" placeholder="Sektör" name="sector" required>
    </div>
    <div class="form-group">
        <label>Firma Adı</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->company_name; ?>" placeholder="Firma Adı" name="company_name" required>
    </div>
    <div class="form-group">
        <label>Çalışma Şekli</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->work_type; ?>" type="text" placeholder="Çalışma Şekli" name="work_type" required>
    </div>
    <div class="form-group">
        <label>Çalışma Saatleri</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->work_time; ?>" placeholder="Çalışma Saatleri" name="work_time" required>
    </div>
    <div class="form-group">
        <label>Tatil Günleri</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->holiday; ?>" placeholder="Tatil Günleri" name="holiday" required>
    </div>
    <div class="form-group">
        <label>Eğitim Seviyesi</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->education_level; ?>" placeholder="Eğitim Seviyesi" name="education_level" required>
    </div>
    <div class="form-group">
        <label>Personel Sayısı</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->personal_count; ?>" placeholder="Personel Sayısı" name="personal_count" required>
    </div>
    <div class="form-group">
        <label>İlan Linki</label>
        <input class="form-control form-control-sm rounded-0" value="<?= $item->url; ?>" placeholder="İlan Linki" name="url" required>
    </div>

    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required> <?= $item->content; ?></textarea>
    </div>
    <div class="row">
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
    <button role="button" data-url="<?= base_url("job_advertisement/update/$item->id") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#jobAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>