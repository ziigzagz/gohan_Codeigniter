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
	public function get_menu()
	{
		$query = $this->db->query(
			"SELECT * FROM TB_GOHAN_MASTER where show = '1' order by M_Group asc;"
		);
		return $query->result();
	}
	public function get_menu_with_type($type)
	{
		$query = $this->db->query(
			"SELECT * FROM TB_GOHAN_MASTER where show = '1' and M_Group = '$type' order by Price asc;"
		);
		return $query->result();
	}
	public function insert_master_menu()
	{
		$type = $this->input->post('type');
		$name_th = $this->input->post('name_th');
		$name_jp = $this->input->post('name_jp');
		$detail = $this->input->post('detail');
		$spicy = $this->input->post('spicy');
		$price = $this->input->post('price');
		$mixer = "";
		if (isset($_POST['mixer'])) {
			$myboxes = $_POST['mixer'];
			foreach (array_keys($myboxes) as $item) {
				$mixer .= $item . ",";
			}
		}

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
					$error = $this->db->error();
					print_r($error);
					return $error['code'];
				}
				return true;
			} catch (Exception $e) {
				return false;
			}
		}
	}
	public function delete_master_menu()
	{
		$Menu_Code = $this->input->post('Menu_Code');
		$M_Group = $this->input->post('M_Group');
		try {
			$sql = "UPDATE TB_GOHAN_MASTER SET show = 0 WHERE Menu_Code = '$Menu_Code' and M_Group = '$M_Group';";
			if (!$this->db->simple_query($sql)) {
				$error = $this->db->error();
				print_r($error);
				return $error['code'];
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	public function update_master_menu()
	{
		$Menu_Code = $this->input->post('Menu_Code');
		$M_Group = $this->input->post('M_Group');
		$type = $this->input->post('type');
		$name_th = $this->input->post('name_th');
		$name_jp = $this->input->post('name_jp');
		$detail = $this->input->post('detail');
		$spicy = $this->input->post('spicy');
		$price = $this->input->post('price');
		$mixer = "";
		if (isset($_POST['mixer'])) {
			$myboxes = $_POST['mixer'];
			foreach (array_keys($myboxes) as $item) {
				$mixer .= $item . ",";
			}
		}

		$img_upload = 0;
		if ($this->upload->do_upload('userfile') != null) {
			$img_upload = 1;
		}
		if ($img_upload) {
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
					$sql = "UPDATE TB_GOHAN_MASTER SET M_Group = '$type' , Name_Th = '$name_th' ,Name_Jp = N'$name_jp',Detail_Jp = N'$detail',Spicy = '$spicy' , Mixer = '$mixer' , Price = '$price' ,Menu_Pic = '$img'  WHERE Menu_code = '$Menu_Code' and M_Group = '$M_Group';";
					if (!$this->db->simple_query($sql)) {
						$error = $this->db->error();
						print_r($error);
						return $error['code'];
					}
					return true;
				} catch (Exception $e) {
					return false;
				}
			}
		} else {
			try {
				if ($type == "maincourse") {
					$type = 'A';
				} else if ($type == "sidedish") {
					$type = 'B';
				} else if ($type == "noodle") {
					$type = 'C';
				} else if ($type == "dessert") {
					$type = 'D';
				}
				$sql = "UPDATE TB_GOHAN_MASTER SET M_Group = '$type' , Name_Th = '$name_th' ,Name_Jp = N'$name_jp',Detail_Jp = N'$detail',Spicy = '$spicy' , Mixer = '$mixer' , Price = '$price'  WHERE Menu_code = '$Menu_Code' and M_Group = '$M_Group';";
				if (!$this->db->simple_query($sql)) {
					$error = $this->db->error();
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
