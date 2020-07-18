<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("galleries/gallery_video_update/$item->id/$item->gallery_id"); ?>" method="post">

                <div class="form-group">
                    <label>Video URL</label>
                    <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız" name="url" value="<?= $item->url; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                <a href="<?= base_url("galleries/gallery_video_list/$item->gallery_id"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>