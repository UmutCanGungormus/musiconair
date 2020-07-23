<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<div class="container">
    <div class="d-flex flex-column">
        <div>
            <?php if (get_cookie("theme", true) == "dark") : ?>
                <img src="<?= base_url("panel/assets/img/404-dark.png") ?>" alt="MüzikOnAir" class="w-100 img-fluid mw-100">
            <?php else : ?>
                <img src="<?= base_url("panel/assets/img/404-light.png") ?>" alt="MüzikOnAir" class="w-100 img-fluid mw-100">
            <?php endif; ?>
        </div>
        <div><h3 class="h1 text-center">Hata: ARADIĞINIZ SAYFA BULUNAMADI...</h3></div>
    </div>
</div>