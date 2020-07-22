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
    return $this->db->get_where('ruangan', ['id' => $id])->result_array();
  }
  public function getDateFromInput($date, $id_ruangan)
  {
    $this->db->select('GROUP_CONCAT(time SEPARATOR ",") as time');
    // $this->db->select('time');
    $this->db->from('booking');
    $this->db->where('date', $date);
    $this->db->where('id_ruangan', $id_ruangan);

    $data =  $this->db->get()->row_array();
    // $result = array_column($data, 'time');
    return $data;
  }
}
