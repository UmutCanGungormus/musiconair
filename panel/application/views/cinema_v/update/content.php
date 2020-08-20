<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("cinema/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Film Adı</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Kitap Adı" name="title" value="<?= $item->title; ?>">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Film Türü</label>
                    <select class="form-control form-control-sm rounded-0 selectpicker" size="4" multiple name="category_id[]">
                        <?php foreach ($categories as $category) : ?>
                            <option <?php foreach (json_decode($item->category_id) as $cat) : ($category->id == $cat ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?> </option>
                        <?php endforeach ?>
                    <?php endforeach ?>
                    </select>
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("category"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Film Dili</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Film Dili" value="<?= $item->language; ?>" name="language">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("language"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label> Yönetmen</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Yönetmen" value="<?= $item->director; ?>" name="director">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("director"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Senarist</label>
                    <input class="form-control form-control-sm rounded-0" type="text" placeholder="Senarist" value="<?= $item->scriptwriter; ?>" name="scriptwriter">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("scriptwriter"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Yapım</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Yapım" value="<?= $item->production; ?>" name="production">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("production"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Oyuncular</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Oyuncular" value="<?= $item->players; ?>" name="players">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("players"); ?></small>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Bilet Alma Linki</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Bilet Alma Linki" value="<?= $item->url; ?>" name="url">
                    <?php if (isset($form_error)) : ?>
                        <small class="input-form-error float-right"><?= form_error("url"); ?></small>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label>Detaylar</label>
                    <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"><?= $item->content; ?></textarea>
                </div>
                <div class="row">
                    <div class="col-3 image_upload_container">
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
                <a href="<?= base_url("cinema"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div><!-- END column -->
    </div>
</div>