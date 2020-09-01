<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createNewsBox" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Widget Title</label>
        <input type="text" class="form-control form-control-sm rounded-0" name="title" required>
    </div>
    <div class="form-group">
        <label>Eklenecek Olan Widget </label>
        <select class="selectpicker form-control form-control-sm rounded-0" name="added_news_id" data-show-subtext="true" data-live-search="true" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Widget Eklenecek Haber </label>
        <select class="selectpicker form-control form-control-sm rounded-0" name="which_news_id" data-show-subtext="true" data-live-search="true" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s")?>" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("news_box/save") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsBoxModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>