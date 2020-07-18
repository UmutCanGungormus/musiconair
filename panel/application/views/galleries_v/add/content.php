<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Galeri Ekle
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("galleries/save"); ?>" method="post">
                <div class="form-group">
                    <label>Galeri Adı</label>
                    <input class="form-control" placeholder="Galeri Adı" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="control-demo-6" class="">Galeri Türü</label>
                    <div id="control-demo-6" class="">
                        <select class="form-control" name="gallery_type">
                            <option <?= (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                        </select>
                    </div>
                </div><!-- .form-group -->
                <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                <a href="<?= base_url("galleries"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>