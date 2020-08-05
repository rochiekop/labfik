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

}