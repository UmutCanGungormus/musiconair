<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3">
                Yeni Ziyaretçi Notu Ekle
            </h4>
        </div>
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("testimonials/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Ad Soyad" name="full_name">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("full_name"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Şirket Adı</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Şirket Adı" name="company">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("company"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control form-control-sm rounded-0 tinymce" name="description" placeholder="Bizimle ilgili mesaj..." cols="30" rows="10"></textarea>
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("description"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="form-group image_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control form-control-sm rounded-0">
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("testimonials"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>