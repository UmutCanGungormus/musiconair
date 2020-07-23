<div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
    <div class="row">
        <div class="col-md-2">
            <img src="<?= get_picture($viewFolder, $item->logo, "165x57"); ?>" alt="<?= $item->company_name; ?>" class="img-fluid" style="margin: 0px auto">
        </div>
        <div class="form-group col-md-6">
            <div class="fileinput fileinput-new input-group input-group-sm" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Masaüstü Logo Seçimi</span>
                </div>
                <div class="form-control form-control-sm rounded-0 text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-sm btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Change</span>
                        <input type="hidden"><input type="file" name="logo">
                    </span>
                    <a href="#" class="btn btn-sm btn-secondary fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img src="<?= get_picture($viewFolder, $item->mobile_logo, "135x42"); ?>" alt="<?= $item->company_name; ?>" class="img-fluid" style="margin: 0px auto">
        </div>
        <div class="form-group col-md-6">
            <div class="fileinput fileinput-new input-group input-group-sm" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mobil Logo Seçimi</span>
                </div>
                <div class="form-control form-control-sm rounded-0 text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-sm btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Change</span>
                        <input type="hidden"><input type="file" name="mobile_logo">
                    </span>
                    <a href="#" class="btn btn-sm btn-secondary fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <img src="<?= get_picture($viewFolder, $item->favicon, "32x32"); ?>" alt="<?= $item->company_name; ?>" class="img-fluid" style="margin: 0px auto">
        </div>
        <div class="form-group col-md-6">
            <div class="fileinput fileinput-new input-group input-group-sm" data-provides="fileinput">
                <div class="input-group-prepend">
                    <span class="input-group-text">Favicon Seçimi</span>
                </div>
                <div class="form-control form-control-sm rounded-0 text-truncate" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                <span class="input-group-append">
                    <span class=" btn btn-sm btn-outline-primary rounded-0 btn-file"><span class="fileinput-new">Dosya Seç</span><span class="fileinput-exists">Change</span>
                        <input type="hidden"><input type="file" name="favicon">
                    </span>
                    <a href="#" class="btn btn-sm btn-secondary fileinput-exists" data-dismiss="fileinput">Kaldır</a>
                </span>
            </div>
        </div>
    </div>
</div>