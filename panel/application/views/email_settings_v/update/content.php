<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateEmail" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Protokol</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Protokol" name="protocol" value="<?= $item->protocol ?>" required>
    </div>
    <div class="form-group">
        <label>E-Posta Sunucu Bilgisi</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Hostname" name="host" value="<?= $item->host ?>" required>
    </div>
    <div class="form-group">
        <label>Port Numarası</label>
        <input type="text" class="form-control form-control-sm rounded-0" placeholder="Port Numarası" name="port" value="<?= $item->port ?>" required>
    </div>
    <div class="form-group">
        <label>E-Posta Başlık</label>
        <input type="text" class="form-control form-control-sm rounded-0" placeholder="E-Posta Başlık" name="user_name" value="<?= $item->user_name ?>" required>
    </div>
    <div class="form-group">
        <label>E-Posta Adresi (User)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresi (User)" name="user" value="<?= $item->user ?>" required>
    </div>
    <div class="form-group">
        <label>E-Posta Adresine Ait Şifre</label>
        <input type="password" class="form-control form-control-sm rounded-0" placeholder="E-Posta Adresine Ait Şifre" name="password" value="<?= $item->password ?>" required>
    </div>
    <div class="form-group">
        <label>Kimden Gidecek (From)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kimden Gidecek (From)" name="from" value="<?= $item->from ?>" required>
    </div>
    <div class="form-group">
        <label>Kime Gidecek (To)</label>
        <input type="email" class="form-control form-control-sm rounded-0" placeholder="Kime Gidecek (To)" name="to" value="<?= $item->to ?>" required>
    </div>
    <button type="button" data-url="<?= base_url("emailsettings/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#emailModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>