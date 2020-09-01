<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createPopup" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Hedef Sayfa</label>
        <select name="page" class="form-control form-control-sm rounded-0" required>
            <?php foreach (get_page_list() as $page => $value) : ?>
                <option value="<?= $page; ?>"><?= $value; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required></textarea>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s")?>" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("popups/save") ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#popupModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>