<?php
class Home extends CI_Controller
{
    public $viewFolder="";
    public function __construct()
    {
        
        parent::__construct();
        $this->viewFolder="homepage";
        $this->load->model("product_category_model");
        $this->load->helper("menu");
        $this->load->model("product_model");
        $this->load->model("brand_model");
        $this->load->library('session');    
        $ip_adresi = GetIP();
         
        if(!$this->session->userdata("users")){
            $this->session->set_userdata("users",$ip_adresi);

        }

        
       
 
    }
    public function index()
	{
        $this->load->model("news_model");
        $viewData=new stdClass();
        $viewData->news=$this->news_model->get_all(
            [
                'isActive' => 1,

            ]
        );
     
        $c=$this->product_model->get_count();
        $c=$c-8;
        $c=($c<0)? 0 : $c;
        $rand=rand(0,$c);
     
     
        $viewData->product=$this->product_model->get_records(8,$rand);
        $this->load->model("slide_model");
        $viewData->slider=$this->slide_model->get_all([
            "isActive"=>1
        ],"rank ASC");
    
		$this->load->view('home_v/index',$viewData);
    }
    public function about_us()
	{
		$this->load->view('about_v/index');
    }
    public function service()
	{
        $viewData=new stdClass();
        $seo_url=$this->uri->segment(2);
        $this->load->model("service_model");
        $viewData->service=$this->service_model->get(['url'=>$seo_url]);
        if(empty($viewData->service)){
            $this->load->view('404_v/index');  
        }else{
            $this->load->view("service_v/index",$viewData);
        }
    }
    public function test()
	{
        $viewData=new stdClass();
        $this->load->model("test_model");
        $viewData->test=$this->test_model->get_all();
        if(empty($viewData->test)){
            $this->load->view('404_v/index');  
        }else{
            $this->load->view("test_v/index",$viewData);
        }
    }
    
    public function test_detail()
	{
        $viewData=new stdClass();
        $seo_url=$this->uri->segment(2);
        $this->load->model("test_model");
        $this->load->model("options_model");
        $viewData->test=$this->test_model->get(['seo_url'=>$seo_url]);
        $viewData->options=$this->options_model->get_all(['test_id'=>$viewData->test->id,'isActive'=>1]);
        if(empty($viewData->test)){
            $this->load->view('404_v/index');  
        }else{
            $this->load->view("test_detail_v/index",$viewData);
        }
    }
    public function news()
	{
        $viewData=new stdClass();
        $seo_url=$this->uri->segment(2);
        $this->load->model("news_model");
 
        $viewData->news=$this->news_model->get(['seo_url'=>$seo_url]);
        $viewData->benzer=$this->news_model->get_records(3,0,['category_id'=>$viewData->news->category_id]);
        $viewData->most_read=$this->news_model->get_records(3,0,array(),"hit desc");
        
        $hit_update=$this->news_model->update(['seo_url'=>$seo_url],['hit'=>$viewData->news->hit+1]);
        if(empty($viewData->news)){
            $this->load->view('404_v/index');  
        }else{
            $this->load->view("news_v/index",$viewData);
        }
    }
    public function references()
	{   
        $viewData=new stdClass();
        $viewData->references=$this->brand_model->get_all(["isActive"=>1]);
        $this->load->view('referances_v/index',$viewData);
    }
    public function hata()
	{
		$this->load->view('404_v/index');
    }
    public function contact()
	{
		$this->load->view('contact_v/index');
    }
    public function urlEmotion(){
        $id=$this->input->post('id');
        $emoji=$this->input->post('ad');
        $user_id=$this->session->userdata("users");
      
        $this->load->model("news_model");
        $this->load->model("news_emoji_model");
        $item=$this->news_model->get(['id'=>$id]);
        $reaction=json_decode($item->reaction);
        $reaction->$emoji=$reaction->$emoji+1;
        $res=$reaction->$emoji;
        $user=$this->news_emoji_model->get_all(["user_id"=>$user_id,"news_id"=>$id]);
        $user= (array) $user;
        if(count($user)<=1){
            $this->news_emoji_model->add([
                'user_id'=>$user_id,
                'news_id'=> $id,
                'type'=>$emoji
            ]);
            $reaction=json_encode($reaction);
            
            $reaction_update=$this->news_model->update(['id'=>$id],['reaction'=>$reaction]);
            
            echo $res;
        }else{
         echo "alert";
        }
       

      
      
    }

