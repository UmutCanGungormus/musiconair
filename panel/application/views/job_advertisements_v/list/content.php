<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h4 class="mb-3">
				İş İlanları Listesi
				<a href="javascript:void(0)" data-url="<?= base_url("job_advertisement/new_form/"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 btn-sm createJobAdvertisementBtn"><i class="fa fa-plus"></i>Yeni Ekle</a>
			</h4>
			<hr>
		</div><!-- END column -->
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<form id="filter_form" onsubmit="return false">
				<div class="d-flex flex-wrap">
					<label for="search" class="flex-fill mx-1">
						<input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'jobAdvertisementTable')" name="search">
					</label>
					<label for="clear_button" class="mx-1">
						<button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','jobAdvertisementTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
					</label>
					<label for="search_button" class="mx-1">
						<button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('jobAdvertisementTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Galeri Ara"><i class="fa fa-search"></i></button>
				</div>
			</form>
			<table class="table table-hover table-striped table-bordered content-container jobAdvertisementTable">
				<thead>
					<th class="w50">#</th>
					<th class="order nosort"><i class="fa fa-reorder"></i></th>
					<th class="w50">#id</th>
					<th>Başlık</th>
					<th>Görsel</th>
					<th>Durumu</th>
					<th>Oluşturulma Tarihi</th>
					<th>Güncelleme Tarihi</th>
					<th>Paylaşım Tarihi</th>
					<th class="nosort">İşlem</th>
				</thead>
				<tbody>

				</tbody>
			</table>
			<script>
				function obj(d) {
					let appendeddata = {};
					$.each($("#filter_form").serializeArray(), function() {
						d[this.name] = this.value;
					});
					return d;
				}
				$(document).ready(function() {
					TableInitializerV2("jobAdvertisementTable", obj, {}, "<?= base_url("job_advertisement/datatable") ?>", "<?= base_url("job_advertisement/rankSetter") ?>", true);
				});
			</script>
		</div><!-- END column -->
	</div>
</div>


<div id="jobAdvertisementModal"></div>

<script>
	$(document).ready(function() {
		$(document).on("click", ".createJobAdvertisementBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			$('#jobAdvertisementModal').iziModal('destroy');
			createModal("#jobAdvertisementModal", "Yeni İş İlanı Ekle", "Yeni İş İlanı Ekle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#jobAdvertisementModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
				});
			});
			openModal("#jobAdvertisementModal");
		});
		$(document).on("click", ".btnSave", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("createJobAdvertisement"));
			createAjax(url, formData, function() {
				closeModal("#jobAdvertisementModal");
				reloadTable("jobAdvertisementTable");
			});
		});
		$(document).on("click", ".updateJobAdvertisementBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			$('#jobAdvertisementModal').iziModal('destroy');
			let url = $(this).data("url");
			createModal("#jobAdvertisementModal", "İş İlanı Düzenle", "İş İlanı Düzenle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#jobAdvertisementModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
				});
			});
			openModal("#jobAdvertisementModal");
		});
		$(document).on("click", ".btnUpdate", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("updateJobAdvertisement"));
			createAjax(url, formData, function() {
				closeModal("#jobAdvertisementModal");
				reloadTable("jobAdvertisementTable");
			});
		});
	});
</script>