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

  public function booking()
  {
    $this->db->select('booking.id,user_role.role,user.name,ruangan.id AS id_ruangan,ruangan.ruangan,kategoriruangan.id AS id_kategori,kategoriruangan.kategori,date(booking.date + COALESCE(booking.date_declined)) AS date,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where('booking.status !=', 'Menunggu Acc');
    $this->db->order_by('date', 'desc');
    return $this->db->get()->result_array();
  }

  public function getRuangan()
  {
    return $this->db->get('ruangan')->result_array();
  }

  public function hitungJumlahAsset()
  {
    $query = $this->db->get('tampilan');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
}
