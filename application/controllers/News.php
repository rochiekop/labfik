<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('main_model');
    // is_logged_in();
  }

  public function index()
  {
    $data['info'] = $this->main_model->getAllDtInfoDesc();
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/news', $data);
    $this->load->view('templates/main/footer');
  }

  public function details($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'LABFIK | Detail Informasi';
    // Session name is $newData
    $data['relatedinfo'] = $this->main_model->getRelatedInfo($id);
    $data['detailinfo'] = $this->main_model->getDtInfoById($id);
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/detailinfo');
    $this->load->view('templates/main/footer');
  }
}
