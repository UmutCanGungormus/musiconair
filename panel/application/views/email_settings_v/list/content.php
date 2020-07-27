<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                E-Posta Listesi
                <a href="<?= base_url("emailsettings/new_form"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'emailTable')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','emailTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('emailTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container emailTable">

                <thead>
                    <th class="w50"><i class="fa fa-reorder"></i></th>
                    <th class="w50"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#Id</th>
                    <th>E-Posta Başlık</th>
                    <th>Sunucu Adı</th>
                    <th>E-Posta</th>
                    <th>Kimden</th>
                    <th>Kime</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody>

                </tbody>

            </table>
        </div><!-- END column -->
    </div>
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
        TableInitializerV2("emailTable", obj, {}, "<?= base_url("emailsettings/datatable") ?>", "<?= base_url("emailsettings/rankSetter") ?>", true);

    });
</script>