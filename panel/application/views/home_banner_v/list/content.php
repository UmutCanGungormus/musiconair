<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Banner Listesi
                <a href="javascript:void(0)" data-url="<?= base_url("home_banner/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right createHomeBannerBtn"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'homeBannerTable')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','homeBannerTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('homeBannerTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container homeBannerTable">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Link</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?= base_url("home_banner/rankSetter"); ?>">

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
                    TableInitializerV2("homeBannerTable", obj, {}, "<?= base_url("home_banner/datatable") ?>", "<?= base_url("home_banner/rankSetter") ?>", true);

                });
            </script>
        </div>
    </div>
</div>

<div id="homeBannerModal"></div>

<script>
    $(document).ready(function(){
        $(document).on("click",".createHomeBannerBtn",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            $('#homeBannerModal').iziModal('destroy');
            createModal("#homeBannerModal","Yeni Banner Ekle","Yeni Banner Ekle",600,true,"20px",0,"#e20e17","#fff",1040,function(){
                $.post(url,{},function(response){
                    $("#homeBannerModal .iziModal-content").html(response);
                });
            });
            openModal("#homeBannerModal");
        });
        $(document).on("click",".btnSave",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("createHomeBanner"));
            createAjax(url,formData,function(){
                closeModal("#homeBannerModal");
                reloadTable("homeBannerTable");
            });
        });
        $(document).on("click",".updateHomeBannerBtn",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#homeBannerModal').iziModal('destroy');
            let url = $(this).data("url");
            createModal("#homeBannerModal","Banner Düzenle","Banner Düzenle",600,true,"20px",0,"#e20e17","#fff",1040,function(){
                $.post(url,{},function(response){
                    $("#homeBannerModal .iziModal-content").html(response);
                });
            });
            openModal("#homeBannerModal");
        });
        $(document).on("click",".btnUpdate",function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("updateHomeBanner"));
            createAjax(url,formData,function(){
                closeModal("#homeBannerModal");
                reloadTable("homeBannerTable");
            });
        });
    });
</script>