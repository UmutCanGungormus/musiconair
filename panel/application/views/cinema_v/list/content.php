<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Film Listesi
                <a href="<?= base_url("cinema/new_form"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?= base_url("cinema/rankSetter"); ?>">
                    <?php foreach ($items as $item) : ?>
                        <tr id="ord-<?= $item->id; ?>">
                            <td class="order"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center">#<?= $item->id; ?></td>
                            <td><?= $item->title; ?></td>
                            <td class="w200 text-center">
                                <?php $cat = json_decode($item->category_id);

                                foreach ($cat as $category) :
                                    echo " " . get_cinema_category_title($category);
                                endforeach
                                ?>
                            </td>
                            <td class="text-center w100">
                                <img width="75" src="<?= get_picture($viewFolder, $item->img_url); ?>" alt="" class="img-fluid">
                            </td>
                            <td class="text-center w100">
                                <div class="custom-control custom-switch"><input data-id="<?= $item->id ?>" data-url="<?= base_url("cinema/isActiveSetter/{$item->id}"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?= $item->id ?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input"> <label class="custom-control-label" for="customSwitch<?= $item->id ?>"></label></div>
                            </td>
                            <td class="text-center w200">
                                <button data-url="<?= base_url("cinema/delete/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?= base_url("cinema/update_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div><!-- END column -->
    </div>
</div>