<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateNewsCategory" onsubmit="return false" action="" method="post">
    <div class="form-group">
        <label>Başlık </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>" required>
    </div>

    <button role="button" data-url="<?= base_url("news_categories/update/{$item->id}"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsCategoryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>