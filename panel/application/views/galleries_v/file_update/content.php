<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        <img src="<?php echo base_url("uploads/galleries_v/images/$gallery->folder_name/350x216/"),$item->url?>" alt="">  
            <?php echo " </br>
            </br><b>kaydını düzenliyorsunuz</b>" ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("galleries/file_update/$item->id/$category"); ?>" method="post">
                        <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description?></textarea>
                            </div>
 
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                            <a href="<?php echo base_url("galleries"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>