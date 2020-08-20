<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Kitap Ekle
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("book/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <label>Kitap Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Kitap Kategori</label>
                    <select class="form-control form-control-sm rounded-0" name="category_id">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->title ?> </option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("category"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Yazar Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Yazar Adı" name="writer_name">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("writer_name"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kitap Dili</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Dili" name="language">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("language"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Çevirmen</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Çevirmen" name="translator">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("translator"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Sayfa Sayısı</label>
                    <input class="form-control form-control-sm rounded-0" type="text" placeholder="Sayfa Sayısı" name="page_count">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("page_count"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlk Baskı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlk Baskı" name="first_print">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("first_print"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kitap Satın Alma Linki</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Satın Alma Linki" name="url">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
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
                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                <a href="<?= base_url("book"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>