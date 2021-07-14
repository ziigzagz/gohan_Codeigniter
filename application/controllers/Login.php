<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->load->view('css');
        $this->load->view('js');
        $this->load->view('Login/Login_page.php');
    }
    public function checklogin()
    {
        $data = $this->User->checklogin();
        if ($data === true) {
            $this->session->set_tempdata('status_login', 'success', 3);
            header("Refresh:0; url=../setup");
        } else {
            $this->session->set_tempdata('status_login', 'fail', 3);
            header("Refresh:0; url=../setup");
        }
    }
}
