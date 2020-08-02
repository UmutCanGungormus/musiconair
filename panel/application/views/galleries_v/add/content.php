
<form id="createGallery" onsubmit="return false" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title" required>
    </div>
    <div class="form-group">
        <label for="control-demo-6" class="">Galeri Türü</label>
        <div id="control-demo-6" class="">
            <select class="form-control form-control-sm rounded-0" name="gallery_type" required>
                <option <?= (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                <option <?= (isset($gallery_type) && $gallery_type == "file") ? "selected" : ""; ?> value="file">Dosya</option>
                <option <?= (isset($gallery_type) && $gallery_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                <option <?= (isset($gallery_type) && $gallery_type == "video_url") ? "selected" : ""; ?> value="video_url">Video URL</option>
            </select>
        </div>
    </div><!-- .form-group -->
    <button data-url="<?= base_url("galleries/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#galleryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>