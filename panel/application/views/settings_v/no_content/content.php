<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">Site Ayarları</h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <?php if (empty($items)) : ?>
                <div class="alert alert-info text-center">
                    <h5 class="alert-title">Kayıt Bulunamadı</h5>
                    <p>Burada herhangi bir veri bulunmamaktadır.</a></p>
                </div>
            <?php else : ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th>Başlık</th>
                        <th>Dil</th>
                        <th>Görsel</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td class="w50 text-center">#<?= $item->id; ?></td>
                                <td><?= $item->company_name; ?></td>
                                <td><?= $item->language; ?></td>
                                <td class="text-center w100">
                                    <img width="75" src="<?= get_picture($viewFolder, $item->mobile_logo, "165x57"); ?>" alt="" class="img-fluid">
                                </td>
                                <td class="text-center w200">
                                    <button data-url="<?= base_url("settings/delete/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-danger remove-btn btn-sm rounded-0"><i class="fa fa-trash"></i> Sil</button>
                                    <a href="<?= base_url("settings/update_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            <?php endif ?>
        </div><!-- END column -->
    </div>
</div>