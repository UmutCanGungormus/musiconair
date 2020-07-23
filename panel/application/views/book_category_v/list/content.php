<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Kitap Kategori Listesi
                <a href="<?= base_url("book_category/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <?php if (empty($items)) : ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?= base_url("book_category/new_form"); ?>">tıklayınız</a></p>
                </div>
            <?php else : ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th>Başlık</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr id="ord-<?= $item->id; ?>">
                                <td class="w50 text-center">#<?= $item->id; ?></td>
                                <td><?= $item->title; ?></td>
                                <td class="text-center w100">
                                    <div class="custom-control custom-switch"><input data-id="<?=$item->id?>" data-url="<?= base_url("book_category/isActiveSetter/{$item->id}"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?=$item->id?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input">  <label class="custom-control-label" for="customSwitch<?=$item->id?>"></label></div>
                                </td>
                                <td class="text-center w200">
                                    <button data-url="<?= base_url("book_category/delete/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                    <a href="<?= base_url("book_category/update_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
    </div>
</div>