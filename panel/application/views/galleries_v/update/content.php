<form id="updateGallery" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title" value="<?= $item->title; ?>" required>
    </div>
    <button data-url="<?= base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#galleryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>