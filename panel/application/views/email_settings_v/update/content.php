<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->user_name ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("emailsettings/update/$item->id"); ?>" method="post">
                <div class="form-group">
                    <label>Protokol</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Protokol" name="protocol" value="<?= isset($form_error) ? set_value("protocol") : $item->protocol; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("protocol"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>E-Posta Sunucu Bilgisi</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Hostname" name="host" value="<?= isset($form_error) ? set_value("host") : $item->host; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("host"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Port Numarası</label>
                    <input type="text" class="form-control form-control-sm rounded-0" placeholder="Port Numarası" name="port" value="<?= isset($form_error) ? set_value("port") : $item->port; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("port"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>E-Posta Başlık</label>
                    <input type="text" class="form-control form-control-sm rounded-0" placeholder="E-Posta Başlık" name="user_name" value="<?= isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("user_name"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>E-Posta Adresi (User)</label>
                    <input type="email" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresi (User)" name="user" value="<?= isset($form_error) ? set_value("user") : $item->user; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("user"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>E-Posta Adresine Ait Şifre</label>
                    <input type="password" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresine Ait Şifre" name="password" value="<?= isset($form_error) ? set_value("password") : $item->password; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("password"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kimden Gidecek (From)</label>
                    <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kimden Gidecek (From)" name="from" value="<?= isset($form_error) ? set_value("from") : $item->from; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("from"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Kime Gidecek (To)</label>
                    <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kime Gidecek (To)" name="to" value="<?= isset($form_error) ? set_value("to") : $item->to; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("to"); ?></small>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                <a href="<?= base_url("emailsettings"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>