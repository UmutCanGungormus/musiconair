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
                                <label for="resim" class="control-label">Aktivite Fotoğrafı *</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim" required="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Aktivite Türü *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="tur" placeholder="Konser" value="" required="" />
                                    <span style="cursor: help;" title="Aktivite Türü Örneğin Konser" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Sanatçı*</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="sanatci" placeholder="Sanatçı" value="" required="" />
                                    <span style="cursor: help;" title="Hadise" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
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
                                <label class="control-label" for="tarih">Tarih *</label>
                                <div class="controls">
                                    <input type="datetime-local" id="tarih" name="tarih" value="" required="">
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="detaylar">detaylar</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="detaylar" id="detaylar"></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="fiyatlar">fiyatlar</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="fiyatlar" id="fiyatlar" ></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Mekan </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="mekan" placeholder="Joly Joker" value=""/>
                                    <span style="cursor: help;" title="Mekan" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Şehir</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="sehir" placeholder="İstanbul" value="" required="" />
                                    <span style="cursor: help;" title="Şehir" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label">Satış Adresi *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="url" placeholder="https://www.biletix.com" value="" required="" />
                                    <span style="cursor: help;" title="Satış İnternet Adresi" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
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
