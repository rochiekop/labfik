<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlaa_model extends CI_Model
{
  public function pendaftaranta()
  {
    $this->db->select('guidance.*,user.name,user.email,user.nim,user.prodi,user.no_telp');
    $this->db->from('guidance');
    $this->db->join('user', 'guidance.id_mhs = user.id');
    $this->db->where('guidance.status', 'proses');
    return $this->db->get()->result_array();
  }

  public function getdosen()
  {
    $this->db->select('user.name,user.prodi,user.id,');
    $this->db->from('user');
    $this->db->where('role_id', '3');
    return $this->db->get()->result_array();
  }
}
