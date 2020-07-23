<?php if(empty($items)) { ?>
    <div class="alert alert-info text-center">
        <p>Burada herhangi bir resim bulunmamaktadır.</a></p>
    </div>
<?php } else { ?>
    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Görsel</th>
        <th>Dosya Yolu/Adı</th>
        <th>Durumu</th>
        <th>Açıklama Ekle</th>
        <th>İşlem</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("galleries/fileRankSetter/$gallery_type"); ?>">
        <?php foreach($items as $item){ ?>
            <tr id="ord-<?php echo $item->id; ?>">
                <td class="order"><i class="fa fa-reorder"></i></td>
                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                <td class="w100 text-center">
                    <?php if($gallery_type == "image"){ ?>
                        <img width="100" src="<?php echo get_picture("galleries_v/images/$folder_name",$item->url,"252x156"); ?>" alt="<?php echo $item->url; ?>" class="img-fluid">
                    <?php } else if($gallery_type == "file") { ?>
                        <i class="fa fa-folder fa-2x"></i>
                    <?php } ?>
                </td>
                <td><?php echo $item->url; ?></td>
                <td class="w100 text-center">
                <div class="custom-control custom-switch"><input data-id="<?=$item->id?>" data-url="<?= base_url("galleries/fileIsActiveSetter/{$item->id}/$gallery_type"); ?>" data-status="<?= ($item->isActive) ? "checked" : ""; ?>" id="customSwitch<?=$item->id?>" type="checkbox" <?= ($item->isActive) ? "checked" : ""; ?> class="my-check custom-control-input">  <label class="custom-control-label" for="customSwitch<?=$item->id?>"></label></div>
                </td>
                <td class="w100 text-center">
                    <a
                        href="<?php echo base_url("galleries/fileUpdate/$item->id/$item->gallery_id/$gallery_type"); ?>"
                        class="btn btn-sm btn-sm btn-outline-success rounded-0   btn-block">
                        <i class="fa fa-pen"></i> Resim Açıklama Ekle
                    </a>
                    </td>
                <td class="w100 text-center">
                    <button
                        data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                        class="btn btn-sm btn-sm btn-outline-danger rounded-0 remove-btn btn-sm btn-block">
                        <i class="fa fa-trash"></i> Sil
                    </button>
                    
                        </td>
                   
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>