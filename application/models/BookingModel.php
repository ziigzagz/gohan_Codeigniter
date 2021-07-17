<?php
defined('BASEPATH') or exit('No direct script access allowed');

// where MONTH(Booking_Date) = 8 and YEAR(Booking_Date) = 2021

class BookingModel extends CI_Model
{
    public function __construct()
    {
    }
    public function insert()
    {
        $username = $this->session->userdata('username');
        $date = $this->input->post('date');
        $sql = "delete TB_GOHAN_BOOKING where username = '$username' and booking_date = '$date';";
        if (!$this->db->simple_query($sql)) {
            $error = $this->db->error(); // Has keys 'code' and 'message'
            return $error['code'];
        }
        if (isset($_POST['menu'])) {
            $menu =  $this->input->post('menu');
            foreach ($menu as $item) {
                try {
                    $sql = "INSERT INTO TB_GOHAN_BOOKING (Username, Booking_Date, Menu_id) VALUES ('$username','$date','$item');";
                    if (!$this->db->simple_query($sql)) {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                        return $error['code'];
                    }
                } catch (Exception $e) {
                    return false;
                }
            }
        }
        return true;
    }
    public function get_booking_on_date()
    {
        $username = $this->session->userdata('username');
        // $booking_date = '2021-07-17';
        $booking_date = $_POST['date'];

        $query_booking = $this->db->query(
            "SELECT * FROM TB_GOHAN_BOOKING where username = '$username' and Booking_Date = convert(date,'$booking_date');"
        );
        $query_master_menu = $this->db->query(
            "SELECT * FROM TB_GOHAN_MASTER;"
        );
        $data = array();
        $data['query_booking'] = $query_booking->result();
        $data['query_master_menu'] = $query_master_menu->result();
        print_r(json_encode($data));
    }
    public function get_menu_with_Date_And_Username()
    {
    }
    public function get_booking()
    {
        $username = $this->session->userdata('username');

        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_BOOKING where username = '$username' and Booking_Date = convert(date,getdate());"
        );
        return $query->result();
    }
}
