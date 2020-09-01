<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updatePortfolio" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-md-6">
            <label>Başlık</label>
            <input class="form-control form-control-sm rounded-0" placeholder="İşi anlatan başlık bilgisi" name="title" value="<?= $item->title; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label>Kategori</label>
            <select class="form-control form-control-sm rounded-0" name="category_id" required>
                <?php foreach ($categories as $category) : ?>
                    <option <?= ($category->id === $item->category_id) ? "selected" : null; ?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="datetimepicker1">Bitirme Tarihi</label>
        <input type="text" name="finishedAt" class="form-control form-control-sm rounded-0 datetimepicker" placeholder="Bitirme Tarihi" value="<?= $item->finishedAt; ?>" required />
    </div>
    <div class="form-group">
        <label>Müşteri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İşi yaptığınız müşteri" name="client" value="<?= $item->client; ?>" required>
    </div>
    <div class="form-group">
        <label>Yer/Mekan</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İşi yaptığınız Yer/Mekan bilgisi" name="place" value="<?= $item->place; ?>" required>
    </div>
    <div class="form-group">
        <label>Yapılan işin Bağlantısı (URL)</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Yapılan işin internet üzerindeki bağlantısı" name="portfolio_url" value="<?= $item->portfolio_url; ?>" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" required><?= $item->content; ?></textarea>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= $item->sharedAt ?>" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("portfolio/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#portfolioModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>