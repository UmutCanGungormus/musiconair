<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="updateActivityCategory" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>" required>
    </div>
    <button data-url="<?= base_url("activity_categories/update/$item->id"); ?>" role="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#activityCategoryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>