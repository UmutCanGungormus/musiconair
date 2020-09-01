<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateNews" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Haber Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Haber Adı" value="<?= $item->title ?>" name="title" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content ?></textarea>
    </div>
    <div class="form-group">
        <label>Haber Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id" required>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($category->id == $item->category_id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Haber Etiketleri</label>
        <?php $tags = explode(",", $item->tags) ?>
        <select name="tags[]" value="<?= $item->tags ?>" class="form-control form-control-sm rounded-0 tagsInput" multiple="multiple" data-role="tagsinput" required>
            <?php foreach ($tags as $key => $value) : ?>
                <option value="<?= $value ?>" selected><?= $value ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Yazar / Editör</label>
        <select class="form-control form-control-sm rounded-0" name="writer_id" required>
            <?php foreach ($writers as $category) : ?>
                <option <?= ($category->id == $item->writer_id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->full_name; ?></option>
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
    <div class="row">
        <div class="col-3">
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
    <div class="form-group ">
        <label>Video Url</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url" value="<?= $item->video_url; ?>">
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= $item->sharedAt ?>" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("news/update/{$item->id}") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>