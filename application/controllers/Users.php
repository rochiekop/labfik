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
    $this->load->model('booking_model');
    $this->load->library('encryption');
    is_logged_in();
  }

  public function main()
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
    $this->load->view('dashboard/users/daftarTempat');
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

  public function riwayat()
  {
    $data['title'] = 'FIKLAB | Riwayat Peminjaman Tempat';
    $user_id = $this->session->userdata('id');
    $data["mybooking"] = $this->booking_model->getByUserId($user_id);
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/logBooking', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function pengajuandosbing()
  {
    $data['title'] = 'FIKLAB | Pengajuan Tugas Akhir';
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['dosen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
    $this->form_validation->set_rules('dosbing', 'Dosen Pembimbing', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/pengajuandosbing', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $query = $this->user_model->checkDosen();
      if (empty($query)) {
        $data = array(
          'id' => uniqid(),
          'id_dosen' => $this->input->post('dosbing'),
          'id_mhs' => $this->input->post('id_mhs'),
          'status' => 'Menunggu Persetujuan'
        );
        $this->db->insert('dosbing', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan telah dikirim, tunggu sampai dosen memberikan balasan</div>');
        redirect('users/pengajuandosbing');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kamu telah mengirimkan pengajuan, tunggu sampai dosen memberikan balasan</div>');
        redirect('users/pengajuandosbing');
      }
    }
  }

  public function deletepengajuandosbing()
  {
    $id = $this->input->post('id');
    $this->db->delete('dosbing', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil dibatalkan</div>');
    redirect('users/pengajuandosbing');
  }
  public function bimbingantugasakhir()
  {
    $data['title'] = 'FIKLAB | Pengajuan Tugas Akhir';
    $data['pengajuan'] = $this->db->get_where('tugasakhir', ['id' => $this->session->userdata('id')])->row_array();
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/bimbinganta', $data);
    $this->load->view('templates/dashboard/footer');
  }

  // DOSEN
  public function permintaanbimbingan()
  {
    $data['title'] = 'FIKLAB | Permintaan Bimbingan';
    $data['pbimbingan'] = $this->user_model->getMhs();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/permintaanbimbingan', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function acceptedbimbingan($id)
  {
    $data = $this->db->get_where('dosbing', ['id' => $id])->row_array();
    if ($data) {
      $data = array(
        'status' => 'Sudah Disetujui'
      );
      $this->db->update('dosbing', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan bimbingan disetujui</div>');
      redirect('users/permintaanbimbingan');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
      redirect('users/permintaanbimbingan');
    }
  }

  public function tolakpermintaanbimbingan()
  {
    $id = $this->input->post('id');
    $data = $this->db->get_where('dosbing', ['id' => $id])->row_array();
    if ($data) {
      $data = array(
        'status' => 'Ditolak'
      );
      $this->db->update('dosbing', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan bimbingan ditolak</div>');
      redirect('users/permintaanbimbingan');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
      redirect('users/permintaanbimbingan');
    }
  }
}
