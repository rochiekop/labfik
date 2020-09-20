<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tampilan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->where('tampilan.id', $this->session->userdata('id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listingad()
    {
        $this->db->select('tampilan.*,
        user.name,
        user_role.role,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('user_role', 'user.role_id = user_role.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listingkat()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->where(array('tampilan.id_kategori' => '1'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function kategori2()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->where(array('tampilan.id_kategori' => '2'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function kategori3()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->where(array('tampilan.id_kategori' => '5'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function kategori4()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->where(array('tampilan.id_kategori' => '6'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function kategori5()
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori,
        child_kategori.id_ck,
        child_kategori.nama_child');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->join('child_kategori', 'child_kategori.id_ck = tampilan.id_ck', 'left');
        $this->db->where(array('tampilan.id_kategori' => '7'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_tampilan)
    {
        $this->db->select('*');
        $this->db->from('tampilan');
        $this->db->where('id_tampilan', $id_tampilan);
        $this->db->order_by('id_tampilan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah($data)
    {
        $this->db->insert('tampilan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_tampilan', $data['id_tampilan']);
        $this->db->update('tampilan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_tampilan', $data['id_tampilan']);
        $this->db->delete('tampilan', $data);
    }

    public function slider()
    {
        $this->db->select('tampilan.*,user.name');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('views', 'desc');
        $this->db->limit(4);
        $where = "views >= 1";
        $where1 = "type IN ('Video', 'Foto')";
        $this->db->where($where);
        $this->db->where(array('tampilan.status' => 'Diterima'));
        $this->db->where($where1);
        $query = $this->db->get();
        return $query->result();
    }
}
