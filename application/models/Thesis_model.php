<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis_model extends CI_Model
{
    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        // $this->name = $post["name"];
        // $this->quantity = $post["quantity"];
        // $this->access = $post["access"];
        // $this->image = $this->_uploadImage();
        // $this->description = $post["description"];
        $this->textarea_file = $post['thesis'];
        $this->db->insert('thesis', $this);
    }

    public function getCorrection()
    {
        $this->db->select('textarea_file');
        $this->db->from('thesis');
        $this->db->where('id', '5f2ab4d8b3010');
        $query = $this->db->get();
        $result = $query->result();
        return $result;

        // return $this->db->get_where('thesis', ["id" => "5f2ab4d8b3010"])->row();
    }

}