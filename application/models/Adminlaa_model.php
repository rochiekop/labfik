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
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun,guidance.date,guidance.status_file,(SELECT user.name from user where user.id = user.dosen_wali) AS dosen_wali,(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Disetujui") AS diterima,(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Ditolak") AS ditolak,(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Update") AS updated');
    $this->db->from('user');
    $this->db->join('guidance', 'guidance.id_mhs = user.id');
    $this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
    $this->db->where('guidance.status_file', 'Disetujui wali');
    $this->db->or_where('guidance.status_file', 'Disetujui Adminlaa');
    $this->db->group_by('file_pendaftaran.id_mhs');
    return $this->db->get()->result_array();
  }

  public function getMhs1()
  {
    $this->db->select('(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Disetujui" GROUP BY id_mhs) AS diterima,(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Ditolak") AS ditolak,(SELECT count(status_adminlaa) from file_pendaftaran where status_adminlaa = "Update") AS updated');
    $this->db->from('file_pendaftaran');
    return $this->db->get()->result_array();
  }

  public function getFiles($id)
  {
    $this->db->select('file_pendaftaran.id,file_pendaftaran.id_mhs,file_pendaftaran.nama,file_pendaftaran.file,user.username,file_pendaftaran.status_adminlaa,file_pendaftaran.komentar');
    $this->db->from('file_pendaftaran');
    $this->db->join('user', 'user.id = file_pendaftaran.id_mhs');
    $this->db->where('id_mhs', $id);
    return $this->db->get()->result_array();
  }

  public function getMhsbyId($id)
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    $this->db->where('id_mhs', $id);
    return $this->db->get()->row_array();
  }

  public function cekstatus($id)
  {
    $this->db->select('status_adminlaa');
    $this->db->from('file_pendaftaran');
    $this->db->where('id_mhs', $id);
    $this->db->where('status_adminlaa', "Disetujui");
    return count($this->db->get()->result_array());
  }
}
