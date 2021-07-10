<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterMenu extends CI_Model
{
	private $error_code = [];
	public function get_menu()
	{
		$query = $this->db->query(
			"SELECT * FROM TB_GOHAN_MASTER;"
		);
		return $query->result();
	}

	public function insert_master_menu()
	{
		try {
			$sql = "exec SP_GOHAN_INSERT 'A','ไทย',N'jjjj','',2,'PIG',120,''";
			if (!$this->db->simple_query($sql)) {
				$error = $this->db->error(); // Has keys 'code' and 'message'
				print_r($error);
				return $error['code'];
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
