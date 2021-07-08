<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterMixerModel extends CI_Model
{
	public function get_mixer()
	{
		$query = $this->db->query(
			"SELECT * FROM TB_GOHAN_MIXER;"
		);
		return $query->result();
	}
	public function insert_mixer()
	{
		$config['upload_path'] = './img/news';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '200000';
		$config['max_width'] = '3000';
		$config['max_height'] = '3000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$data = $this->upload->data();
		echo "<pre>";
		print_r($data);
		if (!$this->upload->do_upload('img')) {
			echo "55";
			// return false;
		} else {
			try {
				$title = $this->input->post('Title');
				$detail = $this->input->post('Detail');
				$data = $this->upload->data();
				$img = $data['file_name'];
				$query = $this->db->query("INSERT INTO TB_GOHAN_MIXER (Mixer_code,Name, Name_JP,Pic) VALUES ('$title','$detail','$detail','$img');");
				return $query;
			} catch (Exception $e) {
				return false;
			}
		}
	}
}
