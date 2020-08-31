<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createTestimonial" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Ad Soyad</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Ad Soyad" name="full_name" required>
    </div>
    <div class="form-group">
        <label>Şirket Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Şirket Adı" name="company" required>
    </div>
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea class="form-control form-control-sm rounded-0 tinymce" name="content" placeholder="Bizimle ilgili mesaj..." required></textarea>
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
    <button role="button" data-url="<?= base_url("testimonials/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#testimonialModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>