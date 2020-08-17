<form id="updateActivity" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Referans Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Referans Adı" name="title" value="<?= $item->title; ?>">
    </div>

    <div class="form-group">
        <label>Etkinlik Kategori</label>
        <select class="form-control form-control-sm rounded-0" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option <?= ($category->id == $item->category_id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?> </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="datetimepicker1">Etkinlik Tarihi</label>
        <input type="text" name="event_date" class="form-control form-control-sm datetimepicker" value="<?= $item->event_date; ?>" id="datetimepicker1" placeholder="Etkinlik Tarihi"/>
    </div>
    <div class="form-group">
        <label>Etkinlik Mekan</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Mekan Adı" value="<?= $item->place; ?>" name="place">
    </div>
    <div class="form-group">
        <label>Etkinlik Şehri</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Şehri" value="<?= $item->city; ?>" name="city">
    </div>
    <div class="form-group">
        <label>Etkinlik Bilet Linki</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Etkinlik Bilet Linki" value="<?= $item->url; ?>" name="url">
    </div>
    <div class="form-group">
        <label>Detaylar</label>
        <textarea name="info" class="m-0 tinymce"><?= $item->info; ?></textarea>
    </div>
    <div class="form-group">
        <label>Bilet Fiyatları</label>
        <textarea name="pricing" class="m-0 tinymce"><?= $item->pricing; ?></textarea>
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="content" class="m-0 tinymce"><?= $item->content; ?></textarea>
    </div>

    <div class="row">
        <!-- END column -->
        <div class="col-1 image_upload_container">
            <img src="<?= get_picture($viewFolder, $item->img_url); ?>" class="img-fluid">
        </div>
        <div class="col-11 form-group image_upload_container">
            <label>Görsel Seçiniz</label>
            <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
        </div>
    </div>
    <button role="button" data-url="<?= base_url("activities/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#activityModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>