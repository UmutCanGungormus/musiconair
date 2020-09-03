<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<h4 class="mb-3">
				Test Soruları Şıkları Listesi
				<a href="javascript:void(0)" data-url="<?= base_url("options/new_form"); ?>" class="btn btn-outline-primary rounded-0 btn-sm float-right createOptionBtn"> <i class="fa fa-plus"></i> Yeni Ekle</a>
			</h4>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<form id="filter_form" onsubmit="return false">
				<div class="d-flex flex-wrap">
					<label for="search" class="flex-fill mx-1">
						<input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'optionTable')" name="search">
					</label>
					<label for="clear_button" class="mx-1">
						<button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','optionTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
					</label>
					<label for="search_button" class="mx-1">
						<button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('optionTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Test Sorusu Şıkkı Ara"><i class="fa fa-search"></i></button>
				</div>
			</form>
			<table class="table table-hover table-striped table-bordered content-container optionTable">
				<thead>
					<th class="order"><i class="fa fa-reorder"></i></th>
					<th class="order"><i class="fa fa-reorder"></i></th>
					<th class="w50">#id</th>
					<th>Başlık</th>
					<th>Test Sorusu</th>
					<th>Durum</th>
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
					TableInitializerV2("optionTable", obj, {}, "<?= base_url("options/datatable") ?>", "<?= base_url("options/rankSetter") ?>", true);

				});
			</script>
		</div>
	</div>
</div>
</div>

<div id="optionModal"></div>

<script>
	$(document).ready(function() {
		$(document).on("click", ".createOptionBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			$('#optionModal').iziModal('destroy');
			createModal("#optionModal", "Yeni Test Soru Şıkkı Ekle", "Yeni Test Soru Şıkkı Ekle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#optionModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
					$(".tagsInput").select2({
						width: 'resolve',
						theme: "classic",
						tags: true,
						tokenSeparators: [',', ' ']
					});
				});
			});
			openModal("#optionModal");
			$("#optionModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnSave", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("createOption"));
			createAjax(url, formData, function() {
				closeModal("#optionModal");
				$("#optionModal").iziModal("setFullscreen", false);
				reloadTable("optionTable");
			});
		});
		$(document).on("click", ".updateOptionBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			$('#optionModal').iziModal('destroy');
			let url = $(this).data("url");
			createModal("#optionModal", "Test Soru Şıkkı Düzenle", "Test Soru Şıkkı Düzenle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#optionModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
					$(".tagsInput").select2({
						width: 'resolve',
						theme: "classic",
						tags: true,
						tokenSeparators: [',', ' ']
					});
				});
			});
			openModal("#optionModal");
			$("#optionModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnUpdate", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("updateOption"));
			createAjax(url, formData, function() {
				closeModal("#optionModal");
				$("#optionModal").iziModal("setFullscreen", false);
				reloadTable("optionTable");
			});
		});
	});
</script>