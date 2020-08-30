<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator_ta extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('koordinatorta_model');
    $this->load->model('adminlaa_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    is_logged_in();
  }

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
    $mhs = $this->koordinatorta_model->getMhs();
    $data['title'] = "Laboratotium FIK | Pengajuan Tugas Akhir";
    $data['lecturer'] = $this->koordinatorta_model->getThesisLecturer();

    $userslist = [];
    foreach ($mhs as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'tahun' => $u['tahun'],
          'no_telp' => $u['no_telp'],
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
          'aksi' => $this->koordinatorta_model->getCheckThesisLecturer($u['id_guidance']),
        ];
    }
    $data['mahasiswa'] = $userslist;

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
