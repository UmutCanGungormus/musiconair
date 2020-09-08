<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $ad = get_random_ads() ?>
                <a href="<?= $ad->url ?>" target="_blank" class="bg-transparent"><img src="<?= get_picture("home_banner_v", $ad->img_url) ?>" class="img-fluid w-100" style="max-height:250px"></a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php $ad = get_random_ads() ?>
                <a href="<?= $ad->url ?>" target="_blank" class="bg-transparent"><img src="<?= get_picture("home_banner_v", $ad->img_url) ?>" class="img-fluid w-100" style="max-height:250px"></a>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                <div class="breadcrumb pl-0">
                    <a href="<?= base_url(); ?>">Anasayfa</a> <span>></span>
                    <a href="<?= base_url("haberler/{$category->seo_url}"); ?>"><?= $category->title ?></a> <span>></span>
                    <a href="javascript:void(0)"><?= $news->title; ?></a>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">

                <h2 class="mt-1"><?= $news->title; ?></h2>
                <span class="grey-text d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Yayınlanma Tarihi: <?= turkishDate("d F Y, l H:i", $news->createdAt) ?></span>
                <?php if ($news->updatedAt) : ?>
                    <span class="grey-text ml-2 d-inline-flex align-middle"><i class="fa fa-clock-o mr-1 my-auto"></i> Güncellenme Tarihi: <?= turkishDate("d F Y, l H:i", $news->updatedAt) ?></span>
                <?php endif; ?>

                <div class="border mt-4 p-2 clearfix">
                    <img class="float-left mr-2" src="<?= get_picture("users_v", $writer->img_url) ?>" width="40">
                    <b class="d-block"><?= $writer->full_name ?> <?= (!empty($writer->username) ? "(" . $writer->username . ")" : null); ?></b>
                    <span class="grey-text"><?= $writer_role; ?></span>
                </div>
                <?php if ($news->img_url) : ?>
                    <img src="<?= get_picture("news_v", $news->img_url) ?>" class="img-fluid w-100 my-3" alt="<?= $news->title ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between">

                    <div class="justify-content-start flex-shrink-1">
                        <ul class="list-group px-auto mx-auto justify-content-center text-center w-100 d-flex">
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 cok-iyi bg-transparent border-0 mb-1"></li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1" data-toggle="tooltip" data-title="Görüntülenme" data-placement="top">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="javascript:void(0)"><?= clean($news->hit); ?></a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-facebook">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url("haber/{$news->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-facebook mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-twitter mb-1">
                                <a class="mx-auto px-auto justify-content-center text-center w-100 text-white" href="http://twitter.com/share?text=<?= $news->title ?>&url=<?= base_url("haber/{$news->seo_url}") ?>" target="_blank">
                                    <i class="fa fa-twitter mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="" class="mx-auto px-auto justify-content-center text-center w-100 text-white">
                                    <i class="fa fa-star mx-auto px-auto justify-content-center text-center"></i>
                                </a>
                            </li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
                                <a href="javascript:void(0)" class="btnCopyLink mx-auto px-auto justify-content-center text-center w-100 text-white" data-clipboard-text="<?= base_url($news->seo_url) ?>">
                                    <i class="fa fa-link mx-auto px-auto justify-content-center text-center"></i>
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
                        <?= $news->content; ?>
                    </div>
                </div>

                <?php $ad = get_random_ads() ?>
                <a href="<?= $ad->url ?>" target="_blank" class="bg-transparent"><img src="<?= get_picture("home_banner_v", $ad->img_url) ?>" class="img-fluid w-100" style="max-height:250px"></a>

                <div class="mt-4">
                    <b>Etiketler</b>
                    <?php $tags = explode(",", $news->tags); ?>
                    <?php foreach ($tags as $tag) : ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm m-1 p-1"><b>#<?= $tag; ?></b></a>
                    <?php endforeach; ?>
                </div>

                <div class="my-4 post-emoji clearfix">
                    <b>Emoji Bırak</b>
                    <?php $emotions = (array) json_decode($news->reaction); ?>
                    <?php arsort($emotions); ?>
                    <ul class="post-emoji-bars">
                        <?php
                        $i = 0;
                        foreach ($emotions as $key => $val) :

                            switch ($key):
                                case "cok_iyi":
                                    echo "<li style='left:" . ($i * 60) . "px; height: " . $val . "px;' id='cok-iyi'><span>$val</span></li>";
                                    break;
                                case "helal_olsun":
                                    echo "<li style=' left:" . ($i * 60) . "px; height: " . $val . "px' id='helal-olsun'><span>$val</span></li>";
                                    break;
                                case "kizgin":
                                    echo "<li style=' left:" . ($i * 60) . "px; height: " . $val . "px' id='kizgin'><span>$val</span></li>";
                                    break;
                                case "uzucu":
                                    echo "<li style='  left:" . ($i * 60) . "px; height: " . $val . "px' id='uzucu'><span>$val</span></li>";
                                    break;
                                case "yerim":
                                    echo "<li style=' left:" . ($i * 60) . "px; height: " . $val . "px' id='yerim'><span>$val</span></li>";
                                    break;
                                case "yok_artik":
                                    echo "<li style=' left:" . ($i * 60) . "px; height: " . $val . "px' id='yok-artik'><span>$val</span></li>";
                                    break;
                                case "hos_degil":
                                    echo "<li style=' left:" . ($i * 60) . "px; height: " . $val . "px' id='hos-degil'><span>$val</span></li>";
                                    break;
                            endswitch;
                            $i++;
                        endforeach; ?>
                    </ul>

                    <ul class="post-emoji-icons">
                        <!--                                burada istenilen verilen tepki çoğunluğuna göre azalan desc sıralama-->
                        <?php
                        foreach ($emotions as $key => $val) :
                            switch ($key):
                                case "cok_iyi":
                                    echo "<li class='cok-iyi cok-iyi-btn'></li>";
                                    break;
                                case "helal_olsun":
                                    echo "<li class='helal-olsun helal-olsun-btn'></li>";
                                    break;
                                case "kizgin":
                                    echo "<li class='kizgin kizgin-btn'></li>";
                                    break;
                                case "uzucu":
                                    echo "<li class='uzucu uzucu-btn'></li>";
                                    break;
                                case "yerim":
                                    echo "<li class='yerim yerim-btn'></li>";
                                    break;
                                case "yok_artik":
                                    echo "<li class='yok-artik yok-artik-btn'></li>";
                                    break;
                                case "hos_degil":
                                    echo "<li class='hos-degil hos-degil-btn'></li>";
                                    break;
                            endswitch;
                        endforeach; ?>
                    </ul>
                </div>
                <h3>YORUMLAR (<span class="commentCount">0</span>)</h3>
                <?php if (get_active_user()) : ?>
                    <form id="createComment" onsubmit="return false" method="POST" enctype="multipart/formdata">
                        <div class="row mx-0">
                            <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                                <a href="<?= base_url("profil/" . get_active_user()->user_name) ?>" class="d-block align-items-center text-center justify-content-center bg-transparent">
                                    <img class="rounded-circle img-fluid text-center justify-content-center bg-white border border-success shadow-lg" width="75" src="<?= get_picture("users_v", get_active_user()->img_url) ?>" alt="<?= get_active_user()->full_name ?>">
                                    <h6 class="text-center justify-content-center"><small class="text-center justify-content-center dark bg-transparent"><?= get_active_user()->user_name ?></small></h6>
                                </a>
                            </div>
                            <div class="col-9 col-sm-9 col-md-9 col-lg-11 col-xl-11">
                                <div class="form-group mb-1">
                                    <textarea name="content" class="form-control" placeholder="Yorumunuzu Buraya Yazın..." cols="30" rows="5"></textarea>
                                    <input type="hidden" name="news_id" value="<?= $news->id ?>">
                                </div>
                                <div class="form-group text-right">
                                    <button data-url="<?= base_url("yorum-yap") ?>" class="btn btn-primary btnComment mx-0">Yorum Yap</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
                <div class="loadComments mt-3">
                </div>
                <div id="loadingBar" class="justify-content-center text-center"></div>

            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <?php $ad = get_random_ads() ?>
                <a href="<?= $ad->url ?>" target="_blank" class="bg-transparent"><img src="<?= get_picture("home_banner_v", $ad->img_url) ?>" class="img-fluid w-100" style="max-height:250px"></a>


                <h3 class="title">Benzer Haberler</h3>
                <?php if (!empty($similar)) : ?>
                    <?php foreach ($similar as $item) : ?>
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

                <?php $ad = get_random_ads() ?>
                <a href="<?= $ad->url ?>" target="_blank" class="bg-transparent"><img src="<?= get_picture("home_banner_v", $ad->img_url) ?>" class="img-fluid w-100" style="max-height:250px"></a>
            </div>
        </div>
    </div>
</div>
</section>

<script>
    $(document).ready(function() {
        $("#loadingBar").html("<i class='fa fa-circle-notch fa-spin fa-2x'></i><br><cite class='font-weight-bold'>Yükleniyor Lütfen Bekleyin...</cite>");
        $.post(base_url + "yorumlari-getir/<?= $news->id ?>", {}, function(response) {
            setTimeout(function() {
                $(".loadComments").html(response.comments);
                $(".commentCount").html(response.commentCount);
                $("#loadingBar").html("");
                loading = false;
            }, 2000);
        }, 'JSON');

        $(document).on("click", ".btnComment", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("createComment"));
            createAjax(url, formData, function() {
                $("#loadingBar").html("<i class='fa fa-circle-notch fa-spin fa-2x'></i><br><cite class='font-weight-bold'>Yükleniyor Lütfen Bekleyin...</cite>");
                $.post(base_url + "yorumlari-getir/<?= $news->id ?>", {}, function(response) {
                    setTimeout(function() {
                        $(".loadComments").html(response.comments);
                        $(".commentCount").html(response.commentCount);
                        $("#loadingBar").html("");
                        loading = false;
                    }, 2000);
                }, 'JSON');
            });
        });
        $(document).on("click", ".btnReply", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formEl = $(this).closest('form.replyForm')[0];
            let formData = new FormData(formEl);
            createAjax(url, formData, function() {
                $("#loadingBar").html("<i class='fa fa-circle-notch fa-spin fa-2x'></i><br><cite class='font-weight-bold'>Yükleniyor Lütfen Bekleyin...</cite>");
                $.post(base_url + "yorumlari-getir/<?= $news->id ?>", {}, function(response) {
                    setTimeout(function() {
                        $(".loadComments").html(response.comments);
                        $(".commentCount").html(response.commentCount);
                        $("#loadingBar").html("");
                        loading = false;
                    }, 2000);
                }, 'JSON');
            });
        });



        $(document).on("click", ".cok-iyi-btn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let formData = new FormData();
            formData.append("ad", "cok_iyi");
            formData.append("id", <?= $news->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function(response) {
                $height = parseInt($(' #cok-iyi').css("height"));
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
            formData.append("id", <?= $news->id ?>);
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
            formData.append("id", <?= $news->id ?>);
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
            formData.append("id", <?= $news->id ?>);
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
            formData.append("id", <?= $news->id ?>);
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
            formData.append("id", <?= $news->id ?>);
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
            formData.append("id", <?= $news->id ?>);
            createAjax("<?= base_url("urlEmotion") ?>", formData, function() {
                $height = parseInt($('#yok-artik').css("height"));
                $('#yok-artik span').html(res);
                $('#yok-artik').css("background-color", "#9ceafd");
                $('#yok-artik').css("height", $height + 5);
            });
        });
    });
</script>