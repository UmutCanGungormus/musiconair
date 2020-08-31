<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-center dark border p-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <div class="breadcrumb pl-0">
                    <a href="<?= base_url(); ?>">Anasayfa</a> <span>></span>
                    <a href="<?= base_url("galeriler"); ?>">Galeriler</a> <span>></span>
                    <a href="javascript:void(0)"><?= $gallery->title; ?></a>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <h2 class="mt-1"><?= $gallery->title; ?></h2>
                <span class="grey-text d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Yayınlanma Tarihi: <?= turkishDate("d F Y, l H:i", $gallery->createdAt) ?></span>
                <?php if ($gallery->updatedAt) : ?>
                    <span class="grey-text ml-2 d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Güncellenme Tarihi: <?= turkishDate("d F Y, l H:i", $gallery->updatedAt) ?></span>
                <?php endif; ?>

                <div class="d-flex justify-content-between">

                    <div class="justify-content-start flex-shrink-1">
                        <ul class="list-group px-auto mx-auto justify-content-center text-center w-100 d-flex">
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-facebook">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url("galeri/{$gallery->url}") ?>" target="_blank">
                                    <i class="fa fa-facebook mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-twitter mb-1">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="http://twitter.com/share?text=<?= $gallery->title ?>&url=<?= base_url("galeri/{$gallery->url}") ?>" target="_blank">
                                    <i class="fa fa-twitter mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="" class="mx-auto px-auto justify-content-center text-center w-100 text-white">
                                    <i class="fa fa-star mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="javascript:void(0)" class="btnCopyLink mx-auto px-auto justify-content-center text-center w-100 text-white" data-clipboard-text="<?= base_url("galeri/{$gallery->url}") ?>">
                                    <i class="fa fa-link mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="" class="mx-auto px-auto justify-content-center text-center w-100 text-white">
                                    <i class="fa fa-comment mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="" class="mx-auto px-auto justify-content-center text-center w-100 text-white">
                                    <i class="fa fa-exclamation-triangle mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="justify-content-end flex-grow-1 pl-4">
                        <?php foreach ($gallery_items as $key => $value) : ?>
                            <div class="mb-4">
                                <h2 class="mt-1"><?= $value->title; ?></h2>
                                <?php if ($gallery->gallery_type == "files") : ?>
                                    DOSYAYI İNDİRİN : <a href="<?= get_picture("galleries_v/$gallery->gallery_type/{$gallery->url}", $value->url) ?>" download><i class="fa fa-download fa-2x"></i></a>
                                <?php elseif ($gallery->gallery_type == "videos") : ?>
                                    <video id="my-video<?= $key ?>" class="video-js" controls preload="auto" width="100%">
                                        <source src="<?= get_picture("galleries_v/$gallery->gallery_type/{$gallery->url}", $value->url) ?>" />
                                    </video>
                                <?php elseif ($gallery->gallery_type == "video_urls") : ?>
                                    <iframe src="<?= $value->url ?>" allowfullscreen allowtransparency></iframe>
                                <?php else : ?>
                                    <img src="<?= get_picture("galleries_v/$gallery->gallery_type/{$gallery->url}", $value->url) ?>" class="img-fluid w-100 my-3" alt="<?= $value->title ?>">
                                <?php endif; ?>
                                <?= $value->description; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="text-center dark border p-3 mt-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>


            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="container text-center dark border p-5">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <h3 class="title">Çok Okunanlar</h3>
                <?php if (!empty($most_read)) : ?>
                    <?php foreach ($most_read as $item) : ?>
                        <a href="<?= base_url("haber/" . $item->seo_url); ?>" class="text-color">
                            <div class="card rounded-0 border border mb-3 <?= (get_cookie("theme", true) == "dark" ? "dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?= get_picture("news_v", $item->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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

                <div class="container text-center dark border mt-3 p-5">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</section>