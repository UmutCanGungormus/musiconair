

	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name p-0 mx-0 mb-2" style="background-image: url(<?php echo base_url("public/front_end/assets/images/keyif-bg.jpg");?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Keyif</b></h1>
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

            <div class="row mt-1">

                <?php $galeriResimler= $this->db->query("select * from site_galleries")->result();
                foreach ($galeriResimler as $item) {
                    $resimler= $this->db->query("select * from site_gallery_photos WHERE gallery_photo_gallery_id=$item->gallery_id")->result();
                ?>
                    <div class="col-md-6 my-3">
                        <a href="galeri-detay.php">
                            <div class="container mx-2 p-1 bg-white shadow">
                                <div style="position: relative;">
                                <span style="position: absolute; padding: 3px 7px; bottom: 0; left: 0; background-color: #FFFFFF; color: #555555; font-size: 11px; font-weight: 500; border-top-right-radius: 3px;">
                                    <div class="d-inline-block mr-2">
                                        <i class="fa fa-eye"></i> 356
                                    </div>
                                    <div class="d-inline-block mr-2">
                                        <i class="fa fa-comment"></i>5
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o"></i> 03.21
                                    </div>
                                </span>
                                    <img src="<?php echo base_url("public/uploads/galleries/580/".$resimler[0]->gallery_photo_name);?>" class="img-fluid">
                                </div>
                                <i class="fa fa-picture-o" style="width: 42px; height: 42px; text-align: center; position: absolute; bottom: 40px; right: 32px; padding: 10px; font-size: 22px; border-radius: 35px; background-color: #94191c; color: #FFFFFF;"></i>
                                <div class="px-1 pt-4 pb-2 position-relative">
                                    <span style="position: absolute; top: 6px; left: 3px; font-size: 11px; font-weight: 400; color: #666666;">5 dakika önce</span>

                                    <b style="font-weight: 500;">Başlık</b>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }?>
<!--                --><?php //for ($i = 1; $i <= 8; $i++): ?>
<!--                <div class="col-md-6 my-3">-->
<!--                    <a href="galeri-detay.php">-->
<!--                        <div class="container mx-2 p-1 bg-white shadow">-->
<!--                            <div style="position: relative;">-->
<!--                                <span style="position: absolute; padding: 3px 7px; bottom: 0; left: 0; background-color: #FFFFFF; color: #555555; font-size: 11px; font-weight: 500; border-top-right-radius: 3px;">-->
<!--                                    <div class="d-inline-block mr-2">-->
<!--                                        <i class="fa fa-eye"></i> 356-->
<!--                                    </div>-->
<!--                                    <div class="d-inline-block mr-2">-->
<!--                                        <i class="fa fa-comment"></i>5-->
<!--                                    </div>-->
<!--                                    <div class="d-inline-block">-->
<!--                                        <i class="fa fa-clock-o"></i> 03.21-->
<!--                                    </div>-->
<!--                                </span>-->
<!--                                <img src="--><?php //echo base_url("public/uploads/aleyna.jpg");?><!--" class="img-fluid">-->
<!--                            </div>-->
<!--                            <i class="fa fa-picture-o" style="width: 42px; height: 42px; text-align: center; position: absolute; bottom: 40px; right: 32px; padding: 10px; font-size: 22px; border-radius: 35px; background-color: #94191c; color: #FFFFFF;"></i>-->
<!--                            <div class="px-1 pt-4 pb-2 position-relative">-->
<!--                                <span style="position: absolute; top: 6px; left: 3px; font-size: 11px; font-weight: 400; color: #666666;">5 dakika önce</span>-->
<!--                                   -->
<!--                                <b style="font-weight: 500;">Başlık</b>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                --><?php //endfor; ?>
            </div>


		</div>
	</div>
</section>

