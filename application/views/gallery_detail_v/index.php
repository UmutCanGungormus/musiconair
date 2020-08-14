<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="text-center bg-dark border p-3">
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
                        <?php ($gallery->gallery_type == "file" ? $folderName = "files" : ($gallery->gallery_type == "image" ? $folderName = "images" : ($gallery->gallery_type == "video" ? $folderName = "videos" : $folderName = null))) ?>
                        <?php foreach ($gallery_items as $key => $value) : ?>
                            <div class="mb-4">
                                <h2 class="mt-1"><?= $value->title; ?></h2>
                                <?php if (!empty($folderName) && ($gallery->gallery_type == "file")) : ?>
                                    <?php $url = base_url("panel/uploads/galleries_v/{$folderName}/{$gallery->url}/{$value->url}") ?>
                                    DOSYAYI İNDİRİN : <a href="<?=$url?>" download><i class="fa fa-download fa-2x"></i></a>
                                <?php elseif(!empty($folderName) && ($gallery->gallery_type == "video")):?>
                                    <video id="my-video<?=$key?>" class="video-js" controls preload="auto" width="300" height="150" data-setup="<?=($gallery_type == "video_url" ? '{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "' . $value->url . '"}] }' : '{}')?>">
                                        <?php if ($gallery_type == "video") : ?>
                                            <?php $url = base_url("panel/uploads/galleries_v/{$folderName}/{$gallery->url}/{$value->url}") ?>
                                            <source src="<?=$url?>"/>
                                        <?php endif; ?>
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                <?php else: ?>
                                    <?php $url = base_url("panel/uploads/galleries_v/{$folderName}/{$gallery->url}/851x606/{$value->url}") ?>
                                    <img src="<?= $url ?>" class="img-fluid w-100 my-3" alt="<?= $value->title ?>">
                                <?php endif; ?>
                                <?= $value->content; ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="text-center bg-dark border p-3 mt-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>


            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="container text-center bg-dark border p-5">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <h3 class="title">Çok Okunanlar</h3>
                <?php if (!empty($most_read)) : ?>
                    <?php foreach ($most_read as $item) : ?>
                        <a href="<?= base_url("haber/" . $item->seo_url); ?>" class="text-color">
                            <div class="card rounded-0 border border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?= base_url("panel/uploads/news_v/370x297/" . $item->img_url); ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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

                <div class="container text-center bg-dark border mt-3 p-5">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</section>