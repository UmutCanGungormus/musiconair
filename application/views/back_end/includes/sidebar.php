<!--sidebar-menu-->
<div id="sidebar">
    <a href="#" class="visible-phone" style="text-align: center;"><i class="icon icon-th-list"></i> MOBİL MENÜ</a>
    <ul>
        <p>AYARLAR</p>
        <li>
            <a href="<?php echo base_url("cms");?>">
                <i class="icon icon-home"></i>
                <span>Anasayfa</span>
            </a>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'ayarlar') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-cogs"></i>
                <span>Ayarlar</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'site-ayarlari') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ayarlar/site-ayarlari'); ?>">Site Ayarları</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'sosyal-medya-ayarlari') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ayarlar/sosyal-medya-ayarlari'); ?>">Sosyal Medya Ayarları</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'e-posta-ayarlari') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ayarlar/e-posta-ayarlari'); ?>">E-Posta Ayarları</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'harici-kod-ayarlari') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ayarlar/harici-kod-ayarlari'); ?>">Harici Kod Ayarları</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'site-haritasi-ayarlari') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ayarlar/site-haritasi-ayarlari'); ?>">Site Haritası Ayarları</a>
                </li>
           </ul>
        </li>

        <p>İÇERİK YÖNETİMİ</p>
<!--        <li class="submenu --><?php //if ($this -> uri -> segment(2) == 'menu-yonetimi') echo 'active' ?><!--">-->
<!--            <a href="#">-->
<!--                <i class="icon icon-link"></i>-->
<!--                <span>Menü Yönetimi</span>-->
<!--                <i class="icon-chevron-down" style="float:right;"></i>-->
<!--            </a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'eklenen-menuler') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/menu-yonetimi/eklenen-menuler'); ?><!--">Eklenen Menüler</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'menu-ekle') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/menu-yonetimi/menu-ekle'); ?><!--">Menü Ekle</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->

<!--        <li class="submenu --><?php //if ($this -> uri -> segment(2) == 'sayfa-yonetimi') echo 'active' ?><!--">-->
<!--            <a href="#">-->
<!--                <i class="icon icon-file"></i>-->
<!--                <span>Sayfa Yönetimi</span>-->
<!--                <i class="icon-chevron-down" style="float:right;"></i>-->
<!--            </a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'eklenen-sayfalar') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/sayfa-yonetimi/eklenen-sayfalar'); ?><!--">Eklenen Sayfalar</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'sayfa-ekle') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/sayfa-yonetimi/sayfa-ekle'); ?><!--">Sayfa Ekle</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'aktivite-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-asterisk"></i>
                <span>Aktivite Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'eklenen-aktiviteler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/aktivite-yonetimi/eklenen-aktiviteler'); ?>">Eklenen Aktiviteler</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'aktivite-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/aktivite-yonetimi/aktivite-ekle'); ?>">Aktivite Ekle</a>
                </li>
            </ul>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'uye-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-user"></i>
                <span>Üye Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'uyeler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/uye-yonetimi/uyeler'); ?>">Üyeler</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'uye-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/uye-yonetimi/uye-ekle'); ?>">Üye Ekle</a>
                </li>
            </ul>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'ilan-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-bell"></i>
                <span>İlan Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'ilanlar') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ilan-yonetimi/ilanlar'); ?>">İlanlar</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'ilan-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/ilan-yonetimi/ilan-ekle'); ?>">İlan Ekle</a>
                </li>
            </ul>
        </li>

