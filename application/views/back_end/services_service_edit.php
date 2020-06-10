<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo base_url('yonetici'); ?>" title="AnaHizmetya Git" class="tip-bottom">
                <i class="icon-home"></i> Ana Hizmet
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
                <li>Yayın durumu <b>Pasif</b> olarak işaretlenen Hizmetlar site içerisinde görüntülenemez.</li>
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
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                           
                            <div class="control-group">
                                <label class="control-label">Hizmet Adı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="service_edit_name" placeholder="Hizmet Adı" value="<?php echo $get_service -> service_title; ?>" required="" />
                                    
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="service_edit_content" class="ckeditor"><?php echo $get_service -> service_text; ?></textarea>
                                    
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Durum *</label>
                                <div class="controls">
                                    <?php
                                        if ($get_service -> service_status):
                                            echo '<label style="font-size: 15px;"><input type="radio" name="service_edit_status" value="1" checked="" /> Aktif</label>';
                                            echo '<label style="font-size: 15px;"><input type="radio" name="service_edit_status" value="0" /> Pasif</label>';
                                        else:
                                            echo '<label style="font-size: 15px;"><input type="radio" name="service_edit_status" value="1" /> Aktif</label>';
                                            echo '<label style="font-size: 15px;"><input type="radio" name="service_edit_status" value="0" checked="" /> Pasif</label>';
                                        endif;
                                    ?>
                                    
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Fotoğraf *</label>
                                <div class="controls">
                                    <input type="file" name="service_edit_photo">
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->
                            
                            <hr>
              
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
