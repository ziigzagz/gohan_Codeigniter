<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
    }
    public function checklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_MEMBER where username = '$username' and password = '$password';"
        );

        return $query->result();
    }
    public function insert()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_MEMBER where Username = '$username'"
        );

        if (sizeof($query->result()) == 0) {
            $sql = "INSERT INTO TB_GOHAN_MEMBER (Username, Password, Lv) VALUES ('$username','$password',0);";
            if (!$this->db->simple_query($sql)) {
                $error = $this->db->error(); // Has keys 'code' and 'message'
                return $error['code'];
            }
            return true;
        }
        else{
            return false;
        }
    }
    public function get_user()
    {
        $query = $this->db->query(
            "SELECT * FROM TB_GOHAN_MEMBER where Lv != 1 order by Username asc;"
        );
        return $query->result();
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->query(
            "UPDATE TB_GOHAN_MEMBER SET Lv = -1 WHERE id = '$id';"
        );
    }
}
