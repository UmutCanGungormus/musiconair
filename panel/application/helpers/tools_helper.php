<?php
function convertToSEO($text){
    $turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"","/", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-","-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
    return strtolower(str_replace($turkce, $convert, $text));
}
function getFileName($id){
	$ci =& get_instance();
	$ci->load->model("product_image_model");
	$fileName = $ci->product_image_model->get(
        array(
            "id" => $id
        )
    );
    return $fileName->img_url;
}

function get_readable_date($date){
    return strftime('%e %B %Y', strtotime($date));
}
function get_active_user(){
    $t = &get_instance();
    $user = $t->session->userdata("user");
    if ($user) {
        return $user;
    }else{
        return false;
    }
}
function get_activity_category_title($id){
    $ci =& get_instance();
    $ci->load->model("activity_category_model");
    $item=$ci->activity_category_model->get(['id'=>$id]);
    return $item->title;
}

function get_test_title($id){
    $ci =& get_instance();
    $ci->load->model("test_model");
    $item=$ci->test_model->get(['id'=>$id]);
    return $item->title;
}
function get_news_category_title($id){
    $ci =& get_instance();
    $ci->load->model("news_category_model");
    $item=$ci->news_category_model->get(['id'=>$id]);
    return $item->title;
}
function get_news_title($id){
    $ci =& get_instance();
    $ci->load->model("news_model");
    $item=$ci->news_model->get(['id'=>$id]);
    return $item->title;
}


function get_voting_title($id){
    $ci =& get_instance();
    $ci->load->model("votings_model");
    $item=$ci->votings_model->get(['id'=>$id]);
    return $item->title;
}

function get_book_category_title($id){
    $ci =& get_instance();
    $ci->load->model("book_category_model");
    $item=$ci->book_category_model->get(['id'=>$id]);
    return $item->title;
}
function get_cinema_category_title($id){
    $ci =& get_instance();
    $ci->load->model("cinema_category_model");
    $item=$ci->cinema_category_model->get(['id'=>$id]);
    return $item->title;
}
function isAdmin(){
    $t =& get_instance();
    $user=$t->session->userdata("user");
   
    return true;
}
function getControllerList(){

    $t = &get_instance();

    $controllers = array();
    $t->load->helper("file");

    $files = get_dir_file_info(APPPATH. "controllers", FALSE);

    foreach (array_keys($files) as $file){
        if($file !== "index.html"){
            $controllers[] = strtolower(str_replace(".php", '', $file));
        }
    }

    return $controllers;

}
function get_controller_name($seo){
    $t = &get_instance();
    $tr=[
        'activity'=>"Etkinlik",
        'activity_category'=>"Etkinlik Kategori",
        'advertisement'=>"İlanlar",
        'book'=>"Kitaplar",
        'book_category'=>"Kitap Kategori",
        'brands'=>"Markalar",
        'cinema'=>"Sinema Filmleri",
        'cinema_category'=>"Film Kategorileri",
        'dashboard'=>"Admin Panel",
        'emailsettings'=>"Mail Ayarları",
        'galleries'=>"Galeriler",
        'home_banner'=>"Anasayfa Banner",
        'news'=>"Haberler",
        'news_box'=>"Haber İçinde widget Haber",
        'news_categories'=>"Haber Kategori",
        'options'=>"Test Şıkları",
        'questions'=>"Test Soruları",
        'settings'=>"Site Ayarları",
        'slides'=>"Slider",
        'social_media_talk'=>"Haber Sosyal Medya Widget",
        'test'=>"Test Soruları",
        'users'=>" Kullanıcılar",
        'user_role'=>"Kullanıcı Yetkileri",
        'video'=>"Videolar",
        'votings'=>"Oylama Soruları",
        'voting_options'=>"Oylama Şıkları",
        'writers'=>"Yazarlar/Editörler"
    ];
    foreach($tr as $key=>$v ){
        if($key==$seo){
            return $v;
        }
    }
}
function isAllowedViewModule($modulName=""){
    $t = &get_instance();
    $modulName= (empty($modulName)) ? $t->router->fetch_class() : $modulName;
    $user=get_active_user();
    $user_roles=$t->session->userdata('user_roles');
  
        if(isset($user_roles[$user->role_id])){
           $permission=json_decode($user_roles[$user->role_id]);
           if(isset($permission->$modulName) && isset($permission->$modulName->read) ){
                return true;
           }
        }
    
        return false;

}
function isAllowedWriteViewModule($modulName=""){
    $t = &get_instance();
    $modulName= (empty($modulName)) ? $t->router->fetch_class() : $modulName;
    $user=get_active_user();
    $user_roles=$t->session->userdata('user_roles');
  
        if(isset($user_roles[$user->role_id])){
           $permission=json_decode($user_roles[$user->role_id]);
           if(isset($permission->$modulName) && isset($permission->$modulName->write) ){
                return true;
           }
        }
    
        return false;

}
function isAllowedUpdateViewModule($modulName=""){
    $t = &get_instance();
    $modulName= (empty($modulName)) ? $t->router->fetch_class() : $modulName;
    $user=get_active_user();
    $user_roles=$t->session->userdata('user_roles');
  
        if(isset($user_roles[$user->role_id])){
           $permission=json_decode($user_roles[$user->role_id]);
           if(isset($permission->$modulName) && isset($permission->$modulName->update) ){
                return true;
           }
        }
    
        return false;

}
function isAllowedDeleteViewModule($modulName=""){
    $t = &get_instance();
    $modulName= (empty($modulName)) ? $t->router->fetch_class() : $modulName;
    $user=get_active_user();
    $user_roles=$t->session->userdata('user_roles');
  
        if(isset($user_roles[$user->role_id])){
           $permission=json_decode($user_roles[$user->role_id]);
           if(isset($permission->$modulName) && isset($permission->$modulName->delete) ){
                return true;
           }
        }
    
        return false;

}

