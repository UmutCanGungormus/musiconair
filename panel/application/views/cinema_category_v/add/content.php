<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Film Kategorisi Ekle
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("cinema_category/save"); ?>" method="post">
                <div class="form-group">
                    <label>Başlık</label>
                    <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                <a href="<?= base_url("cinema_category"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div>
    </div>
</div>