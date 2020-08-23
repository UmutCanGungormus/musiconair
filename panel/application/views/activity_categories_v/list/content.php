<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Etkinlik Kategori Listesi
                <a href="javascript:void(0)" data-url="<?= base_url("activity_categories/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right createActivityCategoryBtn"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <form id="filter_form" onsubmit="return false">
				<div class="d-flex flex-wrap">
					<label for="search" class="flex-fill mx-1">
						<input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'activityCategoriesTable')" name="search">
					</label>
					<label for="clear_button" class="mx-1">
						<button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','activityCategoriesTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
					</label>
					<label for="search_button" class="mx-1">
						<button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('activityCategoriesTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Galeri Ara"><i class="fa fa-search"></i></button>
				</div>
			</form>
            <table class="table table-hover table-striped table-bordered content-container activityCategoriesTable">
                <thead>
                    <th class="w50">#</th>
                    <th class="order nosort"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Durumu</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>Güncelleme Tarihi</th>
                    <th class="nosort">İşlem</th>
                </thead>
                <tbody >
                    
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
					TableInitializerV2("activityCategoriesTable", obj, {}, "<?= base_url("activity_categories/datatable") ?>", "<?= base_url("activity_categories/rankSetter") ?>", true);
				});
			</script>
        </div>
    </div>
</div>

<div id="activityCategoryModal"></div>

<script>
    $(document).ready(function(){
        $(document).on("click",".createActivityCategoryBtn",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            $('#activityCategoryModal').iziModal('destroy');
            createModal("#activityCategoryModal","Yeni Etkinlik Kategorisi Ekle","Yeni Etkinlik Kategorisi Ekle",600,true,"20px",0,"#e20e17","#fff",1040,function(){
                $.post(url,{},function(response){
                    $("#activityCategoryModal .iziModal-content").html(response);
                });
            });
            openModal("#activityCategoryModal");
            $("#activityModal").iziModal("setFullscreen",false);
        });
        $(document).on("click",".btnSave",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("createActivityCategory"));
            createAjax(url,formData,function(){
                closeModal("#activityCategoryModal");
                $("#activityModal").iziModal("setFullscreen",false);
                reloadTable("activityCategoriesTable");
            });
        });
        $(document).on("click",".updateActivityCategoryBtn",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#activityCategoryModal').iziModal('destroy');
            let url = $(this).data("url");
            createModal("#activityCategoryModal","Etkinlik Kategorisi Düzenle","Etkinlik Kategorisi Düzenle",600,true,"20px",0,"#e20e17","#fff",1040,function(){
                $.post(url,{},function(response){
                    $("#activityCategoryModal .iziModal-content").html(response);
                });
            });
            openModal("#activityCategoryModal");
            $("#activityModal").iziModal("setFullscreen",false);
        });
        $(document).on("click",".btnUpdate",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("updateActivityCategory"));
            createAjax(url,formData,function(){
                closeModal("#activityCategoryModal");
                $("#activityModal").iziModal("setFullscreen",false);
                reloadTable("activityCategoriesTable");
            });
        });
    });
</script>