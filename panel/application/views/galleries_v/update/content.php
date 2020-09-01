<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateGallery" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Galeri Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Galeri Adı" name="title" value="<?= $item->title; ?>" required>
    </div>
    <div class="form-group row">
        <div class="col-3">
            <img src="<?= get_picture("$viewFolder/{$item->gallery_type}", $item->img_url) ?>" class="img-fluid" alt="<?= $item->title ?>">
        </div>
        <div class="col-9">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Galeri Kapak Görseli</span>
                </div>
                <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                        <input type="hidden"><input type="file" name="img_url">
                    </span>
                    <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= $item->sharedAt ?>" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button data-url="<?= base_url("galleries/update/$item->id/$item->gallery_type/$item->folder_name"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#galleryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>