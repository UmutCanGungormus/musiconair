<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    /**
     * Variables
     */
    public $viewFolder = "";
    public $viewData = "";
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "home_v";
        $this->viewData = new stdClass();
        $ip_adress = getUserIP();

        if (!$this->session->userdata("user_ip")) :
            $this->session->set_userdata("user_ip", $ip_adress);
        endif;
        $this->viewData->stories = $this->general_model->get_all("stories", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->story_items = $this->general_model->get_all("story_items", null, "rank ASC", ["isActive" => 1]);
        $this->viewData->settings = get_settings();
    }
    /**
     * Render
     */
    public function render()
    {
        $this->load->view("includes/head", (array)$this->viewData);
        $this->load->view("includes/header");
        $this->load->view("includes/sidebar");
        $this->load->view($this->viewFolder);
        $this->load->view("includes/footer");
    }
    /**
     * Error 
     */
    public function error()
    {
        $this->viewFolder = "404_v/index";
        $this->render();
    }
    /**
     * Index
     */
    public function index()
    {
        if (!get_active_user()) :
            $this->viewFolder = "404_v/index";
            $this->render();
        else:
            $this->viewData->userData = $this->general_model->get("users", null, ["isActive" => 1, "id" => get_active_user()->id]);
            $this->viewData->userRole = $this->general_model->get("user_role", null, ["id" => $this->viewData->userData->role_id, "isActive" => 1])->title;
            $this->viewData->news = $this->general_model->get_all("news", null, "rank ASC", ['isActive' => 1,"writer_id" => get_active_user()->id]);
            $this->viewFolder = "profile_v/index";
            $this->render();
        endif;
    }
}
