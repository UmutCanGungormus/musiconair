<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->name ?></b> kaydını düzenliyorsunuz
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("writers/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Ad Soyad" name="name" value="<?= $item->name; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("name"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Görev</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Görev" name="type" value="<?= $item->type; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("type"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="E-Mail" type="email" name="email" value="<?= $item->email; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("email"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="E-Mail" type="password" name="password" value="">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("password"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="row">
                            <div class="col-md-1 image_upload_container">
                                <img src="<?= get_picture($viewFolder, $item->img_url, "90x90"); ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9 form-group image_upload_container">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                        <a href="<?= base_url("writers"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>
</div>