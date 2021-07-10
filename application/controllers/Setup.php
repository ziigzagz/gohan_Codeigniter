<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterMenu');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->load->view('css');
        $this->load->view('js');
        $this->load->view('Setup\setup_page.php');
    }
    public function insert()
    {
        $data = $this->MasterMenu->insert_master_menu();
        if ($data === true) {
            $this->session->set_tempdata('status_insert', 'success', 3);
            header("Refresh:0; url=../setup");
        } else {
            $this->session->set_tempdata('status_insert', 'fail', 3);
            header("Refresh:0; url=../setup");
        }
    }
}
