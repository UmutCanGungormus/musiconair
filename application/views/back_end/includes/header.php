<!DOCTYPE html>
<html lang="tr">
    <head>
        <title><?php echo $page['title']; ?></title>
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/bootstrap-responsive.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/uniform.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/matrix-style.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/matrix-media.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/jquery-ui.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/jquery.nok.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/css/app.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/back_end/font-awesome/css/font-awesome.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800">
        <link rel="shortcut icon" href="<?php echo base_url('public/front_end/img/favicon.png'); ?>">
    </head>
    <body>

    <!--Header-part-->
    <div id="header">
        <h1></h1>
    </div>
    <!--close-Header-part--> 

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li>
                <a target="_blank" href="<?php echo base_url(); ?>">
                    <i class="icon icon-globe"></i>
                    <span class="text"><b>Siteye Git</b></span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('yonetici/mesaj-yonetimi'); ?>">
                    <i class="icon icon-envelope" ></i>
                    <?php
                        if ($this -> session -> userdata('unreadMessages') > 0):
                            echo '<span class="text">Mesajlar <span class="label label-important">'.$this -> session -> userdata('unreadMessages').'</span></span>';
                        else:
                            echo '<span class="text">Mesajlar</span>';
                        endif;
                    ?>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('yonetici/e-posta-gonder'); ?>">
                    <i class="icon icon-envelope-alt"></i>
                    <span class="text">E-Posta Gönder</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('yonetici/dosya-yoneticisi'); ?>">
                    <i class="icon icon-folder-open"></i>
                    <span class="text">Dosya Yöneticisi</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('yonetici/yonetici-ayarlari'); ?>">
                    <i class="icon icon-user"></i>
                    <span class="text">Yönetici Ayarları (<?php echo $this -> session -> userdata('admin_name').' '.$this -> session -> userdata('admin_surname') ?>)</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('cms/oturumu-kapat'); ?>">
                    <i class="icon icon-off"></i>
                    <span class="text">Oturumu Kapat</span>
                </a>
            </li>
        </ul>
    </div>
    <!--close-top-Header-menu-->