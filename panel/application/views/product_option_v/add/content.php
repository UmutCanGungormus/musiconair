<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yeni Varyasyon Ekle Ekle
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("product_option/save"); ?>" method="post">
                        <div class="form-group">
                            <label>Varyasyon Başlık</label>
                            <input type="text" class="form-control form-control-sm rounded-0" name="title">
                        </div>

                        <div class="form-group">
                            <label>Varyasyon Eklenecek Kategori </label>
                            <select class="selectpicker form-control form-control-sm rounded-0" name="category_id" data-show-subtext="true" data-live-search="true">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Kaydet</button>
                        <a href="<?= base_url("product_option"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
