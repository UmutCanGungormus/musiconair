<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 offset-md-3 offset-lg-3 offset-xl-3">
            <div class="login-form p-5">
                <h2>Şifremi Sıfırla</h2>
                <form id="reset-password" onsubmit="return false;" method="POST">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <input type="hidden" name="token" value="<?= $token?>">
                    <div class="form-group">
                        <label for="username">Yeni Şifre:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Yeni Şifre Tekrar:</label>
                        <input type="password" name="re_password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success reset-paswword-form-btn" data-url="<?= base_url("sifremi-sifirla") ?>">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</div>