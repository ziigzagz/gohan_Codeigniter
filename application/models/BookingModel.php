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
    public function insert_booking_from_user()
    {

        if (isset($_POST['menu'])) {
            $username = $this->session->userdata('username');
            $date = $this->input->post('date');
            $sql = "delete TB_GOHAN_BOOKING_FROM_USER where username = '$username' and Booking_date = '$date';";
            if (!$this->db->simple_query($sql)) {
                $error = $this->db->error(); // Has keys 'code' and 'message'
                return $error['code'];
            }
            $Menu_Code =  $this->input->post('Menu_Code');
            $M_Group =  $this->input->post('M_Group');
            $menu =  $this->input->post('menu');

            foreach ($menu as $item) {
                $tmp_Menu_Code = explode('-', $item)[0];
                $tmp_M_Group = explode('-', $item)[1];
                try {
                    $sql = "INSERT INTO TB_GOHAN_BOOKING_FROM_USER (Username, Menu_Code, M_Group, Booking_date) VALUES ('$username',$tmp_Menu_Code,'$tmp_M_Group','$date');";
                    if (!$this->db->simple_query($sql)) {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                        return $error['code'];
                    }
                } catch (Exception $e) {
                    return false;
                }
            }
            return true;
        } else {
            try {
                $username = $this->session->userdata('username');
                $date = $this->input->post('date');
                $sql = "DELETE FROM TB_GOHAN_BOOKING_FROM_USER WHERE Username = '$username' and Booking_date = '$date';";
                if (!$this->db->simple_query($sql)) {
                    $error = $this->db->error(); // Has keys 'code' and 'message'
                    return $error['code'];
                }
            } catch (Exception $e) {
                return false;
            }
            return true;
        }
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
    public function get_booking($date)
    {
        $username = $this->session->userdata('username');

        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_BOOKING where Booking_Date ='$date';"
        );
        return $query->result();
    }
    public function get_booking_from_user($date)
    {
        $username = $this->session->userdata('username');

        $query = $this->db->query(
            "SELECT *
              FROM TB_GOHAN_BOOKING_FROM_USER
              INNER JOIN TB_GOHAN_MASTER
              on TB_GOHAN_MASTER.Menu_Code = TB_GOHAN_BOOKING_FROM_USER.Menu_Code and TB_GOHAN_MASTER.M_Group = TB_GOHAN_BOOKING_FROM_USER.M_Group
              where username = '$username' and Booking_date = '$date';"
        );
        return $query->result();
    }
    public function api_get_booking_from_user($username, $date)
    {
        // $username = $_POST['username'];
        // $date = $_POST['date'];
        $query = $this->db->query(
            "SELECT 
            a.Menu_Code,
            b.M_Group,
            COUNT(b.M_Group) as Total,
            Name_Th,
            Spicy,
            Price,
            Menu_Pic
            FROM TB_GOHAN_BOOKING_FROM_USER as a
            INNER JOIN TB_GOHAN_MASTER as b
            on b.Menu_Code = a.Menu_Code and b.M_Group = a.M_Group
            where Booking_date = '$date'
            group by a.Menu_Code,b.M_Group,b.Name_Th,b.Spicy,b.Price,b.Menu_Pic;
            "
        );
        return $query->result();
    }
    public function get_booking_Monthly($month, $year)
    {
        // $username = $_POST['username'];
        // $date = $_POST['date'];
        $query = $this->db->query(
            "select row_number() over(order by username) as row_num,username from TB_GOHAN_MEMBER where lv!=1;
            "
        );
        return $query->result();
    }
    public function get_booking_Monthly2($month, $year)
    {
        // $username = $_POST['username'];
        // $date = $_POST['date'];
        $query = $this->db->query(
            "select 
            row_num,tmp.Username,Booking_date,sum(s) as total_sum,
            day(Booking_date)as d,
            month(Booking_date)as m,
            year(Booking_date)as y
            
            from (
                SELECT Username,Booking_date,sum(TB_GOHAN_MASTER.Price) as s
                FROM TB_GOHAN_BOOKING_FROM_USER
                INNER JOIN TB_GOHAN_MASTER
                on TB_GOHAN_MASTER.Menu_Code = TB_GOHAN_BOOKING_FROM_USER.Menu_Code and TB_GOHAN_MASTER.M_Group = TB_GOHAN_BOOKING_FROM_USER.M_Group
                group by username,Booking_date,TB_GOHAN_MASTER.Price
            ) as tmp left join 
            (select row_number() over(order by username) as row_num,username from TB_GOHAN_MEMBER where lv!=1) mb
            on tmp.Username=mb.Username
            where left(Booking_date,4) = '$year' and  convert(int,SUBSTRING(convert(varchar(10),Booking_date,120),6,2)) = $month
            group by tmp.Username,Booking_date,row_num
            order by tmp.Username"
        );
        return $query->result();
    }
    public function get_booking_Monthly_group_date($month, $year)
    {
        // $username = $_POST['username'];
        // $date = $_POST['date'];
        $query = $this->db->query(
            "select sum(s) as tmp_s,Booking_date from(
                SELECT Username,Booking_date,sum(TB_GOHAN_MASTER.Price) as s
                    FROM TB_GOHAN_BOOKING_FROM_USER
                    INNER JOIN TB_GOHAN_MASTER
                    on TB_GOHAN_MASTER.Menu_Code = TB_GOHAN_BOOKING_FROM_USER.Menu_Code and TB_GOHAN_MASTER.M_Group = TB_GOHAN_BOOKING_FROM_USER.M_Group
                    where left(Booking_date,4) = '$year' and  convert(int,SUBSTRING(convert(varchar(10),Booking_date,120),6,2)) = $month
                    group by username,Booking_date,TB_GOHAN_MASTER.Price
                    ) as tmp2
                    group by Booking_date"
        );
        return $query->result();
    }
    public function get_booking_group_by()
    {
        $query = $this->db->query(
            "SELECT Username,Booking_date
            FROM TB_GOHAN_BOOKING_FROM_USER
            INNER JOIN TB_GOHAN_MASTER
            on TB_GOHAN_MASTER.Menu_Code = TB_GOHAN_BOOKING_FROM_USER.Menu_Code and TB_GOHAN_MASTER.M_Group = TB_GOHAN_BOOKING_FROM_USER.M_Group
            group by username,Booking_date"
        );
        return $query->result();
    }
    public function get_booking_group_by_user()
    {
        $user = $_SESSION['username'];
        $query = $this->db->query(
            "SELECT Username,Booking_date
            FROM TB_GOHAN_BOOKING_FROM_USER
            INNER JOIN TB_GOHAN_MASTER
            on TB_GOHAN_MASTER.Menu_Code = TB_GOHAN_BOOKING_FROM_USER.Menu_Code and TB_GOHAN_MASTER.M_Group = TB_GOHAN_BOOKING_FROM_USER.M_Group
            where Username = '$user'
            group by username,Booking_date"
        );
        return $query->result();
    }
    public function get_year()
    {
        $user = $_SESSION['username'];
        $query = $this->db->query(
            "select y from (
                SELECT [Booking_date],year(Booking_date) as y
                  FROM [ITDB].[dbo].[TB_GOHAN_BOOKING_FROM_USER]
                  group by Booking_date
                  ) as t
                  group by y"
        );
        return $query->result();
    }
}
