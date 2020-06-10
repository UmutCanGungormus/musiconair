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
                        <form action="<?php echo base_url("cinema/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Film Adı</label>
                                <input class="form-control" placeholder="Kitap Adı" name="title" value="<?php echo $item->title; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Film Türü</label>
                               <select class="form-control selectpicker" size="4" multiple name="category_id[]" >
                               <?php foreach ($categories as $category){?>
                                <option <?php foreach (json_decode($item->category_id) as $cat){ if($category->id==$cat){echo "selected";} } ?> value="<?php echo $category->id?>"><?php echo $category->title?> </option>
                               <?php }?>
                               </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("category"); ?></small>
                                <?php } ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Film Dili</label>
                                <input class="form-control" placeholder="Film Dili" value="<?php echo $item->language; ?>" name="language">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("language"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label> Yönetmen</label>
                                <input class="form-control" placeholder="Yönetmen" value="<?php echo $item->director; ?>" name="director">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("director"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Senarist</label>
                                <input class="form-control" type="text" placeholder="Senarist" value="<?php echo $item->scriptwriter; ?>" name="scriptwriter">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("scriptwriter"); ?></small>
                                <?php } ?>
                            </div>
                          
                            <div class="form-group">
                                <label>Yapım</label>
                                <input class="form-control"  placeholder="Yapım" value="<?php echo $item->production; ?>" name="production">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("production"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Oyuncular</label>
                                <input class="form-control"  placeholder="Oyuncular" value="<?php echo $item->players; ?>" name="players">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("players"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Bilet Alma Linki</label>
                                <input class="form-control"  placeholder="Bilet Alma Linki" value="<?php echo $item->url; ?>" name="url">
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
                            <a href="<?php echo base_url("cinema"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>