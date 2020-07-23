<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Emlak İlanı Ekle
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("advertisement/save/?type=estate"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>İlan Başlığı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlan Başlığı" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Şehir </label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Şehir" name="city">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("city"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Sektör </label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Sektör" name="sector">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("sector"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Firma Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Firma Adı" name="company_name">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("company_name"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlan Şekli</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlan Şekli" name="estate_type">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("estate_type"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Ücret</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Ücret" name="payment">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("payment"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlana Dahil Olanlar</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlana Dahil Olanlar" name="advertisement_in">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("advertisement_in"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlana Sahibi</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlana Sahibi" name="advertisement_owner">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("advertisement_owner"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlan Linki</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlan Linki" name="url">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
                </div>
                <div class="row">

                    <div class="form-group image_upload_container col-md-8">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                <a href="<?= base_url("advertisement"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>