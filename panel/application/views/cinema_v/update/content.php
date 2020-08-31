<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateCinema" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Film Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title" value="<?= $item->title; ?>" required>
    </div>

    <div class="form-group">
        <label>Film Türü</label>
        <select class="form-control form-control-sm rounded-0 tagsInput" size="4" multiple name="category_id[]" required>
            <?php $catArr = json_decode($item->category_id) ?>
            <?php foreach ($categories as $category) : ?>
                <option <?= (in_array($category->id, $catArr) ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <label>Film Dili</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Film Dili" value="<?= $item->language; ?>" name="language" required>
    </div>
    <div class="form-group">
        <label> Yönetmen</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yönetmen" value="<?= $item->director; ?>" name="director" required>
    </div>
    <div class="form-group">
        <label>Senarist</label>
        <input class="form-control form-control-sm rounded-0" type="text" placeholder="Senarist" value="<?= $item->scriptwriter; ?>" name="scriptwriter" required>
    </div>

    <div class="form-group">
        <label>Yapım</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yapım" value="<?= $item->production; ?>" name="production" required>
    </div>
    <div class="form-group">
        <label>Oyuncular</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Oyuncular" value="<?= $item->players; ?>" name="players" required>
    </div>
    <div class="form-group">
        <label>Bilet Alma Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Bilet Alma Linki" value="<?= $item->url; ?>" name="url" required>
    </div>

    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content; ?></textarea>
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
    <button role="button" data-url="<?= base_url("cinema/update/{$item->id}") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#cinemaModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>