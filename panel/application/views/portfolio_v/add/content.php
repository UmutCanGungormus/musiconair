<form id="createPortfolio" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label>Başlık</label>
                <input class="form-control form-control-sm rounded-0" placeholder="İşi anlatan başlık bilgisi" name="title">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <label>Kategori</label>
            <select class="form-control form-control-sm rounded-0" name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <label for="datetimepicker1">Bitirme Tarihi</label>
            <input type="date" class="form-control form-control-sm rounded-0" name="finishedAt" />
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
                <label>Müşteri</label>
                <input class="form-control form-control-sm rounded-0" placeholder="İşi yaptığınız üşteri" name="client">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
                <label>Yer/Mekan</label>
                <input class="form-control form-control-sm rounded-0" placeholder="İşi yaptığınız Yer/Mekan bilgisi" name="place">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
                <label>Yapılan işin Bağlantısı (URL)</label>
                <input class="form-control form-control-sm rounded-0" placeholder="Yapılan işin internet üzerindeki bağlantısı" name="portfolio_url">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
                <label>Açıklama</label>
                <textarea name="description" class="m-0 tinymce"></textarea>
            </div>
        </div>
    </div>
    <button role="button" data-url="<?= base_url("portfolio/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#portfolioModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
</form>