function userRole(){
 $t= &get_instance();
 $t->load->model("user_role_model");
 $c=$t->user_role_model->get_all(['isActive'=>1]);
 $roles=[];
 foreach($c as $v){
     $roles[$v->id]=$v->permissions;
 }
 $t->session->set_userdata('user_roles',$roles);

}
function send_email($toEmail = "",$subject = "",$message = ""){
    $t = &get_instance();
    $t->load->model("emailsettings_model");
    $emailsettings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
            )
        );
    $config = array(
        "protocol" => $emailsettings->protocol,
        "smtp_host" => $emailsettings->host,
        "smtp_port" => $emailsettings->port,
        "smtp_user" => $emailsettings->user,
        "smtp_pass" => $emailsettings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );
    $t->load->library("email",$config);
    $t->email->from($emailsettings->from,$emailsettings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}
function get_settings(){
    $t = &get_instance();
    $t->load->model("settings_model");
    if ($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    }else{
        $settings = $t->settings_model->get();
        if (!$settings) {
            $settings = new stdClass();
            $settings->company_name = "CMS";
            $settings->logo = "default";
        }
        $t->session->set_userdata("settings",$settings);
    }
    return $settings;
}
function get_category_title($category_id = 0){
    $t = &get_instance();
    $t->load->model("portfolio_category_model");
    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category) {
        return $category->title;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
function get_product_category_title($category_id = 0){
    $t = &get_instance();
    $t->load->model("product_category_model");
    $category = $t->product_category_model->get(
        array(
            "id" => $category_id
        )
    );
    if ($category) {
        return $category->title;
    }else{
        return "<b style='color:red'>Tanımlı Değil</b>";
    }
}
//$_FILES["img_url"]["tmp_name"]
//100,200
//uploads/$t->viewFolder/deneme.png
function upload_picture($file,$uploadPath,$width,$height,$name){
    $t = &get_instance();
    $t->load->library("simpleimagelib");
    if (!is_dir("{$uploadPath}/{$width}x{$height}")) {
        mkdir("{$uploadPath}/{$width}x{$height}");
    }
    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();
        $simpleImage
            ->fromFile($file)
            //->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 75);
    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }
    if ($upload_error) {
        echo $error;
    }else{
        return true;
    }
}
function get_picture($path = "",$picture = "",$resolution = "50x50"){
    if ($picture != "") {
        if (file_exists(FCPATH . "uploads/$path/$resolution/$picture")) {
            $picture = base_url("uploads/$path/$resolution/$picture");
        }else{
            $picture = base_url("assets/assets/images/default_image.png");
        }
    }else{
        $picture = base_url("assets/assets/images/default_image.png");
    }
    return $picture;
}
function get_page_list($page){
    $page_list = array(
        "home_v"                => "Anasayfa",
        "about_v"               => "Hakkımızda Sayfası",
        "news_list_v"           => "Haberler Sayfası",
        "galleries"             => "Galeri Sayfası",
        "portfolio_list_v"      => "Portfolyo Sayfası",
        "reference_list_v"      => "Referanslar Sayfası",
        "service_list_v"        => "Hizmetler Sayfası",
        "course_list_v"         => "Eğitimler Sayfası",
        "brand_list_v"          => "Markalar Sayfası",
        "contact_v"             => "İletişim Sayfası",
    );
    return (empty($page)) ? $page_list : $page_list[$page];
}