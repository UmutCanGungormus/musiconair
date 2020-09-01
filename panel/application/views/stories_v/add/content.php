<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<form id="createStory" onsubmit="return false" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Hikaye Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Hikaye URL</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye URL" name="url">
    </div>
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="input-group-prepend">
            <span class="input-group-text">Hikaye Kapak Görseli Seçiniz</span>
        </div>
        <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
        <span class="input-group-append">
            <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                <input type="hidden"><input type="file" name="file" required>
            </span>
            <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
        </span>
    </div>
    <button data-url="<?= base_url("stories/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#storyModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>