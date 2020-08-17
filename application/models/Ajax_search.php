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

  // Riwayatpeminjamantempat
  public function fetchdatapeminjamantmpt($query = null, $filter = null)
  {
    $this->db->select('booking.id_peminjam,user_role.role,user.name,ruangan.ruangan,kategoriruangan.kategori,date(booking.date + COALESCE(booking.date_declined)) AS date,booking.date_declined,booking.time,booking.keterangan,booking.status');
    $this->db->from('booking');
    $this->db->join('user', 'booking.id_peminjam = user.id');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
    $this->db->join('kategoriruangan', 'ruangan.id_kategori = kategoriruangan.id');
    $this->db->where('booking.id_peminjam',  $this->session->userdata('id'));
    if ($filter == 'Ruangan') {
      $this->db->like('ruangan.ruangan', $query);
      $this->db->or_like('kategoriruangan.kategori', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('date', $query);
      $this->db->or_like('booking.date_declined', $query);
    } elseif ($filter == 'Waktu') {
      $this->db->like('booking.time', $query);
    } elseif ($filter == 'Keterangan') {
      $this->db->like('booking.keterangan', $query);
    } elseif ($filter == 'Status') {
      $this->db->like('booking.status', $query);
    } else {
      $this->db->like('ruangan.ruangan', $query);
      $this->db->or_like('date', $query);
      $this->db->or_like('booking.date_declined', $query);
      $this->db->or_like('booking.time', $query);
      $this->db->or_like('booking.keterangan', $query);
      $this->db->or_like('booking.status', $query);
      $this->db->or_like('kategoriruangan.kategori', $query);
    }
    // $this->db->order_by('booking.date', 'asc');
    return $this->db->get()->result_array();
  }


  // ADD Categories
  public function fetchdatatmpt($query, $filter)
  {
    $this->db->select('kategoriruangan.*, ruangan.*');
    $this->db->from('kategoriruangan');
    $this->db->join('ruangan', 'kategoriruangan.id = ruangan.id_kategori');
    $this->db->where('akses !=', 'Mahasiswa');
    if ($filter == 'Lab Batik') {
      $this->db->like('ruangan.ruangan', $query);
      $this->db->or_like('kategoriruangan.kategori', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('date', $query);
      $this->db->or_like('booking.date_declined', $query);
    } elseif ($filter == 'Waktu') {
      $this->db->like('booking.time', $query);
    } elseif ($filter == 'Keterangan') {
      $this->db->like('booking.keterangan', $query);
    } elseif ($filter == 'Status') {
      $this->db->like('booking.status', $query);
    } else {
      $this->db->like('ruangan.ruangan', $query);
      $this->db->or_like('date', $query);
      $this->db->or_like('booking.date_declined', $query);
      $this->db->or_like('booking.time', $query);
      $this->db->or_like('booking.keterangan', $query);
      $this->db->or_like('booking.status', $query);
      $this->db->or_like('kategoriruangan.kategori', $query);
    }
    return $this->db->get()->result_array();
  }
}
