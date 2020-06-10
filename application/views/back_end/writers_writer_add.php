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
                                <label for="resim" class="control-label">Yazar Fotoğrafı *</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim" required="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Yazar Nick *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="nick" placeholder="spencer" value="" required="" />
                                    <span style="cursor: help;" title="Yazarın Sayfada Görüntülenecek İsmi" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yazar Görevi *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="mission" placeholder="spencer" value="" required="" />
                                    <span style="cursor: help;" title="Yazarın Sayfada Görüntülenecek Görevi" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yazar Adı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="ad" placeholder="Orhan Pamuk" value="" required="" />
                                    <span style="cursor: help;" title="Yazarın Ad ve Soyadını Girin(aralarında bir boşluk olucak)" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yazar Maili *</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="mail" placeholder="example@domain.com" value="" required="" />
                                    <span style="cursor: help;" title="Yazarın Mail Adresi" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Yazar Şifre *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="sifre" placeholder="" value="" required="" />
                                    <span style="cursor: help;" title="***" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
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
