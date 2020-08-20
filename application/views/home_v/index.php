<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div id="storiesSticky" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 storiesSticky">
                <?php if (!empty($stories)) : ?>
                    <div id="stories" class="stories carousel snapgram pt-1 px-3 <?= (get_cookie("theme", true) == "dark" ? "dark" : "bg-white") ?> border">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mt-3">
                <div class="owl-wrapper">
                    <div class="owl-carousel owl-theme homeSlider">
                        <?php foreach ($slides as $slide) : ?>
                            <div class="item">
                                <img width="100%" class="img-fluid" src="<?=get_picture("slides_v",$slide->img_url) ?>" alt="<?= $slide->title ?>">
                                <div class="carousel-caption p-1">
                                    <h5><?= $slide->title ?></h5>
                                    <p><?= $slide->description ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-3">
                <div class="row">
                    <?php foreach ($banners as $banner) : ?>
                        <div class="col-md-12 mb-1 mt-1">
                            <a href="<?= $banner->url ?>">
                                <img src="<?=get_picture("home_banner_v",$banner->img_url) ?>" class="img-fluid w-100 banner160">
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3">
                <h4 class="text-white my-auto dark border p-4 text-center">REKLAM ALANI</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                <h4 class="text-white my-auto dark border p-4 text-center">REKLAM ALANI</h4>
            </div>
        </div>
        <div class="row">
            <!-- Onair Vitrin -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <h4 class="title"><b>Onair</b> Vitrin</h4>
                <div class="owl-wrapper">
                    <div class="owl-carousel owl-trends owl-theme mt-3">
                        <?php foreach ($news as $haber) : ?>
                            <a href="<?= base_url("haber/{$haber->seo_url}"); ?>">
                                <div class="card item mb-3 dark shadow-none">
                                    <div class="card-body p-0 m-0">
                                        <div class="position-relative">
                                            <img src="<?=get_picture("news_v",$haber->img_url) ?>" class="img-fluid">
                                            <i class="<?= $haber->emoji ?>"></i>
                                        </div>
                                        <small>
                                            <div class="d-inline-block mr-1 py-2 px-2">
                                                <i class="fa fa-user mr-1"></i>
                                                <?php foreach ($writers as $writer_key => $writer_value) : ?>
                                                    <?php if ($haber->writer_id == $writer_value->id) : ?>
                                                        <?= $writer_value->full_name ?>
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
                </div>
            </div>
            <!-- Müzik Haberleri -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <h4 class="title"><b>Müzik</b> Haberleri</h4>
                <div class="owl-wrapper">
                    <div class="owl-carousel owl-trends owl-theme mt-3">
                        <?php foreach ($muzik_haberleri as $haber) : ?>
                            <a href="<?= base_url("haber/{$haber->seo_url}"); ?>">
                                <div class="card item mb-3 dark shadow-none">
                                    <div class="card-body p-0 m-0">
                                        <div class="position-relative">
                                            <img src="<?=get_picture("news_v",$haber->img_url) ?>" class="img-fluid">
                                            <i class="emoji-love"></i>
                                        </div>
                                        <div>
                                            <div class="d-inline-block mr-1 py-2 px-2">
                                                <i class="fa fa-user"></i>
                                                <?php foreach ($writers as $writer_key => $writer_value) : ?>
                                                    <?php if ($haber->writer_id == $writer_value->id) : ?>
                                                        <?= $writer_value->full_name ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="d-inline-block">
                                                <i class="fa fa-clock-o mr-1"></i><?= turkishDate("d F Y, l H:i", $haber->createdAt);  ?>
                                            </div>
                                        </div>
                                        <h6 class="px-1 py-3"><b><?= $haber->title; ?></b></h6>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>