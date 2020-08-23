<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    private $_table = "notification";

    public function rules()
    {
        return [];
    }

    public function getAllNotification($status)
    {
        if ($status == 'request') {
            $this->db->select('notification.*, item.*, borrowing.*, ruangan.*, booking.*, tampilan.*, tb_info.*, guidance.*, thesis.*');

            $this->db->from('notification');

            $this->db->join('borrowing', 'notification.borrowing_id = borrowing.id');
            $this->db->join('item', 'borrowing.item_id = item.id');

            $this->db->join('booking', 'notification.booking_id = booking.id');
            $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');

            $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');

            $this->db->join('tb_info', 'notification.info_id = tb_info.id');

            $this->db->join('guidance', 'notification.guidance_id = guidance.id');
            $this->db->join('thesis', 'thesis.id_guidance = guidance.id');

            $this->db->where('notification.description', 'waiting');
            $this->db->or_where('notification.description', 'Barang ini ingin dipinjam');

            $query = $this->db->get();
            $result = $query->result();
            return $result;

        } else if ($status == 'respond') {
            // $this->db->select('notification.*, item.*, borrowing.*, ruangan.*, booking.*, tampilan.*, tb_info.*, guidance.*, thesis.*');
            $this->db->select('notification.*');

            $this->db->from('notification');

            $this->db->join('borrowing', 'notification.borrowing_id = borrowing.id');
            $this->db->join('item', 'borrowing.item_id = item.id');

            // $this->db->join('booking', 'notification.booking_id = booking.id');
            // $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');

            // $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');

            // $this->db->join('tb_info', 'notification.info_id = tb_info.id');

            // $this->db->join('guidance', 'notification.guidance_id = guidance.id');
            // $this->db->join('thesis', 'thesis.id_guidance = guidance.id');

            // $this->db->where('notification.user_id', $this->session->userdata('id'));
            // $this->db->group_start();
            //     $this->db->where('notification.description', 'Peminjaman diizinkan');
            //     $this->db->or_where('notification.description', 'Peminjaman tidak diizinkan');
            //     $this->db->or_where('notification.description', 'accepted');
            //     $this->db->or_where('notification.description', 'declined');
            // $this->db->group_end();

            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function getAllBorrowingNotification($status, $user_id)
    {
        if ($status == 'request') {
            $this->db->select('item.image, item.name, borrowing.quantity, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('borrowing', 'notification.borrowing_id=borrowing.id');
            $this->db->join('item', 'borrowing.item_id=item.id');
            $this->db->where('notification.description', 'Barang ini ingin dipinjam');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        } else if ($status == 'respond') {
            $this->db->select('item.image, item.name, borrowing.quantity, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('borrowing', 'notification.borrowing_id=borrowing.id');
            $this->db->join('item', 'borrowing.item_id=item.id');
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
        if ($status == 'request') {
            $this->db->select('ruangan.ruangan, ruangan.images, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('booking', 'notification.booking_id = booking.id');
            $this->db->join('ruangan', 'booking.id_ruangan = ruangan.id');
            $this->db->where('notification.description', 'waiting');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        } else if ($status == 'respond') {
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

    public function getAllCreationNotification($status)
    {
        if ($status == 'request') {
            $this->db->select('tampilan.gambar, tampilan.judul, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');
            $this->db->where('notification.description', 'waiting');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        } else if ($status == 'respond') {
            $this->db->select('tampilan.gambar, tampilan.judul, notification.id, notification.description, notification.date, notification.status');
            $this->db->from('notification');
            $this->db->join('tampilan', 'notification.creation_id = tampilan.id_tampilan');
            $this->db->where('tampilan.id', $this->session->userdata('id'));
            $this->db->group_start();
            $this->db->where('notification.description', 'approved');
            $this->db->or_where('notification.description', 'declined');
            $this->db->group_end();
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function getAllInfoNotification()
    {
        $this->db->select('tb_info.title, tb_info.images, notification.date');
        $this->db->from('notification');
        $this->db->join('tb_info', 'notification.info_id = tb_info.id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllThesisNotification($status)
    {
        if ($status == 'request') {
            $this->db->select('notification.*, guidance.*, thesis.*');
            $this->db->from('notification');
            $this->db->join('guidance', 'notification.guidance_id = guidance.id');
            $this->db->join('dosbing', 'dosbing.id_guidance = dosbing.id');
            $this->db->join('thesis', 'thesis.id_guidance = guidance.id');
            $this->db->where('dosbing.id_dosen', $this->session->userdata('id'));
            $this->db->where('notification.description', 'waiting');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        } else if ($status == 'respond') {
            $this->db->select('notification.*, guidance.*, thesis.*');
            $this->db->from('notification');
            $this->db->join('guidance', 'notification.guidance_id = guidance.id');
            $this->db->join('dosbing', 'dosbing.id_guidance = dosbing.id');
            $this->db->join('thesis', 'thesis.id_guidance = guidance.id');
            $this->db->where('notification.user_id', $this->session->userdata('id'));
            $this->db->group_start();
            $this->db->where('notification.description', 'ready');
            $this->db->or_where('notification.description', 'correction');
            $this->db->group_end();
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
    }

    public function saveNotification($feature, $description)
    {
        if ($feature == 'borrowing') {
            $post = $this->input->post();
            $this->id = uniqid();
            $this->user_id = $post['user_id'];
            $this->borrowing_id = $post['id'];
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'booking') {
            $post = $this->input->post();
            $this->id = uniqid();
            $this->user_id = $post['user_id'];
            $this->booking_id = $post['id'];
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'creation') {
            $post = $this->input->post();
            $this->id = uniqid();
            $this->user_id = $post['user_id'];
            $this->creation_id = $post['id'];
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'info') {
            $post = $this->input->post();
            $this->id = uniqid();
            $this->user_id = $post['user_id'];
            $this->info_id = $post['id'];
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'thesis') {
            $post = $this->input->post();
            $this->id = uniqid();
            $this->user_id = $post['user_id'];
            $this->thesis_id = $post['id'];
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        }
    }

    public function assignNotification($feature, $user_id, $feature_id, $description)
    {
        if ($feature == 'borrowing') {
            $this->id = uniqid();
            $this->user_id = $user_id;
            $this->borrowing_id = $feature_id;
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'booking') {
            $this->id = uniqid();
            $this->user_id = $user_id;
            $this->booking_id = $feature_id;
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'creation') {
            $this->id = uniqid();
            $this->user_id = $user_id;
            $this->creation_id = $feature_id;
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        } else if ($feature == 'thesis') {
            $this->id = uniqid();
            $this->user_id = $user_id;
            $this->thesis_id = $feature_id;
            $this->description = $description;
            $this->db->insert($this->_table, $this);
        }
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
        $this->db->update('notification', $data, array('id' => $id));
    }

    public function updateNotificationStatusReadAll()
    {
        $user_id = $this->session->userdata('id');
        $data = array(
            'status' => 'read'
        );
        $this->db->update('notification', $data, array('user_id' => $user_id));
    }



    // public function saveGuidance()
    // {
    //     $this->id = uniqid();
    //     $this->student_id = $this->session->userdata('id');
    //     $this->db->insert('guidance', $this);

    // }

    // public function saveDosbing()
    // {
    //     $this->id = uniqid();
    //     $this->student_id = $this->session->userdata(id);
    //     $this->lecturer_id = $post['lecturer_id'];
    //     $this->db->insert('dosbing', $this);
    // }

}
