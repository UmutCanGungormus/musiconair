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
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">


                            <div class="control-group">
                                <label for="resim" class="control-label">Haber Fotoğrafı *</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim" required="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="baslik" class="control-label">Haber Başlığı *</label>
                                <div class="controls">
                                    <input type="text" name="baslik" id="baslik" required="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="video" class="control-label">Video Embed</label>
                                <div class="controls">
                                    <input type="text" name="video" id="video" placeholder="X7IzLp7av6c">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="yazar">Yazar *</label>
                                <div class="controls">
                                    <select name="yazar" id="yazar" required="">
                                        <?php $writers = $this->db->query("SELECT id,nick,ad FROM site_writers ")->result_array();
                                        foreach ($writers as $writer) {
                                            ?>
                                            <option value="<?php echo $writer['id']; ?>"><?php echo $writer['nick']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label" for="icerik">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="icerik" id="icerik" class="ckeditor"></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label">Resim Durumu *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="resim_goster" value="1"
                                                                           checked=""/> Aktif</label>
                                    <label style="font-size: 13px;"><input type="radio" name="resim_goster"
                                                                           value="0"/> Pasif</label>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Video Durumu *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="video_goster" value="1"
                                                                           checked=""/> Aktif</label>
                                    <label style="font-size: 13px;"><input type="radio" name="video_goster"
                                                                           value="0"/> Pasif</label>
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
