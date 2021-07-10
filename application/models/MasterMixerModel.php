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

	public function insert_mixer()
	{
		$config['upload_path']          = './images/mixer';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 102400;
		$config['max_height']           = 76800;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('userfile')) {
			return false;
		} else {
			try {
				$mixer_code = $this->input->post('mixer_code');
				$meat_th = $this->input->post('meat_th');
				$meat_jp = $this->input->post('meat_jp');
				$data = $this->upload->data();
				$img = $data['file_name'];
				$sql = "INSERT INTO TB_GOHAN_MIXER (Mixer_code,Name, Name_JP,Pic) VALUES ('$mixer_code','$meat_th','$meat_jp','$img');";
				if (!$this->db->simple_query($sql)) {
					$error = $this->db->error(); // Has keys 'code' and 'message'
					return $error['code'];
				}
				return true;
			} catch (Exception $e) {
				return false;
			}
		}
	}
	public function update_mixer()
	{

		$mixer_code = $this->input->post('mixer_code');
		$meat_th = $this->input->post('meat_th' . $mixer_code);
		$meat_jp = $this->input->post('meat_jp' . $mixer_code);
		// echo $mixer_code . $meat_th . $meat_jp;
		try {
			$sql = "UPDATE TB_GOHAN_MIXER SET Name = '$meat_th', Name_JP = N'$meat_jp' WHERE Mixer_Code = '$mixer_code';";
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
