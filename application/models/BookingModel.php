<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookingModel extends CI_Model
{
    public function __construct()
    {
    }
    public function insert()
    {
        $username = $this->session->userdata('username');
        $date = $this->input->post('date');
        $menu =  $this->input->post('menu');
        print_r($_POST);
        echo "<br>";
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
        return true;
    }
    public function get_booking_on_date()
    {
        $username = $this->session->userdata('username');
        $booking_date = $_POST['date'];
        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_BOOKING where username = '$username' and Booking_Date = convert(date,'$booking_date');"
        );
        return $query->result();
    }
}
