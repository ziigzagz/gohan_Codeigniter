<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {

            $this->load->view('css');
            $this->load->view('js');
            $data = array(
                'result' => $this->User->get_user(),
                'error' => ''
            );
            $this->load->view('Setup\manage_user.php', $data);
        }
    }
    public function insert()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            if ($this->User->insert() === true) {
                $this->session->set_tempdata('status_insert', 'success', 1);
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 1);
            }

            header("Refresh:0; url=" . base_url() . "ManageUser");
        }
    }
    public function delete()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->User->delete();
            header("Refresh:0; url=" . base_url() . "ManageUser");
        }
    }
}
