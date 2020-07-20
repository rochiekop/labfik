<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Borrowing_model extends CI_Model
{
    private $_table = "borrowing";
    private $_table2 = "item";
    private $_table3 = "user";

    public $id;
    public $user_id;
    public $item_id;
    public $quantity;
    public $start;
    public $end;
    public $reason;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'quantitiy',
            'label' => 'Quantity',
            'rules' => 'numeric'],
        ];
    }

    public function getAllBorrowing()
    {
        // $this->db->select('borrowing.*,item.name,item.access,item.image,user.id,user.name');
        // $this->db->select('user.name as user.user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item.item_name,item.image,borrowing.quantity,borrowing.id as borrowing.borrowing_id');
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getAllWaiting()
    {
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('borrowing.status', 'Menunggu_Izin');
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getAllAccepted()
    {
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('borrowing.status', 'Diterima');
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getAllDeclined()
    {
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('borrowing.status', 'Ditolak');
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getAllDone()
    {
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('borrowing.status', 'Selesai');
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getByUserId($user_id)
    {
        $this->db->select('user.name as user_name,item.access,borrowing.start,borrowing.end,borrowing.reason,item.name as item_name,item.image,borrowing.quantity,borrowing.id as borrowing_id,borrowing.status');
        $this->db->from('user');
        $this->db->join('borrowing','borrowing.user_id=user.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('user.id', $user_id);
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function getByUserIdWithStatus($user_id, $status)
    {
        $this->db->select('borrowing.*,item*,user.id');
        $this->db->from('user');
        $this->db->join('borrowing', 'user.borrowing_id=borrowing.id');
        $this->db->join('item', 'borrowing.item_id=item.id');
        $this->db->where('user.id', $user_id);
        $this->db->where('status', $status);
        $query = $this->db->get();
        // $result = $query->result_array();
        $result = $query->result();
        return $result;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->user_id = $post['user_id'];
        $this->item_id = $post['item_id'];
        $this->quantity = $post['quantity'];
        $this->start = $post['start'];
        $this->end = $post['end'];
        $this->reason = $post['reason'];
        $this->status = "Menunggu_Izin";
        $this->db->insert($this->_table, $this);
    }

    public function updateStatusAccepted($id)
    {
        $data = array(
            'status' => 'Diterima'
        );
        $this->db->update('borrowing',$data,array('id' => $id));
    }

    public function updateStatusDeclined($id)
    {
        $data = array(
            'status' => 'Ditolak'
        );
        $this->db->update('borrowing',$data,array('id' => $id));
    }

    public function updateStatusDone($id)
    {
        $data = array(
            'status' => 'Selesai'
        );
        $this->db->update('borrowing',$data,array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    // Peminjaman Tempat
    public function check($date)
    {
        return $this->db->get('schedule', ['date' => $date])->row_array();
    }

    // public function dateinput($date)
    // {
    //     return $this->db->insert('schedule', $date);
    // }
}
