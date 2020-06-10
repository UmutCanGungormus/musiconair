<?php
$yazar = $this->db->query("select * from site_writers where id=$haber->yazar_id")->row();
$this->db->query("update site_news set goruntulenme=(goruntulenme+1) where id=$haber->id");
$comments = $this->db->query("select * from site_comments where iliski_tip='haber' and iliski_id=$haber->id ORDER BY tarih")->result();
//en fazla alt alta 3 yorum listelenecektir habere yapılan yorum ve var ise yoruma verilen cevap yorumu
?>
<div class="container-fluid px-0 pr-0 page-padding-top">

    <div class="container mt-3 p-0">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container text-center bg-dark border" style="height: 90px;">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="container breadcrumb p-0">
                    <a href="<?php echo base_url(); ?>">Anasayfa</a> <span>></span>
                    <a href="<?php echo base_url(); ?>">Müzik Haberleri</a> <span>></span>
                    <a href="#"><?php echo $haber->news_title; ?></a> 
                </div>
            </div>
        </div>

        <div class="modal fade" id="hataBildirimModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" action="#" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalnews_title">Bildirim Formu</h5>
                        </div>
                        <div class="modal-body">

                            <div class="control-group">
                                <label for="resim" class="control-label">Resim:</label>
                                <div class="controls">
                                    <input type="file" name="resim" id="resim">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="ad">Ad ve Soyadınız:</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="ad" name="ad">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="mesaj">Mesajınız:</label>
                                <div class="controls">
                                    <textarea class="form-control" id="mesaj" name="mesaj"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary">Bildir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mb-2 p-0">

            <div class="row justify-content-between">

                <div class="col-md-8">
                    <div class="container px-0">

                        <h2 class="mt-1"><?php echo $haber->news_title; ?></h2>
                        
                        <?php
                            echo '<span class="grey-text" style="font-size: 13px;"><i class="fa fa-clock-o"></i> Yayınlanma Tarihi: '.strftime('%e %b %Y', $haber -> news_create_time).'</span>';

                            if ($haber -> guncelleme_tarih)
                                echo '<span class="grey-text ml-2" style="font-size: 13px;"><i class="fa fa-clock-o"></i> Güncellenme Tarihi: '.strftime('%e %b %Y', $haber -> guncelleme_tarih).'</span>';
                        ?>

                        <div class="border mt-4 p-2 clearfix">
                            <img class="float-left mr-2" src="<?php echo base_url('public/uploads/writers/'.$haber -> writer_photo); ?>" width="40">
                            <b class="d-block"><?php echo $haber -> ad; ?> (@<?php echo $haber -> nick; ?>)</b>
                            <span class="grey-text"><?php echo $haber -> gorev; ?></span>
                        </div>
                        <?php
                            if ($haber->resim_goster):
                                echo '<img src="'.base_url("public/uploads/news/".$haber->id.".jpg").'" class="img-fluid mt-3" alt="'.$haber->news_title.'">'; 
                            endif;
                        ?>

                        <div class="my-4">
                            <ul class="post-detail-social">
                                <li style="background-color: #3b5998 ; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ?>" target="_blank">
                                        <i class="fa fa-facebook text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #00acee; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="http://twitter.com/share?text=<?php echo $haber->news_title ?>&url=<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ?>" target="_blank">
                                       <i class="fa fa-twitter text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #333333; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="">
                                        <i class="fa fa-share-alt text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #333333; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="">
                                        <i class="fa fa-star text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #333333; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="">
                                        <i class="fa fa-link text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #333333; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="">
                                        <i class="fa fa-comment text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #333333; text-align: center; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                    <a href="">
                                        <i class="fa fa-exclamation-triangle text-white"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-2 d-none">
                            <div style=" position:absolute; margin-left: -76px;">

                                <div class="mt-2">
                                    <div class="ml-3 text-center"
                                         style="background-color: #333333; width: 40px; height: 40px; border-radius: 40px; padding: 10px;">
                                        <a href="">
                                            <i class="fa fa-share-alt text-white"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="ml-3 text-center"
                                         style="border: solid 2px #a11f12; width: 40px; height: 40px; border-radius: 40px; margin-bottom: 10px;">
                                        <a onclick="return false;" href="#" id="addFavorites">
                                            <i class="fa fa-star"
                                               style="color: #a11f12; line-height: 37px; font-size: 20px;"></i>
                                        </a>
                                    </div>

                                    <script type="text/javascript">
                                        var urlAdd;
                                        var urlEmotion;
                                        var url = $(location).attr("href").toString();
                                        var haberId;
                                        var news_title;
                                        var user = 0;
                                        <?php echo "urlAdd='" . base_url('add-fav') . "';";?>
                                        <?php echo "urlEmotion='" . base_url('increase-emotion') . "';";?>
                                        <?php echo "haberId='" . $haber->id . "';";?>
                                        <?php echo "shortUrlCode='" . $haber->short_code . "';";?>
                                        <?php echo "news_title='" . $haber->news_title . "';";?>
                                        <?php echo "user='" . $_SESSION['user']->id . "';";?>
                                    </script>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            var addFav = $("#addFavorites");
                                            var shortener = $("#ShortenerUrl");
                                            addFav.click(function () {
                                                $.ajax({
                                                    url: urlAdd,
                                                    method: "POST",
                                                    data: {ad: news_title, haberid: haberId, user: user, url: url},
                                                    success: function (res) {
                                                        alert(res);
                                                    }
                                                });
                                            });
                                            shortener.click(function () {
                                                event.preventDefault();
                                                alert("Bu Haberin Kısa Kodu:" + shortUrlCode);
                                            });

                                        });
                                    </script>

                                    <div class="ml-3 text-center"
                                         style="border: solid 2px #a11f12; width: 40px; height: 40px; border-radius: 40px; margin-bottom: 10px;">
                                        <a href="#" id="ShortenerUrl">
                                            <i class="fa fa-link text-center"
                                               style="color: #a11f12; line-height: 37px; font-size: 20px;"></i>
                                        </a>
                                    </div>

                                    <div class="ml-3 text-center"
                                         style="border: solid 2px #a11f12; width: 40px; height: 40px; border-radius: 40px; margin-bottom: 10px;">
                                        <a href="#comments">
                                            <i class="fa fa-comment"
                                               style="color: #a11f12; line-height: 37px; font-size: 20px;"></i>
                                        </a>
                                    </div>

                                    <div class="ml-3 text-center"
                                         style="border: solid 2px #a11f12; width: 40px; height: 40px; border-radius: 40px;">
                                        <a href="#" data-toggle="modal" data-target="#hataBildirimModal">
                                            <i class="fa fa-exclamation-triangle"
                                               style="color: #a11f12; line-height: 37px; font-size: 20px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php echo $haber->news_title; ?>
                        </div>

                        <div class="container text-center bg-dark border" style="height: 90px;">
                            <h3 class="text-white">Reklam Alanı</h3>
                        </div>

                        <div class="mt-4" style="height: 70px;">
                            <b>Etiketler</b>
                            <ul>
                                <?php $etiketler = explode(",", $haber->etiketler);
                                foreach ($etiketler as $etiket) {
                                    ?>
                                    <a href=""
                                       class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#<?php echo $etiket; ?></b></a>
                                <?php } ?>

                                <!--                                <a href=""-->
                                <!--                                   class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#AylaÇelik</b></a>-->
                                <!--                                <a href=""-->
                                <!--                                   class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#Twitter</b></a>-->
                                <!--                                <a href="" class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#Twit</b></a>-->
                            </ul>
                        </div>

                        <div class="alert alert-warning mt-3" role="alert">
                            Bu İçerik üyemiz tarafından eklenmiştir. Ekibimiz tarafından müdahalede bulunulmamıştır.
                        </div>

                        <div class="mt-4 post-emoji clearfix" style="height: 70px;">
                            <b>Emoji Bırak</b>
                            <?php
                            $emotions = array(
                                'cok_iyi' => 0,
                                'helal_olsun' => 0,
                                'kizgin' => 0,
                                'uzucu' => 0,
                                'yerim' => 0,
                                'yok_artik' => 0,
                                'hos_degil' => 0
                            );
                            $tepkiler = $this->db->query("select * from site_reactions 
                                where iliski_tipi='haber' and iliski_id=$haber->id 
                                ORDER BY emotion DESC ")->result();
                            foreach ($tepkiler as $tepki) {
                                switch ($tepki->emotion) {
                                    case "cok-iyi":
                                        $emotions['cok_iyi']++;
                                        break;
                                    case "helal-olsun":
                                        $emotions['helal_olsun']++;
                                        break;
                                    case "kizgin":
                                        $emotions['kizgin']++;
                                        break;
                                    case "uzucu":
                                        $emotions['uzucu']++;
                                        break;
                                    case "yerim":
                                        $emotions['yerim']++;
                                        break;
                                    case "yok-artik":
                                        $emotions['yok_artik']++;
                                        break;
                                    case "hos-degil":
                                        $emotions['hos_degil']++;
                                        break;
                                }
                            }
                             arsort($emotions);

                            ?>
                            <ul class="post-emoji-bars">

                                <?php
                                $i=0;
                                foreach ($emotions as $key => $val) {

                                    switch ($key) {
                                        case "cok_iyi":
                                            echo "<li style='left:".($i*60)."px; height: ".$val."px;' class='cok-iyi'><span>$val</span></li>";
                                            break;
                                        case "helal_olsun":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' class='helal-olsun'><span>$val</span></li>";
                                            break;
                                        case "kizgin":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' class='kizgin'><span>$val</span></li>";
                                            break;
                                        case "uzucu":
                                            echo "<li style='  left:".($i*60)."px; height: ".$val."px' class='uzucu'><span>$val</span></li>";
                                            break;
                                        case "yerim":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' class='yerim'><span>$val</span></li>";
                                            break;
                                        case "yok_artik":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' class='yok-artik'><span>$val</span></li>";
                                            break;
                                        case "hos_degil":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' class='hos-degil'><span>$val</span></li>";
                                            break;
                                    }
                                    $i++;} ?>

                            </ul>

                            <ul class="post-emoji-icons">
                                <!--                                burada istenilen verilen tepki çoğunluğuna göre azalan desc sıralama-->
            <?php
                foreach ($emotions as $key => $val) {

                    switch ($key) {
                        case "cok_iyi":
                            echo "<li class='cok-iyi'></li>";
                            break;
                        case "helal_olsun":
                            echo "<li class='helal-olsun'></li>";
                            break;
                        case "kizgin":
                            echo "<li class='kizgin'></li>";
                            break;
                        case "uzucu":
                            echo "<li class='uzucu'></li>";
                            break;
                        case "yerim":
                            echo "<li class='yerim'></li>";
                            break;
                        case "yok_artik":
                            echo "<li class='yok-artik'></li>";
                            break;
                        case "hos_degil":
                            echo "<li class='hos-degil'></li>";
                            break;
                    }
                } ?>
            </ul>
        </div>
                        <script type="text/javascript">
                            document.addEventListener("DOMContentLoaded", function () {
                                $(".cok-iyi").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "cok-iyi", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".helal-olsun").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "helal-olsun", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".hos-degil").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "hos-degil", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".kizgin").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "kizgin", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".uzucu").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "uzucu", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".yerim").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "yerim", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                                $(".yok-artik").click(function () {
                                    $.ajax({
                                        url: urlEmotion,
                                        method: "POST",
                                        data: {ad: "yok-artik", haberid: haberId, user: user},
                                        success: function (res) {
                                            alert(res);
                                        }
                                    });
                                });
                            });
                        </script>


                        <div id="comments" style="clear: both" class="mt-4 clearfix">
                            <b>Yorumlar</b>
                            <?php if (isset($_SESSION['user']
                                ) || true) { ?>
                                <div class="bg-light py-3">
                                    <div class="row m-0 mb-3 justify-content-center">
                                        <div class="col-md-2 p-0 text-center">
                                            <img src="https://placehold.it/60x60&text=60x60" class="img-fluid">
                                        </div>
                                        <div class="col-md-10">
                                            <form action="#" method="post">
                                                <input type="hidden" name="haberid" value="<?php echo $haber->id; ?>">
                                                <input type="hidden" name="userid"
                                                       value="<?php if (isset($_SESSION['user'])) {
                                                           echo $_SESSION['user']->id;
                                                       } else {
                                                           echo 0;
                                                       } ?>">
                                                <label for="makeComment"></label>
                                                <textarea name="makeComment" id="makeComment"
                                                          class="form-control"></textarea>
                                                <button type="submit" class="btn btn-danger btn-sm float-right">Gönder
                                                </button>
                                            </form>

                                        </div>
                                    </div>

                                    <ul class="list-group list-group-flush">
                                        <?php
                                        foreach ($comments as $comment) {
                                            $cUser = $this->db->query("select * from site_users WHERE id=$comment->yorum_yapan_id")->row();
                                            ?>
                                            <li class="list-group-item bg-transparent">
                                                <b><?php echo $cUser->nick; ?>: </b><?php echo $comment->text; ?>
                                            </li>
                                        <?php } ?>
                                        <!--                                        --><?php //for ($i = 1; $i <= 7; $i++): ?>
                                        <!--                                            <li class="list-group-item bg-transparent">-->
                                        <!--                                                <b>Ahmet: </b>Lorem ipsum dolor sit amet, consectetur adipisicing-->
                                        <!--                                                elit. Hic, consequatur, iusto. Quisquam facere, in at. Similique-->
                                        <!--                                                odio natus possimus quasi, blanditiis, quos, cum tenetur pariatur-->
                                        <!--                                                harum nemo architecto illo quisquam.-->
                                        <!--                                            </li>-->
                                        <!--                                        --><?php //endfor; ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center bg-dark border" style="height: 300px;">
                        <h3 class="text-white">Reklam Alanı</h3>
                    </div>
                    <?php
                    $strayer = $haber->kategoriler;
                    $strayer = ltrim($strayer, ",");
                    $strayer = explode(",", $strayer);
                    $clouse = "";
                    $i = 0;
                    foreach ($strayer as $stray) {
                        if ($i == 0) {
                            $clouse .= "kategoriler like '%," . $stray . "'";
                        } else {
                            $clouse .= " or kategoriler like '%," . $stray . "'";
                        }
                        $i++;
                    }
                    $benzer = $this->db->query("select * from site_news WHERE $clouse ORDER BY rand() LIMIT 3")->result() ?>
                    <div class="container p-3 mt-3">
                        <h3 class="title">Benzer Haberler</h3>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($benzer as $item) {
                                ?>
                                <li class="mb-4">
                                    <a href="<?php echo base_url("haber_detay/" . $item->id); ?>" class="d-inline-block mt-2 text-color">
                                        <img src="<?php echo base_url("public/uploads/news/" . $item->id . ".jpg"); ?>" class="img-fluid" alt="">
                                        <b class="mt-2 d-block" style="font-size: 17px;"><?php echo $item->news_title; ?></b>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <!-- <div class="container p-3 mt-3">
                        <h3 class="title">Çok Okunanlar</h3>
                        <ul class="list-group list-group-flush">
                            <?php $cok_okunanlar = $this->db->query("SELECT * FROM site_news
                            ORDER BY goruntulenme DESC LIMIT 3")->result();
                            foreach ($cok_okunanlar as $item):
                                ?>
                                <li class="mb-4">
                                    <a href="<?php echo base_url("haber_detay/" . $item->id); ?>" class="d-inline-block mt-2 text-color">
                                        <img src="<?php echo base_url("public/uploads/news/" . $item->id . ".jpg"); ?>" class="img-fluid" alt="">
                                        <b class="mt-2 d-block"><?php echo $item->news_title; ?></b>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div> -->
                    
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
</div>
</section>

