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
    $data['title'] = 'LABFIK | Riwayat Peminjaman Tempat';
    $user_id = $this->session->userdata('id');
    $data["mybooking"] = $this->booking_model->getByUserId($user_id);
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/logBooking', $data);
    $this->load->view('templates/dashboard/footer');
  }



  public function inputjudulta()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['cdosbing'] = $this->user_model->checkButton();
    $data['dosen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
    $this->form_validation->set_rules('title', 'Judul', 'required|trim');
    $title = $this->db->get_where('guidance', ['judul' => $this->input->post('title')])->row_array();
    $data['title'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    if (!empty($title)) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Judul tersebut sudah terdaftar dalam sistem</div>');
      redirect('users/pengajuandosbing');
    } else {
      $data = array(
        'id' => uniqid(),
        'id_mhs' => $this->input->post('id_mhs'),
        'judul' => $this->input->post('title'),
        'peminatan' => $this->input->post('peminatan'),
      );
      $this->db->insert('guidance', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Judul berhasil ditambahkan, silakan pilih dosen pembimbing 1 dan pembimbing 2.</div>');
      redirect('users/pengajuandosbing');
    }
  }

  public function editjudulta()
  {
    $title = $this->db->get_where('guidance', ['judul' => $this->input->post('title')])->row_array();
    if (!empty($title)) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Judul tersebut sudah terdaftar dalam sistem</div>');
      redirect('users/pengajuandosbing');
    } else {
      $data = array(
        'judul' => $this->input->post('title'),
        'peminatan' => $this->input->post('peminatan'),
      );
      $this->db->update('guidance', $data, ['id' => $this->input->post('id')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Judul berhasil diubah</div>');
      redirect('users/pengajuandosbing');
    }
  }

  public function pengajuandosbing()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['cdosbing'] = $this->user_model->checkButton();
    $data['dosen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
    $this->form_validation->set_rules('dosbing', 'Dosen Pembimbing', 'required|trim');
    $data['title'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    // Check profile
    if ($data['mhs']['nim'] == '' and $data['mhs']['prodi'] == '') {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Lengkapi profile terlebih dahulu agar dapat mengajukan TA. </div>');
      redirect('auth/editprofilemhs');
    } else {
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
            // 'id_mhs' => $this->input->post('id_mhs'),
            'id_dosen' => $this->input->post('dosbing'),
            'id_guidance' => $this->input->post('id_guidance'),
            'status' => 'Menunggu Persetujuan'
          );
          $this->db->insert('dosbing', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan telah dikirim, tunggu sampai dosen memberikan balasan</div>');
          redirect('users/pengajuandosbing');
        } elseif ($query['status'] == "Sudah Disetujui") {
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Dosen tersebut sudah menjadi dosen pembimbing kamu, pilih dosen lain.</div>');
          redirect('users/pengajuandosbing');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kamu telah mengirimkan pengajuan, tunggu sampai dosen memberikan balasan</div>');
          redirect('users/pengajuandosbing');
        }
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
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['guide'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['allhistory'] = $this->user_model->getallbimbingan();
    $data['buttonaddbimbingan'] = $this->user_model->checkaddbimbingan();
    $data['buttonaddbimbingan2'] = $this->user_model->checkaddbimbingan2();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/bimbinganta', $data);
    $this->load->view('templates/dashboard/footer');
  }

  // DOSEN
  public function permintaanbimbingan()
  {
    $data['title'] = 'LABFIK | Permintaan Bimbingan';
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
      // $data = array(
      //   'status' => 'Ditolak'
      // );
      $this->db->delete('dosbing', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan bimbingan ditolak</div>');
      redirect('users/permintaanbimbingan');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
      redirect('users/permintaanbimbingan');
    }
  }


  public function addbimbingan()
  {
    if (!empty($_FILES['fileta']['name'])) {
      $path = "./assets/upload/thesis/" . $this->session->userdata('username');
      if (!is_dir($path)) {
        $create = mkdir($path, 0777, TRUE);
        if (!$create)
          return;
      }
      // get foto
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'pdf|doc|jpg|png|jpeg|gif';
      $config['max_size'] = '20024';  //20MB max
      $config['file_name'] = $_FILES['fileta']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('fileta')) {
        $pdf = $this->upload->data();
        $data = [
          "id" => uniqid(),
          "id_guidance" => $this->input->post('id_guidance', true),
          "send_to" => $this->input->post('fordosen', true),
          "pdf_file" =>  $pdf['file_name'],
          "date" => date('Y-m-d'),
          "keterangan" => $this->input->post('keterangan', true),
          "status" => "Dikirim",
        ];
        $this->db->insert('thesis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File berhasil dikirim, tunggu sampai file diperiksa dosen</div>');
        redirect('users/bimbingantugasakhir');
      } else {
        echo $this->upload->display_errors();
      }
    }
  }

  public function viewfilepdf($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'LABFIK | Dokumen Tugas Akhir';
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/viewfilepdf', $data);
    $this->load->view('templates/dashboard/footer');
  }
  public function bimbingandsn()
  {
    $data['title'] = 'LABFIK | Daftar Bimbingan';
    $data['bimbingan'] = $this->user_model->getMhsBimbingan();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/bimbingandsn', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function progressbimbingan($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'LABFIK | Daftar Bimbingan';
    $data['filebimbingan'] = $this->user_model->getfilebimbinganbyid($id);
    $data['mhsbyid'] = $this->user_model->getmhsbimbinganbyid($id);
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/progressbimbingan', $data);
    $this->load->view('templates/dashboard/footer');
  }
}
