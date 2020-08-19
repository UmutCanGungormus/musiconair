<form id="updateGallery" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Başlık</label>
        <input name="title" class="form-control form-control-sm rounded-0" value="<?= $item->title ?>" required>
    </div>
    <?php if ($gallery->gallery_type !== "images" && $gallery->gallery_type !== "files") : ?>
        <div class="form-group">
            <label>Çıkış Tarihi</label>
            <input name="release_year" class="form-control form-control-sm rounded-0" value="<?= $item->release_year ?>" required>
        </div>
        <div class="form-group">
            <label>Yapımcı</label>
            <input name="producer" class="form-control form-control-sm rounded-0" value="<?= $item->producer ?>" required>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="description" class="form-control form-control-sm m-0 tinymce" required><?= $item->description ?></textarea>
    </div>
    <div class="form-group">
        <label>İçerik Kapak Görseli</label>
        <input type="file" name="img_url" class="form-control rounded-0">
    </div>
    <button role="button" data-url="<?= base_url("galleries/file_update/{$item->id}/$gallery->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#fileModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>