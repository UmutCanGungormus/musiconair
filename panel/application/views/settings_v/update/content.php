<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">
                <b><?= $item->company_name ?></b> kaydını düzenliyorsunuz
            </h4>
        </div>
        <div class="col-12">
            <form action="<?= base_url("settings/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 nav-tabs-horizontal">
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="site-informations-tab" data-toggle="tab" href="#site-informations" role="tab" aria-controls="site-informations" aria-selected="true">Site Bilgileri</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="address-informations-tab" data-toggle="tab" href="#address-informations" role="tab" aria-controls="address-informations" aria-selected="false">Adres Bilgisi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="about-us-tab" data-toggle="tab" href="#about-us" role="tab" aria-controls="about-us" aria-selected="false">Hakkımızda</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="false">Misyon</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">Vizyon</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="social-media-tab" data-toggle="tab" href="#social-media" role="tab" aria-controls="social-media" aria-selected="false">Sosyal Medya</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Logo</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="meta-tag-tab" data-toggle="tab" href="#meta-tag" role="tab" aria-controls="meta-tag" aria-selected="false">Meta Tag</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="site-analysis-tab" data-toggle="tab" href="#site-analysis" role="tab" aria-controls="site-analysis" aria-selected="false">Site Analysis</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="live-support-tab" data-toggle="tab" href="#live-support" role="tab" aria-controls="live-support" aria-selected="false">Live Support</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/site_info"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/address"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/about_us"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/mission"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/vision"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/social_media"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/logo"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/site_meta"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/site_analysis"); ?>
                        <?php $this->load->view("$viewFolder/$subViewFolder/tabs/live_support"); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary rounded-0">Güncelle</button>
                <a href="<?= base_url("settings"); ?>" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
            </form>
        </div>
    </div>
</div>