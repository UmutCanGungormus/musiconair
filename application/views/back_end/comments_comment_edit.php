<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo base_url('yonetici'); ?>" title="Anasayfaya Git" class="tip-bottom">
                <i class="icon-home"></i> Ana Sayfa
            </a>
            <a href="<?php echo $page['url']; ?>" class="current"><?php echo $page['name']; ?></a>
        </div>
        <!-- breadcrumb -->

        <h1><?php echo $page['name']; ?></h1>
    </div>
    <!-- content-header -->
  
    <div class="container-fluid">
        <hr>

        <div class="alert alert-info alert-block">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
                <li>Yayın durumu <b>Pasif</b> olarak işaretlenen sayfalar site içerisinde görüntülenemez.</li>
            </ul>
        </div>
    
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post"  enctype="multipart/form-data" class="form-horizontal">
                            <div class="control-group">
                                <label for="icerik" class="control-label">Yorum</label>
                                <div class="controls">
                                    <textarea disabled name="icerik" id="icerik"  class="ckeditor"><?php echo $yorum->text;?></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Durum *</label>
                                <div class="controls">
                                    <?php
                                    if ($yorum -> onay == 1):
                                        echo '<label style="font-size: 15px;"><input type="radio" name="yorum_onay" value="1" checked="" /> Aktif</label>';
                                        echo '<label style="font-size: 15px;"><input type="radio" name="yorum_onay" value="0" /> Pasif</label>';
                                    else:
                                        echo '<label style="font-size: 15px;"><input type="radio" name="yorum_onay" value="1" /> Aktif</label>';
                                        echo '<label style="font-size: 15px;"><input type="radio" name="yorum_onay" value="0" checked="" /> Pasif</label>';
                                    endif;
                                    ?>

                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Gönder</button>
                            </div>
                            <!-- form-actions -->

                        </form>
                    </div>
                    <!-- widget-content nopadding -->
                </div>
                <!-- widget-box -->
            </div>
            <!-- span12 -->
        </div>
        <!-- row-fluid -->
    </div>
    <!-- container-fluid -->
</div>
<!-- content -->
