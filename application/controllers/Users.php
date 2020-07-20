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
    $data['dt_tempat'] = $this->user_model->getDtTempat();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/index');
    $this->load->view('templates/dashboard/footer');
  }



  public function daftarsemuatempat()
  {
    $data['title'] = 'LABFIK | Semua Tempat';
    $data['dt_tempat'] = $this->user_model->getAllDtTempat();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/daftartempat');
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

  // function cektanggal()
  // {
  //   $cek = $this->db->get('schedule')->result_array();
  //   $date = $this->input->post('tanggal');
  //   if ($date == "") {
  //     $result['pesan'] = "Tanggal Harus diisi";
  //   } else {
  //     $result['pesan'] = "";
  //     if (empty($cek)) {
  //       $data = array(
  //         'date' => $date
  //       );
  //       $this->db->insert('schedule', $data);
  //     }
  //   }
  //   echo json_encode($result);
  // }

}
