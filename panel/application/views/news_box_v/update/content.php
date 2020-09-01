<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateNewsBox" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Widget Title</label>
        <input type="text" class="form-control form-control-sm rounded-0" value="<?= $item->title ?>" name="title" required>
    </div>
    <div class="form-group">
        <label>Eklenecek Olan Widget </label>
        <select class="selectpicker form-control form-control-sm rounded-0" name="added_news_id" data-show-subtext="true" data-live-search="true" required>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($item->added_news_id == $category->id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Widget Eklenecek Haber </label>
        <select class="selectpicker form-control form-control-sm rounded-0" name="which_news_id" data-show-subtext="true" data-live-search="true" required>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($item->which_news_id == $category->id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= $item->sharedAt ?>" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("news_box/update/{$item->id}") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsBoxModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>