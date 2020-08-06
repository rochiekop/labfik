<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'LABFIK | Unit Jasa';
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/unitjasa', $data);
    $this->load->view('templates/main/footer');
  }
  public function bisnis()
  {
    $data['title'] = 'LABFIK | Unit Bisnis';
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/unitbisnis', $data);
    $this->load->view('templates/main/footer');
  }

  public function partnership()
  {
    $data['title'] = 'LABFIK | Unit Bisnis';
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/unitpartnership', $data);
    $this->load->view('templates/main/footer');
  }
}
