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

        <?php
            if (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                  Düzenleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                  <h4 class="alert-heading">Başarılı!</h4>
                  Düzenleme işlemi başarılı.</div>';
          endif;
        ?>

        <div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Google Analytics, Yandex Metrika, Facebook Pixel vb traking kodlarını aşağıdaki alana ekleyebilirsiniz.</li>
           </ul>
        </div>
        <!-- alert alert-info alert-block -->

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                        <h5>Ayarlar</h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <div class="widget-box" style="margin: 10px;">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/site-ayarlari'); ?>">Site Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/sosyal-medya-ayarlari'); ?>" >Sosyal Medya Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/e-posta-ayarlari'); ?>">E-Posta Ayarları</a></li>
                                    <li class="active"><a>Harici Kod Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/site-haritasi-ayarlari'); ?>">Site Haritası Ayarları</a></li>
                                </ul>
                            </div>
                            <!-- widget-title -->
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <form action="#" method="post" class="form-horizontal">    

                                        <div class="control-group">
                                            <label class="control-label">Harici Kodlar *</label>
                                            <div class="controls">
                                                <textarea name="external_code" style="min-height: 300px;" class="span11"><?php echo $get_external_code_settings -> setting_site_external_code; ?></textarea>
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
                                <!-- tab-pane -->
                            </div>
                            <!-- widget-content tab-content -->
                        </div>
                        <!-- widget-box -->
                    </div>

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