<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$image = null;
if ($userData->isVerified) :
    $image = '<a href="javascript:void(0)" class="d-inline-flex" data-toggle="tooltip" data-placement="top" title="Onaylanmış Hesap" data-title="Onaylanmış Hesap" data-original-title="Onaylanmış Hesap"><img src="' . base_url("public/images/verified.png") . '" class="img-fluid" width="25"></a>';
endif;
?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <!-- meta -->
                <div class="profile-user-box card-box bg-danger">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"><span class="float-left mr-3 h-100"><img src="<?= get_picture("users_v", $userData->img_url) ?>" alt="<?= $userData->user_name ?>" class="thumb-lg rounded-circle border"></span>
                            <div class="media-body text-white">
                                <h1 class="mt-1 mb-1 font-18"><?= $userData->user_name ?> <?= $image ?></h1>
                                <p class="font-13 text-light"><?= $userRole ?></p>
                                <p class="text-light mb-0"><?= get_countries($userData->country)->country ?>, <?= get_cities($userData->city)->city ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="text-right">
                                <button type="button" class="btn btn-light waves-effect"><i class="mdi mdi-account-settings-variant mr-1"></i> Profilimi Düzenle</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <div class="row">
            <!-- # Left Panel -->
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <!-- Personal-Information -->
                <div class="card-box dark">
                    <h4 class="mt-0">Biografi</h4>
                    <div class="panel-body">
                        <p class="text-muted font-13"><?= $userData->about ?></p>
                        <hr>
                        <div class="text-left">
                            <p class="text-muted font-13"><strong>Ad Soyad : </strong><span class="m-l-15"><?= $userData->full_name ?></span></p>
                            <p class="text-muted font-13"><strong>Telefon : </strong><span class="m-l-15"><a class="bg-transparent" href="tel:<?= $userData->phone ?>"><?= $userData->phone ?></a></span></p>
                            <p class="text-muted font-13"><strong>Email : </strong><span class="m-l-15"><a class="bg-transparent" href="mailto:<?= $userData->email ?>"><?= $userData->email ?></a></span></p>
                            <p class="text-muted font-13"><strong>Website : </strong><span class="m-l-15"><a class="bg-transparent" target="_blank" href="<?= $userData->website ?>"><?= $userData->website ?></a></span></p>
                            <p class="text-muted font-13"><strong>Konum : </strong><span class="m-l-15"><?= get_countries($userData->country)->country ?>, <?= get_cities($userData->city)->city ?></span></p>
                        </div>
                        <?php if (!empty($userData->facebook) || !empty($userData->twitter) || !empty($userData->instagram) || !empty($userData->youtube) || !empty($userData->linkedin) || !empty($userData->twitch) || !empty($userData->medium)) : ?>
                            <ul class="social-links list-inline mt-4 mb-0">
                                <?php if (!empty($userData->facebook)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->facebook ?>" title="Facebook" data-title="Facebook" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->twitter)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->twitter ?>" title="Twitter" data-title="Twitter" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->instagram)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->instagram ?>" title="Instagram" data-title="Instagram" data-original-title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->youtube)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->youtube ?>" title="Youtube" data-title="Youtube" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->twitch)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->twitch ?>" title="Twitch" data-title="Twitch" data-original-title="Twitch"><i class="fa fa-twitch"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->linkedin)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->linkedin ?>" title="Linkedin" data-title="Linkedin" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <?php endif; ?>
                                <?php if (!empty($userData->medium)) : ?>
                                    <li class="list-inline-item"><a class="bg-transparent" data-placement="top" data-toggle="tooltip" class="tooltips" href="<?= $userData->medium ?>" title="Medium" data-title="Medium" data-original-title="Medium"><i class="fa fa-medium"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
                <!-- Personal-Information -->
                <?php if (!empty($news_limit)) : ?>
                    <div class="card-box ribbon-box dark">
                        <div class="ribbon ribbon-primary">Haberlerim</div>
                        <div class="clearfix"></div>
                        <div class="inbox-widget">
                            <?php foreach ($news_limit as $key => $value) : ?>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="<?= get_picture("news_v", $value->img_url) ?>" width="75" class="rounded-circle" alt="<?= $value->title ?>"></div>
                                    <div class="inbox-item-author dark"><?= $value->title ?></div>
                                    <div class="inbox-item-text"><?= mb_word_wrap($value->content, 150, "...") ?></div>
                                    <div class="inbox-item-date">
                                        <a href="<?= base_url("haber/{$value->seo_url}") ?>" class="d-block btn btn-icon btn-sm waves-effect waves-light btn-success">Görüntüle</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card-box p-0 dark">
                    <ul class="nav nav-tabs flex-column flex-sm-row p-0" id="myTab" role="tablist">
                        <li class="nav-item rounded-0 flex-sm-fill p-0 m-0 text-center active" role="presentation">
                            <a class="nav-link rounded-0 m-0 p-3 text-center text-info bg-transparent active" id="contents-tab" data-toggle="tab" href="#contents" role="tab" aria-controls="contents" aria-selected="true">İçerikler</a>
                        </li>
                        <li class="nav-item rounded-0 flex-sm-fill p-0 m-0 text-center" role="presentation">
                            <a class="nav-link rounded-0 m-0 p-3 text-center text-info bg-transparent" id="favourites-tab" data-toggle="tab" href="#favourites" role="tab" aria-controls="favourites" aria-selected="false">Favoriler</a>
                        </li>
                        <li class="nav-item rounded-0 flex-sm-fill p-0 m-0 text-center" role="presentation">
                            <a class="nav-link rounded-0 m-0 p-3 text-center text-info bg-transparent" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Yorumlar</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="contents" role="tabpanel" aria-labelledby="contents-tab">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">İçerikler</h4>
                                <hr>
                                <?php if (!empty($news)) : ?>
                                    <?php foreach ($news as $key => $value) : ?>
                                        <a href="<?= base_url("haber/{$value->seo_url}") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-1">
                                                    <img src="<?= get_picture("news_v", $value->img_url) ?>" alt="<?= $value->title ?>" class="mr-3" width="150" height="150">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="text-custom"><?= $value->title ?></h5>
                                                    <p class="mb-0"><?= $writer->full_name ?> <?= (!empty($writer->username) ? "(" . $writer->username . ")" : null); ?></p>
                                                    <p>
                                                        Oluşturulma Tarihi : <b><?= turkishDate("d F Y, l H:i:s", $value->createdAt) ?></b>
                                                        <?php if ($value->updatedAt) : ?>
                                                            Güncelleme Tarihi : <b><?= turkishDate("d F Y, l H:i:s", $value->updatedAt) ?></b>
                                                        <?php endif ?>
                                                    </p>
                                                    <p class="text-muted font-13 mb-0"><?= mb_word_wrap($value->content, 150, "...") ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">

                        </div>
                        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Yorumlar</h4>
                                <hr>
                                <?php if (!empty($news)) : ?>
                                    <?php foreach ($news as $key => $value) : ?>
                                        <a href="<?= base_url("haber/{$value->seo_url}") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-1">
                                                    <img src="<?= get_picture("news_v", $value->img_url) ?>" alt="<?= $value->title ?>" class="mr-3" width="150" height="150">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="text-custom"><?= $value->title ?></h5>
                                                    <p class="mb-0"><?= $writer->full_name ?> <?= (!empty($writer->username) ? "(" . $writer->username . ")" : null); ?></p>
                                                    <p>
                                                        Oluşturulma Tarihi : <b><?= turkishDate("d F Y, l H:i:s", $value->createdAt) ?></b>
                                                        <?php if ($value->updatedAt) : ?>
                                                            Güncelleme Tarihi : <b><?= turkishDate("d F Y, l H:i:s", $value->updatedAt) ?></b>
                                                        <?php endif ?>
                                                    </p>
                                                    <p class="text-muted font-13 mb-0"><?= mb_word_wrap($value->content, 150, "...") ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>