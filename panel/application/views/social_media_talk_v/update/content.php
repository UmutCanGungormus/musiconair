<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateSocialMediaTalk" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Haber Seç</label>
        <select class="form-control form-control-sm rounded-0" name="news_id" required>
            <?php foreach ($categories as $category) : ?>
                <option <?= ($item->news_id == $category->id ? "selected" : null) ?> value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Widget Başlık</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Başlık Giriniz" value="<?= $item->title ?>" name="title" required>
    </div>
    <div class="form-group">
        <label>Widget İçeriği</label>
        <textarea name="content" class="form-control rounded-0 tinymce" required><?=$item->content?></textarea>
    </div>
    <div class="form-group">
        <label for="control-demo-6" class="">Widget Türü</label>
        <div id="control-demo-6" class="">
            <select class="form-control form-control-sm rounded-0 social_media_talk_type_select_update" name="social_media_talk_type" required>
                <option <?= ($item->social_media_talk_type == "image") ? "selected" : null; ?> value="image">Resim</option>
                <option <?= ($item->social_media_talk_type == "video") ? "selected" : null; ?> value="video">Video</option>
            </select>
        </div>
    </div><!-- .form-group -->

    <div class="image_container">
        <div class="row">
            <div class="col-3">
                <img src="<?= get_picture($viewFolder, $item->img_url); ?>" class="img-fluid">
            </div>
            <div class="col-9">
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
        </div>
    </div>
    <div class="video_url_container">
        <div class="form-group">
            <label>Video Url</label>
            <input class="form-control form-control-sm rounded-0" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url" value="<?= $item->video_url; ?>">
        </div>
    </div>
    <div class="form-group">
        <label>Paylaşım Tarihi</label>
        <input type="text" name="sharedAt" value="<?=$item->sharedAt?>" placeholder="Paylaşım Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" data-default-date="<?= $item->sharedAt ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <button role="button" data-url="<?= base_url("social_media_talk/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#socialMediaTalkModal')" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
</form>

<script>
    $(document).ready(function() {
        let imageHtmlUpdate = $("div.image_container").html();
        let videoHtmlUpdate = $("div.video_url_container").html();
        <?php if($item->social_media_talk_type == "image"):?>
            $("div.video_url_container").html("");
        <?php else:?>
            $("div.image_container").html("");
        <?php endif;?>
        $(document).on("change", ".social_media_talk_type_select_update", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if ($(this).val() === "image") {
                $("div.video_url_container").html("");
                $("div.image_container").html(imageHtmlUpdate);
            } else {
                $("div.image_container").html("");
                $("div.video_url_container").html(videoHtmlUpdate);
            }
        });
    });
</script>