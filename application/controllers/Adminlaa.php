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
    $guidance = $this->db->get('guidance')->result_array();
    $name = $this->adminlaa_model->getMhs();
    // $file = $this->adminlaa_model->getFiles();
    $data = array(
      'title'     => 'LABFIK | Pendaftaran TA',
      'guidance' => $guidance,
      // 'file' => $file,
      'mahasiswa' => $name
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


  public function viewdetail($id)
  {
    $id = decrypt_url($id);
    $file = $this->adminlaa_model->getFiles($id);
    $mhs = $this->adminlaa_model->getMhsbyId($id);
    $data = array(
      'title'     => 'Details Pendaftar',
      'file'   => $file,
      'mhs' => $mhs
    );
    if ($file) {
      $this->load->view('templates/dashboard/headerAdminlaa', $data);
      $this->load->view('templates/dashboard/sidebarAdminlaa', $data);
      $this->load->view('dashboard/adminlaa/viewdetail', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda minta tidak ada</div>');
      $id = $this->db->get_where('file_pendafataran', ['id' => $id])->row()->id;
      redirect('adminlaa/viewdetail/' . encrypt_url($id));
    }
  }

  public function accfilependaftaran($id)
  {
    $id = decrypt_url($id);
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    $nama = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->nama;
    if ($file) {
      $data = [
        'status' => 'Acc Admin LAA',
      ];
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $nama . ' diterima</div>');
      redirect('adminlaa/viewdetail/' . encrypt_url($id));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda minta tidak ada</div>');
      $id = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id;
      redirect('adminlaa/viewdetail/' . encrypt_url($id));
    }
  }

  public function tolakfilependaftaran()
  {
    $id = $this->input->post('id');
    $komentar = $this->input->post('komentar');
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    $nama = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->nama;
    if ($file) {
      $data = [
        'status' => 'Ditolak Admin LAA',
        'komentar' => $komentar,
      ];
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $nama . ' ditolak</div>');
      redirect('adminlaa/viewdetail/' . encrypt_url($id));
    }
  }
}
