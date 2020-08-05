<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('child_kategori.*,
        kategori.nama_kategori');
        $this->db->from('child_kategori');
        $this->db->join('kategori', 'kategori.id_kategori = child_kategori.id_kategori', 'left');
        $this->db->group_by('child_kategori.id_ck');
        $this->db->order_by('id_ck', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_kat()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_ck)
    {
        $this->db->select('*');
        $this->db->from('child_kategori');
        $this->db->where('id_ck', $id_ck);
        $this->db->order_by('id_ck', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data)
    {
        $this->db->insert('child_kategori', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_ck', $data['id_ck']);
        $this->db->update('child_kategori', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_ck', $data['id_ck']);
        $this->db->delete('child_kategori', $data);
    }

    function fetch_child($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('nama_child', 'asc');
        $query = $this->db->get('child_kategori');
        $output = '<option value="Select Peminatan">Select Peminatan</option>';
        if ($id_kategori == 1) {
            foreach ($query->result() as $row) {
                $output .= '<option value="' . $row->id_ck . '">' . $row->nama_child . '</option>';
            }
        } else {
            $output = '<a value="Select Peminatan" readonly>Select Peminatan</a>';
        }
        return $output;
    }
}
