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
                                    <h4>Menü Bilgileri</h4>
                                    <b>Oluşturulma Tarihi: </b><?php echo date('d/m/Y - H:i:s', $get_menu -> menu_create_time); ?><br>
                                    <b>Güncellenme Tarihi: </b><?php echo $get_menu -> menu_edit_time != '' ? date('d/m/Y - H:i:s', $get_menu -> menu_edit_time) : 'Hiç güncellenmedi'; ?>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Menü Adı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="menu_edit_name" placeholder="Menü Adı" required="" value="<?php echo $get_menu -> menu_name; ?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Menü Linki *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="menu_edit_link" placeholder="Menü Linki" required="" value="<?php echo $get_menu -> menu_link; ?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Üst Menü *</label>
                                <div class="controls">
                                    <select name="menu_edit_top_menu" class="span11">
                                        <option value="0">Lütfen Seçin</option>
                                        <?php
                                            function getMenu ($id, $string, $get_menus, $get_menu)
                                            {  
                                                foreach ($get_menus as $key => $value)
                                                {
                                                    if ($value -> menu_top_menu_id == $id):
                                                        if ($value -> menu_id != $get_menu -> menu_id):

                                                            if ($value -> menu_id == $get_menu -> menu_top_menu_id):
                                                                echo '<option value="'.$value -> menu_id.'" selected>'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';
                                                                getMenu($value -> menu_id, $string + 3, $get_menus, $get_menu);
                                                            else:
                                                                echo '<option value="'.$value -> menu_id.'">'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';
                                                                getMenu($value -> menu_id, $string + 3, $get_menus, $get_menu);
                                                            endif;
                                                        endif;
                                                    endif;
                                                }
                                            }

                                            getMenu(0, 0, $get_menus, $get_menu);
                                        ?>
                                    </select>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Hedef *</label>
                                <div class="controls">
                                    <?php
                                        if ($get_menu -> menu_target == 0):
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_target" value="0" checked="" /> Aynı Pencere</label>';
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_target" value="1" /> Yeni Pencere</label>';
                                        else:
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_target" value="0" /> Aynı Pencere</label>';
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_target" value="1" checked="" /> Yeni Pencere</label>';
                                        endif;
                                    ?>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Durum *</label>
                                <div class="controls">
                                    <?php
                                        if ($get_menu -> menu_status == 1):
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_status" value="1" checked="" /> Aktif</label>';
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_status" value="0" /> Pasif</label>';
                                        else:
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_status" value="1" /> Aktif</label>';
                                            echo '<label style="font-size: 13px;"><input type="radio" name="menu_edit_status" value="0" checked="" /> Pasif</label>';
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