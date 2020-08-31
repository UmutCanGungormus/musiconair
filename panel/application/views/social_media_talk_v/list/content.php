<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Sosyal Medya Widget Listesi
                <a href="javascript:void(0)" data-url="<?= base_url("social_media_talk/new_form"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 btn-sm createSocialMediaTalkBtn"><i class="fa fa-plus"></i>Yeni Ekle</a>
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'socialMediaTalk')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','socialMediaTalk')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('socialMediaTalk')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container socialMediaTalk">

                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Widget Adı</th>
                    <th>Haber Adı</th>
                    <th>Görsel/Video</th>
                    <th>Durumu</th>
                    <th class="nosort">İşlem</th>
                </thead>
                <tbody>

                </tbody>

            </table>
            <script>
                function obj(d) {
                    let appendeddata = {};
                    $.each($("#filter_form").serializeArray(), function() {
                        d[this.name] = this.value;
                    });
                    return d;
                }
                $(document).ready(function() {
                    TableInitializerV2("socialMediaTalk", obj, {}, "<?= base_url("social_media_talk/datatable") ?>", "<?= base_url("social_media_talk/rankSetter") ?>", true);

                });
            </script>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>
<div id="socialMediaTalkModal"></div>

<script>
    $(document).ready(function() {
        $(document).on("click", ".createSocialMediaTalkBtn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            $('#socialMediaTalkModal').iziModal('destroy');
            createModal("#socialMediaTalkModal", "Yeni Sosyal Medya Widget Ekle", "Yeni Sosyal Medya Widget Ekle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
                $.post(url, {}, function(response) {
                    $("#socialMediaTalkModal .iziModal-content").html(response);
                    TinyMCEInit();
                    flatPickrInit();
                });
            });
            openModal("#socialMediaTalkModal");
            $("#socialMediaTalkModal").iziModal("setFullscreen",false);
        });
        $(document).on("click", ".btnSave", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("createSocialMediaTalk"));
            createAjax(url, formData, function() {
                closeModal("#socialMediaTalkModal");
                $("#socialMediaTalkModal").iziModal("setFullscreen",false);
                reloadTable("socialMediaTalk");
            });
        });
        $(document).on("click", ".updateSocialMediaTalkBtn", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#socialMediaTalkModal').iziModal('destroy');
            let url = $(this).data("url");
            createModal("#socialMediaTalkModal", "Sosyal Medya Widget Düzenle", "Sosyal Medya Widget Düzenle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
                $.post(url, {}, function(response) {
                    $("#socialMediaTalkModal .iziModal-content").html(response);
                    TinyMCEInit();
                    flatPickrInit();
                });
            });
            openModal("#socialMediaTalkModal");
            $("#socialMediaTalkModal").iziModal("setFullscreen",false);
        });
        $(document).on("click", ".btnUpdate", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = $(this).data("url");
            let formData = new FormData(document.getElementById("updateSocialMediaTalk"));
            createAjax(url, formData, function() {
                closeModal("#socialMediaTalkModal");
                $("#socialMediaTalkModal").iziModal("setFullscreen",false);
                reloadTable("socialMediaTalk");
            });
        });
    });
</script>