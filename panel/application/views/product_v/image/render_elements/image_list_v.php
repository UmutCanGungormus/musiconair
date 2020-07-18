<?php if (empty($item_images)) : ?>
    <div class="alert alert-info text-center">
        <h5 class="alert-title">Kayıt Bulunamadı</h5>
        <p>Burada herhangi bir resim bulunmamaktadır!</p>
    </div>
<?php else : ?>
    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
            <th class="order"><i class="fa fa-reorder"></i></th>
            <th class="w50">#id</th>
            <th>Görsel</th>
            <th>Resim Adı</th>
            <th>Durum</th>
            <th>Kapak</th>
            <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?= base_url("product/imageRankSetter"); ?>">
        <?php
        $i=0;
        ?>
            <?php foreach ($item_images as $image) : ?>
                <tr id="ord-<?= $image->id; ?>">
                    <td class="order"><i class="fa fa-reorder"></i></td>
                    <td class="w50 text-center">#<?= $image->id; ?></td>
                    <td class="w100"><img width="30" src="<?= get_picture($viewFolder, $image->img_url, "348x215"); ?>" alt="<?= $image->img_url;; ?>" class="img-fluid"></td>
                    <td><?= $image->img_url; ?></td>
                    <td class="w100 text-center">
                        <div class="custom-control custom-switch"><input data-id="<?=$image->id?>" data-url="<?= base_url("product/imageIsActiveSetter/{$image->id}"); ?>" data-status="<?= ($image->isActive) ? "checked" : ""; ?>" id="customSwitch<?=$image->id?>i" type="checkbox" <?= ($image->isActive) ? "checked" : ""; ?> class="my-check custom-control-input">  <label class="custom-control-label" for="customSwitch<?=$image->id?>i"></label></div>
                    </td>
                    <td class="w100 text-center">
                        <div class="custom-control custom-switch"><input data-id="<?=$image->id?>" data-url="<?= base_url("product/isCoverSetter/{$image->id}/{$image->product_id}"); ?>" data-status="<?= ($image->isCover) ? "checked" : ""; ?>" id="customSwitch<?=$image->id?>" type="checkbox" <?= ($image->isCover) ? "checked" : ""; ?> class="my-check custom-control-input">  <label class="custom-control-label" for="customSwitch<?=$image->id?>"></label></div>
                    </td>
                    <td class="w100 text-center"><button data-url="<?= base_url("product/imageDelete/$image->id/$image->product_id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn btn-block"><i class="fa fa-trash"></i> Sil</button></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>