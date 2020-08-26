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
    $dt_tempat = $this->user_model->getDtTempat();
    $bprogress = $this->user_model->getBookingProgress();
    $blast = $this->user_model->getBookingLast();
    $bnumb = $this->user_model->getBookingNumb();
    $data = array(
      'title'     => 'Dashboard',
      'dt_tempat' => $dt_tempat,
      'bprogress' =>  $bprogress,
      'blast' =>  $blast,
      'bnumb' =>  $bnumb,
    );
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/index');
    $this->load->view('templates/dashboard/footer');
  }

  public function daftarsemuatempat()
  {
    $data['title'] = 'LABFIK | Semua Tempat';
    $data['dt_tempat'] = $this->user_model->getAllDtTempat();
    $data['kruangan'] = $this->admin_model->kategoriruangan();
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



  public function inputformpendaftaran()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['cdosbing'] = $this->user_model->checkButton();
    $this->form_validation->set_rules('title', 'Judul', 'required|trim');
    $title = $this->db->get_where('guidance', ['judul' => $this->input->post('title')])->row_array();
    $data['title'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    if (!empty($title)) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Judul "' . $this->input->post('title') . '" sudah digunakan, masukkan judul lain</div>');
      redirect('users/pendaftarantugasakhir');
    } else {
      if (!empty($_FILES['filependaftaran']['name'])) {
        $path = "./assets/upload/thesis/" . $this->session->userdata('username');
        if (!is_dir($path)) {
          $create = mkdir($path, 0777, TRUE);
          if (!$create)
            return;
        }
        $config['allowed_types'] = 'pdf|docx|jpeg|gif|png|jpg';
        $config['max_size'] = '20048';  //20MB max
        $config['max_width'] = '8480'; // pixel
        $config['max_height'] = '8480'; // pixel
        $config['file_name'] = $_FILES['filependaftaran']['name'];
        $config['upload_path'] = $path;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('filependaftaran')) {
          $file = $this->upload->data();
          $data = array(
            'id' => uniqid(),
            'id_mhs' => $this->input->post('id_mhs'),
            'judul' => $this->input->post('title'),
            'peminatan' => $this->input->post('peminatan'),
            'dosen_wali' => $this->input->post('dosenwali'),
            'form_pendaftaran' => $file['file_name'],
            'status' => 'Dikirim',
          );
          $this->db->insert('guidance', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran berhasil dilakukan dan akan segera diproses</div>');
          redirect('users/pendaftarantugasakhir');
        } else {
          echo $this->upload->display_errors();
        }
      }
    }
  }

  public function editjudulta()
  {
    $title = $this->user_model->cektitle();

    if (!empty($title)) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Judul "' . $this->input->post('title') . '" sudah digunakan, silakan cari judul lain.</div>');
      redirect('users/pendaftarantugasakhir');
    } else {
      $data = array(
        'judul' => $this->input->post('title'),
        'peminatan' => $this->input->post('peminatan'),
        'dosen_wali' => $this->input->post('dosenwali'),
      );
      $this->db->update('guidance', $data, ['id' => $this->input->post('id')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
      redirect('users/pendaftarantugasakhir');
    }
  }

  public function pendaftarantugasakhir()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $data['dosbing'] = $this->user_model->getDosbing();
    $data['cdosbing'] = $this->user_model->checkButton();
    $data['dosen'] = $this->db->get_where('user', ['role_id' => 3])->result_array();
    $this->form_validation->set_rules('dosbing', 'Dosen Pembimbing', 'required|trim');
    $data['title'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    // Check profile
    if ($data['mhs']['nim'] == '' or $data['mhs']['prodi'] == '' or $data['mhs']['no_telp'] == '') {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Lengkapi profile terlebih dahulu agar dapat mengajukan TA. </div>');
      redirect('auth/editprofilemhs');
    } else {
      if ($this->form_validation->run() == false) {
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('dashboard/users/pendaftarantugasakhir', $data);
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
          redirect('users/pendaftarantugasakhir');
        } elseif ($query['status'] == "Sudah Disetujui") {
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Dosen tersebut sudah menjadi dosen pembimbing kamu, pilih dosen lain.</div>');
          redirect('users/pendaftarantugasakhir');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kamu telah mengirimkan pengajuan, tunggu sampai dosen memberikan balasan</div>');
          redirect('users/pendaftarantugasakhir');
        }
      }
    }
  }

  public function deletepengajuandosbing()
  {
    $id = $this->input->post('id');
    $this->db->delete('dosbing', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan berhasil dibatalkan</div>');
    redirect('users/pendaftarantugasakhir');
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
        'status' => 'Disetujui'
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
      $data = [];
      $allfile = count($_FILES['fileta']['name']);
      for ($i = 0; $i < $allfile; $i++) {
        if (!empty($_FILES['fileta']['name'][$i])) {
          $_FILES['file']['name'] = $_FILES['fileta']['name'][$i];
          $_FILES['file']['type'] = $_FILES['fileta']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['fileta']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['fileta']['error'][$i];
          $_FILES['file']['size'] = $_FILES['fileta']['size'][$i];
          $config['upload_path'] = $path;
          $config['allowed_types'] = '*';
          $config['max_size'] = '200024';  //200MB max
          $this->load->library('upload', $config);

          // var_dump($allfile);
          // die;
          $this->upload->initialize($config);
          if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $filename = $file['file_name'];

            $data[] = $filename;
          } else {
            echo $this->upload->display_errors();
          }
        }
      }
      $data = [
        "id" => uniqid(),
        "id_guidance" => $this->input->post('id_guidance', true),
        "send_to" => $this->input->post('fordosen', true),
        "pdf_file" => implode(', ', $data),
        "date" => date('Y-m-d'),
        "keterangan" => $this->input->post('keterangan', true),
        "status" => "Dikirim",
      ];
      $this->db->insert('thesis', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File berhasil dikirim, tunggu sampai file diperiksa dosen</div>');
      redirect('users/bimbingantugasakhir');
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
    $data['preview'] = $this->user_model->getfilebimbinganpreview($id);
    $data['mhsbyid'] = $this->user_model->getmhsbimbinganbyid($id);
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/progressbimbingan', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function sidang()
  {
    $data['title'] = 'LABFIK | Sidang Tugas Akhir';
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/sidang', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function penguji()
  {
    $data['title'] = 'LABFIK | Penguji Tugas Akhir';
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/penguji', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function deletefileta()
  {
    $path = "./assets/upload/thesis/" . $this->session->userdata('username');
    $id = $this->input->post('id');
    if ($id) {
      $fileta = explode(', ', $this->input->post('fileta'));
      foreach ($fileta as $t) {
        @unlink($path . '/' . $t);
      }
      $this->db->delete('thesis', ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">file berhasil dibatalkan</div>');
      redirect('users/bimbingantugasakhir');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda hapus tidak ada</div>');
      redirect('users/bimbingantugasakhir');
    }
  }

  public function tambahdosbing()
  {
    $data['title'] = 'LABFIK | Tambah Dosen Pembimbing';
    // $mhs = $this->db->user_model->getPendaftarTa();
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/tambahdosbing', $data);
    $this->load->view('templates/dashboard/footer');
  }
}
