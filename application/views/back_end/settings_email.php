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
                                    <li class="active"><a>E-Posta Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/harici-kod-ayarlari'); ?>">Harici Kod Ayarları</a></li>
                                    <li><a href="<?php echo base_url('yonetici/ayarlar/site-haritasi-ayarlari'); ?>">Site Haritası Ayarları</a></li>
                                </ul>
                            </div>
                            <!-- widget-title -->
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <form action="#" method="post" class="form-horizontal">    

                                        <div class="control-group">
                                            <label class="control-label">Protokol</label>
                                            <div class="controls">                                                
                                                <input type="text" class="span11" name="site_settings_email_protocol" placeholder="Protokol" value="<?php echo $get_settings_email -> email_setting_protocol; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Sunucu Adresi</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_email_server_adress" placeholder="hÖrn; smtp.yandex.com" value="<?php echo $get_settings_email -> email_setting_smtp_host; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Sunucu Port Numarası</label>
                                            <div class="controls">
                                                <input type="number" class="span11" name="site_settings_email_server_port" placeholder="Örn; 587" value="<?php echo $get_settings_email -> email_setting_smtp_port; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Şifreleme</label>
                                            <div class="controls">
                                                 <select name="site_settings_email_crypto" class="span11">
                                                <?php
                                                    if ($get_settings_email -> email_setting_crypto == 'tls'):
                                                        echo '<option value="tls" selected>TLS</option>';
                                                    else:
                                                        echo '<option value="tls">TLS</option>';
                                                    endif;

                                                    if ($get_settings_email -> email_setting_crypto == 'ssl'):
                                                        echo '<option value="ssl" selected>SSL</option>';
                                                    else:
                                                        echo '<option value="ssl">SSL</option>';
                                                    endif;
                                                ?>
                                                </select>
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">Ad Soyad *</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="site_settings_name_surname" placeholder="Ad Soyad" value="<?php echo $get_settings_email -> email_setting_name_surname; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">E-Posta Adresi</label>
                                            <div class="controls">
                                                <input type="email" class="span11" name="site_settings_user" placeholder="Örn; info@adres.com" value="<?php echo $get_settings_email -> email_setting_smtp_user; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="control-group">
                                            <label class="control-label">E-Posta Şifresi</label>
                                            <div class="controls">
                                                <input type="password" class="span11" name="site_settings_user_password" placeholder="************" value="<?php echo $get_settings_email -> email_setting_password; ?>" />
                                            </div>
                                            <!-- controls -->
                                        </div>
                                        <!-- control-group -->

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">Kaydet</button>
                                            <a href="#TestEmail" data-toggle="modal" class="btn btn-primary">
                                                Sınama E-Postası Gönder
                                            </a>
                                        </div>
                                        <!-- form-actions -->
                                    </form>

                                    <div id="TestEmail" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>SINAMA E-POSTASI GÖNDER</h3>
                                        </div>
                                        <!-- modal-header -->

                                        <div class="modal-body">
                                           <p>- Sınama e-postasının gönderileceği e-posta adresini aşağıdaki alana yazın.<br>
                                           - Gönderme işlemi başarılı olursa, gelen epostada gönderici olarak <b><?php echo $get_settings_email -> email_setting_smtp_user; ?></b> adresi görünücektir.</p>
                                           <input type="text" name="test_mail" required="" class="span12">
                                        </div>
                                        <!-- modal-body -->

                                        <div class="modal-footer">
                                            <div class="loader" style="float: left; display: none;"></div>
                                            <a class="btn btn-success test-mail" data-url="<?php echo base_url('yonetici/ayarlar/sinama-e-postasi-gonder'); ?>" href="#">Gönder</a>
                                            <a data-dismiss="modal" class="btn " href="#">Geri Dön</a>
                                        </div>
                                        <!-- modal-footer -->
                                    </div>
                                    <!-- TestEmail -->
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