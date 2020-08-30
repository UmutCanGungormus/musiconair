<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createSocialMediaTalk" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Haber Seç</label>
        <select class="form-control form-control-sm rounded-0" name="news_id" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Widget Başlığı</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık Giriniz" name="title" required>
    </div>
    <div class="form-group">
        <label>Widget İçeriği</label>
        <textarea name="content" class="form-control rounded-0 tinymce" required></textarea>
    </div>
    <div class="form-group">
        <label for="control-demo-6" class="">İçerik Türü</label>
        <div id="control-demo-6" class="">
            <select class="form-control form-control-sm rounded-0 social_media_talk_type_select" name="social_media_talk_type" required>
                <option value="image">Resim</option>
                <option value="video">Video</option>
            </select>
        </div>
    </div><!-- .form-group -->
    <div class="image_container">
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="input-group-prepend">
                <span class="input-group-text">Görsel Seçiniz</span>
            </div>
            <div class="form-control rounded-0 text-truncate" data-trigger="fileinput"><i class="fa fa-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
            <span class="input-group-append">
                <span class=" btn btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Değiştir</span>
                    <input type="hidden"><input type="file" name="img_url">
                </span>
                <a href="#" class="btn btn-outline-danger rounded-0 fileinput-exists" data-dismiss="fileinput">Kaldır</a>
            </span>
        </div>
    </div>
    <div class="video_url_container">
        <div class="form-group">
            <label>Video Url</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
        </div>
    </div>

    <button role="button" data-url="<?= base_url("social_media_talk/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#socialMediaTalkModal')" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
</form>
<script>
    $(document).ready(function() {
        let imageHtml = $("div.image_container").html();
        let videoHtml = $("div.video_url_container").html();
        $("div.video_url_container").html("");
        $(document).on("change", ".social_media_talk_type_select", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if ($(this).val() === "image") {
                $("div.video_url_container").html("");
                $("div.image_container").html(imageHtml);
            } else {
                $("div.image_container").html("");
                $("div.video_url_container").html(videoHtml);
            }
        });
    });
</script>