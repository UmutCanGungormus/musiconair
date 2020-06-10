<div class="container-fluid px-0 pr-0 mt-5">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 slider">
          


                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="margin-bottom: 0px;">
  <?php
                   
                        foreach ($get_sliders as $key => $slider){?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key?>" <?php
    if($key==0){
        echo "class='active'";
    }
    else{
        echo"";
    }
    ?>></li>
                        <?php }?>
  </ol>
  <div class="carousel-inner">
  <?php
                        $i = 1;
                        foreach ($get_sliders as $slider){?>
  <div class="carousel-item <?php if($i==1){ 
      echo "active";
      }else{ 
          echo"";
          }?>">
  <img width="100%" src="<?php echo base_url("public/uploads/slider/")?><?php print_r($slider['slider_photo_name'])?>" alt="...">
  <div class="carousel-caption  d-md-block" style="    background-color: #2222227a;padding:5px;margin-bottom: -19px;">
    <h5><?php echo $slider['slider_photo_title']?></h5>
    <p><?php echo $slider['slider_photo_sub_title']?></p>
  </div>
  
</div>
<?php $i++;
                        }
                    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Geri</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">İleri</span>
  </a>
</div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <?php
                        foreach ($site_home_page_banners as $banner):
                            echo '<div class="col-md-12 mb-1">';
                                echo '<a href="'.$banner -> banner_link.'">';
                                    echo '<img src="'.base_url('public/uploads/home_page_banners/'.$banner -> banner_image).'" class="img-fluid">';
                                echo '</a>';
                            echo '</div>';
                        endforeach;
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-4 text-center px-3">
            <div class="col-md-6 bg-dark border" style="height: 90px;">
                <h4 class="text-white" style="line-height: 90px;">REKLAM ALANI</h4>
            </div>
            <div class="col-md-6 bg-dark border " style="height: 90px;">
                <h4 class="text-white" style="line-height: 90px;">REKLAM ALANI</h4>
            </div>
        </div>

        <!-- Onair Vitrin -->
        <section class="mt-3">
            <div class="container p-0 ">
                <h4 class="title"><b>Onair</b> Vitrin</h4>
                <div class="owl-carousel owl-trends owl-theme mt-3">

                    <?php foreach ($haberler as $haber) {//order by rand lim 6
                        $yazar= $this->db->query("select * from site_writers where id=$haber->yazar_id")->row();
                        ?>
                        <a target="_blank" href="<?php echo base_url("haber_detay/".$haber->id);?>">
                            <div class="card item mb-3 dark shadow-none">
                                <div class="card-body p-0 m-0">
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url("public/uploads/news/".$haber->id.".jpg"); ?>"
                                             class="img-fluid">
                                        <i class="emoji-love"></i>
                                    </div>

                                    <div style="font-size: 11px;">
                                        <div class="d-inline-block mr-1 py-2 px-2">
                                            <i class="fa fa-user"></i> <?php   echo $yazar->ad;?>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($haber->news_create_time)); ?>
                                        </div>
                                    </div>

                                    <h6 class="px-1 py-3"><b><?php echo $haber->news_title;?></b></h6>
                                </div>
                            </div>
                        </a>
                    <?php  } ?>

                </div>
            </div>
        </section>

        <!-- Müzik Haberleri -->



        <section class="mt-3">
            <div class="container p-0 ">
            <h4 class="title"><b>Müzik</b> Haberleri</h4>
                <div class="owl-carousel owl-trends owl-theme mt-3">


                    <?php 
                        $muzik_haberleri= $this->db->query("select * from site_news where kategoriler like '%,1' ORDER BY rand() LIMIT 6")->result();
                        foreach ($muzik_haberleri as $haber) {
                            //burada link video lara gönderilmiş o yüzden de video kabul ettim
                            $yazar= $this->db->query("select * from site_writers where id=$haber->yazar_id")->row()
                        ?>
                        <a target="_blank" href="<?php echo base_url("haber_detay/".$haber->id);?>">
                            <div class="card item mb-3 dark">
                                <div class="card-body p-0 m-0">
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url("public/uploads/news/".$haber->id.".jpg"); ?>"
                                             class="img-fluid">
                                        <i class="emoji-love"></i>
                                    </div>

                                    <div style="font-size: 11px;">
                                        <div class="d-inline-block mr-1 py-2 px-2">
                                            <i class="fa fa-user"></i> <?php   echo $yazar->ad;?>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($haber->news_create_time)); ?>
                                        </div>
                                    </div>

                                    <h6 class="px-1 py-3" style="font-size: 17px;"><b><?php echo $haber->news_title;?></b></h6>
                                </div>
                            </div>
                        </a>
                    <?php  } ?>

                </div>
            </div>
        </section>
 

        <!-- Onair Vitrin -->
        <section class="mt-3">
            <div class="container p-0 ">
                <h4 class="title"><b>Onair</b> Vitrin</h4>
                <div class="owl-carousel owl-trends owl-theme mt-3">


                    <?php foreach ($haberler as $haber) {
                        $yazar= $this->db->query("select * from site_writers where id=$haber->yazar_id")->row();
                        ?>
                        <a target="_blank" href="<?php echo base_url("haber_detay/".$haber->id);?>">
                            <div class="card item mb-3 dark">
                                <div class="card-body p-0 m-0">
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url("public/uploads/news/".$haber->id.".jpg"); ?>"
                                             class="img-fluid">
                                        <i class="emoji-love"></i>
                                    </div>

                                    <div style="font-size: 11px;">
                                        <div class="d-inline-block mr-1 py-2 px-2">
                                            <i class="fa fa-user"></i> <?php   echo $yazar->ad;?>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($haber->news_create_time)); ?>
                                        </div>
                                    </div>

                                    <h6 class="px-1 py-3" style="font-size: 17px;"><b><?php echo $haber->news_title;?></b></h6>
                                </div>
                            </div>
                        </a>
                    <?php  } ?>

                </div>
            </div>
        </section>

        <!-- Müzik Onair TV -->
        <section>
            <div class="container p-0 ">
                <h4 class="title"><b>Müzik Onair</b> TV</h4>
                <div class="owl-carousel owl-trends owl-theme mt-3">


                    <?php
                    foreach ($tvler as $tv) {
                        $tvHaber= $this->db->query("select * from site_news WHERE id=$tv->haber_id")->row();
                        $yazar= $this->db->query("select * from site_writers where id=$tvHaber->yazar_id")->row();?>
                        <div class="card item mb-3 dark">
                            <div class="card-body p-0 m-0">
                                <div style="position: relative;" class="video-list">
                                    <img src="<?php echo base_url("public/uploads/video_photos/".$tv->id.".jpg"); ?>" class="img-fluid"/>
                                    <i class="emoji-love"></i>
                                    <a class="popup-video" data-fancybox data-width="640" data-height="360"
                                       data-small-btn="true" href="https://www.youtube.com/watch?v=<?php echo $tvHaber->video_embed_kodu;?>"></a>
                                    <a class="link-video" target="_blank" href="<?php echo base_url("video_detay/".$tv->id);?>"></a>
                                    <span></span>
                                </div>

                                <div style="font-size: 11px;">
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i> <?php echo $yazar->ad?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($tvHaber->news_create_time)); ?>
                                    </div>
                                </div>
                               <h6 class="px-1 py-3" style="font-size: 17px;"><b><?php echo $haber->news_title;?></b></h6>
                            </div>
                        </div>
                    <?php }?>

