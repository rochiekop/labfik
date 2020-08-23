<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function homef()
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
        $this->db->where(array('tampilan.status' => 'Diterima'));
        $this->db->where(array('tampilan.type' => 'Foto'));
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function homep()
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
        $this->db->where(array('tampilan.status' => 'Diterima'));
        $this->db->where(array('tampilan.type' => 'pdf'));
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function homev()
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
        $this->db->where(array('tampilan.type' => 'Video'));
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }

    public function mintaacc()
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
        $this->db->where(array('tampilan.status' => 'Menunggu Acc'));
        $query = $this->db->get();
        return $query->result();
    }

    public function listingacc()
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
        $this->db->where(array('tampilan.status' => 'Diterima'));
        $query = $this->db->get();
        return $query->result();
    }

    public function listingdec()
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
        $this->db->where(array('tampilan.status' => 'Ditolak'));
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

    public function changeStatusAccepted($id)
    {
        $data = array(
            'status' => 'Diterima',
        );
        $this->db->update('tampilan', $data, ['id_tampilan' => $id]);
    }

    public function changeStatusDeclined($id)
    {
        $data = array(
            'status' => 'Ditolak',
        );
        $this->db->update('tampilan', $data, ['id_tampilan' => $id]);
    }

    public function hitung()
    {
        $this->db->select('*');
        $this->db->from('tampilan');
        $this->db->where(array('tampilan.status' => 'Menunggu Acc'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
