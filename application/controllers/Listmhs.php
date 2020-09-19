<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listmhs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('listmhs_model');
    $this->load->model('adminlaa_model');
    is_logged_in();
  }
  public function index()
  {

    $name = $this->listmhs_model->getAllMhsPendaftarTA();
    $userslist = [];
    foreach ($name as $u) {
      $userslist[] =
        [
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'kodedsn' => $this->listmhs_model->getKodeDosenById($u['dosen_wali']),
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
          'date' => $u['date'],
          'status_file' => $u['status_file'],
        ];
    }
    $data['mahasiswa'] = $userslist;
    $data['title'] = "Mahasiswa Pendaftar Tugas Akhir";
    $this->load->view('templates/dashboard/headerAdminlaa', $data);
    $this->load->view('templates/dashboard/sidebarAdminlaa', $data);
    $this->load->view('dashboard/listmhs/index', $data);
    $this->load->view('templates/dashboard/footer');
  }
}
