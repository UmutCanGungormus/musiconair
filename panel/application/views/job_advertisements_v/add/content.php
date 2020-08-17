<form id="createJobAdvertisement" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>İlan Başlığı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Başlığı" name="title">
    </div>
    <div class="form-group">
        <label>Şehir </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Şehir" name="city">
    </div>

    <div class="form-group">
        <label>Sektör </label>
        <input class="form-control form-control-sm rounded-0" placeholder="Sektör" name="sector">
    </div>
    <div class="form-group">
        <label>Firma Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Firma Adı" name="company_name">
    </div>
    <div class="form-group">
        <label>Çalışma Şekli</label>
        <input class="form-control form-control-sm rounded-0" type="text" placeholder="Çalışma Şekli" name="work_type">
    </div>
    <div class="form-group">
        <label>Çalışma Saatleri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Çalışma Saatleri" name="work_time">
    </div>
    <div class="form-group">
        <label>Tatil Günleri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Tatil Günleri" name="holiday">
    </div>
    <div class="form-group">
        <label>Eğitim Seviyesi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Eğitim Seviyesi" name="education_level">
    </div>
    <div class="form-group">
        <label>Personel Sayısı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Personel Sayısı" name="personal_count">
    </div>
    <div class="form-group">
        <label>İlan Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="İlan Linki" name="url">
    </div>

    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
    </div>

    <div class="form-group">
        <label>Görsel Seçiniz</label>
        <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
    </div>
    <button role="button" data-url="<?= base_url("job_advertisement/save/"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#jobAdvertisementModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>