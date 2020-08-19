<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Soru Şıkkı Ekle
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("options/save"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                            <?php endif ?>
                        </div>
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Görsel Seçiniz</span>
                            </div>
                            <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-append">
                                <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                                    <input type="hidden"><input type="file" name="img_url">
                                </span>
                                <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Test Seç</label>
                            <select class="form-control form-control-sm rounded-0" name="test_id">
                                <option value="0">Seçiniz</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("category_id"); ?></small>
                            <?php endif ?>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("options"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>