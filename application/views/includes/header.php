<body>
<header>
<?php
if(@!$_COOKIE['logo']){
	$logo=base_url("public/front_end/assets/images/logo-light-theme.png");
}else{
	$logo=base_url("public/front_end/assets/images/logo-black-theme.png");
}
?>
	<nav class="navbar navbar-expand-lg fixed-top pt-0 pt-md-2">
		<div class="logo float-left mr-3">
			<div class="float-left mt-2 sidebar-toggle">
				<i class="fa fa-bars fa-3x sidebar-toggle"></i>
			</div>

			<div class="float-left mt-1 ml-3 top-logo">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo $logo;?>" width="190">
				</a>
			</div>
		</div>

		<div class="w-25 d-none d-md-block">
			<form class="search-bar">
				<input type="text" class="pl-3 border-0 float-left" placeholder="Ne aramıştınız ?" name="">
				<input type="submit" name="" value="">
			</form>
		</div>	

		<div style="margin-top: -5px;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="fa fa-bars fa-2x"></i>
				</span>
			</button>
		</div>

		<div class="collapse navbar-collapse float-right" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item">
					<a class="nav-link p-0 mx-0 top-artist"></a>
				</li>

				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-place" href="#"></a>
				</li> -->

				<li class="nav-item mr-4">
					<img src="<?php echo base_url('public/uploads/header-sponsorlu.png'); ?>" alt="">
				</li>

				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-list" id="deneme" href="#"></a>
				</li>

				<li class="separate"></li>

				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-rocket" href="#"></a>
				</li>

				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-smile" href="#"></a>
				</li>

				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-love" href="#"></a>
				</li>

				<li class="separate"></li>

		<!--	<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-family" href="#"></a>
				</li>
-->
				<li class="nav-item">
					<a class="nav-link p-0 mx-0 top-theme" href="#"></a>
				</li>
				
				<li class="separate"></li>
				
				
				<?php if (1 == 2): ?>
					<li class="nav-item">
						<a class="nav-link p-0 mx-0" href="#" style="position: relative;">
							<i class="fa fa-envelope"></i>
							<span class="bg-danger" style="font-size: 11px; font-weight: bold; padding: 0px 3px; border-radius: 3px; position: absolute; top: -7px; right: -7px;">0</span>
						</a>
					</li>

					<li class="nav-item mr-3">
						<a class="nav-link p-0 mx-0" href="#" style="position: relative;">
							<i class="fa fa-bell"></i>
							<span class="bg-danger" style="font-size: 11px; font-weight: bold; padding: 0px 3px; border-radius: 3px; position: absolute; top: -7px; right: -7px;">0</span>
						</a>
					</li>
				<?php endif; ?>
			</ul>

            <?php if(!isset($_SESSION['user'])) { ?>
			<a class="nav-link p-0 btn btn-danger d-inline-block px-3 py-2" href="#" data-fancybox="giris-yap" data-src="#giris-yap">
				<i class="fa fa-user"></i>
				<b>Giriş</b>
			</a>
            <?php } else { ?>
                <a class="nav-link p-0 btn btn-danger d-inline-block px-3 py-2" href="<?php echo base_url("cikis");?>">
                    <i class="fa fa-sign-out"></i>
                    <b>Çıkış</b>
                </a>
            <?php } ?>
		</div>
	</nav>
</header>
