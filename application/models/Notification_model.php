<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    private $_table = "notification";

    // public $id;
    // public $booking_id;
    // public $borrowing_id;
    // public $chat_id;
    // public $gallery_id;
    // public $news_id;
    // public $description;
    // public $date;
    // public $status;

    public function rules()
    {
        return [
            
        ];
    }

    public function getAllNotificationByUserId($user_id)
    {

    }

    public function getAllBorrowingNotificationByUserId($user_id)
    {
        $this->db->select('item.image, item.name, borrowing.quantity as borrowing_quantity, borrowing.status as borrowing_status, notification.description, notification.status as notification_status, notification.date');
        $this->db->from('notification');
        $this->db->join('borrowing','notification.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('notification.user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllBorrowingRequestNotification()
    {
        $this->db->select('item.image, item.name, borrowing.quantity as borrowing_quantity, notification.description, notification.date');
        $this->db->from('notification');
        $this->db->join('borrowing','notification.borrowing_id=borrowing.id');
        $this->db->join('item','borrowing.item_id=item.id');
        $this->db->where('notification.description', 'Barang ini ingin dipinjam');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function saveBorrowingNotification($description)
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->user_id = $post['user_id'];
        $this->borrowing_id = $post['id'];
        $this->description = $description;
        $this->db->insert($this->_table, $this);
    }

    public function updateNotificationStatusRead($id)
    {
        $data = array(
            'status' => 'read'
        );
        $this->db->update('notification',$data,array('id' => $id));
    }

}