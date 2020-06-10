<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>". get_news_title( $item->added_news_id)."</b> widget kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news_box/update/$item->id"); ?>" method="post">
                <div class="form-group">
                        <label>Eklenecek Olan Widget </label>
                        <select class="selectpicker form-control" name="added_news_id" data-show-subtext="true" data-live-search="true">
                               <?php foreach($categories as $category){?>
                                <option <?php if($item->added_news_id==$category->id){echo "selected";}?> value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                               <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Widget Eklenecek Haber </label>
                        <select class="selectpicker form-control" name="which_news_id" data-show-subtext="true" data-live-search="true">
                        <?php foreach($categories as $category){?>
                                <option <?php if($item->which_news_id==$category->id){echo "selected";}?> value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                               <?php }?>
                        </select>
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("news_box"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>