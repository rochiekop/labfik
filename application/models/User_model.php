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

	public function UserList()
	{
		$this->db->select('*');
		$this->db->from($this->User);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function KoordinatorTAList()
	{
		$this->db->select('id,name,is_active,status,images');
		$this->db->from($this->User);
		$this->db->where('role_id', '6');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
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
		$this->db->group_start();
		$this->db->where("role_id", "3");
		$this->db->or_where("role_id", "4");
		$this->db->group_end();
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
		$this->db->update('user', $data, array('id' => $id));
	}

	public function ChangeStatusOffline($id)
	{
		$data = array(
			'status' => 'offline'
		);
		$this->db->update('user', $data, array('id' => $id));
	}

	// Model User Untuk Peminjaman
	public function getDtTempat()
	{
		$query = "SELECT `kategoriruangan`.*,`ruangan`.* 
		FROM `kategoriruangan` JOIN `ruangan` 
		ON `kategoriruangan`.`id` = `ruangan`.`id_kategori`";
		return $this->db->query($query)->result_array();
	}

	public function getAllDtTempat()
	{
		$query = "SELECT `kategoriruangan`.*,`ruangan`.* 
		FROM `kategoriruangan` JOIN `ruangan` 
		ON `kategoriruangan`.`id` = `ruangan`.`id_kategori`";
		return $this->db->query($query)->result_array();
	}


	public function checkButton()
	{
		$this->db->select('user.name AS nama_dosen,dosbing.*,guidance.*');
		$this->db->from('dosbing');
		$this->db->join('guidance', 'dosbing.id_guidance = guidance.id');
		// $this->db->join('user', 'user.id = guidance.id_mhs');
		$this->db->join('user', 'dosbing.id_dosen = user.id');
		$this->db->where('guidance.id_mhs', $this->session->userdata('id'));
		// $this->db->where('dosbing.status!=', 'Ditolak');
		return $this->db->get()->result_array();
	}

	public function getMhs()
	{
		$this->db->select('dosbing.id,user.name AS nama_mhs,user.nim,user.prodi,dosbing.status,guidance.judul');
		$this->db->from('dosbing');
		$this->db->join('guidance', 'dosbing.id_guidance = guidance.id');
		$this->db->join('user', 'guidance.id_mhs = user.id');
		$this->db->where('dosbing.id_dosen', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}

	public function getpermintaan($query = null, $filter = null)
	{
		$this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,user.dosen_wali,guidance.tahun,guidance.status_file');
		$this->db->from('guidance');
		$this->db->join('user', 'user.id = guidance.id_mhs');
		$this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
		$this->db->where('user.dosen_wali', $this->session->userdata('id'));
		$this->db->group_start();
		if ($filter == 'Nama') {
			$this->db->like('user.name', $query);
		} elseif ($filter == 'NIM') {
			$this->db->like('user.nim', $query);
		} elseif ($filter == 'Prodi') {
			$this->db->like('user.prodi', $query);
		} elseif ($filter == 'Kosentrasi') {
			$this->db->like('guidance.peminatan', $query);
		} elseif ($filter == 'Tahun') {
			$this->db->like('guidance.tahun', $query);
		} else {
			$this->db->like('user.name', $query);
			$this->db->or_like('user.nim', $query);
			$this->db->or_like('user.prodi', $query);
			$this->db->or_like('guidance.peminatan', $query);
			$this->db->or_like('guidance.tahun', $query);
		}
		$this->db->group_end();
		$this->db->order_by('guidance.id', 'desc');
		$this->db->group_by('user.id');
		return $this->db->get()->result_array();
	}

	public function getdosenwalita($dosen_wali)
	{
		$this->db->select('name');
		$this->db->from('user');
		$this->db->where('id', $dosen_wali);
		return $this->db->get()->row();
	}

	public function countStatus($id_mhs, $status)
	{
		$this->db->select('id');
		$this->db->from('file_pendaftaran');
		$this->db->where('id_mhs', $id_mhs);
		$this->db->where('status_doswal', $status); // Disetujui, Ditolak
		return count($this->db->get()->result_array());
	}

	public function cekstatus($id)
	{
		$this->db->select('status_doswal');
		$this->db->from('file_pendaftaran');
		$this->db->where('id_mhs', $id);
		$this->db->where('status_doswal', "Disetujui wali");
		return count($this->db->get()->result_array());
	}

	public function cekstatuskoor($id)
	{
		$this->db->select('status_doswal');
		$this->db->from('file_pendaftaran');
		$this->db->where('id_mhs', $id);
		$this->db->where('nama', "Surat Pernyataan TA");
		$this->db->where('status_doswal', "Disetujui koor");
		return count($this->db->get()->result_array());
	}

	public function getpermintaanta($query = null, $filter = null)
	{
		$this->db->select('user.name,user.nim,user.prodi,user.id,guidance.judul_1,user.no_telp,user.dosen_wali,guidance.tahun,guidance.date,guidance.status_file,dosen_wali,guidance.id as id_guidance, thesis_lecturers.kelompok_keahlian,thesis_lecturers.id as id_tr');
		$this->db->from('guidance');
		$this->db->join('user', 'user.id = guidance.id_mhs');
		$this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
		$this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance ');
		$this->db->where('kelompok_keahlian', $this->session->userdata('koordinator'));
		$this->db->or_where('kelompok_keahlian', substr($this->session->userdata('koordinator'), 6));
		$this->db->group_start();
		if ($filter == 'Nama') {
			$this->db->like('user.name', $query);
		} elseif ($filter == 'NIM') {
			$this->db->like('user.nim', $query);
		} elseif ($filter == 'Prodi') {
			$this->db->like('user.prodi', $query);
		} elseif ($filter == 'Kosentrasi') {
			$this->db->like('guidance.peminatan', $query);
		} elseif ($filter == 'Tahun') {
			$this->db->like('guidance.tahun', $query);
		} else {
			$this->db->like('user.name', $query);
			$this->db->or_like('guidance.tahun', $query);
			$this->db->or_like('user.nim', $query);
			$this->db->or_like('user.prodi', $query);
			$this->db->or_like('guidance.peminatan', $query);
		}
		$this->db->group_end();
		$this->db->order_by('guidance.id', 'desc');
		$this->db->group_by('user.id');
		return $this->db->get()->result_array();
	}

	public function getfile($id)
	{
		$this->db->select('file_pendaftaran.*, user.name, user.nim, user.prodi, user.username');
		$this->db->from('file_pendaftaran');
		$this->db->join('user', 'file_pendaftaran.id_mhs = user.id');
		$this->db->where('id_mhs', $id);
		$this->db->order_by('file_pendaftaran.id', 'asc');
		return $this->db->get()->result_array();
	}

	public function getfilekoor($id)
	{
		$this->db->select('file_pendaftaran.*, user.name, user.nim, user.prodi, user.username');
		$this->db->from('file_pendaftaran');
		$this->db->join('user', 'file_pendaftaran.id_mhs = user.id');
		$this->db->where('id_mhs', $id);
		$this->db->where('file_pendaftaran.nama', 'Surat Pernyataan TA');
		return $this->db->get()->result_array();
	}
	public function getMhsbyId($id)
	{
		$this->db->select('guidance.judul_1,guidance.judul_2,guidance.judul_3,thesis_lecturers.dosen_pembimbing1,thesis_lecturers.dosen_pembimbing2');
		$this->db->from('guidance');
		$this->db->join('thesis_lecturers', 'thesis_lecturers.id_guidance = guidance.id');
		$this->db->where('guidance.id_mhs', $id);
		return $this->db->get()->row_array();
	}

	public function getDataMhsbyId($id)
	{
		$this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun,guidance.judul_1,guidance.judul_2,guidance.judul_3');
		$this->db->from('guidance');
		$this->db->join('user', 'user.id = guidance.id_mhs');
		$this->db->where('id_mhs', $id);
		$this->db->where('guidance.id_mhs', $id);
		return $this->db->get()->row_array();
	}
	public function checkDosen()
	{
		$this->db->select('dosbing.*, guidance.id as id_guidance,guidance.id_mhs');
		$this->db->from('guidance');
		$this->db->join('dosbing', 'guidance.id = dosbing.id_guidance');
		$this->db->where('id_dosen', $this->input->post('dosbing'));
		$this->db->where('id_mhs', $this->session->userdata('id'));
		$this->db->where('status !=', 'Ditolak');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getMhsBimbingan($query = null, $filter = null)
	{
		$this->db->select('user.name,user.nim,user.prodi,guidance.peminatan,guidance.id as id_guidance,guidance.tahun,thesis_lecturers.dosen_pembimbing1,thesis_lecturers.dosen_pembimbing2');
		$this->db->from('thesis_lecturers');
		$this->db->join('guidance', 'thesis_lecturers.id_guidance = guidance.id');
		$this->db->join('user', 'user.id = guidance.id_mhs');
		$this->db->group_start();
		$this->db->where('thesis_lecturers.dosen_pembimbing1', $this->session->userdata('id'));
		$this->db->or_where('thesis_lecturers.dosen_pembimbing2', $this->session->userdata('id'));
		$this->db->group_end();
		$this->db->group_start();
		if ($filter == 'Nama') {
			$this->db->like('user.name', $query);
		} elseif ($filter == 'NIM') {
			$this->db->like('user.nim', $query);
		} elseif ($filter == 'Prodi') {
			$this->db->like('user.prodi', $query);
		} elseif ($filter == 'Kosentrasi') {
			$this->db->like('guidance.peminatan', $query);
		} elseif ($filter == 'Tahun') {
			$this->db->like('guidance.tahun', $query);
		} else {
			$this->db->like('user.name', $query);
			$this->db->or_like('guidance.tahun', $query);
			$this->db->or_like('user.nim', $query);
			$this->db->or_like('user.prodi', $query);
			$this->db->or_like('guidance.peminatan', $query);
		}
		$this->db->group_end();
		$this->db->order_by('guidance.id', 'desc');
		return $this->db->get()->result_array();
	}

	public function countFileBimbingan($id_guidance)
	{
		$this->db->select('id');
		$this->db->from('thesis');
		$this->db->where('id_guidance', $id_guidance);
		return count($this->db->get()->result_array());
	}

	public function getallbimbingan()
	{
		$this->db->select('GROUP_CONCAT(user.name SEPARATOR " , ") as dosen_name,thesis.*');
		$this->db->from('user');
		$this->db->join('guidance', 'user.id = guidance.id_mhs');
		$this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance');
		$this->db->join('thesis', 'thesis.id_guidance = guidance.id');
		$this->db->where('id_mhs', $this->session->userdata('id'));
		$this->db->group_by('thesis.id');
		return $this->db->get()->result_array();
	}

	public function checkaddbimbingan()
	{
		$this->db->select('guidance.*,thesis.*');
		$this->db->from('guidance');
		$this->db->join('thesis', 'guidance.id = thesis.id_guidance');
		$this->db->where('id_mhs', $this->session->userdata('id'));
		$this->db->where('thesis.status', 'Sesuai');
		$this->db->or_where('thesis.status', 'Revisi');
		return $this->db->get()->result_array();
	}

	public function checkaddbimbingan2()
	{
		$this->db->select('guidance.*,thesis.*');
		$this->db->from('guidance');
		$this->db->join('thesis', 'guidance.id = thesis.id_guidance');
		$this->db->where('id_mhs', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}
	public function getmhsbimbinganbyid($id)
	{
		$this->db->select('user.name,user.nim,user.prodi,no_telp,thesis_lecturers.dosen_pembimbing1,guidance.peminatan');
		$this->db->from('thesis');
		$this->db->join('guidance', 'guidance.id = thesis.id_guidance');
		$this->db->join('user', 'guidance.id_mhs = user.id');
		$this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance');
		$this->db->where('thesis.id_guidance', $id);
		return $this->db->get()->row_array();
	}

	public function getfilebimbinganbyid($id, $tahapan)
	{
		$this->db->select('guidance.*,thesis.id_guidance,thesis.id,thesis.pdf_file,thesis.status,thesis.keterangan, thesis.link_project');
		$this->db->from('thesis');
		$this->db->join('guidance', 'guidance.id = thesis.id_guidance');
		$this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance');
		$this->db->where('thesis.id_guidance', $id);
		$this->db->where('thesis.tahapan_preview', $tahapan);
		return $this->db->get()->result_array();
	}

	public function getfilebimbinganbyuserid($id, $tahapan)
	{
		$this->db->select('id');
		$this->db->from('guidance');
		$this->db->where('id_mhs', $id);
		$guidance_id = $this->db->get()->row();

		$this->db->select('guidance.*,thesis.id_guidance,thesis.id,thesis.pdf_file,thesis.status,thesis.keterangan,thesis.link_project');
		$this->db->from('thesis');
		$this->db->join('guidance', 'guidance.id = thesis.id_guidance');
		$this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance');
		$this->db->where('thesis.id_guidance', $guidance_id->id);
		$this->db->where('thesis.tahapan_preview', $tahapan);
		return $this->db->get()->result_array();
	}

	public function getFileBimbinganOnly($thesis_id)
	{
		$this->db->select('pdf_file');
		$this->db->from('thesis');
		$this->db->where('id', $thesis_id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function cektitle()
	{
		$this->db->select('*');
		$this->db->from('guidance');
		$this->db->where('judul', $this->input->post('title'));
		$this->db->where('id_mhs !=', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}

	public function getfilebimbinganpreview($id)
	{
		$this->db->select('guidance.*,thesis.id_guidance,thesis.id,thesis.pdf_file,thesis.status,thesis.keterangan');
		$this->db->from('thesis');
		$this->db->join('guidance', 'guidance.id = thesis.id_guidance');
		$this->db->where('thesis.id_guidance', $id);
		$this->db->where('thesis.status', 'Preview 1');
		$this->db->or_where('thesis.status', 'Preview 2');
		$this->db->or_where('thesis.status', 'Preview 3');
		return $this->db->get()->result_array();
	}

	public function getuserdosen()
	{
		$this->db->select('user.*,user_role.role');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.role_id');
		$this->db->where('role_id', 3);
		$this->db->where('is_active', 1);
		return $this->db->get()->result_array();
	}

	public function getBookingProgress()
	{
		$this->db->select('ruangan.ruangan,booking.status,booking.time');
		$this->db->from('booking');
		$this->db->join('ruangan', 'ruangan.id = booking.id_ruangan');
		$this->db->where('booking.date >=', date('Y-m-d'));
		$this->db->where('booking.id_peminjam', $this->session->userdata('id'));
		$this->db->where('booking.status !=', 'Ditolak');
		$this->db->order_by('booking.date', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function getBookingLast()
	{
		$this->db->select('ruangan.ruangan,booking.status,booking.time,booking.date');
		$this->db->from('booking');
		$this->db->join('ruangan', 'ruangan.id = booking.id_ruangan');
		$this->db->where('booking.date <', date('Y-m-d'));
		$this->db->where('booking.id_peminjam', $this->session->userdata('id'));
		$this->db->where('booking.status !=', 'Ditolak');
		$this->db->order_by('booking.date', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function getBookingNumb()
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('id_peminjam', $this->session->userdata('id'));
		$this->db->where('status', 'Diterima');
		return count($this->db->get()->result_array());
	}

	public function getDosenWali()
	{
		$this->db->select('id,kode_dosen,name');
		$this->db->from('user');
		$this->db->where('kode_dosen !=', "");
		return $this->db->get()->result_array();
	}

	// Cek Number of status accepted in filependaftaran
	public function getStatusDWali($id)
	{
		$this->db->select('status_doswal');
		$this->db->from('file_pendaftaran');
		$this->db->where('status_doswal', 'Disetujui Dosen Wali');
		$this->db->where('id_mhs', $id);
		return count($this->db->get()->result_array());
	}

	public function getDiSetujuiAdminLaa($id)
	{
		$this->db->select('status_adminlaa');
		$this->db->from('file_pendaftaran');
		$this->db->where('status_adminlaa', 'Disetujui');
		$this->db->where('id_mhs', $id);
		return count($this->db->get()->result_array());
	}

	public function getDiTolakiAdminLaa($id)
	{
		$this->db->select('status_adminlaa');
		$this->db->from('file_pendaftaran');
		$this->db->where('status_adminlaa', 'Ditolak');
		$this->db->where('id_mhs', $id);
		return count($this->db->get()->result_array());
	}

	public function getDosenPembimbing($id)
	{
		$this->db->select('name');
		$this->db->from('user');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}
}
