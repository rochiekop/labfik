<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{


  // MODEL LABORATORIUM
  public function getAllDtLab()
  {
    return $this->db->get('informations')->result_array();
  }
  public function getDtLabById($id)
  {
    return $this->db->get_where('informations', ['id_info' => $id])->row_array();
  }


  // MODEL FOR INFORMAION
  public function getAllDtInfoDesc()
  {
    $query = "SELECT * FROM `tb_info` ORDER BY `id` DESC";
    return $this->db->query($query)->result_array();
  }

  public function getDtInfoById($id)
  {
    return $this->db->get_where('tb_info', ['id' => $id])->row_array();
  }


  public function upload()
  {
    $query = "SELECT `role` from `user_role` where `id` = " . $this->session->userdata('role_id');
    return $this->db->query($query)->row_array();
  }

  // MODEL FOR PANEL

  public function getDtPanel()
  {
    $query = $this->db->get('tb_panel')->result_array();
    return $query;
  }

  public function deleteDataPanel($id)
  {
    $this->db->delete('tb_panel', array('id' => $id));
  }

  public function getDtPanelById($id)
  {
    return $this->db->get_where('tb_panel', ['id' => $id])->row_array();
  }

  // MODEL FOR SLIDER

  public function getDtSliderById($id)
  {
    return $this->db->get_where('tb_slider', ['id' => $id])->row_array();
  }

  public function getAllDtSlider()
  {
    return $this->db->get('tb_slider')->result_array();
  }
  public function getDtSlider()
  {
    $query = "SELECT * FROM `tb_slider` ORDER BY `id` DESC LIMIT 3";
    return $this->db->query($query)->result_array();
  }
  public function getAllDtSliderDesc()
  {
    $query = "SELECT * FROM `tb_slider` ORDER BY `id` DESC";
    return $this->db->query($query)->result_array();
  }
}
