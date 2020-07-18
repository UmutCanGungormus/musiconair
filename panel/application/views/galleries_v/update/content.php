<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>" method="post">
                <div class="form-group">
                    <label>Galeri Adı</label>
                    <input class="form-control" placeholder="Galeri Adı" name="title" value="<?= $item->title; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                <a href="<?= base_url("galleries"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>