<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form data-url="<?= base_url("galleries/refresh_file_list/$item->id/$item->gallery_type/$folder_name"); ?>" action="<?= base_url("galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?= base_url("galleries/file_upload/$item->id/$item->gallery_type/$item->folder_name"); ?>'}">
                <div class="dz-message">
                    <h3 class="m-h-lg">Yüklemek istediğiniz dosyaları buraya sürükleyiniz</h3>
                    <p class="mb-3 text-muted">(Yüklemek için dosyalarınızı sürükleyiniz yada buraya tıklayınız)</p>
                </div>
            </form>
        </div><!-- END column -->
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                <b><?= $item->title; ?></b> kaydına ait Dosyalar
            </h4>
            <hr>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 image_list_container">
            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/file_list_v"); ?>
        </div><!-- END column -->
    </div>
</div>