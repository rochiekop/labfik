<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaur extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->library('pagination');
    $this->load->model('booking_model');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/index');
    $this->load->view('templates/dashboard/footer');
  }

  public function listAllBooking()
  {
    $data['title'] = 'LABFIK | List Semua Peminjaman Tempat';
    $data['listbooking'] = $this->booking_model->getAllBooking();
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/listAllBooking', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function listWaitingForAcc()
  {
    $data['title'] = 'LABFIK | List Permintaan Peminjaman Tempat';
    $data['listbooking'] = $this->booking_model->getAllWaitingAccBooking();
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/waitingAcc', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function listAllAccepted()
  {
    $data['title'] = 'LABFIK | List Permintaan Peminjaman Tempat';
    $data['listbooking'] = $this->booking_model->getAllAccepted();
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/listAccepted', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function listAllDeclined()
  {
    $data['title'] = 'LABFIK | List Permintaan Peminjaman Tempat';
    $data['listbooking'] = $this->booking_model->getAllDeclined();
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/listDeclined', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function accepted($id)
  {
    $id = decrypt_url($id);
    $this->booking_model->changeStatusAccepted($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman tempat disetujui!</div>');
    redirect('kaur/listWaitingForAcc');
  }

  public function changeDeclined()
  {

    $id_booking = $this->input->post('id');
    $date = $this->input->post('date');
    $check = $this->db->get_where('booking', ['id' => $id_booking]);
    if ($check) {
      $this->booking_model->changeStatusDeclined($id_booking, $date);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman tempat tolak!</div>');
      redirect('kaur/listWaitingForAcc');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Peminjaman tidak tersedia!</div>');
      redirect('kaur/listWaitingForAcc');
    }
  }

  public function rolepengguna()
  {
    $data['title'] = 'LABFIK | Pengaturan Role Pengguna';
    $this->load->view('templates/dashboard/headerKaur', $data);
    $this->load->view('templates/dashboard/sidebarKaur', $data);
    $this->load->view('dashboard/kaur/rolepengguna', $data);
    $this->load->view('templates/dashboard/footer');
  }
}
