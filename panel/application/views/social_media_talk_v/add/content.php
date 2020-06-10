<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Sosyal Medya Widget Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("social_media_talk/save"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Haber Seç</label>
                                    <select class="form-control" name="news_id">
                                    <?php foreach($categories as $category){?>
                                    <option value="<?php echo $category->id?>"><?php echo $category->title?></option>
                                    <?php }?>
                                    </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("news_id"); ?></small>
                                <?php } ?>
                            </div>
                       
                            <div class="form-group">
                                <label for="control-demo-6" class="">İçerik Türü</label>
                                <div id="control-demo-6" class="">
                                    <select class="form-control social_media_talk_type_select" name="social_media_talk_type">
                                        <option <?php echo (isset($social_media_talk_type) && $social_media_talk_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
                                        <option <?php echo (isset($social_media_talk_type) && $social_media_talk_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                    </select>
                                </div>
                            </div><!-- .form-group -->
                        <?php if (isset($form_error)) { ?>
                            <div class="form-group image_upload_container" style="display: <?php echo ($social_media_talk_type == "image") ? "block" : "none"; ?>">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                            <div class="form-group video_url_container" style="display: <?php echo ($social_media_talk_type == "video") ? "block" : "none"; ?>">
                                <label>Video Url</label>
                                <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("video_url"); ?></small>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="form-group image_upload_container">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                            <div class="form-group video_url_container">
                                <label>Video Url</label>
                                <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                            </div>
                        <?php } ?>
                      
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("social_media_talk"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>