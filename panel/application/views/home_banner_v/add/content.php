<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Banner Ekle
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("home_banner/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Başlık</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control form-control-sm rounded-0" name="category_id">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("category_id"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Link" name="url">
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group image_upload_container">
                    <label>Görsel Seçiniz</label>
                    <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                </div>

                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                <a href="<?= base_url("home_banner"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div>
    </div>
</div>