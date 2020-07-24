<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


  // MODEL RUANGAN
  public function kategoriRuangan()
  {
    $this->db->select('*');
    $this->db->from('kategoriruangan');
    $this->db->order_by('kategori', 'ASC');
    return $this->db->get()->result_array();
  }
  public function getAllDaftarTempat()
  {
    $query = "SELECT `kategoriruangan`.*,`ruangan`.* 
              FROM `kategoriruangan` JOIN `ruangan` 
              ON `kategoriruangan`.`id` = `ruangan`.`id_kategori`";
    return $this->db->query($query)->result_array();
  }

  public function getDtTempatById($id)
  {
    return $this->db->get_where('ruangan', ['id' => $id])->row_array();
  }
}
