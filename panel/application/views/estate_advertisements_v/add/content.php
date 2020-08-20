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
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="input-group-prepend">
            <span class="input-group-text">Görsel Seçiniz</span>
        </div>
        <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
        <span class="input-group-append">
            <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                <input type="hidden"><input type="file" name="img_url">
            </span>
            <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
        </span>
    </div>
    <button role="button" data-url="<?= base_url("estate_advertisement/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#estateAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>