<form id="createEmail" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Protokol</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Protokol" name="protocol" required>
    </div>
    <div class="form-group">
        <label>E-Posta Sunucu Bilgisi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hostname" name="host" required>
    </div>
    <div class="form-group">
        <label>Port Numarası</label>
        <input type="text" class="form-control form-control-sm rounded-0" placeholder="Port Numarası" name="port" required>
    </div>
    <div class="form-group">
        <label>E-Posta Başlık</label>
        <input type="text" class="form-control form-control-sm rounded-0" placeholder="E-Posta Başlık" name="user_name" required>
    </div>
    <div class="form-group">
        <label>E-Posta Adresi (User)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresi (User)" name="user" required>
    </div>
    <div class="form-group">
        <label>E-Posta Adresine Ait Şifre</label>
        <input type="password" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresine Ait Şifre" name="password" required>
    </div>
    <div class="form-group">
        <label>Kimden Gidecek (From)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kimden Gidecek (From)" name="from" required>
    </div>
    <div class="form-group">
        <label>Kime Gidecek (To)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kime Gidecek (To)" name="to" required>
    </div>
    <button data-url="<?= base_url("emailsettings/save"); ?>" type="button" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a onclick="closeModal('#emailModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>