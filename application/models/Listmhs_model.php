<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listmhs_model extends CI_Model
{

  public function getAllMhsPendaftarTA()
  {
    $this->db->select('user.name,guidance.date,user.nim,user.prodi,user.id,guidance.peminatan,guidance.status_file,user.dosen_wali, guidance.id as id_guidance');
    $this->db->from('guidance');
    $this->db->join('user', 'guidance.id_mhs = user.id');
    $this->db->order_by('guidance.id', 'desc');
    return $this->db->get()->result_array();
  }

  public function getKodeDosenById($doswal)
  {
    $this->db->select('kode_dosen');
    $this->db->from('user');
    $this->db->where('id', $doswal);
    return $this->db->get()->row_array();
  }
}
