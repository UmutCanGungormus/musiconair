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
                                <label for="resim" class="control-label">Video Fotoğrafı</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Ad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="ad" placeholder="..." value="<?php echo $video->ad;?>" required="" />
                                    <span style="cursor: help;" title="Ad" id="example" data-content="Video İsmi" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yapımcı </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="yapimci" placeholder="..." value="<?php echo $video->yapimci;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="cikistarih">Çıkış Tarihi *</label>
                                <div class="controls">
                                    <input type="date" name="cikistarih" value="<?php echo $video->cikis_tarih;?>" id="cikistarih">
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="haber">Haber </label>
                                <div class="controls">
                                    <select name="haber" id="haber">
                                        <?php foreach ($haberler as $item) {?>
                                            <option <?php if ($item->id==$video->haber_id){echo "selected='selected'";} ?> value="<?php echo $item->id;?>"><?php echo $item->baslik;?></option>
                                        <?php }?>
                                    </select>
                                    <span style="cursor: help;" title="Haber" id="example" data-content="İlişkin Haberi Seçin" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label" for="durum">Video Aktifliği *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="durum" value="1"
                                                                          <?php if($video->durum){echo "checked='checked'";} ?> /> Aktif</label>
                                    <label style="font-size: 13px;"><input type="radio" name="durum"
                                            <?php if(!$video->durum){echo "checked='checked'";} ?>  value="0"/> Pasif</label>
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
