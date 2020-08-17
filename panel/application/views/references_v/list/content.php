<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Ülke Listesi
                <a href="<?= base_url("references/new_form"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'referenceTable')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','referenceTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('referenceTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container referenceTable">

                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>

                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?= base_url("references/rankSetter"); ?>">
                    <?php foreach ($items as $item) : ?>
                        <tr id="ord-<?= $item->id; ?>">
                            <td class="order"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center">#<?= $item->id; ?></td>
                            <td><?= $item->title; ?></td>
                            <td><?= $item->url; ?></td>
                            <td class="text-center w100">
                                <img width="75" src="<?= get_picture($viewFolder, $item->img_url); ?>" alt="" class="img-fluid">
                            </td>
                            <td class="text-center w100">
                                <div class="custom-control custom-switch"><input data-id="<?= $item->id ?>" data-url="<?= base_url("references/isActiveSetter/{$item->id}"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?= $item->id ?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input"> <label class="custom-control-label" for="customSwitch<?= $item->id ?>"></label></div>
                            </td>
                            <td class="text-center w200">
                                <button data-url="<?= base_url("references/delete/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?= base_url("references/update_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0 btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
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
        TableInitializerV2("referenceTable", obj, {}, "<?= base_url("references/datatable") ?>", "<?= base_url("references/rankSetter") ?>", true);

    });
</script>