<!--        <li class="submenu --><?php //if ($this -> uri -> segment(2) == 'hizmet-yonetimi') echo 'active' ?><!--">-->
<!--            <a href="#">-->
<!--                <i class="icon icon-asterisk"></i>-->
<!--                <span>Hizmet Yönetimi</span>-->
<!--                <i class="icon-chevron-down" style="float:right;"></i>-->
<!--            </a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'eklenen-hizmetler') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/hizmet-yonetimi/eklenen-hizmetler'); ?><!--">Eklenen Hizmetler</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                   <a --><?php //if ($this -> uri -> segment(3) == 'hizmet-ekle') echo 'class="active"' ?><!-- href="--><?php //echo base_url('yonetici/hizmet-yonetimi/hizmet-ekle'); ?><!--">Hizmet Ekle</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'hizmet-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-star"></i>
                <span>Ünlü Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'eklenen-unluler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/unlu-yonetimi/eklenen-unluler'); ?>">Eklenen Ünlüler</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'unlu-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/unlu-yonetimi/unlu-ekle'); ?>">Ünlü Ekle</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'eklenen-albumler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/unlu-yonetimi/eklenen-albumler'); ?>">Eklenen Albümler</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'album-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/unlu-yonetimi/album-ekle'); ?>">Albüm Ekle</a>
                </li>
            </ul>
        </li>
        <li class="submenu <?php if ($this -> uri -> segment(2) == 'hizmet-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-archive"></i>
                <span>Video Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'eklenen-videolar') echo 'class="active"' ?> href="<?php echo base_url('yonetici/video-yonetimi/eklenen-videolar'); ?>">Eklenen Videolar</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'videolar-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/video-yonetimi/video-ekle'); ?>">Video Ekle</a>
                </li>

            </ul>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'yorum-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-comment"></i>
                <span>Yorum Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'yorumlar') echo 'class="active"' ?> href="<?php echo base_url('yonetici/yorum-yonetimi/yorumlar'); ?>">Eklenen Yorumlar</a>
                </li>
            </ul>
        </li>
        
        <li class="submenu <?php if ($this -> uri -> segment(2) == 'haber-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-screenshot"></i>
                <span>Haber Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'eklenen-haberler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/haber-yonetimi/eklenen-haberler'); ?>">Eklenen haberler</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'haber-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/haber-yonetimi/haber-ekle'); ?>">Haber Ekle</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'haber-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/haber-yonetimi/kategoriler'); ?>">Eklenen Haber Kategorileri</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'haber-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/haber-yonetimi/kategori-ekle'); ?>">Haber Kategorisi Ekle</a>
                </li>
            </ul>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'yazar-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-wrench"></i>
                <span>Yazar Yönetimi</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'eklenen-yazarlar') echo 'class="active"' ?> href="<?php echo base_url('yonetici/yazar-yonetimi/yazarlar'); ?>">Eklenen Yazarlar</a>
                </li>
                <li>
                   <a <?php if ($this -> uri -> segment(3) == 'yazar-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/yazar-yonetimi/yazar-ekle'); ?>">Yazar Ekle</a>
                </li>
            </ul>
        </li>


        <p>MODÜL YÖNETİMİ</p>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'slayt-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-bookmark"></i>
                <span>Slayt Modülü</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
            <ul>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'eklenen-fotograflar') echo 'class="active"' ?> href="<?php echo base_url('yonetici/slayt-yonetimi/eklenen-fotograflar'); ?>">Eklenen Fotoğraflar</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'fotograf-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/slayt-yonetimi/fotograf-ekle'); ?>">Fotoğraf Ekle</a>
                </li>
            </ul>
        </li>

        <li class="submenu <?php if ($this -> uri -> segment(2) == 'galeri-yonetimi') echo 'active' ?>">
            <a href="#">
                <i class="icon icon-picture"></i>
                <span>Galeri Modülü</span>
                <i class="icon-chevron-down" style="float:right;"></i>
            </a>
           <ul>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'eklenen-galeriler') echo 'class="active"' ?> href="<?php echo base_url('yonetici/galeri-yonetimi/eklenen-galeriler'); ?>">Eklenen Galeriler</a>
                </li>
                <li>
                    <a <?php if ($this -> uri -> segment(3) == 'galeri-ekle') echo 'class="active"' ?> href="<?php echo base_url('yonetici/galeri-yonetimi/galeri-ekle'); ?>">Galeri Ekle</a>
                </li>
           </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->