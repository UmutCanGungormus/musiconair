<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateQuestion" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content; ?></textarea>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= $item->sharedAt ?>" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("questions/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#questionModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>