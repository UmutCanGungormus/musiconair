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
        <p style="margin: 0px 20px;">Eklenen sayfa sayısı: <b><?php echo count($get_news); ?></b></p>
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

        
        <a href="<?php echo base_url('yonetici/haber-yonetimi/haber-ekle'); ?>" class="btn-success" style="float: right;">
            <i class="icon-plus"></i> HABER EKLE
        </a>

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
                                    <th width="10">ID</th>
                                    <th width="10">BAŞLIK</th>
                                    <th width="100">RESİM</th>
                                    <th width="10">RESİM GÖRÜNÜRLÜĞÜ</th>
                                    <th width="80">DÜZENLE</th>
                                    <th width="80" >SİL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($get_news as $value): ?>
                          
                                <tr>
                                    <td style="text-align: center;"><?php echo $value ->id ?></td>
                                    <td><?php echo $value ->baslik; ?></td>
                                    <td style="text-align: center"><img width="115" height="115" src="<?php echo base_url("public/uploads/news/".$value->id.".jpg");?>" alt=""></td>
                                    <td><?php echo $value ->resim_goster; ?></td>
                                    <td style="text-align: center">
                                        <a href="<?php echo base_url('yonetici/haber-yonetimi/haber-duzenle/'.$value -> id); ?>" class="btn-success">
                                            <i class="icon-edit"></i> DÜZENLE
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="#Delete<?php echo $value -> id; ?>" data-toggle="modal" class="btn-danger">
                                            <i class="icon-trash"></i> SİL
                                        </a>
                                    </td>
                                </tr>

                                <div id="Delete<?php echo $value -> id; ?>" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>haber SİL</h3>
                                    </div>
                                    <!-- modal-header -->

                                    <div class="modal-body">
                                        <p>Bu haberyi silmek istediğinize emin misiniz?</p>
                                        <h4><?php echo $value ->baslik; ?></h4>
                                    </div>
                                    <!-- modal-body -->

                                    <div class="modal-footer">
                                        <a class="btn btn-primary" href="<?php echo base_url('yonetici/haber-yonetimi/haber-sil/'.$value -> id); ?>">Sil</a>
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
