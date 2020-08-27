<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlaa_model extends CI_Model
{
  public function pendaftaranta()
  {
    $this->db->select('guidance.*,user.username,user.name,user.email,user.nim,user.prodi,user.no_telp,user.dosen_wali');
    $this->db->from('guidance');
    $this->db->join('user', 'guidance.id_mhs = user.id');
    $this->db->where('guidance.status_file', 'Disetujui Dosen Wali');
    $this->db->group_by('guidance.id_mhs');
    return $this->db->get()->result_array();
  }

  public function getdosen()
  {
    $this->db->select('user.name,user.prodi,user.id,');
    $this->db->from('user');
    $this->db->where('role_id', '3');
    return $this->db->get()->result_array();
  }
  public function getMhs()
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun,guidance.date,guidance.status_file');
    $this->db->from('user');
    $this->db->join('guidance', 'guidance.id_mhs = user.id');
    $this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
    $this->db->where('guidance.status_file', 'Acc Dosen Wali');
    $this->db->group_by('file_pendaftaran.id_mhs');
    return $this->db->get()->result_array();
  }

  public function getFiles($id)
  {
    $this->db->select('file_pendaftaran.id,file_pendaftaran.id_mhs,file_pendaftaran.nama,file_pendaftaran.file,user.username,file_pendaftaran.status,file_pendaftaran.komentar');
    $this->db->from('file_pendaftaran');
    $this->db->join('user', 'user.id = file_pendaftaran.id_mhs');
    return $this->db->get()->result_array();
  }

  public function getMhsbyId($id)
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    return $this->db->get()->row_array();
  }
}
