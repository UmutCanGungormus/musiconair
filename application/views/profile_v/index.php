<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="wrapper2 w-100">
    <div class="container-fluid mt-3">
        <div class="row">
            <!-- # Left Panel -->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <img src="<?= get_picture("users_v", $userData->img_url) ?>" alt="<?= $userData->user_name ?>" class="img-fluid rounded-0 img-thumbnail dark w-100 d-block mb-3">

                <h6 class="h5">E-Mail Adresi</h6>
                <div class="mb-3"><a class="dark bg-transparent font-weight-bold" href="mailto:<?= $userData->email ?>"><?= $userData->email ?></a></div>

                <?php if (!empty($userData->facebook) || !empty($userData->twitter) || !empty($userData->instagram) || !empty($userData->youtube) || !empty($userData->linkedin) || !empty($userData->twitch) || !empty($userData->medium)) : ?>
                    <h6 class="h5">Sosyal Ağlar</h6>
                    <div class="mb-3">
                        <?php if (!empty($userData->facebook)) : ?>
                            <a href="<?= $userData->facebook ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Facebook" data-title="Facebook" data-original-title="Facebook"><i class="fa fa-facebook text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->twitter)) : ?>
                            <a href="<?= $userData->twitter ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Twitter" data-title="Twitter" data-original-title="Twitter"><i class="fa fa-twitter text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->instagram)) : ?>
                            <a href="<?= $userData->instagram ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Instagram" data-title="Instagram" data-original-title="Instagram"><i class="fa fa-instagram text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->youtube)) : ?>
                            <a href="<?= $userData->youtube ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Youtube" data-title="Youtube" data-original-title="Youtube"><i class="fa fa-youtube text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->linkedin)) : ?>
                            <a href="<?= $userData->linkedin ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Twitch" data-title="Twitch" data-original-title="Twitch"><i class="fa fa-twitch text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->twitch)) : ?>
                            <a href="<?= $userData->twitch ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Linkedin" data-title="Linkedin" data-original-title="Linkedin"><i class="fa fa-linkedin text-center align-middle"></i></a>
                        <?php endif ?>
                        <?php if (!empty($userData->medium)) : ?>
                            <a href="<?= $userData->medium ?>" class="dark rounded-circle d-inline-flex text-center align-middle p-2" data-toggle="tooltip" data-placement="top" title="Medium" data-title="Medium" data-original-title="Medium"><i class="fa fa-medium text-center align-middle"></i></a>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if (!empty($userData->website)) : ?>
                    <h6 class="h5">Website</h6>
                    <div class="mb-3"><a class="dark bg-transparent font-weight-bold" target="_blank" href="<?= $userData->website ?>"><?= $userData->website ?></a></div>
                <?php endif; ?>

                <?php if (!empty($userData->city) && !empty($userData->district)) : ?>
                    <h6 class="h5">Ülke / Şehir</h6>
                    <div class="mb-3"><?= $userData->country ?> / <?= $userData->city ?></div>
                <?php endif; ?>

                <?php if (!empty($userData->about)) : ?>
                    <h6 class="h5">Hakkında</h6>
                    <div class="mb-3"><?= clean($userData->about) ?></div>
                <?php endif; ?>
            </div>
            <!-- ### Left Panel -->
            <!-- # Timeline Content -->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <?php
                $image = null;
                if ($userData->isVerified) :
                    $image = '<a href="javascript:void(0)" class="d-inline-flex" data-toggle="tooltip" data-placement="top" title="Onaylanmış Hesap" data-title="Onaylanmış Hesap" data-original-title="Onaylanmış Hesap"><img src="' . base_url("public/images/verified.png") . '" class="img-fluid" width="25"></a>';
                endif;
                ?>
                <h1><?= $userData->user_name ?> <?= $image ?></h1>
                <h6><?= $userRole ?></h6>
                <!-- Classic tabs -->
                <div class="classic-tabs mx-2">

                    <ul class="nav tabs-orange" id="myClassicTabOrange" role="tablist">
                        <li class="nav-item dark bg-transparent">
                            <a class="nav-link waves-light active show" id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange" role="tab" aria-controls="profile-classic-orange" aria-selected="true"><i class="fas fa-user fa-2x pb-2" aria-hidden="true"></i><br>Profile</a>
                        </li>
                        <li class="nav-item dark bg-transparent">
                            <a class="nav-link waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange" role="tab" aria-controls="follow-classic-orange" aria-selected="false"><i class="fas fa-heart fa-2x pb-2" aria-hidden="true"></i><br>Follow</a>
                        </li>
                        <li class="nav-item dark bg-transparent">
                            <a class="nav-link waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange" role="tab" aria-controls="contact-classic-orange" aria-selected="false"><i class="fas fa-envelope fa-2x pb-2" aria-hidden="true"></i><br>Contact</a>
                        </li>
                        <li class="nav-item dark bg-transparent">
                            <a class="nav-link waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange" role="tab" aria-controls="awesome-classic-orange" aria-selected="false"><i class="fas fa-star fa-2x pb-2" aria-hidden="true"></i><br>Be awesome</a>
                        </li>
                    </ul>

                    <div class="tab-content card" id="myClassicTabContentOrange">
                        <div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                                dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        </div>
                        <div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                                aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                                quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </div>
                        <div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                                deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                                provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                                Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                                eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
                                assumenda est, omnis dolor repellendus. </p>
                        </div>
                        <div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

                </div>
                <!-- Classic tabs -->
            </div>
            <!-- ### Timeline Content -->
        </div>
    </div>
</div>