<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="container-fluid">
                <div class="owl-carousel owl-theme homeSlider">
                    <?php foreach ($slides as $slide) : ?>
                        <div class="item">
                            <img width="100%" class="img-fluid" src="<?= base_url("panel/uploads/slides_v/857x505/{$slide->img_url}"); ?>" alt="<?= $slide->title ?>">
                            <div class="carousel-caption p-1">
                                <h5><?= $slide->title ?></h5>
                                <p><?= $slide->description ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="row">
                <?php foreach ($banners as $banner) : ?>
                    <div class="col-md-12 mb-1 mt-1">
                        <a href="<?= $banner->url ?>">
                            <img src="<?= base_url("panel/uploads/home_banner_v/857x505/{$banner->img_url}"); ?>" class="img-fluid w-100 banner160">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="row mt-4 text-center px-3">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 bg-dark border p-4">
            <h4 class="text-white my-auto">REKLAM ALANI</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 bg-dark border p-4">
            <h4 class="text-white my-auto">REKLAM ALANI</h4>
        </div>
    </div>

    <!-- Onair Vitrin -->
    <section class="mt-3">
        <div class="container p-0">
            <h4 class="title"><b>Onair</b> Vitrin</h4>
            <div class="owl-carousel owl-trends owl-theme mt-3">
                <?php foreach ($news as $haber) : ?>
                    <a target="_blank" href="<?= base_url("haber/{$haber->seo_url}"); ?>">
                        <div class="card item mb-3 dark shadow-none">
                            <div class="card-body p-0 m-0">
                                <div class="position-relative">
                                    <img src="<?= base_url("panel/uploads/news_v/370x297/{$haber->img_url}"); ?>" class="img-fluid">
                                    <i class="<?= $haber->emoji ?>"></i>
                                </div>
                                <small>
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user mr-1"></i>
                                        <?php foreach ($writers as $writer_key => $writer_value) : ?>
                                            <?php if ($haber->writer_id == $writer_value->id) : ?>
                                                <?= $writer_value->name ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1"></i><?= turkishDate("d F Y, l H:i", $haber->createdAt);  ?>
                                    </div>
                                </small>

                                <h6 class="px-1 py-3"><b><?= $haber->title; ?></b></h6>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
    </section>

    <!-- Müzik Haberleri -->

    <section class="mt-3">
        <div class="container p-0 ">
            <h4 class="title"><b>Müzik</b> Haberleri</h4>
            <div class="owl-carousel owl-trends owl-theme mt-3">
                <?php foreach ($muzik_haberleri as $haber) : ?>
                    <a target="_blank" href="<?= base_url("haber_detay/{$haber->id}"); ?>">
                        <div class="card item mb-3 dark">
                            <div class="card-body p-0 m-0">
                                <div class="position-relative">
                                    <img src="<?= base_url("public/uploads/news/{$haber->id}"); ?>" class="img-fluid">
                                    <i class="emoji-love"></i>
                                </div>
                                <div>
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i> <?= $yazar->ad; ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1"></i><?= turkishDate("d F Y, l H:i", $haber->createdAt);  ?>
                                    </div>
                                </div>
                                <h6 class="px-1 py-3"><b><?= $haber->news_title; ?></b></h6>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>


    <!-- Onair Vitrin -->
    <section class="mt-3">
        <div class="container p-0 ">
            <h4 class="title"><b>Onair</b> Vitrin</h4>
            <div class="owl-carousel owl-trends owl-theme mt-3">


                <?php foreach ($news as $haber) {
                ?>
                    <a target="_blank" href="<?php echo base_url("haber_detay/" . $haber->id); ?>">
                        <div class="card item mb-3 dark">
                            <div class="card-body p-0 m-0">
                                <div style="position: relative;">
                                    <img src="<?php echo base_url("public/uploads/news/" . $haber->id . ".jpg"); ?>" class="img-fluid">
                                    <i class="emoji-love"></i>
                                </div>

                                <div>
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i>
                                        <?php foreach ($writers as $writer_key => $writer_value) : ?>
                                            <?php if ($haber->writer_id == $writer_value->id) : ?>
                                                <?= $writer_value->name ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1"></i><?= turkishDate("d F Y, l H:i", $haber->createdAt);  ?>
                                    </div>
                                </div>

                                <h6 class="px-1 py-3"><b><?php echo $haber->title; ?></b></h6>
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
                foreach ($tvler as $tv) { ?>
                    <div class="card item mb-3 dark">
                        <div class="card-body p-0 m-0">
                            <div style="position: relative;" class="video-list">
                                <img src="<?php echo base_url("public/uploads/video_photos/" . $tv->id . ".jpg"); ?>" class="img-fluid" />
                                <i class="emoji-love"></i>
                                <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://www.youtube.com/watch?v=<?php echo $tvHaber->video_embed_kodu; ?>"></a>
                                <a class="link-video" target="_blank" href="<?php echo base_url("video_detay/" . $tv->id); ?>"></a>
                                <span></span>
                            </div>

                            <div style="font-size: 11px;">
                                <div class="d-inline-block mr-1 py-2 px-2">
                                    <i class="fa fa-user"></i> <?php echo $yazar->ad ?>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8');
                                                                                                echo strftime("%d %B %Y", strtotime($tvHaber->news_create_time)); ?>
                                </div>
                            </div>
                            <h6 class="px-1 py-3" style="font-size: 17px;"><b><?php echo $haber->news_title; ?></b></h6>
                        </div>
                    </div>
                <?php } ?>
                <?php for ($i = 1; $i <= 8; $i++) : ?>

                    <div class="card item mb-3">
                        <div class="card-body p-0 m-0">
                            <div style="position: relative;" class="video-list">
                                <img src="<?= base_url("public/uploads/aleyna.jpg"); ?>" class="img-fluid" />
                                <i class="emoji-love"></i>
                                <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://youtu.be/rahRaVtEQaM?t=15m43s"></a>
                                <a class="link-video" target="_blank" href="video-detay.php"></a>
                                <span></span>
                            </div>

                            <div style="font-size: 11px;">
                                <div class="d-inline-block mr-1 py-2 px-2">
                                    <i class="fa fa-user"></i> Admin
                                </div>
                                <div class="d-inline-block">
                                    <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i>23 Eylül 2019
                                </div>
                            </div>
                            <h6 class="px-1 py-3"><b>Aleyna Tilki Amerika'ya mı Taşınıyor?</b></h6>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Onair Vitrin -->
    <section class="mt-3">
        <div class="container p-0 ">
            <h4 class="title"><b>Onair</b> Vitrin</h4>
            <div class="owl-carousel owl-trends owl-theme mt-3">
                <?php foreach ($news as $haber) { ?>
                    <a target="_blank" href="<?php echo base_url("haber_detay/" . $haber->id); ?>">
                        <div class="card item mb-3 dark">
                            <div class="card-body p-0 m-0">
                                <div style="position: relative;">
                                    <img src="<?php echo base_url("public/uploads/news/" . $haber->id . ".jpg"); ?>" class="img-fluid">
                                    <i class="emoji-love"></i>
                                </div>

                                <div style="font-size: 11px;">
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i>
                                        <?php foreach ($writers as $writer_key => $writer_value) : ?>
                                            <?php if ($haber->writer_id == $writer_value->id) : ?>
                                                <?= $writer_value->name ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?= $haber->createdAt; ?>
                                    </div>
                                </div>

                                <h6 class="px-1 py-3"><b><?php echo $haber->title; ?></b></h6>
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
                        <a href="<?php echo base_url("video_detay/" . $keyif->id); ?>">
                            <div class="container mx-2 p-1">
                                <div style="position: relative;">
                                    <img src="<?php echo base_url("public/uploads/news/" . $keyif->id . ".jpg"); ?>" class="img-fluid">
                                    <i class="emoji-love"></i>
                                </div>

                                <div style="font-size: 11px;">
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i> <?php echo $yazar->ad; ?>
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php setlocale(LC_ALL, 'tr_TR.UTF-8');
                                                                                                    echo strftime("%d %B %Y", strtotime($keyif->news_create_time)); ?>
                                    </div>
                                </div>

                                <span class="px-1py-3"><b><?php echo $keyif->news_title; ?></b></span>
                            </div>
                        </a>
                    </div>

                <?php  } ?>


            </div>
        </div>
        <div class="col-md-12 text-center mt-2">
            DAHA FAZLASINI GÖSTER
        </div>
    </div>
</div>
</section>