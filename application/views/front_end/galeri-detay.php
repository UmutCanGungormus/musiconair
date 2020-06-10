<div class="container-fluid px-0 pr-0 page-padding-top">

    <div class="container mt-3 p-0">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container text-center bg-dark border" style="height: 90px;">
                    <h3 class="text-white">Reklam Alanı</h3>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="container">
                    <b><a href="">Anasayfa</a></b> >
                    <b><a href="">Galeriler</a></b> >
                    <b><a href="">Ayla Çelik’in O Sözleri Twitter’ı Salladı</a> </b>
                </div>
            </div>
        </div>

        <div class="container my-2">
            <div class="row justify-content-between">
                <div class="col-md-8">
                    <div class="container p-3 bg-white">

                        <h3 class="mt-3">Galeri Başlığı
                            <span class="float-right" style="font-size: 12px;">
									<div class="d-inline-block mr-3"><i class="fa fa-eye"></i> 356 </div>
									<div class="d-inline-block mr-3"><i class="fa fa-comment"></i> 5</div>
									<div class="d-inline-block"><i class="fa fa-calendar"></i> 03.09.2019</div>
								</span>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


                        <?php for ($i = 1; $i <= 9; $i++): ?>
                            <div class="p-2 shadow my-4">
                                <h5 class="m-0">
                                    <?php echo $i; ?> - Yazı Başlığı
                                </h5>
                                <img src="<?php echo base_url("public/uploads/aleyna.jpg"); ?>" class="img-fluid mt-2"
                                     alt="">
                            </div>
                        <?php endfor; ?>

                        <div class="container text-center bg-dark border" style="height: 90px;">
                            <h3 class="text-white">Reklam Alanı</h3>
                        </div>

                        <div class="mt-4" style="height: 70px;">
                            <b>Etiketler</b>
                            <ul>
                                <a href=""
                                   class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#AylaÇelik</b></a>
                                <a href=""
                                   class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#Twitter</b></a>
                                <a href="" class="btn btn-danger btn-sm m-1 p-1 float-left d-inline-block"><b>#Twit</b></a>
                            </ul>
                        </div>

                        <div class="mt-4" style="height: 70px;">
                            <b>Emoji Bırak</b>
                            <ul>
                                <li class="float-left mx-2">
                                    <i class="fa fa-meh-o fa-4x"></i>
                                </li>

                                <li class="float-left mx-2">
                                    <i class="fa fa-frown-o fa-4x"></i>
                                </li>

                                <li class="float-left mx-2">
                                    <i class="fa fa-smile-o fa-4x"></i>
                                </li>
                                <li class="float-left mx-2">
                                    <i class="fa fa-meh-o fa-4x"></i>
                                </li>

                                <li class="float-left mx-2">
                                    <i class="fa fa-frown-o fa-4x"></i>
                                </li>

                                <li class="float-left mx-2">
                                    <i class="fa fa-smile-o fa-4x"></i>
                                </li>

                            </ul>
                        </div>


                        <div class="mt-4">
                            <b>Sosyal Medyada Paylaş</b>
                            <ul class="mt-2">
                                <li class="float-left mx-2">
                                    <a href="">
                                        <i class="fa fa-facebook fa-2x"></i>
                                    </a>
                                </li>

                                <li class="float-left mx-2">
                                    <a href="">
                                        <i class="fa fa-twitter fa-2x"></i>
                                    </a>
                                </li>

                                <li class="float-left mx-2">
                                    <a href="">
                                        <i class="fa fa-instagram fa-2x"></i>
                                    </a>
                                </li>
                            </ul>
                            <div style="clear: both"></div>
                        </div>

                        <div class="mt-4">
                            <b>Yorumlar</b>
                            <ul class="list-group list-group-flush">

                                <?php for ($i = 1; $i <= 7; $i++): ?>
                                    <li class="list-group-item">
                                        <b>Ahmet: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic,
                                        consequatur, iusto. Quisquam facere, in at. Similique odio natus possimus quasi,
                                        blanditiis, quos, cum tenetur pariatur harum nemo architecto illo quisquam.
                                    </li>
                                <?php endfor; ?>

                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center bg-dark border" style="height: 300px;">
                        <h3 class="text-white">Reklam Alanı</h3>
                    </div>

                    <div class="container p-3 bg-white mt-3">
                        <h3 class="title">Benzer Galeriler</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php  echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg")?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                        </ul>
                    </div>

                    <div class="container p-3 bg-white mt-3">
                        <h3 class="title">Çok Bakılanlar</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                            <li class="list-group-item">
                                <div style="width: 35px; height: 35px; overflow: hidden; border-radius: 35px; float: left;">
                                    <img src="<?php echo base_url("public/uploads/56f52c2f18c7736068498229.jpg");?>" class="img-fluid rounded float-left"
                                         alt="">
                                </div>
                                <a href="" class="d-inline-block mt-2 float-right">Ayla Çelik’in O Sözleri Twitter’ı
                                    Salladı</a>
                            </li>
                        </ul>
                    </div>

                    <div class="container text-center bg-dark border mt-3" style="height: 300px;">
                        <h3 class="text-white">Reklam Alanı</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php require_once 'includes/footer.php'; ?>