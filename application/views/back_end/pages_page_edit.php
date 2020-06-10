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
        <!-- alert alert-info alert-block -->
    
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post" action="urun-yonetimi/urun-ekle" enctype="multipart/form-data" class="form-horizontal">
                            <div class="control-group">
                                <div class="controls">
                                    <h4>Sayfa Bilgileri</h4>
                                    <b>Sayfa Linki: </b><a target="_blank" href="<?php echo base_url('/'.$get_page -> page_url); ?>"><?php echo base_url('/'.$get_page -> page_url); ?></a><br>
                                    <b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_page -> page_create_time); ?><br>
                                    <b>Güncellenme Tarihi: </b><?php echo $get_page -> page_update_time != '' ? date('d/m/Y - H:i:s', $get_page -> page_update_time) : 'Hiç güncellenmedi'; ?>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->
                           
                            <div class="control-group">
                                <label class="control-label">Sayfa Adı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="page_edit_name" placeholder="Sayfa Adı" value="<?php echo $get_page -> page_title; ?>"  required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Anahtar Kelimeler <span style="font-size: 11px;">(meta)</span></label>
                                <div class="controls">
                                    <input type="text" class="span11" name="page_edit_keyword" placeholder="Anahtar Kelimeler" value="<?php echo $get_page -> page_keywords; ?>" />
                                    
                                </div>
                                <!-- control-group -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Açıklama <span style="font-size: 11px;">(meta)</span></label>
                                <div class="controls">
                                    <input type="text" class="span11" name="page_edit_description" placeholder="Açıklama" value="<?php echo $get_page -> page_description; ?>" />
                                    
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Sayfa Grubu</label>
                                <div class="controls">
                                    <select name="page_edit_group" class="span11" required="">
                                    <?php
                                        foreach ($get_page_groups as $page_group)
                                        {
                                            if ($page_group -> page_group_id == $get_page -> page_group_id)
                                                echo '<option value="'.$page_group -> page_group_id.'" selected>'.$page_group -> page_group_name.'</option>';
                                            else
                                                echo '<option value="'.$page_group -> page_group_id.'">'.$page_group -> page_group_name.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Sayfa Şablonu</label>
                                <div class="controls">
                                    <select name="page_edit_template" class="span11" required="">
                                    <?php
                                        foreach ($get_page_templates as $page_template)
                                        {
                                            if ($page_template -> page_template_id == $get_page -> page_template_id)
                                                echo '<option value="'.$page_template -> page_template_id.'" selected>'.$page_template -> page_template_name.'</option>';
                                            else
                                                echo '<option value="'.$page_template -> page_template_id.'">'.$page_template -> page_template_name.'</option>';
                                        }
                                    ?>
                                    </select>
                                    
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="page_edit_content" class="ckeditor"><?php echo $get_page -> page_content; ?></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Durum *</label>
                                <div class="controls">
                                    <?php
                                        if ($get_page -> page_status == 1):
                                          echo '<label style="font-size: 15px;"><input type="radio" name="page_edit_status" value="1" checked="" /> Aktif</label>';
                                          echo '<label style="font-size: 15px;"><input type="radio" name="page_edit_status" value="0" /> Pasif</label>';
                                        else:
                                          echo '<label style="font-size: 15px;"><input type="radio" name="page_edit_status" value="1" /> Aktif</label>';
                                          echo '<label style="font-size: 15px;"><input type="radio" name="page_edit_status" value="0" checked="" /> Pasif</label>';
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