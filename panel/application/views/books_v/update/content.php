<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<form action="<?= base_url("book/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kitap Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title" value="<?= $item->title; ?>" required>
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
        <label>Yazar Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yazar Adı" value="<?= $item->writer_name; ?>" name="writer_name" required>
    </div>
    <div class="form-group">
        <label> Kitap Dil</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Dil" value="<?= $item->language; ?>" name="language" required>
    </div>
    <div class="form-group">
        <label>Çevirmen</label>
        <input class="form-control form-control-sm rounded-0" type="text" placeholder="Çevirmen" value="<?= $item->translator; ?>" name="translator" required>
    </div>

    <div class="form-group">
        <label>Sayfa Sayısı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Sayfa Sayısı" value="<?= $item->page_count; ?>" name="page_count" required>
    </div>
    <div class="form-group">
        <label>İlk Baskı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlk Baskı" value="<?= $item->first_print; ?>" name="first_print" required>
    </div>
    <div class="form-group">
        <label>Kitap Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Linki" value="<?= $item->url; ?>" name="url" required>
    </div>

    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content; ?></textarea>
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
    <button role="button" data-url="<?=base_url("book/update/{$item->id}")?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#bookModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>