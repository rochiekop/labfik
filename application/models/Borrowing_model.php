<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowing_model extends CI_Model
{
    private $_table = "borrowing";
    private $_table2 = "item";
    private $_table3 = "user";

    public $id;
    public $user_id;
    public $item_id;
    public $borrow_quality;
    public $borrow_time;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'quality',
            'label' => 'Quality',
            'rules' => 'numeric'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],
        ];
    }

    public function getAllBorrowing()
    {
        $this->db->select('borrowing.*,item.*,user.id');
        $this->db->from('user');
        $this->db->join('borrowing','user.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getAllWithStatus($status)
    {
        $this->db->select('borrowing.*,item.*,user.id');
        $this->db->from('user');
        $this->db->join('borrowing','user.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('status', $status);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getByUserId($user_id)
    {
        $this->db-select('borrowing.*,item*,user.id');
        $this->db->from('user');
        $this->db->join('borrowing','user.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('user.id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getByUserIdWithStatus($user_id, $status)
    {
        $this->db-select('borrowing.*,item*,user.id');
        $this->db->from('user');
        $this->db->join('borrowing','user.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('user.id', $user_id);
        $this->db->where('status', $status);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->item_id = $post['item_id'];
        $this->quantity = $post['quantity'];
        $this->start = $post['start'];
        $this->end = $post['end'];
        $this->reason = $post['reason'];
        $this->status = "Menunggu Izin";
        $this->db->insert($this->_table, $this);
    }

    public function updateStatusTerima($id)
    {
        $this->status = "Diterima";
        $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function updateStatusTolak($id)
    {
        $this->status = "Diterima";
        $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function updateStatusSelesai($id)
    {
        $this->status = "Selesai";
        $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }


}