<!--                    --><?php //for ($i = 1; $i <= 8; $i++): ?>
<!---->
<!--                        <div class="card item mb-3">-->
<!--                            <div class="card-body p-0 m-0">-->
<!--                                <div style="position: relative;" class="video-list">-->
<!--                                    <img src="--><?php //echo base_url("public/uploads/aleyna.jpg"); ?><!--" class="img-fluid"/>-->
<!--                                    <i class="emoji-love"></i>-->
<!--                                    <a class="popup-video" data-fancybox data-width="640" data-height="360"-->
<!--                                       data-small-btn="true" href="https://youtu.be/rahRaVtEQaM?t=15m43s"></a>-->
<!--                                    <a class="link-video" target="_blank" href="video-detay.php"></a>-->
<!--                                    <span></span>-->
<!--                                </div>-->
<!---->
<!--                                <div style="font-size: 11px;">-->
<!--                                    <div class="d-inline-block mr-1 py-2 px-2">-->
<!--                                        <i class="fa fa-user"></i> Admin-->
<!--                                    </div>-->
<!--                                    <div class="d-inline-block">-->
<!--                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i>23 Eylül 2019-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <h6 class="px-1 py-3"><b>Aleyna Tilki Amerika'ya mı Taşınıyor?</b></h6>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!---->
<!--                    --><?php //endfor; ?>
                </div>
            </div>
        </section>

        <!-- Onair Vitrin -->
        <section class="mt-3">
            <div class="container p-0 ">
                <h4 class="title"><b>Onair</b> Vitrin</h4>
                <div class="owl-carousel owl-trends owl-theme mt-3">
                    <?php foreach ($haberler as $haber) {
                        $yazar= $this->db->query("select * from site_writers where id=".$haber->yazar_id)->row();
                        ?>
                        <a target="_blank" href="<?php echo base_url("haber_detay/".$haber->id);?>">
                            <div class="card item mb-3 dark">
                                <div class="card-body p-0 m-0">
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url("public/uploads/news/".$haber->id.".jpg"); ?>"
                                             class="img-fluid">
                                        <i class="emoji-love"></i>
                                    </div>

                                    <div style="font-size: 11px;">
                                        <div class="d-inline-block mr-1 py-2 px-2">
                                            <i class="fa fa-user"></i> <?php echo $yazar->ad;?>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($haber->news_create_time)); ?>
                                        </div>
                                    </div>

                                    <h6 class="px-1 py-3"><b><?php echo $haber->news_title;?></b></h6>
                                </div>
                            </div>
                        </a>
                    <?php  } ?>
                </div>
            </div>
        </section>

        <!-- Keyif İçerikleri -->
        <div class="container p-0 mt-4">
            <h4 class="title"><b>Keyif</b> İçerikleri</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    
                    <?php foreach ($keyifler as $keyif) { ?>
                        <div class="col-md-3 px-1 my-3 dark">
                            <a href="<?php echo base_url("video_detay/".$keyif->id);?>">
                                <div class="container mx-2 p-1">
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url("public/uploads/news/".$keyif->id.".jpg"); ?>""
                                             class="img-fluid">
                                        <i class="emoji-love"></i>
                                    </div>

                                    <div style="font-size: 11px;">
                                        <div class="d-inline-block mr-1 py-2 px-2">
                                            <i class="fa fa-user"></i> <?php echo $yazar->ad;?>
                                        </div>
                                        <div class="d-inline-block">
                                            <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($keyif->news_create_time)); ?>
                                        </div>
                                    </div>

                                    <span class="px-1py-3"><b><?php echo $keyif->news_title;?></b></span>
                                </div>
                            </a>
                        </div>

                    <?php  } ?>
                    
                 
                </div>
            </div>
            <div class="col-md-12 text-center mt-2">
                DAHA FAZLASINI GÖSTER
                <?php echo substr(md5(sha1(base64_encode(crc32("umutumut")))), 0, 13);?>
            </div>
        </div>
    </div>
</div>
</div>
</section>


<script type="text/javascript">
    $(function () {
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            margin: 20,
            nav: !0,
            loop: !0,
            navText: ['<i class="fa fa-chevron-left left d-none d-md-block"></i>', '<i class="fa fa-chevron-right right d-none d-md-block"></i>'],
            responsive: {0: {items: 1}, 600: {items: 4}, 1e3: {items: 4}}
        });
    })
</script>

