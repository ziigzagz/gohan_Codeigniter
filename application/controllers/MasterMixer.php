<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data = array('result' => $this->MasterMixerModel->get_mixer());
        $this->load->view('Setup\Master_mixer.php', $data);
    }
    public function AddMixer()
    {
        $data = $this->MasterMixerModel->insert_mixer();
        echo "*-*-*".gettype($data);
        die();
        if ($data) {
            header("Refresh:0; url=../MasterMixer");
        } else {
            echo "else";
           
        }
    }
}
