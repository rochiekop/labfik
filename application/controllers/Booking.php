<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('booking_model');
    $this->load->library('form_validation');
    is_logged_in();
  }


  // Peminjaman Tempat

  public function place($id)
  {
    $data['title'] = 'FIKLAB | Pinjam Tempat';
    $id = decrypt_url($id);
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $data['tempatbyid'] = $this->admin_model->getDtTempatById($id);
    $valid = $this->form_validation;
    $valid->set_rules(
      'keterangan',
      'Keterangan',
      'required|trim',
      array(
        'required'      =>  '%s harus diisi',
      )
    );
    if (!$valid->run()) {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/pinjamtempat');
      $this->load->view('templates/dashboard/footer');
    } else {
      $data = array(
        'id' => uniqid(),
        'id_peminjam' => $this->input->post('id_peminjam'),
        'id_ruangan' => $this->input->post('id_ruangan'),
        'date' => $this->input->post('date'),
        'time' => implode(", ", $this->input->post('time')),
        'keterangan' => $this->input->post('keterangan'),
        'status' => 'proses'
      );
      $this->db->insert('booking', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan berhasil dilakukan dan akan segera diproses!</div>');
      redirect('users');
    }
  }

  public function riwayat()
  {
    $data['title'] = 'FIKLAB | Riwayat Peminjaman Tempat';
    $user_id = $this->session->userdata('id');
    $data["booking"] = $this->booking_model->getByUserId($user_id);

    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/riwayatpeminjamantempat');
    $this->load->view('templates/dashboard/footer');
  }

  public function fetchDate()
  {
    $date = $this->input->post('date');
    $id_ruangan = $this->input->post('id_ruangan');
    $data = $this->booking_model->getDateFromInput($date, $id_ruangan);
    echo json_encode($data);
  }
}
