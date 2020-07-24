<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model
{
    private $_table = "notification";

    public $id;
    public $booking_id;
    public $borrowing_id;
    public $chat_id;
    public $gallery_id;
    public $news_id;
    public $description;
    public $date;
    public $status;

    public function rules()
    {
        return [
            
        ];
    }

    public function getBorrowingNotificationByUserId($user_id)
    {
        $this->db->select('item.image, item.name, borrowing.quantity as borrowing_quantity, borrow.date');
        $this->db->from('user');
        $this->db->join()
    }

}