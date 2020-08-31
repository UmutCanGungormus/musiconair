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
    <button role="button" data-url="<?= base_url("questions/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#questionModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>