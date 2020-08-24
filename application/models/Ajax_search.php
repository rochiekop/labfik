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

  public function fetchdatakaryaadmin($query = null, $filter = null)
  {
    $this->db->select('tampilan.*,
    kategori.nama_kategori');
    $this->db->from('tampilan');
    $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
    if ($filter == 'Judul') {
      $this->db->like('judul', $query);
    } elseif ($filter == 'Deskripsi') {
      $this->db->like('deskripsi', $query);
    } elseif ($filter == 'Nama') {
      $this->db->like('nama', $query);
    } else {
      $this->db->like('judul', $query);
      $this->db->or_like('deskripsi', $query);
      $this->db->or_like('nama', $query);
    }
    return $this->db->get()->result_array();
  }

  public function fetchdatakarya($query = null, $filter = null)
  {
    $this->db->select('tampilan.*,
    user.name,
    kategori.nama_kategori');
    $this->db->from('tampilan');
    $this->db->join('user', 'user.id = tampilan.id', 'left');
    $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
    $this->db->where('tampilan.id', $this->session->userdata('id'));
    $this->db->group_start();
    if ($filter == 'Judul') {
      $this->db->like('judul', $query);
    } elseif ($filter == 'Deskripsi') {
      $this->db->like('deskripsi', $query);
    } elseif ($filter == 'Nama') {
      $this->db->like('nama', $query);
    } else {
      $this->db->like('judul', $query);
      $this->db->or_like('deskripsi', $query);
      $this->db->or_like('nama', $query);
    }
    $this->db->group_end();
    // $this->db->order_by('id_tampilan', 'DESC');
    $this->db->order_by('tampilan.id_tampilan');
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
    $this->db->where('booking.id_peminjam', $this->session->userdata('id'));
    $this->db->group_start();
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
      $this->db->or_like('user.name', $query);
      $this->db->or_like('booking.date', $query);
      $this->db->or_like('booking.date_declined', $query);
      $this->db->or_like('booking.time', $query);
      $this->db->or_like('booking.keterangan', $query);
      $this->db->or_like('booking.status', $query);
      $this->db->or_like('kategoriruangan.kategori', $query);
    }
    // $this->db->order_by('booking.date', 'asc');
    $this->db->group_end();
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

  public function fetchdatabimbingan($idguidance, $query = null, $filter = null)
  {
    $this->db->select('thesis.*,guidance.*,dosbing.*,GROUP_CONCAT(user.name SEPARATOR " , ") as name');
    $this->db->from('thesis');
    $this->db->join('guidance', 'thesis.id_guidance = guidance.id');
    $this->db->join('dosbing', 'guidance.id = dosbing.id_guidance');
    $this->db->join('user', 'dosbing.id_dosen = user.id');
    $this->db->where('thesis.id_guidance', $idguidance);
    $this->db->group_start();
    if ($filter == 'Dosen') {
      $this->db->like('user.name', $query);
    } elseif ($filter == 'Keterangan') {
      $this->db->like('thesis.keterangan', $query);
    } elseif ($filter == 'Tanggal') {
      $this->db->like('thesis.date', $query);
    } elseif ($filter == 'Status') {
      $this->db->like('thesis.status', $query);
    } else {
      $this->db->like('thesis.keterangan', $query);
      $this->db->or_like('user.name', $query);
      $this->db->or_like('thesis.date', $query);
      $this->db->or_like('thesis.status', $query);
    }
    $this->db->group_end();
    $this->db->group_by('thesis.id');
    // $this->db->order_by('id', 'DESC');
    return $this->db->get()->result_array();
  }

  public function fetchdatarequesttoken($query = null, $filter = null)
  {
    $this->db->select('user.*,');
    $this->db->from('user');
    $this->db->where('user.role_id', 3);
    $this->db->where('user.is_active', 0);
    $this->db->where('NOT EXISTS(SELECT  `user_token`.`email` 
                      FROM `user_token` WHERE  `user`.`email` = `user_token`.`email`)');
    $this->db->group_start();
    if ($filter == 'Username') {
      $this->db->like('user.username', $query);
    } elseif ($filter == 'Nama') {
      $this->db->like('user.name', $query);
    } elseif ($filter == 'Email') {
      $this->db->like('user.email', $query);
    } else {
      $this->db->like('user.username', $query);
      $this->db->or_like('user.email', $query);
      $this->db->or_like('user.name', $query);
    }
    $this->db->group_end();
    return $this->db->get()->result_array();
  }

  public function fetchdatapermintaanbimbingan($query = null, $filter = null)
  {
    $this->db->select('dosbing.id,user.name,user.nim,user.prodi,dosbing.status,guidance.judul');
    $this->db->from('dosbing');
    $this->db->join('guidance', 'dosbing.id_guidance = guidance.id');
    $this->db->join('user', 'guidance.id_mhs = user.id');
    $this->db->where('dosbing.id_dosen', $this->session->userdata('id'));
    $this->db->group_start();
    if ($filter == 'Nama') {
      $this->db->like('user.name', $query);
    } elseif ($filter == 'NIM') {
      $this->db->like('user.nim', $query);
    } elseif ($filter == 'Prodi') {
      $this->db->like('user.prodi', $query);
    } elseif ($filter == 'Judul') {
      $this->db->like('guidance.judul', $query);
    } elseif ($filter == 'Status') {
      $this->db->like('dosbing.status', $query);
    } else {
      $this->db->like('user.name', $query);
      $this->db->or_like('user.nim', $query);
      $this->db->or_like('user.prodi', $query);
      $this->db->or_like('guidance.judul', $query);
      $this->db->or_like('dosbing.status', $query);
    }
    $this->db->group_end();
    return $this->db->get()->result_array();
  }
}
