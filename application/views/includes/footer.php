<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="loginModal" id="modal-custom" data-iziModal-group="group1" style="display: none;">
    <header>
        <a href="javascript:void(0)" class="active" id="signin">Giriş Yap</a>
        <a href="javascript:void(0)">Kayıt Ol</a>
    </header>
    <section>
        <form id="giris-yap" onsubmit="return false;" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="login-email">E-Posta Adresi *</label>
                <input id="login-email" type="text" class="form-control" name="email" placeholder="E-Posta Adresi" required>
            </div>
            <div class="form-group">
                <label for="login-password">Şifre *</label>
                <input id="login-password" type="password" class="form-control" name="password" placeholder="Şifre" required>
            </div>
            <footer>
                <button class="btn btn-info remember-password">ŞİFREMİ UNUTTUM</button>
                <button class="btn btn-danger" data-iziModal-close>İPTAL ET</button>
                <button class="btn btn-success giris-yap" data-url="<?= base_url("giris-yap") ?>"><i class="fa fa-check"></i> GİRİŞ YAP</button>
            </footer>
        </form>
    </section>
    <section class="d-none">
        <form id="kayit-ol" onsubmit="return false" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="register-username">Kullanıcı Adı *</label>
                <input id="register-username" type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" required>
            </div>
            <div class="form-group">
                <label for="register-name">Adınız *</label>
                <input id="register-name" type="text" class="form-control" name="name" placeholder="Adınız" required>
            </div>
            <div class="form-group">
                <label for="register-surname">Soyadınız *</label>
                <input id="register-surname" type="text" class="form-control" name="surname" placeholder="Soyadınız" required>
            </div>
            <div class="form-group">
                <label for="register-email">E-Posta Adresi *</label>
                <input id="register-email" type="text" class="form-control" name="email" placeholder="E-Posta Adresi" required>
            </div>
            <div class="form-group">
                <label for="register-password">Şifre *</label>
                <input id="register-password" type="password" class="form-control" name="password" placeholder="Şifre" required>
            </div>
            <footer>
                <button class="btn btn-danger" data-iziModal-close>İPTAL ET</button>
                <button class="btn btn-success kayit-ol" data-url="<?= base_url("kayit-ol") ?>"><i class="fa fa-check"></i> KAYIT OL</button>
            </footer>
        </form>
    </section>
</div>

<div class="rememberPasswordModal" style="display: none;">
    <form id="remember-password" onsubmit="return false" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="reset-email">E-Posta Adresi *</label>
            <input id="reset-email" type="text" class="form-control" name="email" placeholder="E-Posta Adresi" required>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" data-iziModal-close>İPTAL ET</button>
            <button class="btn btn-success sifremi-unuttum" data-url="<?= base_url("sifremi-unuttum") ?>"><i class="fa fa-check"></i> SIFIRLAMA MAİLİ GÖNDER</button>
        </div>
    </form>
</div>

<!-- SCRIPTS -->
<!-- Bootstrap Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- MDBootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Fancy Box -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<!-- iziToast -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<!-- iziModal -->
<script src="<?= base_url("public/js/iziModal.min.js") ?>"></script>
<!-- App -->
<script src="<?= base_url("public/js/app.js") ?>?v=<?= time() ?>"></script>
<!-- SCRIPTS -->
<?php $this->load->view("includes/alert") ?>
<script>
    $(document).ready(function() {
        let headerColor = (getCookie("theme") === "dark" ? "#202020" : "#e20e17");
        let bgColor = (getCookie("theme") === "dark" ? "#222" : "#fff");
        createModal(".rememberPasswordModal", "Şifremi Unuttum", "Şifremi Unuttum", 600, true, "20px", 0, headerColor, bgColor,1050);
        $(document).on("click", ".remember-password", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            openModal(".rememberPasswordModal");
        });
        createModal(".loginModal", "Giriş Yap / Kayıt Ol", "Giriş Yap Kayıt Ol", 600, true, "20px", 0, headerColor, bgColor,1040);
        $(document).on("click", ".trigger-custom", function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            openModal(".loginModal");
        });
    });
</script>
</body>

</html>