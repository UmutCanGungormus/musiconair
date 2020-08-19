<form id="updateHomeBanner" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>">
    </div>
    <div class="form-group">
        <label>Link</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Link" name="url" value="<?= $item->url; ?>">
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

    <button role="button" data-url="<?= base_url("home_banner/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#homeBannerModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>