<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Kullanıcı Ekle
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <hr class="widget-separator">
                <div class="widget-body">
                    <form action="<?= base_url("users/save"); ?>" method="post">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Kullanıcı Adı" name="user_name" value="<?= isset($form_error) ? set_value("user_name") : ""; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("user_name"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Ad Soyad" name="full_name" value="<?= isset($form_error) ? set_value("full_name") : ""; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("full_name"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-sm rounded-0" placeholder="Email" name="email" value="<?= isset($form_error) ? set_value("email") : ""; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("email"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Yetki</label>
                            <select class="form-control form-control-sm rounded-0" name="role_id">
                                <?php foreach ($user_roles as $role) : ?>
                                    <option value="<?= $role->id; ?>"><?= $role->title; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("category_id"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" class="form-control form-control-sm rounded-0" placeholder="Şifre" name="password">
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("password"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Şifre Tekrar</label>
                            <input type="password" class="form-control form-control-sm rounded-0" placeholder="Şifre Tekrar" name="re_password">
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("re_password"); ?></small>
                            <?php endif ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("users"); ?>" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>
</div>