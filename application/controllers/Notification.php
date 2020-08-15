<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        {
            $this->load->model('notification_model');
            $this->load->model('borrowing_model');
            $this->load->library('form_validation');
            is_logged_in();
        }
    }

    public function index()
    {
        $data['notification'] = $this->notification_model->getAllNotification($status);
        
        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4') {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        } else if ($this->session->userdata('role_id') == '2') {
            $this->load->view("templates/dashboard/headerKaur");
            $this->load->view("templates/dashboard/sidebarKaur");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1') {
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
    }

    public function listNotification()
    {
        $data["borrowing"] =
        $data["booking"] = 
        $data["creation"] = 
        $data["info"] =  
    }

    public function listBorrowingNotification($status, $user_id)
    {
        $data["notification"] = $this->notification_model->getAllBorrowingNotification($status, $user_id);

        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4') {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        } else if ($this->session->userdata('role_id') == '2') {
            $this->load->view("templates/dashboard/headerKaur");
            $this->load->view("templates/dashboard/sidebarKaur");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1') {
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
    }

    public function listBorrowingNotificationById()
    {
        $user_id = $this->session->userdata('id');
        $data["notification"] = $this->notification_model->getAllBorrowingNotification('respond', $user_id);

        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4') {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        } else if ($this->session->userdata('role_id') == '2') {
            $this->load->view("templates/dashboard/headerKaur");
            $this->load->view("templates/dashboard/sidebarKaur");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1') {
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("notification/notification", $data);
            $this->load->view("templates/dashboard/footer");
        }
    }

    public function changeStatusRead($subject, $id)
    {
        $this->notification_model->updateNotificationStatusRead($id);
        
    }
    
    public function changeStatusReadBorrowing($id)
    {
        $this->notification_model->updateNotificationStatusRead($id);
        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4' or $this->session->userdata('role_id') == '1')
        {
            redirect(site_url('borrowing/listAllById/'.$this->session->userdata('id')));
        }
        else if ($this->session->userdata('role_id') == '2')
        {
            redirect(site_url('borrowing/listAllWaiting'));
        }
    } 

}