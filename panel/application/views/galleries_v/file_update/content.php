<form id="updateGallery" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Başlık</label>
        <input name="title" class="form-control form-control-sm rounded-0" value="<?= $item->title ?>" required>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="description" class="form-control form-control-sm m-0 tinymce" required><?= $item->description ?></textarea>
    </div>

    <button role="button" data-url="<?= base_url("galleries/file_update/{$item->id}"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="<?= base_url("galleries"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>