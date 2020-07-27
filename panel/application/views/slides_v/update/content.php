<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title ?></b> kaydını düzenliyorsunuz
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("slides/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea name="description" class="m-0 tinymce"  data-plugin="summernote" data-options="{height: 250}"><?= $item->description; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-1 image_upload_container">
                                <img src="<?= get_picture($viewFolder, $item->img_url, "857x505"); ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9 form-group image_upload_container">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Buton Kullanımı</label><br>
                            <div class="custom-control custom-switch"><input data-id="<?=$item->id?>" name="allowButton" data-status="<?= ($item->allowButton) ? "checked" : ""; ?>" id="customSwitch<?=$item->id?>" type="checkbox" <?= ($item->allowButton) ? "checked" : ""; ?> class="custom-control-input button_usage_btn">  <label class="custom-control-label" for="customSwitch<?=$item->id?>"></label></div>
                        </div>
                        <div class="button-information-container" style="display : <?= ($item->allowButton) ? "block" : "none"; ?>">
                            <div class="form-group">
                                <label>Buton Başlık</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Butonun üzerindeki yazı" name="button_caption" value="<?= $item->button_caption; ?>">
                                <?php if (isset($form_error)) : ?>
                                    <small class="float-right input-form-error"> <?= form_error("button_caption"); ?></small>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>URL Bilgisi</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url" value="<?= $item->button_url; ?>">
                                <?php if (isset($form_error)) : ?>
                                    <small class="float-right input-form-error"> <?= form_error("button_url"); ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Slider Dili</label>
                            <select class="form-control form-control-sm rounded-0" name="language">
                                <?php if ($item->language == "TR") : ?>
                                    <option selected="selected" value="TR">TR (Türkçe/Turkish)</option>
                                    <option value="EN">EN (İngilizce/English)</option>
                                    <option value="DE">DE (Almanca/German)</option>
                                <?php elseif ($item->language == "EN") : ?>
                                    <option value="TR">TR (Türkçe/Turkish)</option>
                                    <option selected="selected" value="EN">EN (İngilizce/English)</option>
                                    <option value="DE">DE (Almanca/German)</option>
                                <?php else : ?>
                                    <option value="TR">TR (Türkçe/Turkish)</option>
                                    <option value="EN">EN (İngilizce/English)</option>
                                    <option selected="selected" value="DE">DE (Almanca/German)</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                        <a href="<?= base_url("slides"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>