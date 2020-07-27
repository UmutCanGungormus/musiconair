<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $gallery->title ?></b> galerisine ait videolar
                <a href="<?= base_url("galleries/new_gallery_video_form/$gallery->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btn-sm float-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            </h4>
            <hr>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>url</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?= base_url("galleries/rankGalleryVideoSetter"); ?>">

                    <?php foreach ($items as $item) : ?>

                        <tr id="ord-<?= $item->id; ?>">
                            <td class="order"><i class="fa fa-reorder"></i></td>
                            <td class="w50 text-center">#<?= $item->id; ?></td>
                            <td class="text-center"><?= $item->url; ?></td>
                            <td class="text-center w100">
                                <iframe width="100" src="//www.youtube.com/embed/<?= $item->url; ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>

                                </iframe>
                            </td>
                            <td class="text-center w100">
                                <div class="custom-control custom-switch"><input data-id="<?= $item->id ?>" data-url="<?= base_url("galleries/galleryVideoIsActiveSetter/{$item->id}"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?= $item->id ?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input"> <label class="custom-control-label" for="customSwitch<?= $item->id ?>"></label></div>
                            </td>
                            <td class="text-center w200">
                                <button data-url="<?= base_url("galleries/galleryVideoDelete/$item->id/$item->gallery_id"); ?>" class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <a href="<?= base_url("galleries/update_gallery_video_form/$item->id"); ?>" class="btn btn-sm btn-sm btn-outline-info rounded-0"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>
        </div>
    </div>
</div>