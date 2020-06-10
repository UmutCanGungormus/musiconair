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
        <p style="margin: 0px 20px;">Eklenen sayfa sayısı: <b><?php echo count($get_comments); ?></b></p>
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



        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-th"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30">ID</th>
                                    <th>YORUM</th>
                                    <th>AD/SOYAD/NICKNAME</th>
                                    <th>HABER/ETKİNLİK vs.</th>
                                    <th>DURUM</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="55">SİL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($get_comments as $value): ?>
                          
                                <tr>
                                    <td style="text-align: center;"><?php echo $value ->id ?></td>
                                    <td><?php echo $value ->text;?></td>
                                    <td>
                                        <?php $yorum_yapan = $this->db->query("select * from site_users where id = $value->yorum_yapan_id")->row();?>
                                        <?php echo $yorum_yapan->ad." / ".$yorum_yapan->soyad." / ".$yorum_yapan->nick;?>
                                    </td>

                                    <td><?php
                                        $iliski=null;
                                            if($value->iliski_tip=="haber"){
                                                $iliski= $this->db->query("select * from site_news where id = $value->iliski_id")->row();
                                                echo $iliski->baslik;
                                            }
                                        ?></td>
                                    <td class="text-center" style="text-align: center!important;"><?php if($value->onay){
                                        ?>
                                               <span class="btn-success"><i class="icon-unlock"></i> &nbsp;Aktif</span>
                                        <?php } else{ ?>
                                          <span class="btn-danger"><i class="icon-lock"></i> &nbsp;Pasif</span>
                                        <?php }?>
                                    </td>
                                    <td class="center">
                                        <a href="<?php echo base_url('yonetici/yorum-yonetimi/yorum-duzenle/'.$value -> id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td class="center">
                                        <a href="#Delete<?php echo $value -> id; ?>" data-toggle="modal" class="btn-danger">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                </tr>

                                <div id="Delete<?php echo $value -> id; ?>" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>yorum SİL</h3>
                                    </div>
                                    <!-- modal-header -->

                                    <div class="modal-body">
                                        <p>Bu yorumyi silmek istediğinize emin misiniz?</p>
                                        <h4><?php echo $value ->text; ?></h4>
                                    </div>
                                    <!-- modal-body -->

                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="<?php echo base_url('yonetici/yorum-yonetimi/yorum-sil/'.$value -> id); ?>">Sil</a>
                                        <a data-dismiss="modal" class="btn" href="#">Geri Dön</a>
                                    </div>
                                    <!-- modal-footer -->
                                </div>
                                <!-- Delete -->

                            <?php endforeach; ?>
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
<!-- content -->
