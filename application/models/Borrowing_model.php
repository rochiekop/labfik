<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowing_model extends CI_Model
{
    private $_table = "booking";
    private $_table2 = "item";
    private $_table3 = "user";

    public $id;
    public $item_id;
    public $borrow_quality;
    public $borrow_time;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'borrow_quality',
            'label' => 'Borrow_quality',
            'rules' => 'numeric'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],
        ];
    }

    public function getAllBorrowing()
    {
        $this->db->select('borrowing.*,item.*,user.id');
        $this->db->from('borrowing');
        $this->db->join('item','item.id=borrowing.item_id');
    }

    public function 


}