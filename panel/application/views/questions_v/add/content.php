<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createQuestion" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required></textarea>
    </div>
    <button role="button" data-url="<?= base_url("questions/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>