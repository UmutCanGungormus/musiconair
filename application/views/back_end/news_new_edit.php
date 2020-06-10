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
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">


                            <div class="control-group">
                                <label for="resim" class="control-label">Haber Fotoğrafı</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="baslik" class="control-label">Haber Başlığı *</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $news->baslik; ?>" name="baslik" id="baslik"
                                           required="">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="yazar">Yazar *</label>
                                <div class="controls">
                                    <select name="yazar" id="yazar" required="">
                                        <?php $writers = $this->db->query("SELECT id,nick,ad FROM site_writers ")->result_array();
                                        foreach ($writers as $writer) {
                                            ?>
                                            <option <?php if ($writer['id'] == $news->yazar_id) {
                                                echo 'selected="selected"';
                                            } ?> value="<?php echo $writer['id']; ?>"><?php echo $writer['nick']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label" for="icerik">İçerik</label>
                                <div class="controls" style="width: 80% !important;">
                                    <textarea name="icerik" id="icerik"
                                              class="ckeditor"><?php echo $news->icerik; ?></textarea>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->


                            <div class="control-group">
                                <label class="control-label">Resim Durumu *</label>
                                <div class="controls">
                                    <label style="font-size: 13px;"><input type="radio" name="resim_goster" value="1"
                                            <?php if ($news->resim_goster) {
                                                echo 'checked=""';
                                            } ?> /> Aktif</label>
                                    <label style="font-size: 13px;"><input type="radio" name="resim_goster"
                                            <?php if (!$news->resim_goster) {
                                                echo 'checked=""';
                                            } ?> value="0"/> Pasif</label>
                                </div>
                                <!-- controls -->
                            </div>
                            <!-- control-group -->

                            <?php
                            $Kategoriler = $this->db->query("SELECT * FROM category_news")->result_array();
                            $ekliKategoriler = explode(",", $news->kategoriler);
                            $etiketler=explode(',',$news->etiketler);
                            ?>
                            <script>
                                var kategoriler = [];
                                var ekliKategoriler = [];
                                var etiketler=[];
                                <?php  echo 'ekliKategoriler=ekliKategoriler.concat(' . json_encode($ekliKategoriler) . ');';?>
                                <?php  echo 'kategoriler=kategoriler.concat(' . json_encode($Kategoriler) . ');';?>
                                <?php  echo 'etiketler=etiketler.concat(' . json_encode($etiketler) . ');';?>
                            </script>
                            <div class="control-group">
                                <label class="control-label" for="ekle-kategori">Kategori Ekle</label>
                                <div class="controls">
                                    <select name="ekle-kategori[]" id="ekle-kategori">
                                    </select>
                                    <button id="ekle" onclick="return false;" class="btn btn-info">Ekle</button>
                                </div>
                                <script type="text/javascript">
                                    document.addEventListener("DOMContentLoaded", function () {
                                        var url=$(location).attr('href');
                                        var urlAr=url.split("/");
                                        var id=urlAr[urlAr.length-1];
                                        urlAr.splice(urlAr.length-1,1);
                                        urlAr.splice(urlAr.length-1,1);
                                        url=urlAr.join("/");
                                        url+="/CatSync";
                                        syncher();

                                        $("#ekle").click(function () {
                                            ekliKategoriler.push($("#ekle-kategori").children("option:selected").val());

                                            $.ajax({
                                                url:url,
                                                type:"POST",
                                                data:{ 'ekliKategoriler' : ekliKategoriler,"id": id},
                                                success:function (data) {
                                                    syncher()
                                                }
                                            })
                                        });

                                        $("#sil").click(function () {
                                            ekliKategoriler=$.grep(ekliKategoriler,function (v) {
                                               return (v!= $("#sil-kategori").children("option:selected").val() );
                                            });
                                            $.ajax({
                                                url:url,
                                                type:"POST",
                                                data:{ 'ekliKategoriler' : ekliKategoriler,"id": id},
                                                success:function (data) {
                                                    syncher()
                                                }
                                            })
                                        });

                                        function syncher() {
                                            $("#ekle-kategori option").remove();
                                            $("#sil-kategori option").remove();
                                            for (var i = 0; i < kategoriler.length; i++) {
                                                if ($.inArray(kategoriler[i].id, ekliKategoriler) === -1) {
                                                    $("#ekle-kategori").append(new Option(kategoriler[i].ad, kategoriler[i].id));

                                                } else {
                                                    $("#sil-kategori").append(new Option(kategoriler[i].ad, kategoriler[i].id));
                                                }

                                            }
                                        }


                                    });
                                </script>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="sil-kategori">Kategori Sil</label>
                                <div class="controls">
                                    <select name="sil-kategori[]" id="sil-kategori">
                                    </select>
                                    <button id="sil" onclick="return false;" class="btn btn-danger">Çıkart</button>
                                </div>

                            </div>

                            <div class="control-group">
                                <label class="control-label" for="etiket">Etiket Belirle</label>
                                <div class="controls">
                                    <input type="text" name="etiket" id="etiket">
                                    <button type="button" name="etiket-ekle" id="etiket-ekle" class="btn btn-info" onclick="return false;">Ekle</button>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="etiket2">Etiket Çıkar</label>
                                <div class="controls">
                                    <select name="etiket2" id="etiket2"></select>
                                    <button type="button" id="etiket-cikar" class="btn btn-danger" onclick="return false;">Çıkart</button>
                                </div>
                            </div>

                            <script type="text/javascript">
                                document.addEventListener("DOMContentLoaded", function () {
                                    syncherTags();
                                    var url=$(location).attr('href');
                                    var urlAr=url.split("/");
                                    var id=urlAr[urlAr.length-1];
                                    urlAr.splice(urlAr.length-1,1);
                                    urlAr.splice(urlAr.length-1,1);
                                    url=urlAr.join("/");
                                    url+="/TagSync";


                                    function syncherTags() {
                                        $("#etiket2").children("option").remove();
                                        etiketler=$.grep(etiketler,function (v,i) {
                                            return v!=="";
                                        });

                                        $(etiketler).each(function (i) {
                                           $("#etiket2").append(new Option(etiketler[i],etiketler[i]));
                                        });
                                    }

                                    $("#etiket-ekle").click(function () {
                                        etiketler.push($("#etiket").val());
                                        $.ajax({
                                            url:url,
                                            type:"POST",
                                            data:{ 'etiket' : etiketler,'id' : id},
                                            success:function (data) {
                                                syncherTags();
                                            }
                                        })
                                    });

                                    $("#etiket-cikar").click(function () {
                                        etiketler=$.grep(etiketler,function (v,i) {
                                            return (v!=$("#etiket2").children("option:selected").val());
                                        });
                                        $.ajax({
                                            url:url,
                                            type:"POST",
                                            data:{ 'etiket' : etiketler,'id' : id},
                                            success:function (data) {
                                                syncherTags();
                                            }
                                        })
                                    });
                                });
                            </script>


                            <div class="control-group">
                                <label for="short_code" class="control-label">Url Kodu</label>
                                <div class="controls">
                                    <input type="text" maxlength="8" value="<?php echo $news->short_code; ?>" name="short_code" id="short_code">
                                    <button type="button" id="generator_short_url" class="btn btn-primary" onclick="return false;">Kod Üret</button>
                                </div>
                            </div>
                            <script>

                                document.addEventListener("DOMContentLoaded", function () {

                                    function generate(length) {
                                        var result           = '';
                                        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                        var charactersLength = characters.length;
                                        for ( var i = 0; i < length; i++ ) {
                                            result += characters.charAt(Math.floor(Math.random() * charactersLength));
                                        }
                                        return result;
                                    }

                                    $("#generator_short_url").click(function () {
                                        $("#short_code").val(generate(8));
                                    })
                                });
                            </script>

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
