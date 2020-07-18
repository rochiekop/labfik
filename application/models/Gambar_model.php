<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function home()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'random');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function read($slug_tampilan)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where('slug_tampilan', $slug_tampilan);
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
}
