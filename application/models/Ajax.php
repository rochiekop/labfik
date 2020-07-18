<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Model
{
    function fetch_data($limit, $start)
    {

        $this->db->select("tampilan.*,
        user.name");
        $this->db->from("tampilan");
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->order_by("id_tampilan", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function fetch_data1($limit, $start)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where(array('tampilan.id_kategori' => '1'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function kategori2($limit, $start)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where(array('tampilan.id_kategori' => '2'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function kategori3($limit, $start)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where(array('tampilan.id_kategori' => '5'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function kategori4($limit, $start)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where(array('tampilan.id_kategori' => '6'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function kategori5($limit, $start)
    {
        $this->db->select('tampilan.*,
        user.name,
        kategori.nama_kategori,
        kategori.slug_kategori');
        $this->db->from('tampilan');
        $this->db->join('user', 'user.id = tampilan.id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = tampilan.id_kategori', 'left');
        $this->db->where(array('tampilan.id_kategori' => '7'));
        $this->db->group_by('tampilan.id_tampilan');
        $this->db->order_by('id_tampilan', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    function update_counter($slug_tampilan)
    {
        //return current article views
        $this->db->where('slug_tampilan', urldecode($slug_tampilan));
        $this->db->select('views');
        $count = $this->db->get('tampilan')->row();
        // then increase by one
        $this->db->where('slug_tampilan', urldecode($slug_tampilan));
        $this->db->set('views', ($count->views + 1));
        $this->db->update('tampilan');
    }
}
