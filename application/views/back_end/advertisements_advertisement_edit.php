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
    </div>
    <!-- content-header -->
  
    <div class="container-fluid">
        <hr>

        <div class="alert alert-info alert-block">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Bilgi!</h4>
            <ul>
                <li>Doldurulması zorunlu olan alanlar <b>*</b> ile belirtilmiştir.</li>
                <li>Yayın durumu <b>Pasif</b> olarak işaretlenen sayfalar site içerisinde görüntülenemez.</li>
            </ul>
        </div>
    
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-align-justify"></i>
                        </span>
                        <h5><?php echo $page['name']; ?></h5>
                    </div>
                    <!-- widget-title -->

                    <div class="widget-content nopadding">
                        <form action="#" method="post"  enctype="multipart/form-data" class="form-horizontal">


                            <div class="control-group">
                                <label for="resim" class="control-label">İlan Fotoğrafı </label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">İlan Başlığı *</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="caption"  placeholder="satılık ev" value="<?php echo $ilan->caption;?>" required="" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Şehir </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="city" placeholder="İstanbul" value="<?php echo $ilan->city;?>"/>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İlana Dahil Olanlar </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="extra" placeholder="will smith" value="<?php echo $ilan->extra;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Sektör </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="sector" placeholder="Turizm" value="<?php echo $ilan->sector;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Firma</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="company" placeholder="Mutfak Yapım" value="<?php echo $ilan->company;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İlan Tipi</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="type" placeholder="Satılık,Kiralık,Personel vb.." value="<?php echo $ilan->type;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İlan Sahibi</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="owner" placeholder="ad soyad" value="<?php echo $ilan->owner;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Çalışma Şekli</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="working_type" placeholder="Tam Zamanlı,Part Time" value="<?php echo $ilan->working_type;?>"/>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Çalışma Saatleri</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="working_hours" placeholder="Çalışma Saatleri: 09:00 - 18:00" value="<?php echo $ilan->working_hours;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Tatil Günleri</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="holidays" placeholder="p.tesi,salı,çarşamba" value="<?php echo $ilan->halidays;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Eğitim Seviyesi</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="education_level" placeholder="lisans lisans-üstü" value="<?php echo $ilan->education_level;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">Çalışan Sayısı</label>
                                <div class="controls">
                                    <input type="number" class="span11" name="customer_count" placeholder="10" value="<?php echo $ilan->employee_count;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label">İlan Fiyat</label>
                                <div class="controls">
                                    <input type="number" step="any" min="1" class="span11" name="currency" placeholder="1,000000(ondalık için virgül kullanın)"
                                           value="<?php echo $ilan->currency;?>" />
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="icerik">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="icerik" id="icerik" class="ckeditor"><?php echo $ilan->text;?></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="control-group">
                                <label class="control-label" for="tarih">Bitiş Tarihi *</label>
                                <div class="controls">
                                    <input type="date" id="tarih" name="end_date" value="<?php echo $ilan->end_date;?>" required="">
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Gönder</button>
                            </div>
                            <!-- form-actions -->

                        </form>
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
