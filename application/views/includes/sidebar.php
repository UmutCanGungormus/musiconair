<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section class="d-flex wrapper">

	<div class="sidebar-menu">
		<div class="mt-4 sidebar-content">

			<div class="sidebar-category">
				<div class="category-item">
					<a href="<?= base_url('onair'); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="fa fa-mixcloud mr-1"></i></div>
						<div class="name flex-grow-1"><span>ONAIR</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("haberler/muzik-haberleri"); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="fa fa-music"></i></div>
						<div class="name flex-grow-1"><span>MÜZİK</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("etkinlikler")?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="far fa-calendar-alt"></i></div>
						<div class="name flex-grow-1"><span>ETKİNLİK</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?=base_url("is-ilanlari")?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="fa fa-briefcase"></i></div>
						<div class="name flex-grow-1"><span>İŞ İLANLARI</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?=base_url("emlak-ilanlari")?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="far fa-building"></i></div>
						<div class="name flex-grow-1"><span>EMLAK İLANLARI</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("haberler/radyo-haberleri"); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="fa fa-microphone-alt"></i></div>
						<div class="name flex-grow-1"><span>RADYO</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("galeri/videolar"); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="fab fa-youtube"></i></div>
						<div class="name flex-grow-1"><span>VİDEO</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("test"); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="far fa-edit"></i></div>
						<div class="name flex-grow-1"><span>TEST</span></div>
					</a>
				</div>

				<div class="category-item">
					<a href="<?= base_url("haberler/keyif-haberleri"); ?>" class="d-flex px-3">
						<div class="flex-shrink-1 text-center px-auto mx-auto"><i class="far fa-thumbs-up"></i></div>
						<div class="name flex-grow-1"><span>KEYİF</span></div>
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