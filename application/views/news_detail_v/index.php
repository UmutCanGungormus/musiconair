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
                    <a href="<?= base_url("haberler/{$category->seo_url}"); ?>"><?=$category->title?></a> <span>></span>
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
                    <img class="float-left mr-2" src="<?= base_url('panel/uploads/writers_v/90x90/' . $writer->img_url); ?>" width="40">
                    <b class="d-block"><?= $writer->name ?> <?= (!empty($writer->nick) ? "(" . $writer->nick . ")" : null); ?></b>
                    <span class="grey-text"><?= $writer->type; ?></span>
                </div>
                <?php if ($news->img_url) : ?>
                    <img src="<?=get_picture("news_v",$item->img_url) ?>" class="img-fluid w-100 my-3" alt="<?= $news->title ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between">

                    <div class="justify-content-start flex-shrink-1">
                        <ul class="list-group px-auto mx-auto justify-content-center text-center w-100 d-flex">
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 cok-iyi bg-transparent border-0 mb-1"></li>
                            <li class="list-group-item p-3 mx-auto justify-content-center text-center w-100 radius-secondary mb-1">
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
                        <?= $news->content; ?>
                    </div>
                </div>

                <div class="text-center bg-dark border p-3 mt-3">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>

                <div class="mt-4">
                    <b>Etiketler</b>
                    <?php $tags = explode(",", $news->tags); ?>
                    <?php foreach ($tags as $tag) : ?>
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm m-1 p-1"><b>#<?= $tag; ?></b></a>
                    <?php endforeach; ?>
                </div>

                <div class="alert alert-warning mt-3" role="alert">
                    Bu İçerik üyemiz tarafından eklenmiştir. Ekibimiz tarafından müdahalede bulunulmamıştır.
                </div>
                <div class="mt-4 post-emoji clearfix">
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



                <div id="comments" class="mt-4 clearfix">
                    <b>Yorumlar</b>
                    <?php if (isset($_SESSION['user']) || true) { ?>
                        <div class="bg-light py-3">
                            <div class="row m-0 mb-3 justify-content-center">
                                <div class="col-md-2 p-0 text-center">
                                    <img src="https://placehold.it/60x60&text=60x60" class="img-fluid">
                                </div>
                                <div class="col-md-10">
                                    <form action="#" method="post">
                                        <input type="hidden" name="haberid" value="<?= $news->id; ?>">
                                        <input type="hidden" name="userid" value="<?php if (isset($_SESSION['user'])) {
                                                                                        echo $_SESSION['user'];
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?>">
                                        <label for="makeComment"></label>
                                        <textarea name="makeComment" id="makeComment" class="form-control"></textarea>
                                        <button type="submit" class="btn btn-danger btn-sm float-right">Gönder
                                        </button>
                                    </form>

                                </div>
                            </div>

                            <!--  <ul class="list-group list-group-flush">
                                        <?php
                                        foreach ($comments as $comment) {
                                            $cUser = $this->db->query("select * from site_users WHERE id=$comment->yorum_yapan_id")->row();
                                        ?>
                                            <li class="list-group-item bg-transparent">
                                                <b><?= $cUser->nick; ?>: </b><?= $comment->text; ?>
                                            </li>
                                        <?php } ?>
                                        <!--                                        --><?php //for ($i = 1; $i <= 7; $i++): 
                                                                                        ?>
                            <!--                                            <li class="list-group-item bg-transparent">-->
                            <!--                                                <b>Ahmet: </b>Lorem ipsum dolor sit amet, consectetur adipisicing-->
                            <!--                                                elit. Hic, consequatur, iusto. Quisquam facere, in at. Similique-->
                            <!--                                                odio natus possimus quasi, blanditiis, quos, cum tenetur pariatur-->
                            <!--                                                harum nemo architecto illo quisquam.-->
                            <!--                                            </li>-->
                            <!--                                        --><?php //endfor; 
                                                                            ?>
                            </ul>

                        </div>
                    <?php } ?>
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
                            <div class="card rounded-0 border border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?=get_picture("news_v",$item->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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
                            <div class="card rounded-0 border border mb-3 <?= (get_cookie("theme", true) == "dark" ? "bg-dark" : null) ?>">
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
                                        <img src="<?=get_picture("news_v",$item->img_url) ?>" class="card-img img-fluid d-flex h-100 rounded-0" alt="<?= $item->title; ?>">
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
            formData.append("id", <?= $news->id ?>);
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