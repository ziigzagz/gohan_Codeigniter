<?php
defined('BASEPATH') or exit('No direct script access allowed');
// === ERROR CODE NUMBER ===
// 23000/2627 => Primary Key ซ้ำ
class MasterMixer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterMixerModel');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->load->view('css');
        $this->load->view('js');
        $data = array(
            'result' => $this->MasterMixerModel->get_mixer(),
            'error' => ''
        );
        $this->load->view('Setup\Master_mixer.php', $data);
    }
    public function AddMixer()
    {
        $data = $this->MasterMixerModel->insert_mixer();
        if ($data === true) {
            $this->session->set_tempdata('status_insert', 'success', 3);
            header("Refresh:0; url=../MasterMixer");
        } else if ($data == "23000/2627") {
            $this->session->set_tempdata('status_insert', 'fail', 3);
            header("Refresh:0; url=../MasterMixer");
        }
    }
    public function update_mixer()
    {
        $data = $this->MasterMixerModel->update_mixer();
        if ($data === true) {
            $this->session->set_tempdata('status_update', 'success', 3);
            header("Refresh:0; url=../MasterMixer");
        } else {
            $this->session->set_tempdata('status_update', 'fail', 3);
            header("Refresh:0; url=../MasterMixer");
        }
    }
    public function delete_mixer()
    {
        $data = $this->MasterMixerModel->delete_mixer();
        if ($data === true) {
            $this->session->set_tempdata('status_delete', 'success', 3);
            header("Refresh:0; url=../MasterMixer");
        } else {
            $this->session->set_tempdata('status_delete', 'fail', 3);
            header("Refresh:0; url=../MasterMixer");
        }
    }
}
