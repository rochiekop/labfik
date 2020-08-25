<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlaa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('adminlaa_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'LABFIK | Dashboard';
    $this->load->view('templates/dashboard/headerAdminlaa', $data);
    $this->load->view('templates/dashboard/sidebarAdminlaa', $data);
    $this->load->view('dashboard/adminlaa/index', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function pendaftaranta()
  {
    $mhs = $this->adminlaa_model->pendaftaranta();
    $dosen = $this->adminlaa_model->getdosen();
    $data = array(
      'title'     => 'LABFIK | Pendaftaran TA',
      'mhs' => $mhs,
      'dosen' => $dosen
    );
    $this->load->view('templates/dashboard/headerAdminlaa', $data);
    $this->load->view('templates/dashboard/sidebarAdminlaa', $data);
    $this->load->view('dashboard/adminlaa/pendaftaranta', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function deletependaftarta()
  {
    $id = $this->input->post('id');
    $file = $this->input->post('file');
    $path = "./assets/upload/thesis/" . $this->input->post('username') . "/";
    if ($file) {
      @unlink($path . $file);
    }
    $this->db->delete('guidance', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran tugas akhir ditolak.</div>');
    redirect('adminlaa/pendaftaranta');
  }

  public function terimapendaftaran($id)
  {
    $id = decrypt_url($id);
    $data = [
      "status" => 'Diterima',
    ];
    $this->db->update('guidance', $data, ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran tugas akhir diterima.</div>');
    redirect('adminlaa/pendaftaranta');
  }
}
