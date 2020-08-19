<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <hr class="widget-separator">
                <div class="widget-body">
                    <form action="<?= base_url("news/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h4 class="mb-3">
                                    Yeni Haber Ekle
                                </h4>
                            </div><!-- END column -->
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="widget">
                                    <hr class="widget-separator">
                                    <div class="widget-body">
                                        <form action="<?= base_url("news/save"); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Haber Adı</label>
                                                <input class="form-control form-control-sm rounded-0" placeholder="Haber Adı" value="<?= $item->title ?>" name="title">
                                                <?php if (isset($form_error)) : ?>
                                                    <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                                                <?php endif ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Açıklama</label>
                                                <textarea name="content" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"><?= $item->content ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Haber Kategori</label>
                                                <select class="form-control form-control-sm rounded-0" name="category_id">

                                                    <?php foreach ($categories as $category) : ?>
                                                        <option <?= ($category->id == $item->category_id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <?php if (isset($form_error)) : ?>
                                                    <small class="float-right input-form-error"> <?= form_error("category_id"); ?></small>
                                                <?php endif ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Haber Etiketleri</label>
                                                <?php $tags = explode(",",$item->tags)?>
                                                <select name="tags[]" value="<?= $item->tags ?>" class="form-control form-control-sm rounded-0 tagsInput" multiple="multiple" data-role="tagsinput">
                                                    <?php foreach($tags as $key => $value):?>
                                                        <option value="<?=$value?>" selected><?=$value?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php if (isset($form_error)) : ?>
                                                    <small class="input-form-error float-right"><?= form_error("title"); ?></small>
                                                <?php endif ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Yazar / Editör</label>
                                                <select class="form-control form-control-sm rounded-0" name="writer_id">

                                                    <?php foreach ($writers as $category) : ?>
                                                        <option <?= ($category->id == $item->writer_id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->name; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <?php if (isset($form_error)) : ?>
                                                    <small class="float-right input-form-error"> <?= form_error("writer_id"); ?></small>
                                                <?php endif ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Emoji</label>
                                                <select class="form-control form-control-sm rounded-0" name="emoji">
                                                    <option value="cok-iyi">Kahkaha</option>

                                                    <option value="yerim">Kalpli Göz</option>
                                                    <option value="rocket">Roket</option>
                                                </select>
                                                <?php if (isset($form_error)) : ?>
                                                    <small class="input-form-error float-right"><?= form_error("emoji"); ?></small>
                                                <?php endif ?>
                                            </div>

                                            <?php if (isset($form_error)) : ?>
                                                <div class="form-group ">
                                                    <label>Görsel Seçiniz</label>
                                                    <input type="file" name="img_url" class="form-control rounded-0">
                                                </div>
                                                <div class="form-group ">
                                                    <label>Video Url</label>
                                                    <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                                                    <?php if (isset($form_error)) : ?>
                                                        <small class="input-form-error float-right"><?= form_error("video_url"); ?></small>
                                                    <?php endif ?>
                                                </div>
                                            <?php else : ?>
                                                <div class="row">
                                                    <div class="col-md-1 ">
                                                        <img src="<?= get_picture($viewFolder, $item->img_url); ?>" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-9 form-group ">
                                                        <label>Görsel Seçiniz</label>
                                                        <input type="file" name="img_url" class="form-control rounded-0">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Video Url</label>
                                                    <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url" value="<?= $item->video_url; ?>">
                                                </div>
                                            <?php endif ?>

                                            <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                                            <a href="<?= base_url("news"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                                        </form>
                                    </div><!-- .widget-body -->
                                </div><!-- .widget -->
                            </div><!-- END column -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>