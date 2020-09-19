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

  public function details($slug)
  {

    $data['title'] = 'LABFIK | Detail Informasi';
    // Session name is $newData
    $data['relatedinfo'] = $this->main_model->getRelatedInfo($slug);
    $data['detailinfo'] = $this->main_model->getDtInfoBySlug($slug);
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/detailinfo');
    $this->load->view('templates/main/footer');
  }
}
