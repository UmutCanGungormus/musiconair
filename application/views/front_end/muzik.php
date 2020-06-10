

	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name py-0 mx-0 mb-2" style="background-image: url(<?php echo base_url("public/front_end/assets/images/muzik-bg.jpg")?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Müzik</b></h1>
		</div>
		
		<div class="container mt-2">
			<div class="row mt-4 text-center px-4">
                <div class="col-md-6 bg-dark border" style="height: 90px;">
                    <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
                </div>
                <div class="col-md-6 bg-dark border" style="height: 90px;">
                    <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
                </div>
            </div>

			<div class="row my-4">
				
                <?php foreach ($albumler as $item) {?>
                    <div class="col-md-3">

                        <a href="<?php echo base_url("muzik_detay/".$item->id);?>">
                            <div class="view zoom shadow mb-4" style="cursor: pointer;">
                                <img src="<?php echo base_url("public/uploads/albums/".$item->id.".jpg");?>" class="img-fluid">
                                <div class="mask flex-center">
                                    <h4 class="white-text"><b><?php if($item->album){echo "Albüm";}else{echo "Single";} ?></b></h4>
                                </div>
                            </div>
                        </a>

                    </div>

                <?php }?>
<!--                --><?php //for ($i = 1; $i <= 8; $i++): ?>
<!--                -->
<!--					<div class="col-md-3">-->
<!---->
<!--						<a href="haber-detay.php">-->
<!--							<div class="view zoom shadow mb-4" style="cursor: pointer;">-->
<!--							    <img src="--><?php //echo base_url("public/front_end/assets/images/song.jpg")?><!--" class="img-fluid">-->
<!--							    <div class="mask flex-center">-->
<!--							        <h4 class="white-text"><b>Single & Albüm</b></h4>-->
<!--							    </div>-->
<!--							</div>-->
<!--						</a>-->
<!---->
<!--					</div>-->
<!--				--><?php //endfor; ?>
			</div>

			<h3 class="my-4 title">Sanatçılar</h3>
			<div class="row">
                <?php foreach ($artists as $artist) {?>
                    <div class="col-md-3">

                        <a href="#">
                            <div class="view zoom shadow mb-4" style="cursor: pointer;">
                                <img src="<?php echo base_url("public/uploads/stars/".$artist->id.".jpg");?>" class="img-fluid">
                                <div class="mask flex-center">
                                    <h5 class="white-text"><?php echo $artist->ad;?></h5>
                                </div>
                            </div>
                        </a>

                    </div>
                <?php }?>
<!--				--><?php //for ($i = 1; $i <= 24; $i++): ?>
<!--					<div class="col-md-3">-->
<!---->
<!--						<a href="haber-detay.php">-->
<!--							<div class="view zoom shadow mb-4" style="cursor: pointer;">-->
<!--							    <img src="--><?php //echo base_url("public/front_end/assets/images/artist.jpg")?><!--" class="img-fluid">-->
<!--							    <div class="mask flex-center"></div>-->
<!--							</div>-->
<!--						</a>-->
<!---->
<!--					</div>-->
<!--				--><?php //endfor; ?>
			</div>
		</div>
	</div>
</section>

