<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lab extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('main_model');
    $this->load->model('user_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    // is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'FIKLAB | Laboratorium';
    // Session name is $newData
    $data['dt_lab'] = $this->main_model->getAllDtLab();
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/lab');
    $this->load->view('templates/main/footer');
  }

  public function details($slug)
  {
    $data['title'] = 'LABFIK | Detail Laboratorium';
    // Session name is $newData
    $data['labview'] = $this->main_model->getDtLabBySlug($slug);
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/labview');
    $this->load->view('templates/main/footer');
  }

  public function profile($slug)
  {
    $data['title'] = 'LABFIK | Profile FIK';
    $data['profile'] = $this->db->get_where('tb_panel', ['slug' => $slug])->row_array();
    // Session name is $newData
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/profile');
    $this->load->view('templates/main/footer');
  }
}
