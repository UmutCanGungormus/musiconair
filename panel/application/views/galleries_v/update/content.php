<form id="updateGallery" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title" value="<?= $item->title; ?>" required>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <?php if(!empty($item->img_url)):?>
            <img src="<?=get_picture($viewFolder,$item->img_url) ?>" class="img-fluid" alt="<?=$item->title?>">
            <?php endif;?>
        </div>
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
            <div class="fileinput fileinput-new input-group input-group-sm" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Galeri Kapak Görseli</span>
                </div>
                <div class="form-control form-control-sm rounded-0 text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-sm btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                        <input type="hidden"><input type="file" name="img_url">
                    </span>
                    <a href="#" class="btn btn-sm btn-secondary fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
    <button data-url="<?= base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#galleryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>