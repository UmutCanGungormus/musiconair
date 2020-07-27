<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Yazarlar / Editörler
                <a href="<?= base_url("writers/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form id="filter_form" onsubmit="return false">
                        <div class="d-flex flex-wrap">
                            <label for="search" class="flex-fill mx-1">
                                <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'writersTable')" name="search">
                            </label>
                            <label for="clear_button" class="mx-1">
                                <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','writersTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                            </label>
                            <label for="search_button" class="mx-1">
                                <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('writersTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                        </div>
            </form>

            <table width="100%" class="table table-hover table-striped table-bordered content-container writersTable">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order nosort"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Ad Soyad</th>
                    <th>Görev</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?= base_url("writers/rankSetter"); ?>">
                </tbody>
            </table>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<script>
    function obj(d) {
        let appendeddata = {};
        $.each($("#filter_form").serializeArray(), function() {
            d[this.name] = this.value;
        });
        return d;
    }
    $(document).ready(function() {
        TableInitializerV2("writersTable", obj, {}, "<?= base_url("writers/datatable") ?>", "<?= base_url("product/rankSetter") ?>", true);

    });
</script>