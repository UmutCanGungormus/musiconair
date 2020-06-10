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
                        <form action="<?php echo base_url("book/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kitap Adı</label>
                                <input class="form-control" placeholder="Kitap Adı" name="title" value="<?php echo $item->title; ?>">
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
                                <label>Yazar Adı</label>
                                <input class="form-control" placeholder="Yazar Adı" value="<?php echo $item->writer_name; ?>" name="writer_name">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("writer_name"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label> Kitap Dil</label>
                                <input class="form-control" placeholder="Dil" value="<?php echo $item->language; ?>" name="language">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("language"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Çevirmen</label>
                                <input class="form-control" type="text" placeholder="Çevirmen" value="<?php echo $item->translator; ?>" name="translator">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("translator"); ?></small>
                                <?php } ?>
                            </div>
                          
                            <div class="form-group">
                                <label>Sayfa Sayısı</label>
                                <input class="form-control"  placeholder="Sayfa Sayısı" value="<?php echo $item->page_count; ?>" name="page_count">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("page_count"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>İlk Baskı</label>
                                <input class="form-control"  placeholder="İlk Baskı" value="<?php echo $item->first_print; ?>" name="first_print">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("first_print"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Kitap Linki</label>
                                <input class="form-control"  placeholder="Kitap Linki" value="<?php echo $item->url; ?>" name="url">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("url"); ?></small>
                                <?php } ?>
                            </div>
                          
                            <div class="form-group">
                                <label>Detyalar</label>
                                <textarea name="content" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->content; ?></textarea>
                            </div>
                            <div class="row">
                            
                                <div class="col-md-1 image_upload_container">
                                    <img src="<?php echo get_picture($viewFolder,$item->img_url, "255x157"); ?>" class="img img-responsive">
                                </div>
                                <div class="col-md-7 form-group image_upload_container">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                            <a href="<?php echo base_url("book"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>