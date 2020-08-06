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
                    <a href="<?= base_url("haberler/muzik-haberleri"); ?>">Müzik Haberleri</a> <span>></span>
                    <a href="javascript:void(0)"><?= $activities->title; ?></a>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">

                <h2 class="mt-1"><?= $activities->title; ?></h2>
                <span class="grey-text d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Yayınlanma Tarihi: <?= turkishDate("d F Y, l H:i", $activities->createdAt) ?></span>
                <?php if ($activities->updatedAt) : ?>
                    <span class="grey-text ml-2 d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Güncellenme Tarihi: <?= turkishDate("d F Y, l H:i", $activities->updatedAt) ?></span>
                <?php endif; ?>
                <?php if ($activities->img_url) : ?>
                    <img src="<?= base_url("panel/uploads/activities_v/1140x705/" . $activities->img_url) ?>" class="img-fluid w-100 my-3" alt="<?= $activities->title ?>">
                <?php endif; ?>
                <div class="row">

                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                        <ul class="list-group">
                            <li class="list-group-item cok-iyi"></li>
                            <li class="list-group-item">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url("haber/{$activities->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-facebook text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://twitter.com/share?text=<?= $activities->title ?>&url=<?= base_url("haber/{$activities->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-twitter text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <i class="fa fa-star text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="javascript:void(0)" class="btnCopyLink" data-clipboard-text="<?= base_url($activities->seo_url) ?>">
                                    <i class="fa fa-link text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <i class="fa fa-comment text-white"></i>
                                </a>
                            </li>
                        </ul>








                        <ul class="post-emoji-icons list-group d-inline-flex">
                            <li class="list-group-item cok-iyi"></li>
                            <li class="list-group-item radius-facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url("haber/{$activities->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-facebook text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-twitter">
                                <a href="http://twitter.com/share?text=<?= $activities->title ?>&url=<?= base_url("haber/{$activities->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-twitter text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-secondary text-center justify-content-center">
                                <a href="">
                                    <i class="fa fa-share-alt text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-secondary">
                                <a href="">
                                    <i class="fa fa-star text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-secondary">
                                <a href="javascript:void(0)" class="btnCopyLink" data-clipboard-text="<?= base_url($activities->seo_url) ?>">
                                    <i class="fa fa-link text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-secondary">
                                <a href="">
                                    <i class="fa fa-comment text-white"></i>
                                </a>
                            </li>
                            <li class="list-group-item radius-secondary">
                                <a href="">
                                    <i class="fa fa-exclamation-triangle text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                        <p><?= $activities->content; ?></p>
                    </div>
                </div>

                <div class="text-center bg-dark border p-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <div class="alert alert-warning mt-3" role="alert">
                    Bu İçerik üyemiz tarafından eklenmiştir. Ekibimiz tarafından müdahalede bulunulmamıştır.
                </div>


            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="container text-center bg-dark border" style="height: 300px;">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>


                <h3 class="title">Benzer Haberler</h3>
                <?php if (!empty($similar)) : ?>
                    <?php foreach ($similar as $item) : ?>
                        <a href="<?= base_url("haber/" . $item->seo_url); ?>" class="text-color">
                            <div class="card rounded-0 border-bottom border-secondary mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?= base_url("panel/uploads/activities_v/370x297/" . $item->img_url); ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                                        <div class="card-body">
                                            <h6 class="card-title"><?= $item->title; ?></h6>
                                            <p class="card-text"><?= mb_word_wrap($item->content, 150, "...") ?></p>
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
                            <div class="card rounded-0 border-bottom border-secondary mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?= base_url("panel/uploads/activities_v/370x297/" . $item->img_url); ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                                        <div class="card-body">
                                            <h6 class="card-title"><?= $item->title; ?></h6>
                                            <p class="card-text"><?= mb_word_wrap($item->content, 150, "...") ?></p>
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

                <div class="container text-center bg-dark border mt-3" style="height: 300px;">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script>
    $(document).ready(function() {
        $(document).on("click", ".cok-iyi", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "cok_iyi");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function(response) {
                $height = parseInt($('#cok-iyi').css("height"));
                $('#cok-iyi span').html(response.response_data);
                $('#cok-iyi').css("background-color", "#9ceafd");
                $('#cok-iyi').css("height", $height + 5);
            });
        });
        $(document).on("click", ".helal-olsun", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "helal_olsun");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#helal-olsun').css("height"));
                $('#helal-olsun span').html(res);
                $('#helal-olsun').css("background-color", "#9ceafd");
                $('#helal-olsun').css("height", $height + 5);
            });
        });
        $(document).on("click", ".hos-degil", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "hos_degil");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#hos-degil').css("height"));
                $('#hos-degil span').html(res);
                $('#hos-degil').css("background-color", "#9ceafd");
                $('#hos-degil').css("height", $height + 5);
            });
        });
        $(document).on("click", ".kizgin", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "kizgin");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#kizgin').css("height"));
                $('#kizgin span').html(res);
                $('#kizgin').css("background-color", "#9ceafd");
                $('#kizgin').css("height", $height + 5);
            });
        });
        $(document).on("click", ".uzucu", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "uzucu");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#uzucu').css("height"));
                $('#uzucu span').html(res);
                $('#uzucu').css("background-color", "#9ceafd");
                $('#uzucu').css("height", $height + 5);
            });
        });
        $(document).on("click", ".yerim", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "yerim");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#yerim').css("height"));
                $('#yerim span').html(res);
                $('#yerim').css("background-color", "#9ceafd");
                $('#yerim').css("height", $height + 5);
            });
        });
        $(document).on("click", ".yok-artik", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "yok_artik");
            formData.append("id", <?= $activities->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#yok-artik').css("height"));
                $('#yok-artik span').html(res);
                $('#yok-artik').css("background-color", "#9ceafd");
                $('#yok-artik').css("height", $height + 5);
            });
        });
    });
</script>