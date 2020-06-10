<?php
	require_once 'includes/head.php';
	require_once 'includes/header.php';
?>

<section class="d-flex wrapper">

	<?php require_once 'includes/sidebar.php'; ?>

	<div class="container-fluid px-0 pr-0">
		<div class="container-fluid page-padding-top page-name py-0 mx-0 mb-2" style="background-image: url(assets/images/sinema-bg.jpg); background-repeat: repeat-x; background-position: center;">
			<h1 class="text-white pl-5 ml-md-5"><b class="shadow px-2">#Sinema</b></h1>
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

             <div class="row mt-1">
                <?php for($i = 1; $i <= 18; $i++): ?>
                    <div class="col-md-4 p-0">
                        <div class="card item mb-1 m-1 shadow">
                            <div class="card-body p-0 m-0">
                                <div style="position: relative;" class="video-list">
                                    <img src="uploads/aleyna.jpg" class="img-fluid" />
                                    <i class="emoji-love"></i>
                                    <a class="popup-video" data-fancybox data-width="640" data-height="360" data-small-btn="true" href="https://youtu.be/rahRaVtEQaM?t=15m43s"></a>
                                    <a class="link-video" target="_blank" href="video-detay.php"></a>
                                    <span></span>
                                </div>

                                <div style="font-size: 11px;">
                                    <div class="d-inline-block mr-1 py-2 px-2">
                                        <i class="fa fa-user"></i> Admin
                                    </div>
                                    <div class="d-inline-block">
                                        <i class="fa fa-clock-o mr-1" style="font-size: 11px;"></i>23 Eylül 2019
                                    </div>
                                </div>
                                <h6 class="px-1 py-3"><b>Aleyna Tilki Amerika'ya mı Taşınıyor?</b></h6>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
		</div>
	</div>
</section>

<?php require_once 'includes/footer.php'; ?>