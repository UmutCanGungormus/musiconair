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
                    <a href="<?= base_url("ilanlar"); ?>">İlanlar</a> <span>></span>
                    <?php if($advertisement->type == "job"):?>
                        <a href="<?=base_url("ilanlar/is")?>">İş İlanları</a> <span>></span>
                    <?php else:?>
                        <a href="<?=base_url("ilanlar/emlak")?>">Emlak İlanları</a> <span>></span>
                    <?php endif;?>
                    <a href="javascript:void(0)"><?= $advertisement->title; ?></a>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">

                <h2 class="mt-1"><?= $advertisement->title; ?></h2>
                <span class="grey-text d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Yayınlanma Tarihi: <?= turkishDate("d F Y, l H:i", $advertisement->createdAt) ?></span>
                <?php if ($advertisement->updatedAt) : ?>
                    <span class="grey-text ml-2 d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Güncellenme Tarihi: <?= turkishDate("d F Y, l H:i", $advertisement->updatedAt) ?></span>
                <?php endif; ?>
                <?php if ($advertisement->img_url) : ?>
                    <img src="<?=get_picture("advertisements_v",$advertisement->img_url) ?>" class="img-fluid w-100 my-3" alt="<?= $advertisement->title ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between">

                    <div class="justify-content-start flex-shrink-1">
                        <ul class="list-group px-auto mx-auto justify-content-center text-center w-100 d-flex">
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 cok-iyi bg-transparent border-0 mb-1"></li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="javascript:void(0)"><?= clean($advertisement->hit); ?></a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-facebook">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url("haber/{$advertisement->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-facebook mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-twitter mb-1">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="http://twitter.com/share?text=<?= $advertisement->title ?>&url=<?= base_url("haber/{$advertisement->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-twitter mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="" class="mx-auto px-auto justify-content-center text-center w-100 text-white">
                                    <i class="fa fa-star mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="javascript:void(0)" class="btnCopyLink mx-auto px-auto justify-content-center text-center w-100 text-white" data-clipboard-text="<?= base_url($advertisement->seo_url) ?>">
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
                        <p><?= $advertisement->content; ?></p>
                    </div>
                </div>

                <div class="text-center bg-dark border p-3 mt-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <div class="mt-4">
                    <b>Etiketler</b>
                    <?php $tags = explode(",", $advertisement->tags); ?>
                    <?php foreach ($tags as $tag) : ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm m-1 p-1"><b>#<?= $tag; ?></b></a>
                    <?php endforeach; ?>
                </div>

                <div class="alert alert-warning mt-3" role="alert">
                    Bu İçerik üyemiz tarafından eklenmiştir. Ekibimiz tarafından müdahalede bulunulmamıştır.
                </div>



            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="container text-center bg-dark border p-5">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>


                <h3 class="title">Benzer Haberler</h3>
                <?php if (!empty($similar)) : ?>
                    <?php foreach ($similar as $item) : ?>
                        <a href="<?= base_url("haber/" . $item->seo_url); ?>" class="text-color">
                            <div class="card rounded-0 border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?=get_picture("advertisements_v",$item->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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

                <h3 class="title">Çok Okunanlar</h3>
                <?php if (!empty($most_read)) : ?>
                    <?php foreach ($most_read as $item) : ?>
                        <a href="<?= base_url("haber/" . $item->seo_url); ?>" class="text-color">
                            <div class="card rounded-0 border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?=get_picture("advertisements_v",$item->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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

<script>
    $(document).ready(function() {
        $(document).on("click", ".cok-iyi-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "cok_iyi");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function(response) {
                $height = parseInt($('#cok-iyi').css("height"));
                $('#cok-iyi span').html(response.response_data);
                $('#cok-iyi').css("background-color", "#9ceafd");
                $('#cok-iyi').css("height", $height + 5);
            });
        });
        $(document).on("click", ".helal-olsun-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "helal_olsun");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#helal-olsun').css("height"));
                $('#helal-olsun span').html(res);
                $('#helal-olsun').css("background-color", "#9ceafd");
                $('#helal-olsun').css("height", $height + 5);
            });
        });
        $(document).on("click", ".hos-degil-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "hos_degil");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#hos-degil').css("height"));
                $('#hos-degil span').html(res);
                $('#hos-degil').css("background-color", "#9ceafd");
                $('#hos-degil').css("height", $height + 5);
            });
        });
        $(document).on("click", ".kizgin-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "kizgin");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#kizgin').css("height"));
                $('#kizgin span').html(res);
                $('#kizgin').css("background-color", "#9ceafd");
                $('#kizgin').css("height", $height + 5);
            });
        });
        $(document).on("click", ".uzucu-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "uzucu");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#uzucu').css("height"));
                $('#uzucu span').html(res);
                $('#uzucu').css("background-color", "#9ceafd");
                $('#uzucu').css("height", $height + 5);
            });
        });
        $(document).on("click", ".yerim-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "yerim");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#yerim').css("height"));
                $('#yerim span').html(res);
                $('#yerim').css("background-color", "#9ceafd");
                $('#yerim').css("height", $height + 5);
            });
        });
        $(document).on("click", ".yok-artik-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "yok_artik");
            formData.append("id", <?= $advertisement->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#yok-artik').css("height"));
                $('#yok-artik span').html(res);
                $('#yok-artik').css("background-color", "#9ceafd");
                $('#yok-artik').css("height", $height + 5);
            });
        });
    });
</script>