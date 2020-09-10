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
    $this->load->model('adminlaa_model');
    $this->load->model('booking_model');
    $this->load->model('thesis_model');
    $this->load->library('encryption');
    is_logged_in();
  }

  public function completeprofile()
  {
    $profile = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    if ($this->session->userdata('role_id') == 3) {
      if ($profile['no_telp'] == "" or $profile['nip'] == "" or $profile['kode_dosen'] == "" or $profile['alamat'] == "") {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Agar dapat mengakses fitur yang tersedia, lengkapi profile terlebih dahulu.</div>');
        redirect('auth/editprofiledsn');
      }
    }
  }

  public function index()
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
    if ($this->completeprofile()) {
    } else {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/index');
      $this->load->view('templates/dashboard/footer');
    }
  }

  public function daftarsemuatempat()
  {
    $data['title'] = 'LABFIK | Semua Tempat';
    $data['dt_tempat'] = $this->user_model->getAllDtTempat();
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    if ($this->completeprofile()) {
    } else {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/daftarTempat');
      $this->load->view('templates/dashboard/footer');
    }
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
    if ($this->completeprofile()) {
    } else {
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/logBooking', $data);
      $this->load->view('templates/dashboard/footer');
    }
  }



  public function inputformpendaftaran()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    // $data['mhs'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    // $data['dosbing'] = $this->user_model->getDosbing();
    // $data['cdosbing'] = $this->user_model->checkButton();
    $this->form_validation->set_rules('title', 'Judul', 'required|trim');
    // $title = $this->db->get_where('guidance', ['judul' => $this->input->post('title')])->row_array();
    // $data['title'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();

    if (!empty($_FILES['filependaftaran']['name'])) {
      $path = "./assets/upload/thesis/" . $this->session->userdata('username');
      if (!is_dir($path)) {
        $create = mkdir($path, 0777, TRUE);
        if (!$create)
          return;
      }

      $data = [
        'id' => uniqid(),
        'id_mhs' => $this->input->post('id_mhs'),
        'judul_1' => $this->input->post('judul1'),
        'judul_2' => $this->input->post('judul2'),
        'judul_3' => $this->input->post('judul3'),
        'peminatan' => $this->input->post('peminatan'),
        'tahun' => date('Y'),
        'status_file' => "Dikirim",
        'date' => date("d-m-Y"),
        'status_preview' => 'preview1'
      ];
      $this->db->insert('guidance', $data);

      $allfile = count($_FILES['filependaftaran']['name']);
      for ($i = 0; $i < $allfile; $i++) {
        if (!empty($_FILES['filependaftaran']['name'][$i])) {
          $_FILES['file']['name'] = $_FILES['filependaftaran']['name'][$i];
          $_FILES['file']['type'] = $_FILES['filependaftaran']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['filependaftaran']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['filependaftaran']['error'][$i];
          $_FILES['file']['size'] = $_FILES['filependaftaran']['size'][$i];
          $config['upload_path'] = $path;
          $config['allowed_types'] = 'pdf';
          $config['max_size'] = '20024';  //20MB max
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            if ($i == 0) {
              $namafile = 'KSM';
            } elseif ($i == 1) {
              $namafile = 'Surat Pernyataan TA';
            } elseif ($i == 2) {
              $namafile = 'Bukti Pendaftaran Test EPRT';
            } elseif ($i == 3) {
              $namafile = 'Sertifikat TAK';
            } else {
              $namafile = 'Proposal TA';
            }
            // $id_guidance = $this->db->get_where('guidance', ['id_mhs' => $this->input->post('id_mhs')])->row()->id;
            $data = array(
              'id' => uniqid(),
              'id_mhs' => $this->input->post('id_mhs'),
              'nama' => $namafile,
              'file' => $file['file_name'],
              'view_adminlaa' => "Belum Dilihat",
              'status_adminlaa' => "Dikirim",
              'view_doswal' => "Belum Dilihat",
              'status_doswal' => "Dikirim",
              'date' => date('d-m-Y'),
            );
            $this->db->insert('file_pendaftaran', $data);
          } else {
            echo $this->upload->display_errors();
          }
        }
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran berhasil dilakukan dan akan segera diproses</div>');
      redirect('users/pendaftarantugasakhir');
    }
  }

  public function pendaftarantugasakhir()
  {
    $mhs = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
    $file = $this->adminlaa_model->getFiles($this->session->userdata('id'));
    $cek = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    // $thesis_lecturers = $this->db->get_where('thesis_lecturers', ['id_guidance' => $cek['id']])->row_array();
    $kosentrasi = $this->db->get('child_kategori')->result_array();
    // if (!empty($thesis_lecturers)) {
    //   $dosbing1 = $this->user_model->getDosenPembimbing($thesis_lecturers['dosen_pembimbing1']);
    //   $dosbing2 = $this->user_model->getDosenPembimbing($thesis_lecturers['dosen_pembimbing2']);
    // } else {
    //   $dosbing1 = null;
    //   $dosbing2 = null;
    // }

    // var_dump($cek);
    // die;
    if ($cek == null) {
      $cek['status_file'] = '';
    }
    $data = array(
      'mhs' => $mhs,
      'file' => $file,
      'cek' => $cek,
      'statusfile' => $cek['status_file'],
      'title' => 'LABFIK | Pengajuan Tugas Akhir',
      // 'thesis_lecturers' =>  $thesis_lecturers,
      // 'dosbing1' => $dosbing1,
      // 'dosbing2' => $dosbing2,
      'kosentrasi' => $kosentrasi
    );

    if ($mhs['no_telp'] != "" and $mhs['nim'] != "" and $mhs['dosen_wali'] != "" and $mhs['prodi'] != "" and $mhs['alamat'] != "") {
      $this->form_validation->set_rules('dosbing', 'Dosen Pembimbing', 'required|trim');
      $this->load->view('templates/dashboard/headerDosenMhs', $data);
      $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
      $this->load->view('dashboard/users/pendaftarantugasakhir', $data);
      $this->load->view('templates/dashboard/footer');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Untuk mengakses menu Pendaftaran Tugas Akhir, lengkapi profile terlebih dahulu.</div>');
      redirect('auth/editprofilemhs');
    }
  }


  public function bimbingantugasakhir()
  {
    $data['title'] = 'LABFIK | Pengajuan Tugas Akhir';
    $data['guide'] = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    // $data['allhistory'] = $this->user_model->getallbimbingan();
    $data['allhistory'] = $this->user_model->getfilebimbinganbyuserid($this->session->userdata('id'));
    $data['buttonaddbimbingan'] = $this->user_model->checkaddbimbingan();
    $data['buttonaddbimbingan2'] = $this->user_model->checkaddbimbingan2();
    $cek = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row_array();
    $thesis_lecturers = $this->db->get_where('thesis_lecturers', ['id_guidance' => $cek['id']])->row_array();
    if (!empty($thesis_lecturers)) {
      $data['dosbing1'] = $this->user_model->getDosenPembimbing($thesis_lecturers['dosen_pembimbing1']);
      $data['dosbing2'] = $this->user_model->getDosenPembimbing($thesis_lecturers['dosen_pembimbing2']);
    } else {
      redirect('users/pendaftarantugasakhir');
    }
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

  public function permintaanTA()
  {
    $data['guidance'] = $this->db->get('guidance')->result_array();
    $name = $this->user_model->getpermintaan();
    $data['title'] = 'LABFIK | Pendaftaran TA';
    $userslist = [];
    foreach ($name as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'no_telp' => $u['no_telp'],
          'status_file' => $u['status_file'],
          'tahun' => $u['tahun'],
          'diterima' => $this->user_model->countStatus($u['id'], 'Disetujui wali'),
          'ditolak' => $this->user_model->countStatus($u['id'], 'Ditolak wali'),
          'updated' => $this->user_model->countStatus($u['id'], 'Update file'),
          'dikirim' => $this->user_model->countStatus($u['id'], 'Dikirim'),
        ];
    }
    $data['pta'] = $userslist;
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/permintaanta', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function daftarfile($id)
  {
    $pta = $this->user_model->getfile($id);
    $mhs = $this->user_model->getMhsbyId($id);
    $data = array(
      'title'  =>  'File Pendaftaran: ',
      'pta'    =>  $pta,
      'mhs'    =>  $mhs
    );
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/daftarfile', $data);
    $this->load->view('templates/dashboard/footer');
  }

  function tambah_aksi($id)
  {
    $id = decrypt_url($id);
    $data = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($data) {
      $komentar = $this->input->post('komentar');
      $data = array(
        'komentar' => $komentar
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar Anda Telah Terkirim</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Komentar Anda Tidak Terkirim/div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile' . $data1);
    }
  }

  public function accta($id)
  {
    $id = decrypt_url($id);
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($file) {
      $data = array(
        'status_doswal' => 'Disetujui wali',
        'komentar' => ''
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $cekstatus = $this->user_model->cekstatus($file['id_mhs']);

      if ($cekstatus == 5) {
        $data = [
          'status_file' => 'Disetujui wali',
        ];
        $this->db->update('guidance', $data, ['id_mhs' => $file['id_mhs']]);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan ta disetujui</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile/' . $data1);
    }
  }

  public function tolakpermintaanta($id)
  {
    $id = decrypt_url($id);
    $data = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($data) {
      $data = array(
        'status_doswal' => 'Ditolak wali'
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan ta ditolak</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/daftarfile/' . $data1);
    }
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

  // public function tolakpermintaanbimbingan()
  // {
  //   $id = $this->input->post('id');
  //   $data = $this->db->get_where('dosbing', ['id' => $id])->row_array();
  //   if ($data) {
  //     // $data = array(
  //     //   'status' => 'Ditolak'
  //     // );
  //     $this->db->delete('dosbing', ['id' => $id]);
  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan bimbingan ditolak</div>');
  //     redirect('users/permintaanbimbingan');
  //   } else {
  //     $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada/div>');
  //     redirect('users/permintaanbimbingan');
  //   }
  // }


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
          $config['max_size'] = '20024';  //2MB max
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
        "link_project" => implode(', ', $this->input->post('link_project', true)),
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
    $bimbingan = $this->user_model->getMhsBimbingan();
    $userslist = [];
    foreach ($bimbingan as $u) {
      $userslist[] =
        [
          'id_guidance' => $u['id_guidance'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'tahun' => $u['tahun'],
          'dosen_pemb1' => $u['dosen_pembimbing1'],
          'file_bimbingan' => $this->user_model->countFileBimbingan($u['id_guidance']),
        ];
    }
    $data['bimbingan'] = $userslist;

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
    $data['allcorrection'] = $this->thesis_model->getAllCorrection($id);
    $data['lecturers'] = $this->thesis_model->getLecturersByGuidance($id);
    $data['guidance_id'] = $id;
    $data['penilaian'] = $this->thesis_model->getPenilaian($id);
    $data['layak'] = $this->thesis_model->getKelayakan($id);
    $data['step'] = $this->thesis_model->getStepPreview($id);
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
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File bimbingan berhasil dibatalkan</div>');
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

  public function editfilependaftaran()
  {
    $path = "./assets/upload/thesis/" . $this->session->userdata('username') . "/";
    $id = $this->input->post('id');
    $oldfile = $this->input->post('oldfile');
    if (!empty($_FILES['files']['name'])) {
      $config['upload_path'] = $path;
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = '2024';  //20MB max
      $config['file_name'] = $_FILES['files']['name'];
      $this->upload->initialize($config);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('files')) {
        //delete video in direktori
        @unlink($path . $oldfile);
        $file = $this->upload->data();
        $status = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row()->status_file;
        $status1 = $this->db->get_where('file_pendaftaran', ['status_doswal' => 'Ditolak koor'])->row();
        $update = $this->db->get_where('file_pendaftaran', ['status_adminlaa' => 'Ditolak'])->row();
        if ($status == "Dikirim" or $status == "Disetujui koor") {
          $status = "status_doswal";
        } else {
          $status = "status_adminlaa";
        }
        if ($status1) {
          $data = [
            "file" => $file['file_name'],
            $status => "Update",
            'view_doswal' => "Belum Dilihat",
            "date_edit" => date('d-m-Y')
          ];
        } elseif ($update) {
          $data = [
            "file" => $file['file_name'],
            'view_adminlaa' => "Belum Dilihat",
            $status => "Update",
            "date_edit" => date('d-m-Y')
          ];
        } else {
          $data = [
            "file" => $file['file_name'],
            'view_doswal' => "Belum Dilihat",
            $status => "Update file",
            "date_edit" => date('d-m-Y')
          ];
        }
        $this->db->update('file_pendaftaran', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen ' . $this->input->post('nama') . ' berhasil diupdate</div>');
        redirect('users/pendaftarantugasakhir');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Masukkan file yang akan diupload</div>');
      redirect('users/pendaftarantugasakhir');
    }
  }

  public function takoor()
  {
    $data['guidance'] = $this->db->get('guidance')->result_array();
    $name = $this->user_model->getpermintaanta();
    $data['title'] = 'LABFIK | Pendaftaran TA';
    $userslist = [];
    foreach ($name as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'no_telp' => $u['no_telp'],
          'dosen_wali' => $this->user_model->getdosenwalita($u['dosen_wali'])->name,
          'status_file' => $u['status_file'],
          'tahun' => $u['tahun'],
          'diterima' => $this->user_model->countStatus($u['id'], 'Disetujui koor'),
          'ditolak' => $this->user_model->countStatus($u['id'], 'Ditolak koor'),
          'updated' => $this->user_model->countStatus($u['id'], 'Update'),
        ];
    }
    $data['pta'] = $userslist;
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/accpermintaanta', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function viewdetail($id)
  {
    $pta = $this->user_model->getfilekoor($id);
    $mhs = $this->user_model->getMhsbyId($id);
    $data = array(
      'title'  =>  'File Pendaftaran: ',
      'pta'    =>  $pta,
      'mhs'    =>  $mhs
    );
    $this->load->view('templates/dashboard/headerDosenMhs', $data);
    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
    $this->load->view('dashboard/users/viewdetail', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function acckoorta($id)
  {
    $id = decrypt_url($id);
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($file) {
      $data = array(
        'status_doswal' => 'Disetujui koor',
        'komentar' => ''
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $cekstatus = $this->user_model->cekstatuskoor($file['id_mhs']);

      if ($cekstatus == 1) {
        $data = [
          'status_file' => 'Disetujui koor',
        ];
        $this->db->update('guidance', $data, ['id_mhs' => $file['id_mhs']]);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan ta disetujui</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail/' . $data1);
    }
  }

  public function tolakpermintaankoor($id)
  {
    $id = decrypt_url($id);
    $data = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($data) {
      $data = array(
        'status_doswal' => 'Ditolak koor',
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permintaan ta ditolak</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang anda cari tidak ada</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail/' . $data1);
    }
  }

  function komentarta($id)
  {
    $id = decrypt_url($id);
    $data = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    if ($data) {
      $komentar = $this->input->post('komentar');
      $data = array(
        'komentar' => $komentar
      );
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar Anda Telah Terkirim</div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail/' . $data1);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Komentar Anda Tidak Terkirim/div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('users/viewdetail' . $data1);
    }
  }

  public function updateviewkoorkk()
  {
    $id = $this->input->post('id');
    $id_mhs = $this->input->post('id_mhs');
    $view = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->view_doswal;
    if ($view == "Belum Dilihat") {
      $insert = [
        'view_doswal' => 'Dilihat Koorkk'
      ];
      $this->db->update('file_pendaftaran', $insert, ['id' => $id]);
    }
    $data = $this->user_model->getfilekoor($id_mhs);
    $output = '';
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row">' . ++$no . '</td>
                    <td></td>
                    <td>' . $i['nama'] . '</td>
                    <td>
                      <a href="' . base_url('assets/upload/thesis/') . $i['username'] . '/' . $i['file'] . '" download title="Download File">' . $i['file'] . '</a>
                    </td>
                    <td><a data-toggle="modal" data-target="#pdf' . encrypt_url($i['id']) . '" class="btn badge badge-secondary" id="view" style="color: white;">Lihat</a></td>';
        if ($i['status_doswal'] == "Dikirim" or $i['status_doswal'] == "Update") {
          if ($i['view_doswal'] != "Belum Dilihat") {
            $output .= '<td id="action"> <a href="' . base_url('users/acckoorta/') . encrypt_url($i['id']) . '" class="btn badge badge-success">Acc</a>
                        <a data-toggle="modal" data-target="#' . encrypt_url($i['id']) . '" class="btn badge badge-danger" style="color: white;">Tolak</a>
                    </td>
                    <td><b>Dilihat</b></td>
                    <td></td>
                    ';
          } else {
            $output .= '<td></td>
                        <td><b>Belum Dilihat</b></td>
                        <td></td>';
          }
        } elseif ($i['status_doswal'] == "Disetujui koor" or $i['status_doswal'] == "Ditolak wali" or $i['status_doswal'] == "Disetujui wali") {
          $output .= '<td></td>
                      <td><b>Acc</b></td>
                      <td></td>';
        } elseif ($i['status_doswal'] == "Ditolak koor") {
          $output .= '<td><a data-toggle="modal" data-target="#komen' . encrypt_url($i['id']) . '" class="badge badge-warning" style="color:white">Beri Tanggapan</a></td>
                      <td><b>Tolak</b></td>
                      <td>' . $i['komentar'] . '</td>';
        }
      };
    } else {
      $output .= '<tr>
                    <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                  </tr>';
    }
    echo $output;
  }

  public function updateviewdoswal()
  {
    $id = $this->input->post('id');
    $id_mhs = $this->input->post('id_mhs');
    $view = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->view_doswal;
    if ($view == "Belum Dilihat") {
      $insert = [
        'view_doswal' => 'Dilihat Doswal'
      ];
      $this->db->update('file_pendaftaran', $insert, ['id' => $id]);
    }
    $data = $this->user_model->getfilekoor($id_mhs);
    $output = '';
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row">' . ++$no . '</td>
                    <td></td>
                    <td>' . $i['nama'] . '</td>
                    <td>
                      <a href="' . base_url('assets/upload/thesis/') . $i['username'] . '/' . $i['file'] . '" download title="Download File">' . $i['file'] . '</a>
                    </td>
                    <td><a data-toggle="modal" data-target="#pdf' . encrypt_url($i['id']) . '" class="btn badge badge-secondary" id="view" style="color: white;">Lihat</a></td>';
        if ($i['status_doswal'] == "Dikirim" or $i['status_doswal'] == "Update") {
          if ($i['view_doswal'] != "Belum Dilihat") {
            $output .= '<td id="action"> <a href="' . base_url('users/acckoorta/') . encrypt_url($i['id']) . '" class="btn badge badge-success">Acc</a>
                        <a data-toggle="modal" data-target="#' . encrypt_url($i['id']) . '" class="btn badge badge-danger" style="color: white;">Tolak</a>
                    </td>
                    <td><b>Dilihat</b></td>
                    <td></td>
                    ';
          } else {
            $output .= '<td></td>
                        <td><b>Belum Dilihat</b></td>
                        <td></td>';
          }
        } elseif ($i['status_doswal'] == "Disetujui koor" or $i['status_doswal'] == "Ditolak wali" or $i['status_doswal'] == "Disetujui wali") {
          $output .= '<td></td>
                      <td><b>Acc</b></td>
                      <td></td>';
        } elseif ($i['status_doswal'] == "Ditolak koor") {
          $output .= '<td><a data-toggle="modal" data-target="#komen' . encrypt_url($i['id']) . '" class="badge badge-warning" style="color:white">Beri Tanggapan</a></td>
                      <td><b>Tolak</b></td>
                      <td>' . $i['komentar'] . '</td>';
        }
      };
    } else {
      $output .= '<tr>
                    <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan TA</td>
                  </tr>';
    }
    echo $output;
  }
}
