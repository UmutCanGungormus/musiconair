<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Galeri Listesi
                <a href="<?= base_url("galleries/new_form"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <?php if (empty($items)) : ?>
                    <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?= base_url("galleries/new_form"); ?>">tıklayınız</a></p>
                    </div>
                <?php else : ?>
                    <table class="table table-hover table-striped table-bordered content-container">
                        <thead>
                            <th class="order"><i class="fa fa-reorder"></i></th>
                            <th class="w50">#id</th>
                            <th>Galeri Adı</th>
                            <th>Galeri Türü</th>
                            <th>Klasör Adı</th>
                            <th>url</th>
                            <th>Durumu</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody class="sortable" data-url="<?= base_url("galleries/rankSetter"); ?>">
                            <?php foreach ($items as $item) : ?>
                                <tr id="ord-<?= $item->id; ?>">
                                    <td class="order"><i class="fa fa-reorder"></i></td>
                                    <td class="w50 text-center">#<?= $item->id; ?></td>
                                    <td class="text-center"><?= $item->title; ?></td>
                                    <td class="text-center"><?= $item->gallery_type; ?></td>
                                    <td class="text-center"><?= $item->folder_name; ?></td>
                                    <td class="text-center"><?= $item->url; ?></td>
                                    <td class="text-center"><div class="custom-control custom-switch"><input data-id="<?=$item->id?>" data-url="<?= base_url("galleries/isActiveSetter/{$item->id}"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?=$item->id?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input">  <label class="custom-control-label" for="customSwitch<?=$item->id?>"></label></div></td>
                                    <td class="text-center"><button data-url="<?= base_url("galleries/delete/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                        <?php
                                        if ($item->gallery_type == "image") :
                                            $button_icon = "fa-image";
                                            $button_url = "galleries/upload_form/$item->id";
                                        elseif ($item->gallery_type == "video") :
                                            $button_icon = "fa-play-circle-o";
                                            $button_url = "galleries/gallery_video_list/$item->id";
                                        else :
                                            $button_icon = "fa-folder";
                                            $button_url = "galleries/upload_form/$item->id";
                                        endif
                                        ?>
                                        <a href="<?= base_url("galleries/update_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                        <a href="<?= base_url($button_url); ?>" class="btn btn-sm btn-sm btn-outline-dark rounded-0"><i class="fa <?= $button_icon; ?>"></i> Galeriye gözat</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
        </div><!-- END column -->
    </div>
</div>