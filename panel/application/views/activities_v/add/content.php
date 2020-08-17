<form id="createActivity" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Etkinlik Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Adı" name="title">
    </div>
    <div class="form-group">
        <label>Etkinlik Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="datetimepicker1">Etkinlik Tarihi</label>
        <input type="text" placeholder="Etkinlik Tarihi Seçin..." name="event_date" class="form-control form-control-sm datetimepicker" />
    </div>
    <div class="form-group">
        <label>Etkinlik Mekan</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Mekan Adı" name="place">
    </div>
    <div class="form-group">
        <label>Etkinlik Şehri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Şehri" name="city">
    </div>
    
    <div class="form-group">
        <label>Etkinlik Bilet Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Bilet Linki" name="url">
    </div>
    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="info" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
    </div>
    <div class="form-group">
        <label>Bilet Fiyatları</label>
        <textarea name="pricing" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
    </div>
    <!-- END column -->
    <div class="form-group image_upload_container">
        <label>Görsel Seçiniz</label>
        <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
    </div>
    <button role="button" data-url="<?= base_url("activities/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#activityModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>