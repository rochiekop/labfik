<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{


  public function getAllDataBooking()
  {
    return $this->db->get('booking')->result_array();
  }

  public function getByUserId($id)
  {
    $this->db->select('user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,booking.date,booking.date_declined,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where('id_peminjam', $id);
    // $this->db->order_by('booking.date', 'asc');
    return $this->db->get()->result_array();
  }


  public function getDateFromInput($date, $id_ruangan)
  {
    $this->db->select('GROUP_CONCAT(time SEPARATOR ",") as time');
    $this->db->from('booking');
    $this->db->where('date', $date);
    $this->db->where('id_ruangan', $id_ruangan);
    $data =  $this->db->get()->row_array();
    return $data;
  }

  public function getAllBooking()
  {
    $this->db->select('booking.id,user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,booking.date,booking.date_declined,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->order_by('booking.date', 'desc');
    return $this->db->get()->result_array();
  }

  public function getAllWaitingAccBooking()
  {
    $this->db->select('booking.id,user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,booking.date,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where(array('booking.status' => 'Menunggu Acc'));
    $this->db->order_by('booking.date', 'asc');
    return $this->db->get()->result_array();
  }


  public function getAllAccepted()
  {
    $this->db->select('booking.id,user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,booking.date,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where(array('booking.status' => 'Diterima'));
    $this->db->order_by('booking.date', 'asc');
    return $this->db->get()->result_array();
  }

  public function getAllDeclined()
  {
    $this->db->select('booking.id,user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,booking.date,booking.date_declined,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where(array('booking.status' => 'Ditolak'));
    $this->db->order_by('booking.date', 'asc');
    return $this->db->get()->result_array();
  }

  public function changeStatusAccepted($id)
  {
    $data = array(
      'status' => 'Diterima',
    );
    $this->db->update('booking', $data, ['id' => $id]);
  }

  public function changeStatusDeclined($id, $date)
  {
    $data = array(
      'date' => 'NULL',
      'date_declined' => $date,
      'status' => 'Ditolak',
    );
    $this->db->update('booking', $data, ['id' => $id]);
  }

  public function fetchRuangan($id_kategori)
  {
    $this->db->where('id_kategori', $id_kategori);
    $this->db->order_by('ruangan', 'asc');
    $query = $this->db->get('ruangan');
    $output = '<option disabled selected value="">Pilih Ruangan</option>';
    foreach ($query->result() as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->ruangan . '</option>';
    }
    return $output;
  }
  public function validate_name()
  {
    $name = $this->input->post('name');
    $sql = "SELECT * FROM user WHERE name = ?";
    $query = $this->db->query($sql, array($name));
    return ($query->num_rows() == 0) ? false : true;
  }

  public function getIdByname($name)
  {
    $this->db->select('id');
    $this->db->from('user');
    $this->db->where('name', $name);
    return $this->db->get()->row()->id;
  }
}
