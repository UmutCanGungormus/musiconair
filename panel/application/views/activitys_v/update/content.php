<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz" ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("activity/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <labReferansdı</label>
                                <input class="form-control" placeholder="Referans Adı" name="title" value="<?php echo $item->title; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Etkinlik Kategori</label>
                               <select class="form-control" name="category_id">
                               <?php foreach ($categories as $category){?>
                                <option <?php if($category->id==$item->category_id){echo "selected";}?> value="<?php echo $category->id?>"><?php echo $category->title?> </option>
                               <?php }?>
                               </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("category"); ?></small>
                                <?php } ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Etkinlik Mekan</label>
                                <input class="form-control" placeholder="Etkinlik Mekan Adı" value="<?php echo $item->place; ?>" name="place">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("place"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Etkinlik Şehri</label>
                                <input class="form-control" placeholder="Etkinlik Şehri" value="<?php echo $item->city; ?>" name="city">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("city"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Etkinlik Saati</label>
                                <input class="form-control" type="time" placeholder="Etkinlik Saati" value="<?php echo $item->hour; ?>" name="hour">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("hour"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Etkinlik Bilet Linki</label>
                                <input class="form-control"  placeholder="Etkinlik Bilet Linki" value="<?php echo $item->url; ?>" name="url">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("url"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="content" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Detyalar</label>
                                <textarea name="info" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->info; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="datetimepicker1">Eğitim Tarihi</label>
                                    <input type="hidden" name="date" value="<?php echo $item->date; ?>" id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD HH:mm:ss' }"/>
                                </div><!-- END column -->
                                <div class="col-md-1 image_upload_container">
                                    <img src="<?php echo get_picture($viewFolder,$item->img_url, "255x157"); ?>" class="img img-responsive">
                                </div>
                                <div class="col-md-7 form-group image_upload_container">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                            <a href="<?php echo base_url("activity"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>