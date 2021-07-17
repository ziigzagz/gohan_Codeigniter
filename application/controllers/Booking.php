<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterMenu');
        $this->load->model('BookingModel');
        $this->load->model('MasterMixerModel');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $this->load->view('Booking/Booking_page.php');
        }
    }
    public function Booking_Choose()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $send_value = array();
            foreach ($this->BookingModel->get_booking() as $item) {
                $send_value[] = $item->Menu_id;
            }
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'booking' => $send_value,
                'error' => ''
            );
            $this->load->view('Booking/Booking_choose_page.php', $data);
        }
    }
    public function get_booking_on_date()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $send_value = array();
            foreach ($this->BookingModel->get_booking() as $item) {
                $send_value[] = $item->Menu_id;
            }
            $data = array(
                'menu' => $this->BookingModel->get_menu(),
                'booking' => $send_value,
                'error' => ''
            );
            return $data;
        }
    }
    public function insert()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $data = $this->BookingModel->insert();
            if ($data === true) {
                $this->session->set_tempdata('status_insert', 'success', 3);
                header("Refresh:0; url=../setup");
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 3);
                header("Refresh:0; url=../setup");
            }
        }
    }
}
