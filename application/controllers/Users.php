<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('pagination');
    $this->load->model('user_model');
    $this->load->model('admin_model');
    $this->load->library('encryption');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $data['dt_tempat'] = $this->user_model->getAllDtTempat();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/index');
    $this->load->view('templates/dashboard/footer');
  }

  public function pinjamt($id)
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $id = decrypt_url($id);
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $data['dt_tempat'] = $this->user_model->getAllDtTempat();
    $data['tempatbyid'] = $this->admin_model->getDtTempatById($id);
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/pinjamtempat');
    $this->load->view('templates/dashboard/footer');
  }
  public function helpdesk()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/helpdesk');
    $this->load->view('templates/dashboard/footer');
  }
}
