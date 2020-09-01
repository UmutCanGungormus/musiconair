<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Portfolyo Kategori Listesi
                <a href="javascript:void(0)" data-url="<?=base_url("portfolio_categories/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 float-right createPortfolioCategoryBtn"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'portfolioCategoryTable')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','portfolioCategoryTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('portfolioCategoryTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container portfolioCategoryTable">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Durumu</th>
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
                    TableInitializerV2("portfolioCategoryTable", obj, {}, "<?= base_url("portfolio_categories/datatable") ?>", "<?= base_url("portfolio_categories/rankSetter") ?>", true);

                });
            </script>
        </div>
    </div>
</div>
</div>


<div id="portfolioCategoryModal"></div>

<script>
	$(document).ready(function() {
		$(document).on("click", ".createPortfolioCategoryBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			$('#portfolioCategoryModal').iziModal('destroy');
			createModal("#portfolioCategoryModal", "Yeni Portfolyo Kategorisi Ekle", "Yeni Portfolyo Kategorisi Ekle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#portfolioCategoryModal .iziModal-content").html(response);
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
			openModal("#portfolioCategoryModal");
			$("#portfolioCategoryModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnSave", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("createPortfolioCategory"));
			createAjax(url, formData, function() {
				closeModal("#portfolioCategoryModal");
				$("#portfolioCategoryModal").iziModal("setFullscreen", false);
				reloadTable("portfolioCategoryTable");
			});
		});
		$(document).on("click", ".updatePortfolioCategoryBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			$('#portfolioCategoryModal').iziModal('destroy');
			let url = $(this).data("url");
			createModal("#portfolioCategoryModal", "Portfolyo Kategorisi Düzenle", "Portfolyo Kategorisi Düzenle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#portfolioCategoryModal .iziModal-content").html(response);
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
			openModal("#portfolioCategoryModal");
			$("#portfolioCategoryModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnUpdate", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("updatePortfolioCategory"));
			createAjax(url, formData, function() {
				closeModal("#portfolioCategoryModal");
				$("#portfolioCategoryModal").iziModal("setFullscreen", false);
				reloadTable("portfolioCategoryTable");
			});
		});
	});
</script>