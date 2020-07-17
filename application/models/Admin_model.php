<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


  // MODEL RUANGAN
  public function kategoriRuangan()
  {
    return $this->db->get('kategoriruangan')->result_array();
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
