<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createOption" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" required>
    </div>
    <div class="form-group">
        <label>Test Seç</label>
        <select class="form-control form-control-sm rounded-0" name="test_id" required>
            <option value="0">Seçiniz</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
            <?php endforeach ?>
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
    <button role="button" data-url="<?=base_url("options/save")?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#optionModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>