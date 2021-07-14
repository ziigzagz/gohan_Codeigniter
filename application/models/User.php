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
}
