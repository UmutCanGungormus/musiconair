<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <?= "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="widget">
                <div class="widget-body">
                    <form action="<?= base_url("voting_options/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Başlık </label>
                            <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>">
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("title"); ?></small>
                            <?php endif ?>
                        </div>

                        <div class="row">
                            <div class="col-md-1 image_upload_container">
                                <img src="<?= get_picture($viewFolder, $item->img_url); ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9 form-group image_upload_container">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control rounded-0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Üst Kategori</label>
                            <select class="form-control form-control-sm rounded-0" name="voting_id">
                                <option <?= ($item->voting_id == 0 ? "selected" : null) ?> value="0">Ana Kategori</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option <?= ($item->voting_id == $category->id ? "selected" : null) ?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($form_error)) : ?>
                                <small class="float-right input-form-error"> <?= form_error("voting_id"); ?></small>
                            <?php endif ?>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                        <a href="<?= base_url("voting_options"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>