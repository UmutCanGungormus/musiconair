<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("brands/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Kitap Adı</label>
                    <input class="form-control" placeholder="Başlık" name="title" value="<?= $item->title; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>
                <div class="row">
                    <div class="col-md-1 image_upload_container">
                        <img src="<?= get_picture($viewFolder, $item->img_url, "178x57"); ?>" class="img-fluid">
                    </div>
                    <div class="col-md-9 form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                <a href="<?= base_url("brands"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>