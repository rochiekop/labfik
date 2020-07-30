<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    private $_table = "notification";

    public function rules()
    {
        return [
            
        ];
    }

    public function getAllNotificationByUserId($user_id)
    {

    }

    public function getAllBorrowingNotification($status, $user_id)
    {
        if ($status == 'request')
        {
            $this->db->select('item.image, item.name, borrowing.quantity, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('borrowing','notification.borrowing_id=borrowing.id');
            $this->db->join('item','borrowing.item_id=item.id');
            $this->db->where('notification.description', 'Barang ini ingin dipinjam');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else if ($status == 'respond')
        {
            $this->db->select('item.image, item.name, borrowing.quantity, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('borrowing','notification.borrowing_id=borrowing.id');
            $this->db->join('item','borrowing.item_id=item.id');
            $this->db->where('borrowing.user_id', $user_id);
            $this->db->group_start();
                $this->db->where('notification.description', 'Peminjaman diizinkan');
                $this->db->or_where('notification.description', 'Peminjaman tidak diizinkan');
            $this->db->group_end();
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function getAllBookingNotification($status, $user_id)
    {
        if ($status == 'request')
        {
            $this->db->select('ruangan.ruangan, ruangan.images, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('booking', 'notification.booking_id = booking.id');
            $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
            $this->db->where('notification.description', 'waiting');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else if ($status == 'respond')
        {
            $this->db->select('ruangan.ruangan, ruangan.images, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('booking', 'notification.booking_id = booking.id');
            $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
            $this->db->where('booking.id_peminjam', $user_id);
            $this->db->group_start();
                $this->db->where('notification.description', 'approved');
                $this->db->or_where('notification.description', 'declined');
            $this->db->group_end();
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function getAllCreationNotification($status, $user_id)
    {
        if ($status == 'request')
        {
            $this->db->select('tampilan.gambar, tampilan.judul, notification.id, notification.description, notification.date, notification.status')
            $this->db->from('notification');
            $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');
            $this->db->where('notification.description', 'waiting');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
        else if ($status == 'respond')
        {
            $this->db->select('tampilan.gambar, tampilan.judul, notification.id, notification.description, notification.date, notification.status')
            $this->db->from('notification');
            $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');
            $this->db->where('tampilan.id', $user_id);
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function getAllInformationNotification()
    {
        $this->db->select('tb_info.title, tb_info.images, notification.date');
        $this->db->from('notification');
        $this->db->join('tb_info', 'notification.info_id = tb_info.id');
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

    public function assignBorrowingNotification($user_id, $borrowing_id, $description)
    {
        $this->id = uniqid();
        $this->user_id = $user_id;
        $this->borrowing_id = $borrowing_id;
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