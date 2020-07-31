
<form onsubmit="return false" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title">
        <?php if (isset($form_error)) : ?>
            <small class="input-form-error float-right"><?= form_error("title"); ?></small>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="control-demo-6" class="">Galeri Türü</label>
        <div id="control-demo-6" class="">
            <select class="form-control form-control-sm rounded-0" name="gallery_type">
                <option <?= (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                <option <?= (isset($gallery_type) && $gallery_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                <option <?= (isset($gallery_type) && $gallery_type == "file") ? "selected" : ""; ?> value="file">Dosya</option>
            </select>
        </div>
    </div><!-- .form-group -->
    <button data-url="<?= base_url("galleries/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger rounded-0 btnCancel">İptal</a>
</form>