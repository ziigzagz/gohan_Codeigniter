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
            // $tmp_date = $_POST['date'];
            echo "<script>localStorage.setItem('date','$date')</script>";
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'booking' => $send_value,
                // 'booking_from_user' => $send_value,
                'checkbox' => $this->BookingModel->get_booking_from_user($date),
                'error' => '',
                'date' => $date
            );
            $this->load->view('Booking/Booking_page.php', $data);
        }
    }

    public function Booking_Choose($date, $type = null)
    {
        if (!($this->session->userdata('logged_in')) or ($this->session->userdata('Level') == 0)) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {

            $this->load->view('css');
            $this->load->view('js');
            $send_value = array();
            foreach ($this->BookingModel->get_booking($date) as $item) {
                $send_value[] = $item->Menu_id;
            }
            $data = array(
                'menu_main' => $this->MasterMenu->get_menu_arg('A'),
                'menu_side' => $this->MasterMenu->get_menu_arg('B'),
                'menu_noodle' => $this->MasterMenu->get_menu_arg('C'),
                'menu_dessert' => $this->MasterMenu->get_menu_arg('D'),
                'menu' => $this->MasterMenu->get_menu(),
                'booking' => $send_value,
                'date' => $date,
                'error' => ''
            );
            $this->load->view('Booking/Booking_choose_page.php', $data);
        }
    }
    public function Booking_Report($date)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $this->load->view('css');
            $this->load->view('js');
            $data = array(
                'menu' => $this->MasterMenu->get_menu(),
                'booking' => $this->BookingModel->get_booking_from_user($date),
                'date' => $date,
                'error' => ''
            );

            $this->load->view('Booking/booking_report.php', $data);
        }
    }

    public function API_Get_Booking($date)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            print_r(json_encode($this->BookingModel->get_booking_from_user($date)));
        }
    }
    public function API_Get_Monthly($month, $year)
    {
        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $data = array();
            $data[] = $this->BookingModel->get_booking_Monthly($month, $year);
            $data[] = $this->BookingModel->get_booking_Monthly2($month, $year);
            $data[] = $this->BookingModel->get_booking_Monthly_group_date($month, $year);
            print_r(json_encode($data));
        }
    }
    public function API_Get_Booking_date_and_username($username, $date)
    {

        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            print_r(json_encode($this->BookingModel->api_get_booking_from_user($username, $date)));
        }
    }
    public function API_Get_Booking_date_and_username2($username, $date)
    {

        if (!$this->session->userdata('logged_in')) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            print_r(json_encode($this->BookingModel->api_get_booking_from_user2($username, $date)));
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
        if (!$this->session->userdata('logged_in') or ($this->session->userdata('Level') == 0)) {
            header("Refresh:0; url=" . base_url() . "login");
        } else {
            $data = $this->BookingModel->insert();

            if ($data === true) {
                $this->session->set_tempdata('status_insert', 'success', 1);
                header("Refresh:0; url=../Booking/Booking_Choose/" . date('Y-m-d'));
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 1);
                header("Refresh:0; url=../Booking/Booking_Choose/" . date('Y-m-d'));
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
                $this->session->set_tempdata('status_insert', 'success', 1);
                header("Refresh:0; url=" . base_url() . "Report");
            } else {
                $this->session->set_tempdata('status_insert', 'fail', 1);
                header("Refresh:0; url=" . base_url() . "Report");
            }
        }
    }
}
