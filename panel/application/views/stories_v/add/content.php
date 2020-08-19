
<form id="createStory" onsubmit="return false" enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Hikaye Adı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye Adı" name="title" required>
    </div>
    <div class="form-group">
        <label>Hikaye URL</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hikaye URL" name="url">
    </div>
    <div class="form-group">
        <label>Hikaye Kapak Görseli</label>
        <input class="form-control rounded-0" placeholder="Hikaye Kapak Görseli" name="file" type="file" required>
    </div>
    <button data-url="<?= base_url("stories/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#storyModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>