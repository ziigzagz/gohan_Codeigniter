<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuSet extends CI_Controller
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
        $this->load->view('MenuSet\MenuSet_page.php');
    }
    public function insert()
    {
        $data = $this->MasterMenu->insert_master_menu();
        if ($data === true) {
            $this->session->set_tempdata('status_insert', 'success', 3);
            header("Refresh:0; url=../MasterMixer");
        } else if ($data == "23000/2627") {
            $this->session->set_tempdata('status_insert', 'fail', 3);
            header("Refresh:0; url=../MasterMixer");
        }
    }
}
