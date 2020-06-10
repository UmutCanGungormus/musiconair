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
                        <h5><?php echo $page['title']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post" action="urun-yonetimi/urun-ekle" enctype="multipart/form-data" class="form-horizontal">
                           
                            <div class="control-group">
                                <label class="control-label">Menü Adı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="menu_add_name" placeholder="Menü Adı" value="<?php echo @$getPage['PageTitle']; ?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Menü Linki *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="menu_add_link" placeholder="Menü Linki" value="<?php echo @$getPage['PageUrl'] != '' ? @base_url($getPage['PageUrl']) : ''; ?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Üst Menü *</label>
                                <div class="controls">
                                    <select name="menu_add_top_menu" class="span11">
                                        <option value="0" selected="">Lütfen Seçin</option>
                                        <?php
                                            function get_menu ($id, $string, $get_menus)
                                            {   

                                                foreach ($get_menus as $key => $value)
                                                {
                                                    if ($value -> menu_top_menu_id == $id):

                                                        echo '<option value="'.$value -> menu_id.'">'.str_repeat('&nbsp;', $string).$value -> menu_name.'</option>';

                                                        get_menu($value -> menu_id, $string + 3, $get_menus);
                                                    endif;
                                                }
                                            }

                                            get_menu(0, 0, $get_menus);
                                        ?>
                                    </select>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Hedef *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="menu_add_target" value="0" checked="" />  Aynı Pencere</label>
                                    <label style="font-size: 13px;"><input type="radio" name="menu_add_target" value="1" />  Yeni Pencere</label>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Durum *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="menu_add_status" value="1" checked="" />  Aktif</label>
                                    <label style="font-size: 13px;"><input type="radio" name="menu_add_status" value="0" />  Pasif</label>
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
