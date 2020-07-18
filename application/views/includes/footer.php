
<form id="kayit-ol" action="<?php echo base_url("uye_kayit"); ?>" method="post" style="display: none;width:100%;max-width:410px;">
    <h4>Kayıt Ol </h4>
    <p>
        Lütfen aşağıdaki gerekli alanları doldurun<br>
    </p>
    <p>
        <b>Nick * </b>
        <input type="text" class="form-control" value="" name="uye_nick" placeholder="Ör Star-Writer" required="" />
    </p>
    <p>
        <b>Ad * </b>
        <input type="text" class="form-control" value="" name="uye_ad" placeholder="Adınız" required="" />
    </p>
    <p>
        <b>Soyad *</b>
        <input type="text" class="form-control" value="" name="uye_soyad" placeholder="Soyadınız" required="" />
    </p>
    <p>
        <b>E-Posta Adresi *</b>
        <input type="text" class="form-control" value="" name="uye_mail" placeholder="E-Posta Adresi" required="" />
    </p>
    <p>
        <b>Şifre *</b>
        <input type="password" class="form-control" value="" name="uye_password" placeholder="*******" required="" />
    </p>
    <p>
    <a class="float-left mt-2 d-inline-block btn btn-success waves-effect waves-light" data-fancybox="giris-yap" id="close-register" href=""><b>Giriş Yap</b></a>
        <button class="btn btn-danger btn-sm float-right">
            <i class="fa fa-check"></i>
            Kayıt Ol
        </button>
    </p>
</form>

<form id="giris-yap" action="<?php echo base_url("uye_giris"); ?>" method="post" style="display: none;width:100%;max-width:410px;">
    <h4>Giriş Yap </h4>
    <p>
        <b>E-Posta Adresi *</b>
        <input type="text" class="form-control" value="" name="uye_mail" placeholder="E-Posta Adresi" required="" />
    </p>
    <p>
        <b>Şifre *</b>
        <input type="password" class="form-control" value="" name="uye_sifre" placeholder="*******" required="" />
    </p>
    <p>
        <a class="btn btn-danger" data-fancybox="kayit-ol" id="close-login" href=""><b>KAYIT OL</b></a>


        <button class="btn btn-success"><b><i class="fa fa-check"></i>GİRİŞ YAP</b></button>

    </p>
</form>

<form id="iletisim" action="" method="post" style="display: none;width:100%;max-width:410px;">
    <h4>İletişim</h4>
    <p>
        <b>Ad *</b>
        <input type="text" class="form-control" value="" name="demo_name" placeholder="Ad" required="" />
    </p>
    <p>
        <b>Soyad *</b>
        <input type="text" class="form-control" value="" name="demo_surname" placeholder="Soyad" required="" />
    </p>
    <p>
        <b>Konu *</b>
        <select class="form-control" name="" required="">
            <option value="">Lütfen Seçin</option>
            <option value="İstek">İstek</option>
            <option value="Öneri">Öneri</option>
            <option value="Şikayet">Şikayet</option>
        </select>
    </p>
    <p>
        <b>E-Posta Adresi *</b>
        <input type="text" class="form-control" value="" name="demo_surname" placeholder="E-Posta Adresi" required="" />
    </p>
    <p>
        <b>E-Posta Adresi *</b>
        <textarea class="form-control" name="" required=""></textarea>
    </p>
    <p>
        <button class="btn btn-danger btn-sm float-right">
            <i class="fa fa-check"></i>
            Gönder
            p</button>
    </p>
</form>

<form id="ilanlar" action="" method="post" style="display: none;width:100%;max-width:410px;">
    <h4>İlanlar</h4>

    <div class="form-group">
        <label for="name">Ad * </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Ad" required="">
    </div>
    <div class="form-group">
        <label for="surname">Soyad * </label>
        <input type="text" class="form-control" name="surname" id="surname" placeholder="Soyad" required="">
    </div>
    <div class="form-group">
        <label for="email">E-Posta Adresi * </label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Ad" required="">
    </div>
    <div class="form-group">
        <label for="cw">CW * </label>
        <input type="file" class="form-control" name="cw" id="cw">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-danger">
            <i class="fa fa-check"></i> Gönder
        </button>
    </div>
</form>

<!-- SCRIPTS -->
<!-- Bootstrap Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<!-- MDBootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Fancy Box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<!-- iziToast -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<!-- iziModal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
<!-- App -->
<script src="<?= base_url("public/front_end/assets/libraries/app.js") ?>?v=<?= time() ?>"></script>
<!-- SCRIPTS -->

</body>

</html>