<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_search extends CI_Model
{
  function fetch_data($query)
  {
    $this->db->select('GROUP_CONCAT(user.name SEPARATOR " , ") as dosen_name,thesis.*');
    $this->db->from('user');
    $this->db->join('dosbing', 'user.id = dosbing.id_dosen');
    $this->db->join('guidance', 'dosbing.id_guidance = guidance.id');
    $this->db->join('thesis', 'thesis.id_guidance = guidance.id');
    $this->db->where('id_mhs', $this->session->userdata('id'));
    $this->db->group_by('thesis.id');
    // if ($query != '') {
    // $this->db->like('user.dosen_name', $query);
    //   $this->db->or_like('thesis.keterangan', $query);
    //   $this->db->or_like('thesis.date', $query);
    //   $this->db->or_like('thesis.status', $query);
    // }
    $this->db->order_by('id_mhs', 'ASC');
    return $this->db->get()->result_array();
  }

  public function fetchdatakategori($filter = null, $query = null)
  {
    $this->db->select('*');
    $this->db->from('kategoriruangan');
    if ($filter != 'Filter' or $filter != 'Semua') {
      $this->db->like('kategori', $filter);
    }
    if ($query != '') {
      $this->db->like('kategori', $query);
      $this->db->or_like('date_created', $query);
    }

    $this->db->order_by('kategori', 'ASC');
    return $this->db->get()->result_array();
  }

  public function fetchdataslider($query = null, $filter = null)
  {
    $this->db->select('*');
    $this->db->from('tb_slider');
    if ($filter == 'Judul') {
      $this->db->like('title', $query);
    } elseif ($filter == 'Deskripsi') {
      $this->db->like('body', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('date', $query);
    } else {
      $this->db->like('body', $query);
      $this->db->or_like('title', $query);
      $this->db->or_like('date', $query);
    }
    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result_array();
  }
  public function fetchdatainfo($query = null, $filter = null)
  {
    $this->db->select('*');
    $this->db->from('tb_info');
    if ($filter == 'Judul') {
      $this->db->like('title', $query);
    } elseif ($filter == 'Deskripsi') {
      $this->db->like('body', $query);
    } elseif ($filter == 'Upload') {
      $this->db->like('uploadby', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('date', $query);
    } else {
      $this->db->like('body', $query);
      $this->db->or_like('title', $query);
      $this->db->or_like('uploadby', $query);
      $this->db->or_like('date', $query);
    }
    $this->db->order_by('id', 'DESC');
    return $this->db->get()->result_array();
  }
  public function fetchdatalab($query = null, $filter = null)
  {
    $this->db->select('*');
    $this->db->from('tb_lab');
    if ($filter == 'Judul') {
      $this->db->like('title', $query);
    } elseif ($filter == 'Deskripsi') {
      $this->db->like('body', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('date', $query);
    } else {
      $this->db->like('body', $query);
      $this->db->or_like('title', $query);
      $this->db->or_like('date', $query);
    }
    return $this->db->get()->result_array();
  }
}
