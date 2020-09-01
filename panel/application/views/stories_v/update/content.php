<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="updateStory" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Hikaye Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye Adı" name="title" value="<?= $item->title; ?>" required>
    </div>
    <div class="form-group">
        <label>Hikaye URL</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye URL" name="url" value="<?= $item->url ?>">
    </div>
    <div class="row">
        <div class="col-3">
            <img class="img-fluid" src="<?=get_picture("stories_v/{$item->folder_name}/covers",$item->img_url)?>" alt="<?=$item->title?>">
        </div>
        <div class="col-9">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Hikaye Kapak Görseli</span>
                </div>
                <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                        <input type="hidden"><input type="file" name="file">
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
    <button data-url="<?= base_url("stories/update/$item->id/$item->folder_name"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#storyModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>