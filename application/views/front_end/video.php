
	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name py-0 mx-0 mb-2" style="background-image: url(<?php echo base_url("public/front_end/assets/images/video-bg.jpg")?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class=" px-2">#Video</b></h1>
		</div>
		
		<div class="container mt-2">
			<div class="row mt-4 text-center">
                <div class="col-md-6 bg-dark border" style="height: 90px;">
                    <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
                </div>
                <div class="col-md-6 bg-dark border" style="height: 90px;">
                    <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
                </div>
            </div>

            <div class="row my-3">
                
                <div class="col-md-12">
                    <h5 style="margin-left: -13px;">Önerilen Videolar</h5>
                </div>

                <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="col-md-4 p-0">
                    <div class="card item mb-1 m-1 shadow-none">
                        <div class="card-body p-0 m-0">
                            <div style="position: relative;" class="video-list">
                                <a class="link-video" target="_blank" href="">
                                    <img src="<?php echo base_url("public/uploads/video_photos/3.jpg");?>" class="img-fluid" />
                                    <i class="emoji-love"></i>
                                    <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://www.youtube.com/watch?v=<?php // echo $value->video_embed_kodu;?>"></a>
                                </a>
                            </div>

                            <div style="font-size: 11px;">
                                <div class="d-inline-block mr-1 py-2 px-2">
                                    <i class="fa fa-user"></i> asdad
                                </div>
                                <div class="d-inline-block">
                                    <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i>24 Ocak 2020
                                </div>
                            </div>
                            <a class="link-video" target="_blank" href="">
                                <h6 class="px-1 py-3"><b>Önerilen Video</b></h6>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
                <hr>

                <?php
                    foreach ($get_video_categories AS $video_category):
                        echo '<div class="col-md-12 mb-3 mt-5">';
                            echo '<div class="container mb-5">';
                            
                                    echo '<h5 style="margin-left: -13px;">'.$video_category -> video_category_name.'</h5>';
                                    echo '<div class="row">';
                                    foreach ($video_category -> videos as $video):
                                    ?>

                                    <div class="col-md-3 p-0">
                                        <div class="card item mb-1 m-1 shadow-none">
                                            <div class="card-body p-0 m-0">
                                                <div style="position: relative;" class="video-list">
                                                    <a class="link-video" target="_blank" href="<?php echo base_url("video_detay/".$video->id);?>">
                                                        <img src="<?php echo base_url("public/uploads/video_photos/".$video->id.".jpg");?>" class="img-fluid" />
                                                        <i class="emoji-love"></i>
                                                        <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://www.youtube.com/watch?v=<?php // echo $value->video_embed_kodu;?>"></a>
                                                        <span style="position: absolute; top: 10px; left: 10px; background-color: green; padding: 3px 5px; color: #FFFFFF;">Sponsorlu</span>
                                                    </a>
                                                </div>

                                                <div style="font-size: 11px;">
                                                    <div class="d-inline-block mr-1 py-2 px-2">
                                                        <i class="fa fa-user"></i> <?php echo $video->ad;?>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php  setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($video->news_create_time)); ?>
                                                    </div>
                                                </div>
                                                <a class="link-video" target="_blank" href="<?php echo base_url("video_detay/".$video->id);?>">
                                                    <h6 class="px-1 py-3"><b><?php echo $video->news_title; ?></b></h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    endforeach;

                                    echo '</div>';
                                    echo '<a href="" class="mt-3 d-block">Tümünü Görüntüle</a>';

                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                ?>
            </div>

            <div class="row mt-1">
                <?php $tumVideolar= $this->db->query("select * from site_videos")->result();
                foreach ($tumVideolar as $item) {
                    $haber= $this->db->query("select * from site_news where id=$item->haber_id")->row();
                    $yazar= $this->db->query("select * from site_writers where id=$haber->yazar_id")->row();
                    ?>
                    
                <?php }?>
            </div>
		</div>
	</div>
</section>
