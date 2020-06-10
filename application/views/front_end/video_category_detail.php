
<?php setlocale(LC_ALL, 'turkish'); ?>
	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name py-0 mx-0 mb-2" style="background-image: url(<?php echo base_url("public/front_end/assets/images/video-bg.jpg")?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Video</b></h1>
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
                <?php foreach ($get_category_videos AS $video): ?>
                <div class="col-md-3 p-0">
                    <div class="card item mb-1 m-1 shadow">
                        <div class="card-body p-0 m-0">
                            <div style="position: relative;" class="video-list">
                                <img src="<?php echo base_url("public/uploads/video_photos/".$video->id.".jpg");?>" class="img-fluid" />
                                <i class="emoji-love"></i>
                                <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://www.youtube.com/watch?v=<?php // echo $value->video_embed_kodu;?>"></a>
                                <a class="link-video" target="_blank" href="<?php echo base_url("video_detay/".$video->id);?>"></a>
                                <span></span>
                            </div>

                            <div style="font-size: 11px;">
                                <div class="d-inline-block mr-1 py-2 px-2">
                                    <i class="fa fa-user"></i> <?php echo $video->ad;?>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i><?php  setlocale(LC_ALL, 'tr_TR.UTF-8'); echo strftime("%d %B %Y",strtotime($video->news_create_time)); ?>
                                </div>
                            </div>
                            <h6 class="px-1 py-3"><b><?php echo $video->news_title;?></b></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
		</div>
	</div>
</section>
