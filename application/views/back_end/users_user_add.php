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
                                <label class="control-label">Takma Ad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="nick" placeholder="Takma Ad" value="" required="" />
                                    <span style="cursor: help;" title="Sitede Görüntülenecek İsim" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Ad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="ad" placeholder="Mehmet" value="" required="" />
                                    <span style="cursor: help;" title="Ad" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Soyad *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="soyad" placeholder="Aksoy" value="" required="" />
                                    <span style="cursor: help;" title="Soyad" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Mail *</label>
                                <div class="controls">
                                    <input type="email" class="span11" name="mail" placeholder="mail@domain.com" value="" required="" />
                                    <span style="cursor: help;" title="Mail Adresi" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Şifre *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="sifre" placeholder="pass123pass" value="" required="" />
                                    <span style="cursor: help;" title="Şifre" id="example" data-content="" data-placement="top" data-toggle="popover">Açıkla?</span>
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
