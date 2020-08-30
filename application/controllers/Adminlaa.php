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
    $guidance = $this->db->get('guidance')->result_array();
    $name = $this->adminlaa_model->getMhs();
    $namea = $this->adminlaa_model->getMhs1();
    $data = array(
      'title'     => 'LABFIK | Pendaftaran TA',
      'guidance' => $guidance,
      'mahasiswa' => $name,
      'mahasiswa1' => $namea,
    );
    $this->load->view('templates/dashboard/headerAdminlaa', $data);
    $this->load->view('templates/dashboard/sidebarAdminlaa', $data);
    $this->load->view('dashboard/adminlaa/index', $data);
    $this->load->view('templates/dashboard/footer');
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
      $id = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id;
      redirect('adminlaa/viewdetail/' . encrypt_url($id));
    }
  }

  public function accfilependaftaran($id)
  {
    $id = decrypt_url($id);
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();

    if ($file) {
      $data = [
        'status_adminlaa' => 'Disetujui',
        'komentar' => '',
      ];
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $cekstatus = $this->adminlaa_model->cekstatus($file['id_mhs']);

      if ($cekstatus == 5) {
        $data = [
          'status_file' => 'Disetujui Admin Laa',
        ];
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $file['nama'] . ' diterima</div>');

      redirect(base_url('adminlaa/viewdetail/' . encrypt_url($file['id_mhs'])));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data yang anda minta tidak ada</div>');
      $id = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id;
      redirect(base_url('adminlaa/viewdetail/' . encrypt_url($id)));
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
        'status_adminlaa' => 'Ditolak',
        'komentar' => $komentar,
      ];
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $nama . ' ditolak</div>');
      redirect('adminlaa/viewdetail/' . encrypt_url($file['id_mhs']));
    }
  }
}
