<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Slayt Ekle
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("slides/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea name="description" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"></textarea>
                        </div>
                        <div class="form-group image_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                        </div>
                        <div class="custom-control custom-switch form-group">
                            <input type="checkbox" checked class="button_usage_btn btn-sm custom-control-input" id="customSwitch1">
                            <label class="custom-control-label " for="customSwitch1">Buton Kullanımı</label>
                        </div>
                        
                        <div class="button-information-container">
                            <div class="form-group">
                                <label>Buton Başlık</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Butonun üzerindeki yazı" name="button_caption">
                                <?php if (isset($form_error)) : ?>
                                    <small class="float-right input-form-error"> <?= form_error("button_caption"); ?></small>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label>URL Bilgisi</label>
                                <input class="form-control form-control-sm rounded-0" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url">
                                <?php if (isset($form_error)) : ?>
                                    <small class="float-right input-form-error"> <?= form_error("button_url"); ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gönderi Paylaşım Tarihi</label>
                            <input type="date" name="sharedAt" placeholder="Gönderi Paylaşım Tarihi" class="form-control form-control-sm" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" data-default-date="<?=date("Y-m-d H:i:s")?>" data-date-format="Y-m-d H:i:S"> 
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("slides"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>