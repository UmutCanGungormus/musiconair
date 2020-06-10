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
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
                <li>Site Adı en fazla <b>50 karakter</b> uzunluğunda olmalıdır.</li>
                <li>Anahtar kelimeler aralarına virgül koyularak en fazla <b>11 adet</b> yazılmalıdır</li>
                <li>Site açıklaması en fazla <b>170 karakter</b> uzunluğunda olmalıdır.</li>
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
                                    <li class="active"><a>Site Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/sosyal-medya-ayarlari'); ?>" >Sosyal Medya Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/e-posta-ayarlari'); ?>">E-Posta Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/harici-kod-ayarlari'); ?>">Harici Kod Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/site-haritasi-ayarlari'); ?>">Site Haritası Ayarları</a></li>
                                </ul>
                            </div>
                            <!-- widget-title -->
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <form action="#" method="post" class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">Site adı *</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_name" placeholder="Örn; Firma adı" value="<?php echo $get_site_settings -> setting_site_name; ?>" required="" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Site Anahtar Kelimeleri</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_keyword" placeholder="Örn; izmir ofis mobilyası, köşe takımı, yatak odası takımı" value="<?php echo $get_site_settings -> setting_site_keywords; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Site Açıklaması</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_description" placeholder="Örn; Firmayı tanıtan kısa bir yazı" value="<?php echo $get_site_settings -> setting_site_description; ?>" />
                                                <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Telefon Numarası</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_phone" placeholder="Örn; 0232 232 23 32" value="<?php echo $get_site_settings -> setting_site_phone; ?>" required="" />
                                                <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">E-Posta Adresi</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_email" placeholder="info@siteadresi.com" value="<?php echo $get_site_settings -> setting_site_email; ?>" required="" />
                                                <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Adres</label>
                                            <div class="controls">
                                                <textarea class="span11" rows="6" name="site_settings_adress"><?php echo $get_site_settings -> setting_site_adress; ?></textarea>
                                                <span style="cursor: help;" title="Sayfa Başlığı" id="example" data-content="" data-placement="top" data-toggle="popover">&nbsp;Nedir?</span>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->
                              
                                        <div class="control-group">
                                            <label class="control-label">Yayın Durumu *</label>
                                            <div class="controls">
                                            <?php
                                                if ($get_site_settings -> setting_site_status == 1):
                                                    echo '<label style="font-size: 15px;"><input type="radio" name="site_settings_status" value="1" checked="" />  Aktif</label>';
                                                    echo '<label style="font-size: 15px;"><input type="radio" name="site_settings_status" value="0" />  Pasif</label>';
                                                else:
                                                    echo '<label style="font-size: 15px;"><input type="radio" name="site_settings_status" value="1" />  Aktif</label>';
                                                    echo '<label style="font-size: 15px;"><input type="radio" name="site_settings_status" value="0" checked="" />  Pasif</label>';
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