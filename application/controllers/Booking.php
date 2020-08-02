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


  // Peminjaman Tempat1

  public function place($id)
  {
    $data['title'] = 'LABFIK | Pinjam Tempat';
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
      $this->load->view('dashboard/users/pinjamTempat');
      $this->load->view('templates/dashboard/footer');
    } else {
      $data = array(
        'id' => uniqid(),
        'id_peminjam' => $this->input->post('id_peminjam'),
        'id_ruangan' => $this->input->post('id_ruangan'),
        'date' => $this->input->post('date'),
        'time' => implode(", ", $this->input->post('time')),
        'keterangan' => $this->input->post('keterangan'),
        'status' => 'Menunggu Acc'
      );
      $this->db->insert('booking', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan berhasil dilakukan dan akan segera diproses!</div>');
      redirect('users/main');
    }
  }

  public function bookingPlace()
  {
    $data['title'] = 'LABFIK | Pinjam Tempat';
    $valid = $this->form_validation;
    $valid->set_rules(
      'keterangan',
      'Keterangan',
      'required|trim',
      array(
        'required'      =>  '%s harus diisi',
      ),
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/main');
      $this->load->view('templates/dashboard/footer');
    } else {
      $data = array(
        'id' => uniqid(),
        'id_peminjam' => $this->input->post('id_peminjam'),
        'id_ruangan' => $this->input->post('id_ruangan'),
        'date' => $this->input->post('tanggal'),
        'time' => implode(", ", $this->input->post('time')),
        'keterangan' => $this->input->post('keterangan'),
        'status' => 'Menunggu Acc'
      );
      $this->db->insert('booking', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan berhasil dilakukan dan akan segera diproses!</div>');
      redirect('users/main');
    }
  }


  public function bookingByAdmin()
  {
    $data['title'] = 'LABFIK | Pinjam Tempat';
    $data['kategori'] = $this->admin_model->kategoriRuangan();
    $validate_data = array(
      array(
        'field' => 'name',
        'label' => 'Nama',
        'rules' => 'required|callback_validate_name'
      )
    );
    $this->form_validation->set_rules($validate_data);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/buatPeminjaman');
      $this->load->view('templates/dashboard/footer');
    } else {
      $id_peminjam = $this->booking_model->getIdByname($this->input->post('name'));
      $data = array(
        'id' => uniqid(),
        'id_peminjam' => $id_peminjam,
        'id_ruangan' => $this->input->post('id_ruangan'),
        'date' => $this->input->post('datebooking'),
        'time' => implode(", ", $this->input->post('time')),
        'keterangan' => $this->input->post('keterangan'),
        'status' => 'Menunggu Acc'
      );
      $this->db->insert('booking', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan berhasil dilakukan dan akan segera diproses!</div>');
      redirect('booking/bookingByAdmin');
    }
  }

  public function validate_name()
  {
    $name = $this->booking_model->validate_name();
    if ($name == true) {
      return true;
    } else {
      $this->form_validation->set_message('validate_name', 'Nama ' . $this->input->post('name') . ' belum terdaftar dalam sistem.');
      return false;
    }
  }

  public function fetchDate()
  {
    $date = $this->input->post('date');
    $id_ruangan = $this->input->post('id_ruangan');
    $data = $this->booking_model->getDateFromInput($date, $id_ruangan);
    echo json_encode($data);
  }

  public function fetchRuangan()
  {

    if ($this->input->post('id_kategori')) {
      echo $this->booking_model->fetchRuangan($this->input->post('id_kategori'));
    }
  }

  function getRuangan()
  {
    $id = $this->input->post('id', TRUE);
    $data = $this->booking_model->getruangan($id)->result();
    echo json_encode($data);
  }
}
