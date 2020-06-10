<?php
//$yazar = $this->db->query("select * from site_writers where id=$haber->yazar_id")->row();
//$this->db->query("update site_news set goruntulenme=(goruntulenme+1) where id=$haber->id");
//$comments = $this->db->query("select * from site_comments where iliski_tip='haber' and iliski_id=$haber->id ORDER BY tarih")->result();
//en fazla alt alta 3 yorum listelenecektir habere yapılan yorum ve var ise yoruma verilen cevap yorumu
?>
<?php $this->load->view("includes/head");?>
<?php $this->load->view("includes/header");?>
<?php $this->load->view("includes/sidebar");?>
<?php $writer=get_writer($news->writer_id);?>
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
                    <a href="#"><?php echo $news->title; ?></a> 
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
                  
                        <h2 class="mt-1"><?php echo $news->title; ?></h2>
                        
                        <?php
                            echo '<span class="grey-text" style="font-size: 13px;"><i class="fa fa-clock-o"></i> Yayınlanma Tarihi: '.date("d/m/Y",strtotime($news->date)).'</span>';

                            if ($news -> date)
                                echo '<span class="grey-text ml-2" style="font-size: 13px;"><i class="fa fa-clock-o"></i> Güncellenme Tarihi: '. date("d/m/Y",strtotime($news->date)).'</span>';
                        ?>

                        <div class="border mt-4 p-2 clearfix">
                            <img class="float-left mr-2" src="<?php echo base_url('panel/uploads/writers_v/90x90/'.$news->img_url); ?>" width="40">
                            <b class="d-block"><?php echo $writer->name?> (@<?php echo $writer->nick; ?>)</b>
                            <span class="grey-text"><?php echo $writer->type; ?></span>
                        </div>
                        <div class="col-md-12">
                        <?php
                            if ($news->img_url){ ?>
                               <img style="display:block;margin-bottom: 20px; width:100%" src="<?php echo base_url("panel/uploads/news_v/370x297/".$news->img_url) ?>" class="img-fluid mt-3" alt="<?php echo $news->title?>">
                            <?php
                            }
                        ?>
                        <div class="row">
                       
                       <div class="col-md-1">
                            <ul style="display:inline-block" class="post-emoji-icons">
                            <li style="background-position: inherit;" class="cok-iyi">
                                    
                                </li>
                                <li style="text-align:center;">
                                  <p> <b> <?php echo $news->hit;?></b></br>
                                   OKUNMA</p>
                                    </li>
                                <li style="background-color: #3b5998 ; text-align: center; width: 40px; height: 40px; border-radius: 100% 100% 0 0; padding: 10px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ?>" target="_blank">
                                        <i class="fa fa-facebook text-white"></i>
                                    </a>
                                </li>
                                <li style="background-color: #00acee; text-align: center; width: 40px; height: 40px; border-radius:0 0 100% 100% ; padding: 10px;">
                                    <a href="http://twitter.com/share?text=<?php echo $news->title ?>&url=<?php echo "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ?>" target="_blank">
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
                            <div style="display:inline-block" class="col-md-11">
                            <p><?php
                           echo $news->content;
                        ?></p>
                        </div>
                        </div>
                        
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

                            <?php echo $news->title; ?>
                        </div>

                        <div class="container text-center bg-dark border" style="height: 90px;">
                            <h3 class="text-white">Reklam Alanı</h3>
                        </div>

                        <div class="mt-4" style="height: 70px;">
                            <b>Etiketler</b>
                            <ul>
                                <?php $tags = explode(",", $news->tags);
                                foreach ($tags as $tag) {
                                    ?>
                                    <a href=""
                                       class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#<?php echo $tag; ?></b></a>
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
                           
                           $emotions=(array) json_decode($news->reaction);
                         
                             arsort($emotions);

                            ?>
                            <ul class="post-emoji-bars">

                                <?php
                                $i=0;
                                foreach ($emotions as $key => $val) {

                                    switch ($key) {
                                        case "cok_iyi":
                                            echo "<li style='left:".($i*60)."px; height: ".$val."px;' id='cok-iyi'><span>$val</span></li>";
                                            break;
                                        case "helal_olsun":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' id='helal-olsun'><span>$val</span></li>";
                                            break;
                                        case "kizgin":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' id='kizgin'><span>$val</span></li>";
                                            break;
                                        case "uzucu":
                                            echo "<li style='  left:".($i*60)."px; height: ".$val."px' id='uzucu'><span>$val</span></li>";
                                            break;
                                        case "yerim":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' id='yerim'><span>$val</span></li>";
                                            break;
                                        case "yok_artik":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' id='yok-artik'><span>$val</span></li>";
                                            break;
                                        case "hos_degil":
                                            echo "<li style=' left:".($i*60)."px; height: ".$val."px' id='hos-degil'><span>$val</span></li>";
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
                                                <input type="hidden" name="haberid" value="<?php echo $news->id; ?>">
                                                <input type="hidden" name="userid"
                                                       value="<?php if (isset($_SESSION['user'])) {
                                                           echo $_SESSION['user'];
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

                                  <!--  <ul class="list-group list-group-flush">
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
                   
                   
                    <div class="container p-3 mt-3">
                        <h3 class="title">Benzer Haberler</h3>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($benzer as $item) {
                                ?>
                                <li style="border-bottom: 1px solid #dee2e6;    padding-bottom: 10px;" class="mb-4">
                                    <a href="<?php echo base_url("haber/".$item->seo_url);?>" class="d-inline-block mt-2 text-color">
                                        <img style="border-radius:100%;width:50px;display:inline-block" src="<?php echo base_url("panel/uploads/news_v/370x297/".$item->img_url); ?>" class="img-fluid" alt="">
                                        <b class="mt-2 d-inline-block" style="font-size: 17px;"><?php echo $item->title; ?></b>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                     <div class="container p-3 mt-3">
                        <h3 class="title">Çok Okunanlar</h3>
                        <ul class="list-group list-group-flush">
                            <?php 
                            foreach ($most_read as $item){
                                ?>
                                <li style="border-bottom: 1px solid #dee2e6;    padding-bottom: 10px;" class="mb-4">
                                    <a href="<?php echo base_url("haber/".$item->seo_url);?>" class="d-inline-block mt-2 text-color">
                                        <img style="border-radius:100%;width:50px;display:inline-block"  src="<?php echo base_url("panel/uploads/news_v/370x297/".$item->img_url); ?>" class="img-fluid" alt="">
                                        <b class="mt-2 d-inline-block"><?php echo $item->title; ?></b>
                                    </a>
                                </li>
                            
                            <?php } ?>
                        </ul>
                    </div> 
                    
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

<?php $this->load->view("includes/footer");?>
<script type="text/javascript">
                            document.addEventListener("DOMContentLoaded", function () {
                                $(".cok-iyi").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "cok_iyi",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#cok-iyi').css("height"));
                                            
                                           $('#cok-iyi span').html(res);
                                           $('#cok-iyi').css("background-color","#9ceafd");
                                           $('#cok-iyi').css("height",$height+5);
                                           

                                            }
                                           
                                          
                                        }
                                    });
                                });
                               
                                $(".helal-olsun").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "helal_olsun",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                                   
                                            }else{
                                                $height=parseInt($('#helal-olsun').css("height"));
                                            
                                            $('#helal-olsun span').html(res);
                                            $('#helal-olsun').css("background-color","#9ceafd");
                                            $('#helal-olsun').css("height",$height+5);
                                            
                                        } }
                                    });
                                });
                                $(".hos-degil").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "hos_degil",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#hos-degil').css("height"));
                                            
                                            $('#hos-degil span').html(res);
                                            $('#hos-degil').css("background-color","#9ceafd");
                                            $('#hos-degil').css("height",$height+5);
                                        }
                                    }
                                    });
                                });
                                $(".kizgin").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "kizgin",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#kizgin').css("height"));
                                            
                                            $('#kizgin span').html(res);
                                            $('#kizgin').css("background-color","#9ceafd");
                                            $('#kizgin').css("height",$height+5);
                                        } 
                                    }
                                    });
                                });
                                $(".uzucu").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "uzucu",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#uzucu').css("height"));
                                            
                                            $('#uzucu span').html(res);
                                            $('#uzucu').css("background-color","#9ceafd");
                                            $('#uzucu').css("height",$height+5);
                                        }
                                    }
                                    });
                                });
                                $(".yerim").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "yerim",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#yerim').css("height"));
                                            
                                            $('#yerim span').html(res);
                                            $('#yerim').css("background-color","#9ceafd");
                                            $('#yerim').css("height",$height+5);
                                        }
                                    }

                                    });
                                });
                                $(".yok-artik").click(function () {
                                    $.ajax({
                                        url: "<?=base_url("urlEmotion")?>",
                                        method: "POST",
                                        data: {ad: "yok_artik",id:<?=$news->id?>},
                                        success: function (res) {
                                            if(res=="alert"){
                                                emoji_error();
                                            }else{
                                                $height=parseInt($('#yok-artik').css("height"));
                                            
                                            $('#yok-artik span').html(res);
                                            $('#yok-artik').css("background-color","#9ceafd");
                                            $('#yok-artik').css("height",$height+5);
                                        }
                                    }
                                    });
                                });
                            });
                        </script>
