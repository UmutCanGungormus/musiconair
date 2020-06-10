<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Kullanıcı Rolü Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("user_role/save"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Başlık</label>
                                <input class="form-control" placeholder="Başlık" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                           
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("user_role"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>