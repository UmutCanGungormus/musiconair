<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-center bg-dark border p-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="breadcrumb pl-0">
                    <a href="<?= base_url(); ?>">Anasayfa</a> <span>></span>
                    <a href="<?= base_url("etkinlikler"); ?>">Etkinlikler</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <?php foreach ($activities as $key => $value) : ?>
                    <div class="card rounded-0 mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                        <div class="row no-gutters">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                <a href="<?= base_url("etkinlik/{$value->seo_url}") ?>"><img src="<?= base_url("panel/uploads/activities_v/1140x705/" . $value->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $value->title ?>"></a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                                <div class="card-body position-relative mb-5">
                                    <h5 class="card-title"><a href="<?= base_url("haber/{$value->seo_url}") ?>"><?= $value->title ?></a></h5>

                                    <p class="card-text">
                                        <?php if ($value->updatedAt) : ?>
                                            <small class="text-muted"><i class="fa fa-clock-o mr-1 my-auto"></i> Son Güncelleme : <?= turkishDate("d F Y, l H:i", $value->updatedAt) ?></small>
                                        <?php else : ?>
                                            <small class="text-muted"><i class="fa fa-clock-o mr-1 my-auto"></i> Yayın Tarihi : <?= turkishDate("d F Y, l H:i", $value->createdAt) ?></small>
                                        <?php endif; ?>
                                    </p>
                                    <p class="card-text"><?= mb_word_wrap($value->content, 300, "...") ?></p>
                                </div>
                                <a class="btn btn-danger mr-0 mb-0 rounded-0 btnBottomRight" href="<?= base_url("etkinlik/{$value->seo_url}") ?>">ETKİNLİĞİN DEVAMI</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?= $links ?>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="text-center bg-dark border">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <h3 class="title">Çok Okunanlar</h3>
                <?php if (!empty($most_read)) : ?>
                    <?php foreach ($most_read as $item) : ?>
                        <a href="<?= base_url("etkinlik/{$item->seo_url}"); ?>" class="text-color">
                            <div class="card rounded-0 border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?= base_url("panel/uploads/activities_v/1140x705/" . $item->img_url); ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                                        <div class="card-body">
                                            <h6 class="card-title"><?= $item->title; ?></h6>
                                            <p class="card-text"><?= mb_word_wrap($item->content, 50, "...") ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                <?php endif; ?>

                <div class="row justify-content-center">

                    <div class="col-md-3 text-center">
                        <div class="p-2" style="background-color: #1877f2;">
                            <i class="fa fa-facebook fa-2x text-white"></i>
                        </div>
                        <div class="p-2 border">
                            100B
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <div class="p-2" style="background-color: #00acee;">
                            <i class="fa fa-twitter fa-2x text-white"></i>
                        </div>
                        <div class="p-2 border">
                            100B
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <div class="p-2" style="background-color: #3f729b;">
                            <i class="fa fa-instagram fa-2x text-white"></i>
                        </div>
                        <div class="p-2 border">
                            103B
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <div class="p-2" style="background-color: #c4302b;">
                            <i class="fa fa-youtube fa-2x text-white"></i>
                        </div>
                        <div class="p-2 border">
                            100B
                        </div>
                    </div>

                </div>

                <div class="text-center bg-dark border mt-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</section>