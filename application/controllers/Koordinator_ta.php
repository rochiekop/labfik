<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator_ta extends CI_Controller
{

  public function index()
  {
    $data = array(
      'title' => "Laboratotium FIK | Kuota Dosen Tugas Akhir",
    );
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/index", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function pengajuan()
  {

    $data = array(
      'title' => "Laboratotium FIK | Pengajuan Tugas Akhir",
    );
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/pengajuan", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function previewdua()
  {
    $data = array(
      'title' => "Laboratotium FIK | Preview 2",
    );
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/preview2", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function sidang()
  {
    $data = array(
      'title' => "Laboratotium FIK | Sidang",
    );
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/sidang", $data);
    $this->load->view("templates/dashboard/footer");
  }
}
