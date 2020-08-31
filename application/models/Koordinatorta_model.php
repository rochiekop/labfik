<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinatorta_model extends CI_Model
{
  public function getMhs()
  {
    $this->db->select('user.name,user.nim,user.prodi,user.id,guidance.id as id_guidance,guidance.peminatan,user.no_telp,guidance.tahun,guidance.date,guidance.status_file,guidance.date,user.dosen_wali,guidance.id');
    $this->db->from('user');
    $this->db->join('guidance', 'guidance.id_mhs = user.id');
    $this->db->where('guidance.status_file', 'Disetujui Adminlaa');
    return $this->db->get()->result_array();
  }

  public function getThesisLecturer()
  {
    $this->db->select('thesis_lecturers.*, guidance.id');
    $this->db->from('thesis_lecturers');
    $this->db->join('guidance', 'guidance.id = thesis_lecturers.id_guidance');
    return $this->db->get()->result_array();
  }

  public function getCheckThesisLecturer($id_guidance)
  {
    $this->db->select('guidance.id');
    $this->db->from('guidance');
    $this->db->join('thesis_lecturers', 'guidance.id = thesis_lecturers.id_guidance');
    $this->db->where('guidance.id', $id_guidance);
    return count($this->db->get()->result_array());
  }

  public function getDosen()
  {
    $this->db->select('id,name,kuota_bimbingan,kuota_penguji,prodi');
    $this->db->from('user');
    $this->db->where('role_id', 3);
    $this->db->where('is_active', 1);
    return $this->db->get()->result_array();
  }

  public function countStatusBimbingan($id)
  {
    $this->db->select('id');
    $this->db->from('thesis_lecturers');
    $this->db->where('dosen_pembimbing1', $id);
    $this->db->or_where('dosen_pembimbing2', $id);
    return count($this->db->get()->result_array());
  }

  public function countStatusPenguji($id)
  {
    $this->db->select('id');
    $this->db->from('thesis_lecturers');
    $this->db->where('dosen_penguji1', $id);
    $this->db->or_where('dosen_penguji2', $id);
    return count($this->db->get()->result_array());
  }
}
