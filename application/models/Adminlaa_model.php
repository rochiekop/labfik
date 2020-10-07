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
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,guidance.tahun,guidance.status_file,dosen_wali');
    $this->db->from('user');
    $this->db->join('guidance', 'guidance.id_mhs = user.id');
    $this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
    $this->db->where('guidance.status_file', 'Disetujui wali');
    $this->db->or_where('guidance.status_file', 'Disetujui Adminlaa');
    $this->db->or_where('guidance.status_file', 'Disetujui Ketua KK');
    $this->db->group_by('file_pendaftaran.id_mhs');
    $this->db->order_by('guidance.id', 'desc');
    return $this->db->get()->result_array();
  }

  public function countStatus($id_mhs, $status)
  {
    $this->db->select('id');
    $this->db->from('file_pendaftaran');
    $this->db->where('id_mhs', $id_mhs);
    $this->db->where('status_adminlaa', $status); // Disetujui, Ditolak
    $this->db->where('jenis_pendaftaran', 'pendaftaran_bimbingan');
    return count($this->db->get()->result_array());
  }

  public function countStatusDS($id_mhs, $status)
  {
    $this->db->select('id');
    $this->db->from('file_pendaftaran');
    $this->db->where('id_mhs', $id_mhs);
    $this->db->where('status_adminlaa', $status);
    $this->db->where('jenis_pendaftaran', 'pendaftaran_sidang');
    return count($this->db->get()->result_array());
  }

  public function getDosenWali($dosen_wali)
  {
    $this->db->select('name');
    $this->db->from('user');
    $this->db->where('id', $dosen_wali);
    return $this->db->get()->row();
  }


  public function getFiles($id, $jenis)
  {
    $this->db->select('file_pendaftaran.id,file_pendaftaran.id_mhs,file_pendaftaran.nama,file_pendaftaran.file,file_pendaftaran.status_doswal,user.username,file_pendaftaran.status_adminlaa,file_pendaftaran.komentar, file_pendaftaran.view_adminlaa');
    $this->db->from('file_pendaftaran');
    $this->db->join('user', 'user.id = file_pendaftaran.id_mhs');
    $this->db->where('id_mhs', $id);
    $this->db->where('jenis_pendaftaran', $jenis);
    return $this->db->get()->result_array();
  }

  public function getMhsbyId($id)
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,user.no_telp,guidance.tahun, guidance.judul_1, guidance.judul_2, guidance.judul_3');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    $this->db->where('id_mhs', $id);
    return $this->db->get()->row_array();
  }

  public function getDosbing($id)
  {
    $this->db->select('dosen_pembimbing1,dosen_pembimbing2');
    $this->db->from('guidance');
    $this->db->join('thesis_lecturers', 'thesis_lecturers.id_guidance = guidance.id');
    $this->db->where('id_mhs', $id);
    $array =  $this->db->get()->row_array();
    return (!empty($array) ? $array : "");
  }

  public function cekstatus($id)
  {
    $this->db->select('status_adminlaa');
    $this->db->from('file_pendaftaran');
    $this->db->where('id_mhs', $id);
    $this->db->where('status_adminlaa', "Disetujui");
    return count($this->db->get()->result_array());
  }

  public function countInfo($status)
  {
    $this->db->select('file_pendaftaran.id_mhs');
    $this->db->from('file_pendaftaran');
    $this->db->join('guidance', 'file_pendaftaran.id_mhs = guidance.id_mhs');
    $this->db->where('status_file !=', 'Dikirim');
    $this->db->where('status_adminlaa', $status);
    $this->db->where('status_doswal !=', $status);
    $this->db->group_by('id_mhs');
    return count($this->db->get()->result_array());
  }

  public function countAllInfo()
  {
    $this->db->select('file_pendaftaran.id_mhs');
    $this->db->from('file_pendaftaran');
    $this->db->join('guidance', 'file_pendaftaran.id_mhs = guidance.id_mhs');
    $this->db->where('status_adminlaa', 'Dikirim');
    $this->db->where('status_doswal !=', 'Dikirim');
    $this->db->where('status_file !=', 'Dikirim');
    $this->db->or_where('status_adminlaa', 'Disetujui');
    $this->db->or_where('status_adminlaa', 'Ditolak');
    $this->db->group_by('id_mhs');
    return count($this->db->get()->result_array());
  }

  public function getMhsPreview1()
  {
    $this->db->select('user.name, user.nim,user.prodi, thesis_lecturers.dosen_pembimbing1, thesis_lecturers.dosen_pembimbing2, guidance.kelayakan,guidance.status_preview,guidance.id,guidance.komentar_kelayakan');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    $this->db->join('thesis_lecturers', 'thesis_lecturers.id_guidance = guidance.id');
    $this->db->where('status_file', 'Disetujui Ketua KK');
    $this->db->where('status_preview', 'preview1');
    $this->db->or_where('status_preview', 'preview2');
    $this->db->or_where('status_preview', 'preview3');
    $this->db->or_where('status_preview', 'sidang');
    return $this->db->get()->result_array();
  }

  public function getMhsPreview2()
  {
    $this->db->select('user.name,guidance.status_preview, user.nim,guidance.nilai_pembimbing1,guidance.nilai_pembimbing2,guidance.nilai_penguji3,guidance.nilai_penguji1,guidance.nilai_penguji2');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    $this->db->where('status_preview', 'preview2');
    $this->db->or_where('status_preview', 'preview3');
    $this->db->or_where('status_preview', 'sidang');
    return $this->db->get()->result_array();
  }
  public function getMhsPreview3()
  {
    $this->db->select('user.name,guidance.id, user.nim,user.prodi, thesis_lecturers.dosen_pembimbing1, thesis_lecturers.dosen_pembimbing2, guidance.kelayakan2,guidance.status_preview,guidance.komentar_kelayakan2');
    $this->db->from('guidance');
    $this->db->join('user', 'user.id = guidance.id_mhs');
    $this->db->join('thesis_lecturers', 'thesis_lecturers.id_guidance = guidance.id');
    $this->db->where('status_preview', 'preview3');
    $this->db->or_where('status_preview', 'sidang');
    return $this->db->get()->result_array();
  }
  public function getMhsDaftarSidang()
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.peminatan,guidance.tahun,guidance.status_file,dosen_wali');
    $this->db->from('user');
    $this->db->join('guidance', 'guidance.id_mhs = user.id');
    $this->db->join('file_pendaftaran', 'guidance.id_mhs = file_pendaftaran.id_mhs ');
    $this->db->where('guidance.status_preview', 'sidang');
    $this->db->where('jenis_pendaftaran', 'pendaftaran_sidang');
    $this->db->group_by('guidance.id_mhs');
    return $this->db->get()->result_array();
  }

  public function getFilesDaftarSidang($id, $jenis)
  {
    $this->db->select('file_pendaftaran.id,file_pendaftaran.id_mhs,file_pendaftaran.nama,file_pendaftaran.file,file_pendaftaran.status_doswal,user.username,file_pendaftaran.status_adminlaa,file_pendaftaran.komentar,file_pendaftaran.komentar, file_pendaftaran.view_adminlaa');
    $this->db->from('file_pendaftaran');
    $this->db->join('user', 'user.id = file_pendaftaran.id_mhs');
    $this->db->where('id_mhs', $id);
    $this->db->where('jenis_pendaftaran', $jenis);
    $this->db->where('nama', 'Dokumen TAK');
    $this->db->or_where('nama', 'Sertifikat EPRT');
    return $this->db->get()->result_array();
  }
}
