<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Sosyal Medya Widget Ekle
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <hr class="widget-separator">
                <div class="widget-body">
                    <form action="<?= base_url("social_media_talk/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Haber Seç</label>
                            <select class="form-control form-control-sm rounded-0" name="news_id">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($form_error)) : ?>
                                <small class="input-form-error float-right"><?= form_error("news_id"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group video_url_container">
                            <label>Widget Title</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık Giriniz" name="title">
                        </div>

                        <div class="form-group">
                            <label for="control-demo-6" class="">İçerik Türü</label>
                            <div id="control-demo-6" class="">
                                <select class="form-control form-control-sm rounded-0 social_media_talk_type_select" name="social_media_talk_type">
                                    <option <?= (isset($social_media_talk_type) && $social_media_talk_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                    <option <?= (isset($social_media_talk_type) && $social_media_talk_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            </div>
                        </div><!-- .form-group -->
                        <?php if (isset($form_error)) : ?>
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="display: <?= ($social_media_talk_type == "image" ? "block" : "none") ?>;">
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
                            <div class="form-group video_url_container" style="display: <?= ($social_media_talk_type == "video") ? "block" : "none"; ?>">
                                <label>Video Url</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                                <?php if (isset($form_error)) : ?>
                                    <small class="input-form-error float-right"><?= form_error("video_url"); ?></small>
                                <?php endif ?>
                            </div>
                        <?php else : ?>
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
                            <div class="form-group video_url_container">
                                <label>Video Url</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                            </div>
                        <?php endif ?>

                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("social_media_talk"); ?>" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
                    </form>
                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
    </div>
</div>