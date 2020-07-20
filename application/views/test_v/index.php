
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
	<div class="container-fluid px-0">
		<div class="page-name" style="background-image: url(<?=base_url("panel/assets/img/keyif-bg.jpg");?>); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Testler</b></h1>
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

                <?php foreach ($test as $item) : ?>
                    <div class="col-md-4 my-3">
                        <a href="<?=base_url("test/".$item->seo_url) ?>">
                            <div class="container mx-2 p-1 bg-white shadow">
                                <div class="position-relative">
                                    <img src="<?=base_url("panel/uploads/tests_v/800x625/{$item->img_url}");?>" class="img-fluid w-100">
                                </div>
                                <i class="fa fa-question-circle" style="width: 42px; height: 42px; text-align: center; position: absolute; bottom: 40px; right: 32px; padding: 10px; font-size: 22px; border-radius: 35px; background-color: #94191c; color: #FFFFFF;"></i>
                                <div class="px-1 pt-4 pb-2 position-relative">
                                    <b><a href="<?=base_url("test/{$item->seo_url}") ?>"><?=$item->title ?></a></b>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach?>
            </div>


		</div>
	</div>
</section>