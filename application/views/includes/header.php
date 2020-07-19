<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<header class="header">
	<?php
	if (!empty(get_cookie("theme",true)) && get_cookie("theme",true) == "dark") :
		$logo = base_url("panel/assets/img/logo-black-theme.png");
	else :
		$logo = base_url("panel/assets/img/logo-light-theme.png");
	endif;
	?>
	<nav class="navbar navbar-expand-lg fixed-top px-2">
		<button type="button" class="navbar-toggler float-left sidebar-toggle d-block mr-3 my-auto">
			<span class="navbar-toggler-icon d-flex align-middle text-center"><i class="fa fa-bars mx-auto my-auto sidebar-toggle"></i></span>
		</button>
		<a class="navbar-brand mx-auto" href="<?= base_url() ?>">
			<img src="<?= $logo ?>" class="img-fluid">
		</a>
		<button class="navbar-toggler ml-3 my-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon d-flex align-middle text-center"><i class="fa fa-bars mx-auto my-auto"></i></span>
		</button>

		<div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<form class="form-inline search-bar ">
						<div class="input-group">
							<input class="form-control" type="search" placeholder="Ne aramıştınız ?" aria-label="Search">
							<button class="search-button" type="submit"></button>
						</div>
					</form>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto align-middle d-flex">
				<li class="nav-item my-auto py-auto">
					<a class="nav-link align-middle my-auto py-auto" href="javascript:void(0)"><img src="<?=base_url('public/uploads/header-sponsorlu.png'); ?>" alt="" class="img-fluid d-flex my-auto py-auto mx-auto px-auto text-center justify-content-center"></a>
				</li>
			</ul>
			<ul class="align-middle d-flex list-inline">
				<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link flex-grow-1 p-3 mx-auto top-list" id="deneme" href="javascript:void(0)"></a>
				</li>
				<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link flex-grow-1 p-3 mx-auto top-rocket" href="javascript:void(0)"></a>
				</li>

				<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link flex-grow-1 p-3 mx-auto top-smile" href="javascript:void(0)"></a>
				</li>

				<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link flex-grow-1 p-3 mx-auto top-love" href="javascript:void(0)"></a>
				</li>

				<!--	<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link p-0 mx-0 top-family" href="javascript:void(0)"></a>
				</li>
				-->
				<li class="nav-item flex-grow-1 list-inline-item my-auto py-2 py-sm-2 py-md-2 py-lg-auto py-xl-auto text-center justify-content-center">
					<a class="nav-link flex-grow-1 p-3 mx-auto top-theme" href="javascript:void(0)"></a>
				</li>
			</ul>
			<ul class="navbar-nav align-middle d-flex">

				<li class="separate"></li>

				<?php if (!isset($_SESSION['user'])) : ?>
					<li class="nav-item my-auto py-auto">
						<a class="nav-link p-0 btn btn-danger btn-block d-inline-block px-3 py-2" class="trigger-custom" data-izimodal-open="#modal-custom" href="javascript:void(0)">
							<i class="fa fa-user"></i>
							<b>Giriş</b>
						</a>
					</li>
				<?php else: ?>
					<li class="nav-item my-auto py-auto">
						<a class="nav-link p-0 btn btn-danger btn-block d-inline-block px-3 py-2" href="<?=base_url("cikis"); ?>">
							<i class="fa fa-sign-out"></i>
							<b>Çıkış</b>
						</a>
					</li>
				<?php endif ?>
			</ul>

		</div>
	</nav>
</header>