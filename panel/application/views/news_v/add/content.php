<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Haber Ekle
          
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
                    <hr class="widget-separator">
                    <div class="widget-body">                        
                        <form action="<?php echo base_url("news/save"); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Haber Adı</label>
                                <input class="form-control" placeholder="Haber Adı" name="title">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea name="content" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                            </div>
                            <div class="form-group">
                            <label>Haber Kategori</label>
                            <select class="form-control" name="category_id">
                        
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("category_id"); ?></small>
                            <?php } ?>
                            </div>
                            <div class="form-group">
                            <div class="alert alert-info">Not:Her Etiket Kelimesi Yazıldıktan Sonra Virgül Yada Enter Tuşuna Basın!</div>

                                <label>Haber Etiketleri</label>
                                <input type="text"  name="tags" class="form-control" data-role="tagsinput" >
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                                <?php } ?>
                            </div>
                       
                           

                            <div class="form-group">
                            <label>Yazar / Editör</label>
                            <select class="form-control" name="writer_id">
                        
                                <?php foreach ($writers as $category) { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("writer_id"); ?></small>
                            <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Emoji</label>
                                    <select class="form-control" name="emoji">
                                    <option value="cok-iyi">Kahkaha</option>
                                   
                                    <option value="yerim">Kalpli Göz</option>
                                    <option value="rocket">Roket</option>
                                    </select>
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("emoji"); ?></small>
                                <?php } ?>
                            </div>
                         
                        <?php if (isset($form_error)) { ?>
                            <div class="form-group " >
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                            <div class="form-group " >
                                <label>Video Url</label>
                                <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("video_url"); ?></small>
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <div class="form-group ">
                                <label>Görsel Seçiniz</label>
                                <input type="file" name="img_url" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label>Video Url</label>
                                <input class="form-control" placeholder="Video bağlantısını buraya yapıştırınız." name="video_url">
                            </div>
                        <?php } ?>
                     
                            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                            <a href="<?php echo base_url("news"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                        </form>
                    </div><!-- .widget-body -->
                </div><!-- .widget -->
    </div><!-- END column -->
</div>