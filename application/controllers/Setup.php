<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterMenu');
        $this->load->model('MasterMixerModel');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->load->view('css');
        $this->load->view('js');
        $data = array(
            'menu' => $this->MasterMenu->get_menu(),
            'mixer' => $this->MasterMixerModel->get_mixer(),
            'error' => ''
        );
        $this->load->view('Setup\setup_page.php', $data);
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
    public function delete()
    {
        $data = $this->MasterMenu->delete_master_menu();
        if ($data === true) {
            $this->session->set_tempdata('status_delete', 'success', 3);
            header("Refresh:0; url=../setup");
        } else {
            $this->session->set_tempdata('status_delete', 'fail', 3);
            header("Refresh:0; url=../setup");
        }
    }
    public function update()
    {
        $data = $this->MasterMenu->update_master_menu();
        if ($data === true) {
            $this->session->set_tempdata('status_update', 'success', 3);
            header("Refresh:0; url=../setup");
        } else {
            $this->session->set_tempdata('status_update', 'fail', 3);
            header("Refresh:0; url=../setup");
        }
    }
}
