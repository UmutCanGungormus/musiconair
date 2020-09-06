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
                            <p class="text-muted font-13"><strong>Ad Soyad : </strong><span class="m-l-15"><?=$userData->full_name?></span></p>
                            <p class="text-muted font-13"><strong>Telefon : </strong><span class="m-l-15"><a href="tel:<?=$userData->phone?>"><?=$userData->phone?></a></span></p>
                            <p class="text-muted font-13"><strong>Email : </strong><span class="m-l-15">coderthemes@gmail.com</span></p>
                            <p class="text-muted font-13"><strong>Konum : </strong><span class="m-l-15">USA</span></p>
                        </div>
                        <?php if (!empty($userData->facebook) || !empty($userData->twitter) || !empty($userData->instagram) || !empty($userData->youtube) || !empty($userData->linkedin) || !empty($userData->twitch) || !empty($userData->medium)) : ?>
                            <ul class="social-links list-inline mt-4 mb-0">
                                <?php if (!empty($userData->facebook)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Facebook" data-title="Facebook" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->twitter)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Twitter" data-title="Twitter" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->instagram)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Instagram" data-title="Instagram" data-original-title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->youtube)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Youtube" data-title="Youtube" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->linkedin)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Twitch" data-title="Twitch" data-original-title="Twitch"><i class="fa fa-twitch"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->twitch)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Linkedin" data-title="Linkedin" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <?php endif;?>
                                <?php if (!empty($userData->medium)) : ?>
                                    <li class="list-inline-item"><a data-placement="top" data-toggle="tooltip" class="tooltips" href="" title="Medium" data-title="Medium" data-original-title="Medium"><i class="fa fa-medium"></i></a></li>
                                <?php endif;?>
                            </ul>
                        <?php endif?>
                    </div>
                </div>
                <!-- Personal-Information -->
                <div class="card-box ribbon-box dark">
                    <div class="ribbon ribbon-primary">Haberlerim</div>
                    <div class="clearfix"></div>
                    <div class="inbox-widget">
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author dark">Tomaslau</p>
                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                <p class="inbox-item-date">
                                    <button type="button" class="btn btn-icon btn-sm waves-effect waves-light btn-success">Reply</button>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-layers float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Orders</h6>
                            <h2 class="" data-plugin="counterup">1,587</h2><span class="badge badge-custom">+11% </span><span class="text-muted">From previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-paypal float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                            <h2 class="">$<span data-plugin="counterup">46,782</span></h2><span class="badge badge-danger">-29% </span><span class="text-muted">From previous period</span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-4">
                        <div class="card-box tilebox-one"><i class="icon-rocket float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                            <h2 class="" data-plugin="counterup">1,890</h2><span class="badge badge-custom">+89% </span><span class="text-muted">Last year</span>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Experience</h4>
                    <div class="">
                        <div class="">
                            <h5 class="text-custom">Lead designer / Developer</h5>
                            <p class="mb-0">websitename.com</p>
                            <p><b>2010-2015</b></p>
                            <p class="text-muted font-13 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <hr>
                        <div class="">
                            <h5 class="text-custom">Senior Graphic Designer</h5>
                            <p class="mb-0">coderthemes.com</p>
                            <p><b>2007-2009</b></p>
                            <p class="text-muted font-13 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h4 class="header-title mb-3">My Projects</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Adminox Admin</td>
                                    <td>01/01/2015</td>
                                    <td>07/05/2015</td>
                                    <td><span class="label label-info">Work in Progress</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Adminox Frontend</td>
                                    <td>01/01/2015</td>
                                    <td>07/05/2015</td>
                                    <td><span class="label label-success">Pending</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Adminox Admin</td>
                                    <td>01/01/2015</td>
                                    <td>07/05/2015</td>
                                    <td><span class="label label-pink">Done</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Adminox Frontend</td>
                                    <td>01/01/2015</td>
                                    <td>07/05/2015</td>
                                    <td><span class="label label-purple">Work in Progress</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Adminox Admin</td>
                                    <td>01/01/2015</td>
                                    <td>07/05/2015</td>
                                    <td><span class="label label-warning">Coming soon</span></td>
                                    <td>Coderthemes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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