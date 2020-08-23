<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createNews" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Haber Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Haber Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required></textarea>
    </div>
    <div class="form-group">
        <label>Haber Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <div class="alert alert-info">Not:Her Etiket Kelimesi Yazıldıktan Sonra Virgül Yada Enter Tuşuna Basın!</div>
        <label>Haber Etiketleri</label>
        <select name="tags[]" class="form-control form-control-sm rounded-0 tagsInput" multiple="multiple" required></select>
    </div>
    <div class="form-group">
        <label>Yazar / Editör</label>
        <select class="form-control form-control-sm rounded-0" name="writer_id" required>
            <?php foreach ($writers as $category) : ?>
                <option value="<?= $category->id; ?>"><?= $category->full_name; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Emoji</label>
        <select class="form-control form-control-sm rounded-0" name="emoji" required>
            <option value="cok-iyi">Kahkaha</option>
            <option value="yerim">Kalpli Göz</option>
            <option value="rocket">Roket</option>
        </select>
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
        <label>Video Url</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
    </div>

    <button role="button" data-url="<?=base_url("news/save")?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>