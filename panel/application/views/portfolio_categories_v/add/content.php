<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createPortfolio" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
    </div>
    <button role="button" data-url="<?= base_url("portfolio_categories/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#portfolioCategoryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>