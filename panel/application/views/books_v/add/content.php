<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Kitap Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("book/save"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                      
                                <label>Kitap Adı</label>
                                <input class="form-control" placeholder="Kitap Adı" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                       
                            <div class="form-group">
                                <label>Kitap Kategori</label>
                               <select class="form-control" name="category_id">
                               <?php foreach ($categories as $category){?>
                                <option value="<?php echo $category->id?>"><?php echo $category->title?> </option>
                               <?php }?>
                               </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("category"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Yazar Adı</label>
                                <input class="form-control" placeholder="Yazar Adı" name="writer_name">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("writer_name"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Kitap Dili</label>
                                <input class="form-control" placeholder="Kitap Dili" name="language">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("language"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Çevirmen</label>
                                <input class="form-control" placeholder="Çevirmen" name="translator">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("translator"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Sayfa Sayısı</label>
                                <input class="form-control" type="text" placeholder="Sayfa Sayısı" name="page_count">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("page_count"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>İlk Baskı</label>
                                <input class="form-control"  placeholder="İlk Baskı" name="first_print">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("first_print"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Kitap Satın Alma Linki</label>
                                <input class="form-control"  placeholder="Kitap Satın Alma Linki" name="url">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("url"); ?></small>
                                <?php } ?>
                            </div>
                      
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="content" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                            </div>
                            <div class="row">
                              
                                <div class="form-group image_upload_container col-md-8">
                                    <label>Görsel Seçiniz</label>
                                    <input type="file" name="img_url" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("book"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>