    public function test_check(){
        $id=$this->input->post('id');
        $test_id=$this->input->post('test_id');
        $user_id=$this->session->userdata("users");
      
        $this->load->model("test_answer_model");
        $this->load->model("options_model");
        $item=$this->options_model->get(['id'=>$id]);
        $hit=$item->hit+1;
        
       
        $user=$this->test_answer_model->get_all(["user_id"=>$user_id,"test_id"=>$test_id]);
        $user= (array) $user;
        if(count($user)==0){
            $this->options_model->update(['id'=>$id],[
                
            
                'hit'=>$hit
            ]);
            $this->test_answer_model->add([
                   'user_id'=>$user_id,
                   'test_id'=>$test_id,
                   'option_id'=>$id 
            ]);
          
           
            
            echo "create";
        }else{
            $users=$this->test_answer_model->get(["user_id"=>$user_id,"test_id"=>$test_id]);
            $user=$this->test_answer_model->get_all(["user_id"=>$user_id,"option_id"=>$id]);
            $user= (array) $user;
            if(count($user)==0){
                $answer=$this->test_answer_model->get(["user_id"=>$user_id,"test_id"=>$test_id]);
                $test=$this->options_model->get(['id'=>$answer->option_id]);
                $this->options_model->update(['id'=>$answer->option_id],[
                
                    
                    'hit'=>$test->hit-1
                ]);
                $this->options_model->update(['id'=>$id],[
                
                    
                    'hit'=>$hit
                ]);
                $this->test_answer_model->update(['id'=>$users->id],[
                
                    
                    'option_id'=>$id
                ]);
                echo "update";
            }else{
                echo "ok";
            }
           

        }
      
       

      
      
    }
    public function category()

    {
        $this->load->library("pagination");
        $viewData=new stdClass();
        $seo_url=$this->uri->segment(2);
        $category_id=$this->product_category_model->get(["seo_url"=>$seo_url]);
        $config["base_url"]=base_url("kategori")."/".$seo_url;
        $config["total_rows"]=$this->product_model->get_count(["category_id" => $category_id->id]);
        $config["uri_segment"]=3;
        $config["per_page"]=8;
        $this->pagination->initialize($config);
        $viewData->category=$category_id;
        $page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           
        if($category_id){
            $viewData->products=$this->product_model->get_records($config["per_page"],$page,["category_id"=>$category_id->id]);
            
        }
        else{
           return $this->load->view("404_v/index");
        }
        
        $viewData->links=$this->pagination->create_links();
       
     
        //kATEGORİLER
     
        return $this->load->view("category_v/index",$viewData);
      
    }
    public function teklif()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name","Ad","trim|required");
        $this->form_validation->set_rules("email","E-posta","trim|required|valid_email");
        $this->form_validation->set_rules("subject","Konu","trim|required");
        $this->form_validation->set_rules("message","Mesaj","trim|required");
        $this->form_validation->set_rules("phone","Telefon","trim|required|min_length[11]|max_length[11]");
        if($this->form_validation->run()===FALSE)
            {
                  redirect(base_url("iletisim"));
            }else
            {
                $name=$this->input->post("name");
                $email=$this->input->post("email");
                $subject=$this->input->post("subject");
                $message=$this->input->post("message");
                $phone=$this->input->post("phone");
                $email_message="{$name} İsimli Ziyaretçi. Bir Adet Mesaj Bıraktı</br> <b>Mesaj : </b> {$message}</br> <b>Telefon : </b> {$phone}</br> <b>E-Posta : </b> {$email}";
                if(send_email("","Site Teklif Formu Mesajı",$email_message)){
                    echo "İşlem Başarılı";
                }else{
                    echo "İşlem Başarısız";
                }
            }
    }
}