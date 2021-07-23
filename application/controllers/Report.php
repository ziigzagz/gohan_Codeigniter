<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookingModel');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            if ($this->session->userdata('Level') == 1) {
                $data = array(
                    'booking' => $this->BookingModel->get_booking_group_by()
                );
                $this->load->view('Report/Report.php', $data);
            } else {
                $data = array(
                    'booking' => $this->BookingModel->get_booking_group_by_user()
                );
                $this->load->view('Report/Report_User.php', $data);
            }
        }
    }
    public function Monthlyreport()
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            if ($this->session->userdata('Level') == 1) {
                $data = array(
                    'booking' => $this->BookingModel->get_booking_group_by(),
                    'year' => $this->BookingModel->get_year()
                );
                $this->load->view('Report/Monthly_Report.php', $data);
            }
        }
    }
}
