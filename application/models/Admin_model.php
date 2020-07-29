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

  public function activationrequest()
  {
    $query = "SELECT `user`.* FROM 
              `user` WHERE `user`.`role_id` = 3 AND `user`.`is_active` = 0 AND 
              NOT EXISTS (SELECT  `user_token`.`email` 
              FROM `user_token` WHERE  `user`.`email` = `user_token`.`email`)";
    return $this->db->query($query)->result_array();
  }
}
