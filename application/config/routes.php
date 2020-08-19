<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
//$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;


$route["haberler"] = "home/news";
$route["haberler/(:num)"] = "home/news/$1";
$route["haberler/(:any)"] = "home/news/$1";
$route["haberler/(:any)/(:num)"] = "home/news/$1/$2";
$route["etkinlikler"] = "home/activities";
$route["etkinlikler/(:num)"] = "home/activities/$1";
$route["etkinlikler/(:any)"] = "home/activities/$1";
$route["etkinlikler/(:any)/(:num)"] = "home/activities/$1/$2";
$route["galeriler"] = "home/galleries";
$route["galeriler/(:num)"] = "home/galleries/$1";
$route["galeriler/(:any)"] = "home/galleries/$1";
$route["galeriler/(:any)/(:num)"] = "home/galleries/$1/$2";
$route["is-ilanlari"] = "home/job_advertisements";
$route["is-ilanlari/(:num)"] = "home/job_advertisements/$1";
$route["is-ilanlari/(:any)"] = "home/job_advertisements/$1";
$route["is-ilanlari/(:any)/(:num)"] = "home/job_advertisements/$1/$2";
$route["emlak-ilanlari"] = "home/estate_advertisements";
$route["emlak-ilanlari/(:num)"] = "home/estate_advertisements/$1";
$route["emlak-ilanlari/(:any)"] = "home/estate_advertisements/$1";
$route["emlak-ilanlari/(:any)/(:num)"] = "home/estate_advertisements/$1/$2";
$route["onair"] = "home/onair";
$route["onair/(:num)"] = "home/onair/$1";
$route['test']='home/test';
$route['test-cevapla']='home/test_check';
$route['test/(.*)']='home/test_detail';
$route["giris-yap"] = "userop/login";
$route["kayit-ol"] = "userop/register";
$route["sifremi-unuttum"] = "userop/reset_password";
$route["sifremi-unuttum/(:any)"] = "userop/reset_password_v/$1";
$route["sifremi-unuttum/(:any)/(:any)"] = "userop/reset_password_v/$1/$2";
$route["sifremi-sifirla"] = "userop/reset_password_end";
$route["cikis"] = "userop/logout";


$route['urunler']='home/product_list';
$route['kategori/(.*)']='home/category';
$route['teklif-form']='home/teklif';
$route['iletisim-form']='home/teklif';
$route['iletisim']='home/contact';
$route['hakkimizda']='home/about_us';
$route['referanslar']='home/references';

$route['urlEmotion']='home/urlEmotion';
$route['hizmetler/(.*)']='home/service';

$route["haber/(:any)"] = "home/news_detail/$1";
$route["etkinlik/(:any)"] = "home/activity_detail/$1";
$route["is-ilani/(:any)"] = "home/job_advertisement_detail/$1";
$route["emlak-ilani/(:any)"] = "home/estate_advertisement_detail/$1";
$route["galeri/(:any)"] = "home/gallery_detail/$1";