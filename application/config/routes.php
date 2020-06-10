<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// BACK-END


$route['default_controller'] = 'home/index';
$route['404_override'] = 'home/hata';
$route['translate_uri_dashes'] = FALSE;
$route['urunler']='home/product_list';
$route['kategori/(.*)']='home/category';
$route['teklif-form']='home/teklif';
$route['iletisim-form']='home/teklif';
$route['iletisim']='home/contact';
$route['hakkimizda']='home/about_us';
$route['referanslar']='home/references';
$route['haber/(.*)']='home/news';
$route['test']='home/test';
$route['TestCheck']='home/test_check';
$route['test/(.*)']='home/test_detail';

$route['urlEmotion']='home/urlEmotion';
$route['hizmetler/(.*)']='home/service';

