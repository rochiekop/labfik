<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	private $User = 'user';

	public function GetUserData()
	{
		$this->db->select('id,username,name,email,images,role_id,is_active,date_created');
		$this->db->from($this->User);
		$this->db->where("id", $this->session->userdata('id'));
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function GetUserDataById($id)
	{
		$this->db->select('id,username,name,email,images,role_id,is_active,date_created');
		$this->db->from($this->User);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	// public function IfExistEmail($email){
	// 	 $this->db->select('id, email'); 
	// 	 $this->db->from($this->User);
	// 	 $this->db->where('email', $email);
	// 	 $query = $this->db->get();
	// 	 if ($query->num_rows() != 0) {
	// 		return $query->row_array();
	// 	 } else {
	// 		return false;
	// 	 }
	// }

	public function Images($id)
	{
		$this->db->select('images');
		$this->db->from($this->User);
		$this->db->where("id", $id);
		$query = $this->db->get();
		$res = $query->row_array();
		if (!empty($res['images'])) {
			// return base_url('uploads/profiles/' . $res['images']);
			return base_url('assets/img/profile/' . $res['images']);
		} else {
			return base_url('public/images/user-icon.jpg');
		}
	}

	public function ImagesById($id)
	{
		$this->db->select('id,images');
		$this->db->from($this->User);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();
		if (!empty($res['images'])) {
			return base_url('uploads/profiles/' . $res['images']);
		} else {
			return base_url('public/images/user-icon.jpg');
		}
	}

	public function GetName($id)
	{
		$this->db->select('id,name');
		$this->db->from($this->User);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();
		return $res['name'];
	}

	public function GetIDByName($name)
	{
		$this->db->select('id,name');
		$this->db->from($this->User);
		$this->db->where("name", $name);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();
		return $res['id'];
	}

	// public function GetUserAddress($id)
	// {  
	// 	$this->db->select('id,email,mobile_no,address,address_2,city,state,pincode,language');
	// 	$this->db->from($this->User);
	// 	$this->db->where("id",$id);
	// 	$this->db->limit(1);
	// 	$query = $this->db->get();
	// 	$res = $query->row_array();
	// 	return $res;
	// }

	// public function UpdateProfileImageByID($data)
	// {  
	// 	$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['id'] ]); 
	// 	if($res == 1)
	// 		return true;
	// 	else
	// 		return false;
	// }

	// public function UpdateCustomerProfileImageByID($data)
	// {  
	// 	$res = $this->db->update($this->User, $data ,['id' => $this->session->userdata['User']['id'] ] ); 
	// 	if($res == 1)
	// 		return true;
	// 	else
	// 		return false;
	// }

	public function GetMemberNameById($id)
	{
		$this->db->select('id,name');
		$this->db->from($this->User);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();
		$u = $query->row_array();
		return $u['name'];
	}

	public function AddMember($data)
	{
		$res = $this->db->insert($this->User, $data);
		if ($res == 1)
			return $this->db->insert_id();
		else
			return false;
	}

	public function StatusUpdateByID($user_id, $status)
	{
		$res = $this->db->update($this->User, ['status' => $status], ['id' => $user_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}

	public function TrashByID($user_id)
	{
		$res = $this->db->delete($this->User, ['id' => $user_id]);
		if ($res == 1)
			return true;
		else
			return false;
	}

	public function AllRoleTypes($role)
	{
		$this->db->select('id,name');
		$this->db->from($this->User);
		$this->db->where("role", $role);
		$query = $this->db->get();
		$u = $query->num_rows();
		return $u;
	}

	public function AdminList()
	{
		// $this->db->select('id,name,picture_url,is_active');
		$this->db->select('id,name,is_active,status,images');
		$this->db->from($this->User);
		$this->db->where("role_id", "1");
		$this->db->where("is_active", "1");
		$query = $this->db->get();
		$r = $query->result_array();
		return $r;
	}

	public function KaurList()
	{
		// $this->db->select('id,name,picture_url,is_active');
		$this->db->select('id,name,is_active,status,images');
		$this->db->from($this->User);
		$this->db->where("role_id", "2");
		$this->db->where("is_active", "1");
		$query = $this->db->get();
		$r = $query->result_array();
		return $r;
	}

	public function DosenMhsList()
	{
		// $this->db->select('id,name,picture_url,is_active');
		$this->db->select('id,name,is_active,status,images');
		$this->db->from($this->User);
		$this->db->where("role_id", "3");
		$this->db->or_where("role_id", "4");
		$this->db->where("is_active", "1");
		$query = $this->db->get();
		$r = $query->result_array();
		return $r;
	}

	public function ChangeStatusOnline($id)
	{
		$data = array(
            'status' => 'online'
        );
        $this->db->update('user',$data,array('id' => $id));
	}

	public function ChangeStatusOffline($id)
	{
		$data = array(
            'status' => 'offline'
        );
        $this->db->update('user',$data,array('id' => $id));
	}

	// Model User Untuk Peminjaman
	public function getDtTempat()
	{
		$query = "SELECT `kategoriruangan`.*,`ruangan`.* 
		FROM `kategoriruangan` JOIN `ruangan` 
		ON `kategoriruangan`.`id` = `ruangan`.`id_kategori` LIMIT 6";
		return $this->db->query($query)->result_array();
	}

	public function getAllDtTempat()
	{
		$query = "SELECT `kategoriruangan`.*,`ruangan`.* 
		FROM `kategoriruangan` JOIN `ruangan` 
		ON `kategoriruangan`.`id` = `ruangan`.`id_kategori`";
		return $this->db->query($query)->result_array();
	}
}
