<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaur extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('pagination');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/index');
    $this->load->view('templates/dashboard/footer');
  }
}
