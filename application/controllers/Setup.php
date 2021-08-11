<?php
defined('BASEPATH') or exit('No direct script access allowed');
// === TYPE ===
// maincourse => A
// sidedish => B
// noodle => C
// dessert => D
class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('MasterMenu');
        $this->load->model('MasterMixerModel');
        date_default_timezone_set("Asia/Bangkok");
    }
    public function type($var = null)
    {
       
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=".base_url()."login");
        } else {
 $this->load->view('css');
        $this->load->view('js');
        if ($var == 'maincourse') {
            $data = array(
                'menu' => $this->MasterMenu->get_menu_with_type('A'),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => $var
            );
        } else  if ($var == 'sidedish') {
            $data = array(
                'menu' => $this->MasterMenu->get_menu_with_type('B'),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => $var
            );
        } else  if ($var == 'noodle') {
            $data = array(
                'menu' => $this->MasterMenu->get_menu_with_type('C'),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => $var
            );
        } else  if ($var == 'dessert') {
            $data = array(
                'menu' => $this->MasterMenu->get_menu_with_type('D'),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => $var
            );
        } else if ($var == 'all') {
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => $var
            );
        } else {
            $data = array(
                'menu' => array(),
                'mixer' => array(),
                'error' => $var
            );
        }
            $this->load->view('Setup\setup_page.php', $data);
        }
    }

    public function index(String $var = null)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=".base_url()."login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'mixer' => $this->MasterMixerModel->get_mixer(),
                'error' => ''
            );
            echo "<script>localStorage.clear();</script>";
            $this->load->view('Setup\setup_page.php', $data);
        }
    }


    public function select()
    {
        $type = $this->input->post('menu_type');
        print_r($type);
        $data = array(
            'all' => $this->MasterMenu->get_menu(),
            'maincourse' => $this->MasterMenu->get_menu_maincourse(),
            'error' => ''
        );
    }

    public function insert()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=".base_url()."login");
        } else {
            $data = $this->MasterMenu->insert_master_menu();
            if ($data === true) {
                $this->session->set_tempdata('status_insert', 'success', 1);
                header("Refresh:0; url=".base_url()."setup");
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 1);
                header("Refresh:0; url=".base_url()."setup");
            }
        }
    }

    public function delete()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=".base_url()."login");
        } else {
            $data = $this->MasterMenu->delete_master_menu();
            if ($data === true) {
                $this->session->set_tempdata('status_delete', 'success', 1);
                header("Refresh:0; url=".base_url()."setup");
            } else {
                $this->session->set_tempdata('status_delete', 'fail', 1);
                header("Refresh:0; url=".base_url()."setup");
            }
        }
    }

    public function update()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=".base_url()."login");
        } else {
            $data = $this->MasterMenu->update_master_menu();
            if ($data === true) {
                $this->session->set_tempdata('status_update', 'success', 1);
                // die();
                header("Refresh:0; url=".base_url()."setup");
            } else {
                $this->session->set_tempdata('status_update', 'fail', 1);
                header("Refresh:0; url=".base_url()."setup");
            }
        }
    }
}
