<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
{
    private $_table = "item";

    public $id;
    public $name;
    public $quantity;
    public $access;
    public $image = "default.png";
    public $description;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'quantity',
            'label' => 'Quantity',
            'rules' => 'numeric'],

            ['field' => 'access',
            'label' => 'Price',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->name = $post["name"];
        $this->quantity = $post["quantity"];
        $this->access = $post["access"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->name = $post["name"];
        $this->quantity = $post["quantity"];
        $this->access = $post["access"];

        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/item/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $item = $this->getById($id);
        if ($item->image != "default.jpg") {
            $filename = explode(".", $item->image)[0];
            return array_map('unlink', glob(FCPATH."uploads/item/$filename.*"));
        }
    }

    public function allItem()
    {
        $this->db->select('*');
        $this->db->from('item');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function searchItem($search){
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('name', $search);
        $this->db->or_where('quantity', $search);
        $this->db->or_where('access', $search);
        $this->db->or_where('description', $search);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}