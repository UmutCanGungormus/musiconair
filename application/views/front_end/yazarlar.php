

	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name py-0 mx-0 mb-2" style="background-image: url(<?php echo base_url("public/front_end/assets/images/yazarlar-bg.jpg")?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Yazarlar</b></h1>
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
				<?php for ($i = 1; $i <= 12; $i++): ?>
					<div class="col-md-3">

						<a href="">
							<div class="view zoom mb-5shadow border position-relative mb-4" style="cursor: pointer;">
							    <img src="<?php echo base_url("public/front_end/assets/images/ozcan.jpg")?>" class="img-fluid">
							    <div class="mt-3 d-block text-white position-absolute p-2" style="z-index: 99; width: 100%; height: 100%; bottom: 0px; left: 0px; background-image: url(assets/images/writer-shadow.png); background-repeat: repeat-x; background-position: center bottom;">
							    	<div class="position-absolute p-3" style="bottom: 0px;">
							    		<i class="fa fa-user"></i> <b>Özcan Beylan</b> <br>
							    		<span style="font-size: 12px;">35 Haber</span>
							    	</div>
							    </div>
							</div>
						</a>

					</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</section>
