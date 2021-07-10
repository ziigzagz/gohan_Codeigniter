<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('News_Model');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        session_destroy();
        header("Refresh:0; url=./login");
    }
  
}
