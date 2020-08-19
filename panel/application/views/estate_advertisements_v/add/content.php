<form id="createEstateAdvertisement" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>İlan Başlığı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Başlığı" name="title">
    </div>
    <div class="form-group">
        <label>Şehir </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Şehir" name="city">
    </div>
    <div class="form-group">
        <label>İlan Şekli</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Şekli" name="estate_type">
    </div>
    <div class="form-group">
        <label>Ücret</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Ücret" name="payment">
    </div>
    <div class="form-group">
        <label>İlana Dahil Olanlar</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlana Dahil Olanlar" name="advertisement_in">
    </div>
    <div class="form-group">
        <label>İlana Sahibi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlana Sahibi" name="advertisement_owner">
    </div>
    <div class="form-group">
        <label>İlan Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Linki" name="url">
    </div>

    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce"></textarea>
    </div>

    <div class="form-group">
        <label>Görsel Seçiniz</label>
        <input type="file" name="img_url" class="form-control rounded-0">
    </div>
    <button role="button" data-url="<?= base_url("estate_advertisement/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#estateAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>