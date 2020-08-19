<form id="updateSlide" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık" name="title" value="<?= $item->title; ?>">
    </div>
    <div class="form-group">
        <label>Açıklama</label>
        <textarea name="description" class="m-0 tinymce" data-plugin="summernote" data-options="{height: 250}"><?= $item->description; ?></textarea>
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
        <label>Buton Kullanımı</label><br>
        <div class="custom-control custom-switch"><input data-id="<?= $item->id ?>" name="allowButton" data-status="<?= ($item->allowButton) ? "checked" : ""; ?>" id="customSwitch<?= $item->id ?>" type="checkbox" <?= ($item->allowButton) ? "checked" : ""; ?> class="custom-control-input button_usage_btn"> <label class="custom-control-label" for="customSwitch<?= $item->id ?>"></label></div>
    </div>
    <div class="button-information-container" style="display : <?= ($item->allowButton) ? "block" : "none"; ?>">
        <div class="form-group">
            <label>Buton Başlık</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Butonun üzerindeki yazı" name="button_caption" value="<?= $item->button_caption; ?>">
        </div>
        <div class="form-group">
            <label>URL Bilgisi</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Butona basıldığında gidilecek olan URL Bilgisi" name="button_url" value="<?= $item->button_url; ?>">
        </div>
    </div>
    <div class="form-group">
        <label>Gönderi Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" placeholder="Gönderi Paylaşım Tarihi" value="<?= $item->sharedAt ?>" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S">
    </div>
    <button role="button" data-url="<?= base_url("slides/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#slideModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>