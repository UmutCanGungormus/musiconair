<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container-fluid px-0 pr-0 mt-5">

    <div class="container mt-2">
        <div class="row mt-4 text-center px-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 bg-dark border p-4">
                <h4 class="text-white my-auto">REKLAM ALANI</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 bg-dark border p-4">
                <h4 class="text-white my-auto">REKLAM ALANI</h4>
            </div>
        </div>
        <div class="row mt-1">
            <div class="container-fluid">
                <h2><?= $test->title ?></h2>
                <img src="<?=get_picture("tests_v",$test->img_url) ?>" class="img-fluid">
                <h3>Seç Bakalım</h3>
            

            <form action="#" method="post">
                <div class=" question row mt3">
                    <?php
                    $toplam = 0;
                    $adet = 0;
                    foreach ($options as $option) {
                        $toplam += $option->hit;

                    ?>
                        <div class="col-md-3 my-3">
                            <img width="100%" src="<?=get_picture("options_v",$option->img_url) ?>" alt="metin">
                            <div class="form-group" style="text-align:center;">
                                <span style="font-size: larger"><?= $option->title ?></span>

                                <input class="form-control check" type="radio" data-options="<?= $option->id ?>" name="<?= $test->title ?>" value="<?= $option->title ?>">

                            </div>
                        </div>
                    <?php } ?>

                </div>

            </form>
            <form action="#" method="post">

                <div style="display:none;" class="answer row mt3">
                    <?php $oran = 100 / $toplam; ?>
                    <?php

                    foreach ($options as $option) {
                        $cevap = $option->hit * $oran;
                        $cevap = round($cevap);


                    ?>
                        <div class="col-md-3 my-3">
                            <img width="100%" src="<?=get_picture("options_v",$option->img_url) ?>" alt="metin">
                            <div class="form-group" style="text-align:center;">
                                <span style="font-size: larger"><?= $option->title ?></span>

                                <input class="form-control check" type="radio" data-options="<?= $option->id ?>" name="<?= $test->title ?>" value="<?= $option->title ?>">
                                <p>Toplam Yanıtlarda % <?= $cevap ?> Oranında Bu Cevap Seçildi. </p>
                                <div class="yuzde" style=" border-radius: 5px; background-color:#f9dddd">
                                    <div class="ic" style="border-radius: 5px; background-color: #228203;width:<?= $cevap; ?>% ; ">
                                        % <?= $cevap ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </form>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $(".check").on('click', function() {
                        $id = $(this).data("options");
                        $.ajax({
                            url: "<?= base_url("TestCheck") ?>",
                            method: "POST",
                            data: {
                                id: $id,
                                test_id: <?= $test->id ?>
                            },
                            success: function(res) {
                                if (res == "create") {
                                    alertify.set('notifier', 'position', 'bottom-left');
                                    alertify.success('Cevabınız Kayıt Edildi, Teşekkürler.');
                                }
                                if (res == "update") {
                                    alertify.set('notifier', 'position', 'bottom-left');
                                    alertify.success('Cevabınız Güncellendi, Teşekkürler');

                                    $(".answer").css("display", "");
                                    $(".question").css("display", "none");





                                }
                                if (res == "ok") {
                                    alertify.set('notifier', 'position', 'bottom-left');
                                    alertify.warning('Bu Soruya Daha Önce Aynı Yanıtı Verdiniz');
                                }
                            }
                        });

                    });
                });
            </script>

            <script type="text/javascript">
                window.addEventListener("DOMContentLoaded", function() {
                    var diziler = $(".secilenDizi");
                    diziler.click(function(event) {
                        for (var i = 0; i < diziler.length; i++) {
                            diziler.prop("checked", false);
                            $(this).prop("checked", true);

                        }
                    });


                });
            </script>





        </div>
    </div>
    </section>
    <script>

    </script>