<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateOption" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>" required>
    </div>

    <div class="row">
        <div class="col-3">
            <img src="<?= get_picture($viewFolder, $item->img_url); ?>" alt="" class="img-fluid">
        </div>
        <div class="col-9">
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
        </div>
    </div>
    <div class="form-group">
        <label>Üst Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="test_id" required>
            <option <?= ($item->test_id == 0 ? "selected" : null) ?> value="0">Ana Kategori</option>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($item->test_id == $category->id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button role="button" data-url="<?=base_url("options/update/{$item->id}")?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#optionModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>