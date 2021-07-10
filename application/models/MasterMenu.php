<?php
defined('BASEPATH') or exit('No direct script access allowed');
// === TYPE ===
// maincourse => A
// sidedish => B
// noodle => C
// dessert => D
class MasterMenu extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$config['upload_path']          = './images/menu';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 102400;
		$config['max_height']           = 76800;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	}
	public function insert_master_menu()
	{
		$type = $this->input->post('type');
		$name_th = $this->input->post('name_th');
		$name_jp = $this->input->post('name_jp');
		$detail = $this->input->post('detail');
		$spicy = $this->input->post('spicy');
		$mixer = $this->input->post('spicy');
		$price = $this->input->post('price');
		if (!$this->upload->do_upload('userfile')) {
			return false;
		} else {
			try {

				$data = $this->upload->data();
				$img = $data['file_name'];
				if ($type == "maincourse") {
					$type = 'A';
				} else if ($type == "sidedish") {
					$type = 'B';
				} else if ($type == "noodle") {
					$type = 'C';
				} else if ($type == "dessert") {
					$type = 'D';
				}
				$sql = "exec SP_GOHAN_INSERT '$type','$name_th',N'$name_jp','$detail',$spicy,'$mixer',$price,'$img'";
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
}
