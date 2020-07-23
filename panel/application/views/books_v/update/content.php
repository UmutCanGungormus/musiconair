<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("book/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kitap Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title" value="<?= $item->title; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Etkinlik Kategori</label>
                    <select class="form-control form-control-sm rounded-0" name="category_id">
                        <?php foreach ($categories as $category) : ?>
                            <option <?= ($category->id == $item->category_id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?> </option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("category"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Yazar Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Yazar Adı" value="<?= $item->writer_name; ?>" name="writer_name">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("writer_name"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label> Kitap Dil</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Dil" value="<?= $item->language; ?>" name="language">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("language"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Çevirmen</label>
                    <input class="form-control form-control-sm rounded-0" type="text" placeholder="Çevirmen" value="<?= $item->translator; ?>" name="translator">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("translator"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Sayfa Sayısı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Sayfa Sayısı" value="<?= $item->page_count; ?>" name="page_count">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("page_count"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>İlk Baskı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="İlk Baskı" value="<?= $item->first_print; ?>" name="first_print">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("first_print"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kitap Linki</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Linki" value="<?= $item->url; ?>" name="url">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Detyalar</label>
                    <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"><?= $item->content; ?></textarea>
                </div>
                <div class="row">

                    <div class="col-md-1 image_upload_container">
                        <img src="<?= get_picture($viewFolder, $item->img_url, "255x157"); ?>" class="img-fluid">
                    </div>
                    <div class="col-md-7 form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                <a href="<?= base_url("book"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>