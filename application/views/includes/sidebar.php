<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="d-flex wrapper">

	<div class="sidebar-menu">
		<div class="mt-4 sidebar-content">

			<div class="sidebar-category">
				<div class="category-item">
					<a href="<?= base_url('onair'); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>ONAIR</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("haberler/muzik-haberleri"); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>MÜZİK</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("etkinlikler")?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>ETKİNLİK</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="#ilanlar.php">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>İLANLAR</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("radyo"); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>RADYO</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("videolar"); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>VİDEO</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("test"); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>TEST</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("keyif"); ?>">
						<div><i class="mr-1"></i></div>
						<div class="name"><span>KEYİF</span></div>
					</a>
				</div>
			</div>

			<div class="sidebar-bottom d-none">
				<div class="sidebar-list text-center">
					<ul>
						<li>
							<a href="<?= base_url('kurumsal/hakkimizda'); ?>">Kurumsal</a>
						</li>
						<li>
							<a href="<?= base_url('kurumsal/uygulamalar'); ?>">Uygulamalar</a>
						</li>
						<li>
							<a href="<?= base_url('kurumsal/reklam'); ?>">Reklam</a>
						</li>
						<li>
							<a href="<?= base_url('kurumsal/is-birligi'); ?>">İş Birliği</a>
						</li>
					</ul>
				</div>

				<div class="sidebar-app text-center">
					<ul>
						<li>
							<a href="">
								<img src="<?= base_url("panel/assets/img/google-play-white.png"); ?>" class="img-fluid">
							</a>
						</li>
						<li>
							<a href="">
								<img src="<?= base_url("panel/assets/img/app-store-white.png"); ?>" class="img-fluid">
							</a>
						</li>
					</ul>
				</div>

				<div class="sidebar-social py-2 text-center">
					<a href="" class="m-2">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="" class="m-2">
						<i class="fa fa-twitter"></i>
					</a>

					<a href="" class="m-2">
						<i class="fa fa-instagram"></i>
					</a>

					<a href="" class="m-2">
						<i class="fa fa-spotify"></i>
					</a>

					<a href="" class="m-2">
						<i class="fa fa-youtube"></i>
					</a>
				</div>

				<div class="sidebar-copyright">
					<span class="d-block px-4 mt-2 text-center">2019 &copy; Müzik Onair Co.</span>
				</div>
			</div>
		</div>
	</div>