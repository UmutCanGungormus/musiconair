<form id="updateStory" onsubmit="return false" method="post">
    <div class="form-group">
        <label>Hikaye Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye Adı" name="title" value="<?= $item->title; ?>" required>
    </div>
    <div class="form-group">
        <label>Hikaye URL</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye URL" name="url" value="<?=$item->url?>">
    </div>
    <div class="form-group">
        <label>Hikaye Kapak Görseli</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye Kapak Görseli" name="file" type="file">
    </div>
    <button data-url="<?= base_url("stories/update/$item->id/$item->folder_name"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#storyModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>