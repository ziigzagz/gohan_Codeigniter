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

    public function index($date)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $send_value = array();
            foreach ($this->BookingModel->get_booking($date) as $item) {
                $send_value[] = $item->Menu_id;
            }
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'booking' => $send_value,
                // 'booking_from_user' => $send_value,
                'error' => '',
                'date' => $date
            );
            $this->load->view('Booking/Booking_page.php', $data);
        }
    }

    public function Booking_Choose($date)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $send_value = array();
            foreach ($this->BookingModel->get_booking($date) as $item) {
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
            // foreach ($this->BookingModel->get_booking_on_date() as $item) {
            //     $send_value[] = $item->Menu_id;
            // }
            $data = array(
                'menu' => $this->BookingModel->get_booking_on_date(),
                'booking' => $send_value,
                'error' => ''
            );
            $test = "123";
            return $test;
        }
    }
    public function get_menu_with_Date_And_Username()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $send_value = array();
            // foreach ($this->BookingModel->get_booking_on_date() as $item) {
            //     $send_value[] = $item->Menu_id;
            // }
            $data = array(
                'menu' => $this->BookingModel->get_menu_with_Date_And_Username(),
                'booking' => $send_value,
                'error' => ''
            );
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
                header("Refresh:0; url=../Booking/index/" . date('Y-m-d'));
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 3);
                header("Refresh:0; url=../Booking/index/" . date('Y-m-d'));
            }
        }
    }
    public function insert_booking_from_user()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {

            $data = $this->BookingModel->insert_booking_from_user();

            if ($data === true) {

                $this->session->set_tempdata('status_insert', 'success', 3);
                header("Refresh:0; url=../Booking/index/" . date('Y-m-d'));
            } else {

                $this->session->set_tempdata('status_insert', 'fail', 3);
                header("Refresh:0; url=../Booking/index/" . date('Y-m-d'));
            }
        }
    }
}
