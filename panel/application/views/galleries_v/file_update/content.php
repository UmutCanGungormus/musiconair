<form action="<?= base_url("galleries/file_update/$item->id/$category"); ?>" method="post">
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="description" class="m-0 tinymce"><?= $item->description ?></textarea>
    </div>

    <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
    <a href="<?= base_url("galleries"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>