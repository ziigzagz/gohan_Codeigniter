<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuSet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('News_Model');
        date_default_timezone_set("Asia/Bangkok");
    }
   
    public function index()
    {
        $this->load->view('css');
        $this->load->view('js');
        $this->load->view('MenuSet\MenuSet_page.php');
    }
    public function get_menu_setup()
    {
        
        # code...
    }
}
