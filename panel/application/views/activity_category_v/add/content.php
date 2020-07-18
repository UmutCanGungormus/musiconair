<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Etkinlik Kategorisi Ekle
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form action="<?= base_url("activity_category/save"); ?>" method="post">
                <div class="form-group">
                    <label>Başlık</label>
                    <input class="form-control" placeholder="Başlık" name="title">
                    <?php if (isset($form_error)) : ?>
                        <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                <a href="<?= base_url("activity_category"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            </form>
        </div>
    </div>
</div>