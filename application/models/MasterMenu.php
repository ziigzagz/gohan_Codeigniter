<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterMixerModel extends CI_Model
{
	private $error_code = [];
	public function get_mixer()
	{
		$query = $this->db->query(
			"SELECT * FROM TB_GOHAN_MIXER;"
		);
		return $query->result();
	}

	public function delete_mixer()
	{
		$mixer_code = $this->input->post('mixer_code');
		// echo $mixer_code . $meat_th . $meat_jp;
		try {
			$sql = "DELETE FROM TB_GOHAN_MIXER WHERE Mixer_Code = '$mixer_code';";
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
