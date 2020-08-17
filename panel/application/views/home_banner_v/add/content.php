<form id="createHomeBanner" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
    </div>
    <div class="form-group">
        <label>Link</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Link" name="url">
    </div>
    <div class="form-group image_upload_container">
        <label>Görsel Seçiniz</label>
        <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
    </div>

    <button role="button" data-url="<?= base_url("home_banner/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#homeBannerModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>