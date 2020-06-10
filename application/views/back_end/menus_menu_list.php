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
        <p style="margin: 0px 20px;">Eklenen menü sayısı: <b><?php echo count($get_menus); ?></b></p>
    </div>
    <!-- content-header -->

    <div class="container-fluid">
        <hr>
        <?php
            if (@$this -> input -> get('addAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Ekleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('addAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Ekleme işlemi yapılırken bir hata oluştu.</div>';
            endif;

            if (@$this -> input -> get('editAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Düzenleme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('editAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Düzenleme işlemi yapılırken bir hata oluştu.</div>';
            endif;

            if (@$this -> input -> get('deleteAction') == 'true'):
                echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Başarılı!</h4>
                Silme işlemi başarılı.</div>';
            elseif (@$this -> input -> get('deleteAction') == 'false'):
                echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">Hata!</h4>
                Silme işlemi yapılırken bir hata oluştu.</div>';
            endif;
        ?>

        <form method="get" action="<?php echo base_url('yonetici/menu-yonetimi/menu-ara'); ?>">
            <input type="text" name="kelime" class="span8" style="float: left;" placeholder="Menü adı" required="" />
        </form>

        <a href="<?php echo base_url('yonetici/menu-yonetimi/menu-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> MENÜ EKLE
        </a>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-th"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->
                    
                    <div class="widget-content nopadding">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th><span style="float: left;">MENÜ ADI</span></th>
                                    <th><span style="float: left;">MENÜ LİNKİ</span></th>
                                    <th width="120">OLUŞTURULMA TARİHİ</th>
                                    <th width="30">SIRALAMA</th>
                                    <th width="60">DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            
                            <tbody id="sortable" data-url="<?php echo base_url('yonetici/menu-yonetimi/menu-sirala'); ?>">
                               <tr>
                                    <td style="text-align: center;">-</td>
                                    <td>Anasayfa</td>
                                    <td>
                                        <?php echo base_url(); ?>
                                        <a style="float: right;" target="_blank" title="Adrese git" class="tip-bottom" href="<?php echo base_url(); ?>"><i class="icon-external-link"></i></a>
                                        <span style="float: right;" onclick="copy('index')" title="Adresi kopyala" class="tip-bottom"><i class="icon-copy" style="cursor: pointer;"></i>&nbsp;&nbsp;</span>
                                        <input type="text" style="opacity: 0; height: 0px" id="index" value="<?php echo base_url(); ?>">
                                    </td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                </tr>
                                <?php
                                    function get_menu ($id, $string, $get_menus)
                                    {   
                                        foreach ($get_menus as $key => $value)
                                        {
                                            if ($value -> menu_top_menu_id == $id):
                                ?>
                                <tr id="rank_<?php echo $value -> menu_id ?>" <?php if ($value -> menu_status == 0) echo 'bgcolor="f2dede"'; ?>>
                                    <td style="text-align: center;"><?php echo $value -> menu_id ?></td>
                                    <td>
                                        <?php
                                            echo str_repeat('&nbsp;&nbsp;', $string).$value -> menu_name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $value -> menu_link; ?>
                                        <a style="float: right;" target="_blank" title="Adrese git" class="tip-bottom" href="<?php echo $value -> menu_link; ?>"><i class="icon-external-link"></i></a>
                                        <span style="float: right;" onclick="copy(<?php echo $value -> menu_id; ?>)" title="Adresi kopyala" class="tip-bottom"><i class="icon-copy" style="cursor: pointer;"></i>&nbsp;&nbsp;</span>
                                        <input type="text" style="opacity: 0; height: 0px" id="<?php echo $value -> menu_id; ?>" value="<?php echo $value -> menu_link; ?>">
                                    </td>

                                    <td><?php echo date('d/m/Y - H:i:s', $value -> menu_create_time); ?></td>
                                    <td style="text-align: center; cursor: move;" class="sortable">
                                        <i class="icon-move" title="Sürükle"></i>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                            if ($value -> menu_status == 1)
                                                echo '<span class="label label-info"><i class="icon-ok"></i> Aktif</span>';
                                            else
                                                echo '<span class="label label-important"><i class="icon-remove"></i> Pasif</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('yonetici/menu-yonetimi/menu-duzenle/'.$value -> menu_id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#Delete<?php echo $value -> menu_id; ?>" data-toggle="modal" class="btn-danger">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                </tr>

                                <div id="Delete<?php echo $value -> menu_id; ?>" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>MENÜ SİL</h3>
                                    </div>
                                    <!-- modal-header -->

                                    <div class="modal-body">
                                        Bu menüyü silmek istediğinize emin misiniz?
                                        <p><b><?php echo $value -> menu_name ?></b></p>
                                    </div>
                                    <!-- modal-body -->

                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="<?php echo base_url('yonetici/menu-yonetimi/menu-sil/'.$value -> menu_id); ?>">Sil</a>
                                        <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                                    </div>
                                    <!-- modal-footer -->
                                </div>
                                <!-- Delete -->
                                <?php
                                        get_menu($value -> menu_id, $string + 3, $get_menus);
                                   endif;
                                        }
                                    }
                                    get_menu(0, 0, $get_menus);
                                ?>
                             </tbody>
                        </table>
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

