<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->user_name ?></b> kaydını düzenliyorsunuz
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <hr class="widget-separator">
                <div class="widget-body">
                    <form action="<?= base_url("users/update/$item->id"); ?>" method="post">
                        <div class="form-group">
                            <labReferansdı</label> <input class="form-control form-control-sm rounded-0" placeholder="Kullanıcı Adı" name="user_name" value="<?= (isset($form_error) ? set_value("user_name") : $item->user_name) ?>">
                                <?php if (isset($form_error)) : ?>
                                    <small class="input-form-error float-right"><?= form_error("user_name"); ?></small>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <labReferansdı</label> <input class="form-control form-control-sm rounded-0" placeholder="Ad Soyad" name="full_name" value="<?= (isset($form_error) ? set_value("full_name") : $item->full_name) ?>">
                                <?php if (isset($form_error)) : ?>
                                    <small class="input-form-error float-right"><?= form_error("full_name"); ?></small>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Yetki</label>
                            <select class="form-control form-control-sm rounded-0" name="role_id">
                                <?php foreach ($user_roles as $role) : ?>
                                    <option <?= ($role->id == $item->role_id ? "selected" : "") ?> value="<?= $role->id; ?>"><?= $role->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("category_id"); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <labReferansdı</label> <input class="form-control form-control-sm rounded-0" type="email" placeholder="Email" name="email" value="<?= (isset($form_error) ? set_value("email") : $item->email); ?>">
                                <?php if (isset($form_error)) : ?>
                                    <small class="input-form-error float-right"><?= form_error("email"); ?></small>
                                <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= get_picture($viewFolder, $item->img_url); ?>" class="img-fluid">
                            </div>
                            <div class="col-9">
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
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                        <a href="<?= base_url("users"); ?>" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>
</div>