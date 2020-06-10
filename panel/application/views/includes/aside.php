<?php $user = get_active_user(); ?>
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo base_url("assets"); ?>/assets/images/221.jpg" alt="<?php echo convertToSEO($user->full_name); ?>"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name; ?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>İşlemler</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?php echo base_url(); ?>">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Anasayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("users/update_form/$user->id"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profilim</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?php echo base_url("logout"); ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->
    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <?php if(isAllowedViewModule("dashboard")) { ?>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("settings")) { ?>
                <li>
                    <a href="<?php echo base_url("settings"); ?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("emailsettings")) { ?>
                <li>
                    <a href="<?php echo base_url("emailsettings"); ?>">
                        <i class="menu-icon zmdi zmdi-email zmdi-hc-lg"></i>
                        <span class="menu-text">E-Posta Ayarları</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("galleries")) { ?>
                <li>
                    <a href="<?php echo base_url("galleries"); ?>">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Galeri İşlemleri</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("video")) { ?>
                <li>
                    <a href="<?php echo base_url("video"); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Video</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("writers")) { ?>
                <li>
                    <a href="<?php echo base_url("writers"); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Editörler/Yazarlar</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("slides")) { ?>
                <li>
                    <a href="<?php echo base_url("slides"); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Slider</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("home_banner")) { ?>
                <li>
                    <a href="<?php echo base_url("home_banner"); ?>">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Anasayfa Banner</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("advertisement")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">İlan İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("advertisement/?type=job"); ?>"><span class="menu-text">İş İlanları</span></a></li>
                        <li><a href="<?php echo base_url("advertisement/?type=estate"); ?>"><span class="menu-text">Emlak İlanları</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("social_media_talk")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Widget İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("social_media_talk"); ?>"><span class="menu-text">Sosyal Medya Bunu Konuşuyor</span></a></li>
                        <li><a href="<?php echo base_url("news_box"); ?>"><span class="menu-text">Haber Kutusu</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("votings")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Oylama İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("votings"); ?>"><span class="menu-text">Oylama Konusu</span></a></li>
                        <li><a href="<?php echo base_url("voting_options"); ?>"><span class="menu-text">Oylama Şıkları</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("news")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Haber İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("news"); ?>"><span class="menu-text">Haberler</span></a></li>
                        <li><a href="<?php echo base_url("news_categories"); ?>"><span class="menu-text">Haber Kategorileri</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("test")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Test İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("test"); ?>"><span class="menu-text">Testler</span></a></li>
                        <li><a href="<?php echo base_url("options"); ?>"><span class="menu-text">Test Şıkları</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("book")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Kitaplar</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("book_category"); ?>"><span class="menu-text">Kitap Türleri</span></a></li>
                        <li><a href="<?php echo base_url("book"); ?>"><span class="menu-text">Kitaplar</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("cinema")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Sinema</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("cinema_category"); ?>"><span class="menu-text">Film Türleri</span></a></li>
                        <li><a href="<?php echo base_url("cinema"); ?>"><span class="menu-text">Filmler</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("activity")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text">Etkinlik İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?php echo base_url("activity"); ?>"><span class="menu-text">Etkinlikler</span></a></li>
                        <li><a href="<?php echo base_url("activity_category"); ?>"><span class="menu-text">Etkinlik Kategorileri</span></a></li>
                       
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("users")) { ?>
                <li>
                    <a href="<?php echo base_url("users"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("user_role")) { ?>
                <li>
                    <a href="<?php echo base_url("user_role"); ?>">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text">Kullanıcı Yetkileri</span>
                    </a>
                </li>
                <?php } ?>
                <?php /* ?>
                <?php if(isAllowedViewModule("product")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon fa fa-asterisk"></i>
                        <span class="menu-text">Ürün İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo base_url("product_categories"); ?>">
                                <span class="menu-text">Ürün Kategorileri</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("product"); ?>">
                                <span class="menu-text">Ürünler</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("services")) { ?>
                <li>
                    <a href="<?php echo base_url("services"); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Hizmetlerimiz</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("questions")) { ?>
                <li>
                    <a href="<?php echo base_url("questions"); ?>">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Soru (SSS)</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("portfolio")) { ?>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon fa fa-asterisk"></i>
                        <span class="menu-text">Portfolyo İşlemleri</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo base_url("portfolio_categories"); ?>">
                                <span class="menu-text">Portfolyo Kategorileri</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("portfolio"); ?>">
                                <span class="menu-text">Portfolyo</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("news")) { ?>
                <li>
                    <a href="<?php echo base_url("news"); ?>">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text">Haberler</span>
                    </a>
                </li>
                <?php } ?>
             
                <?php if(isAllowedViewModule("references")) { ?>
                <li>
                    <a href="<?php echo base_url("references"); ?>">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text">Ülkeler</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("brands")) { ?>
                <li>
                    <a href="<?php echo base_url("brands"); ?>">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text">Markalar</span>
                    </a>
                </li>
                <?php } ?>
             
                <?php if(isAllowedViewModule("dashboard")) { ?>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">Aboneler</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("testimonials")) { ?>
                <li>
                    <a href="<?php echo base_url("testimonials"); ?>">
                        <i class="menu-icon fa fa-comments"></i>
                        <span class="menu-text">Ziyaretçi Notları</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("popups")) { ?>
                <li>
                    <a href="<?php echo base_url("popups"); ?>">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text">Popup Hizmeti</span>
                    </a>
                </li>
                <?php } ?>
                <?php if(isAllowedViewModule("dashboard")) { ?>
                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text">Ana Sayfa</span>
                    </a>
                </li>

                <?php } ?>
                <?php */?>
            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>