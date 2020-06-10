<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Haber İçi Widget Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("news_box/save"); ?>" method="post">
                <div class="form-group">
                        <label>Eklenecek Olan Widget </label>
                        <select class="selectpicker form-control" name="added_news_id" data-show-subtext="true" data-live-search="true">
                               <?php foreach($categories as $category){?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                               <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Widget Eklenecek Haber </label>
                        <select class="selectpicker form-control" name="which_news_id" data-show-subtext="true" data-live-search="true">
                        <?php foreach($categories as $category){?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                               <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("news_box"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>