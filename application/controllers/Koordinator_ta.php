<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinator_ta extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('koordinatorta_model');
    $this->load->model('adminlaa_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    is_logged_in();
  }


  public function index()
  {
    $data['title'] = "Laboratotium FIK | Pengajuan Tugas Akhir";
    $data['lecturer'] = $this->koordinatorta_model->getThesisLecturer();
    $mhs = $this->koordinatorta_model->getMhs();

    $prodi = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row()->prodi;
    $getDosen = $this->koordinatorta_model->getDosen($prodi);
    $dosbing = $this->koordinatorta_model->getThesisLecturer();
    $userslist = [];
    foreach ($getDosen as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'prodi' => $u['prodi'],
          'kuota_bimbingan' => $u['kuota_bimbingan'],
          'kuota_penguji' => $u['kuota_penguji'],
          'koordinator' => $u['koordinator'],
          'count_bimbingan' => $this->koordinatorta_model->countStatusBimbingan($u['id']),
          'count_penguji' => $this->koordinatorta_model->countStatusPenguji($u['id']),
        ];
    }
    $data['dosen'] = $userslist;
    $userslist = [];
    foreach ($mhs as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'id_guidance' => $u['id_guidance'],
          'name' => $u['name'],
          'peminatan' => $u['peminatan'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'judul1' => $u['judul_1'],
          'judul2' => $u['judul_2'],
          'judul3' => $u['judul_3'],
          'aksi' => $this->koordinatorta_model->getCheckThesisLecturer($u['id_guidance']),
        ];
    }
    $data['mahasiswa'] = $userslist;

    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/index", $data);
    $this->load->view("templates/dashboard/footer");
  }
  public function kuotadosen()
  {
    $prodi = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row()->prodi;
    $getDosen = $this->koordinatorta_model->getDosen($prodi);
    $data['title'] =  "Laboratotium FIK | Kuota Dosen Tugas Akhir";
    $userslist = [];
    foreach ($getDosen as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'kuota_bimbingan' => $u['kuota_bimbingan'],
          'kuota_penguji' => $u['kuota_penguji'],
          'count_bimbingan' => $this->koordinatorta_model->countStatusBimbingan($u['id']),
          'count_penguji' => $this->koordinatorta_model->countStatusPenguji($u['id']),
        ];
    }
    $data['dosen'] = $userslist;

    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/kuotadosen", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function previewdua()
  {
    $pr2 = $this->koordinatorta_model->getpeview2();
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $getDosen = $this->koordinatorta_model->getDosen();
    $data['title'] = "Laboratotium FIK | Preview 2";
    $userslist = [];
    foreach ($getDosen as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'prodi' => $u['prodi'],
          'kuota_bimbingan' => $u['kuota_bimbingan'],
          'kuota_penguji' => $u['kuota_penguji'],
          'count_bimbingan' => $this->koordinatorta_model->countStatusBimbingan($u['id']),
          'count_penguji' => $this->koordinatorta_model->countStatusPenguji($u['id']),
        ];
    }
    $data['dosen'] = $userslist;
    $userslist = [];
    foreach ($pr2 as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'id_mhs'  => $u['id_mhs'],
          'id_guidance' => $u['id_guidance'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'date'   =>  $u['date'],
          'tahun' => $u['tahun'],
          'no_telp' => $u['no_telp'],
          'status'  => $u['status'],
          'dosbing1' => $this->adminlaa_model->getDosenWali($u['dosen_pembimbing1'])->name,
          'dosbing2' => $this->adminlaa_model->getDosenWali($u['dosen_pembimbing2'])->name,
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
        ];
    }
    $data['preview2'] = $userslist;
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/preview2", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function bookingPlaceoffline()
  {
    $data = array(
      'id' => uniqid(),
      'id_peminjam' => $this->input->post('id_peminjam'),
      'id_ruangan' => $this->input->post('id_ruangan'),
      'date' => $this->input->post('tanggal'),
      'time' => implode(", ", $this->input->post('time')),
      'status' => 'Diterima',
      'statusta'  => 'sidang ta'
    );
    $this->db->insert('booking', $data);
    $data = array(
      'status'      => 'sidang ta'
    );
    $this->db->update('thesis_lecturers', $data, ['id_guidance' => $this->input->post('id_guidance')]);
    $id_booking = $this->koordinatorta_model->getbooking($this->input->post('id_peminjam'), 'sidang ta');
    $data = array(
      'id_offline'  =>  $id_booking,
      'status'      => 'sidang ta'
    );
    $this->db->update('guidance', $data, ['id_mhs' => $this->input->post('id_mhs')]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Telah Terkirim!</div>');
    redirect('Koordinator_ta/previewdua');
  }

  public function placeonline()
  {
    $data = array(
      'id' => uniqid(),
      'id_mhs'  =>  $this->input->post('id_mhs'),
      'ruangan'   =>  $this->input->post('ruangan'),
      'date' => $this->input->post('tanggal'),
      'time' => implode(", ", $this->input->post('time')),
      'status'  => 'preview 2'
    );
    $this->db->insert('taonline', $data);
    $dosbing1 = $this->input->post('dosbing1');
    $dosbing2 = $this->input->post('dosbing2');
    $data = array(
      'dosen_penguji1' => $dosbing1,
      'dosen_penguji2' => $dosbing2,
      'status'      => 'preview 2'
    );
    $this->db->update('thesis_lecturers', $data, ['id_guidance' => $this->input->post('id_guidance')]);
    $id_booking = $this->koordinatorta_model->getbookingonline($this->input->post('id_mhs'), 'preview 2');
    $data = array(
      'id_online'  =>  $id_booking
    );
    $this->db->update('guidance ', $data, ['id_mhs' => $this->input->post('id_mhs')]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Telah Terkirim!</div>');
    redirect('Koordinator_ta/previewdua');
  }

  public function placeonlinesidang()
  {
    $data = array(
      'id' => uniqid(),
      'id_mhs'  =>  $this->input->post('id_mhs'),
      'ruangan'   =>  $this->input->post('ruangan'),
      'date' => $this->input->post('tanggal'),
      'time' => implode(", ", $this->input->post('time')),
      'status'  => 'sidang ta'
    );
    $this->db->insert('taonline', $data);
    $data = array(
      'status'      => 'sidang ta'
    );
    $this->db->update('thesis_lecturers', $data, ['id_guidance' => $this->input->post('id_guidance')]);
    $id_booking = $this->koordinatorta_model->getbookingonline($this->input->post('id_mhs'), 'sidang ta');
    $data = array(
      'id_online'  =>  $id_booking,
      'status'      => 'sidang ta'
    );
    $this->db->update('guidance', $data, ['id_mhs' => $this->input->post('id_mhs')]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Telah Terkirim!</div>');
    redirect('Koordinator_ta/previewdua');
  }

  public function sidang()
  {
    $pr2 = $this->koordinatorta_model->getpeview2();
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $getDosen = $this->koordinatorta_model->getDosen();
    $data['title'] = "Laboratotium FIK | Sidang";
    $userslist = [];
    foreach ($getDosen as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'prodi' => $u['prodi'],
          'kuota_bimbingan' => $u['kuota_bimbingan'],
          'kuota_penguji' => $u['kuota_penguji'],
          'count_bimbingan' => $this->koordinatorta_model->countStatusBimbingan($u['id']),
          'count_penguji' => $this->koordinatorta_model->countStatusPenguji($u['id']),
        ];
    }
    $data['dosen'] = $userslist;
    $userslist = [];
    foreach ($pr2 as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'id_mhs'  => $u['id_mhs'],
          'id_guidance' => $u['id_guidance'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'date'   =>  $u['date'],
          'tahun' => $u['tahun'],
          'no_telp' => $u['no_telp'],
          'status'  => $u['status'],
          'dosbing1' => $this->adminlaa_model->getDosenWali($u['dosen_pembimbing1'])->name,
          'dosbing2' => $this->adminlaa_model->getDosenWali($u['dosen_pembimbing2'])->name,
          'dospeng1' => $this->adminlaa_model->getDosenWali($u['dosen_penguji1'])->name,
          'dospeng2' => $this->adminlaa_model->getDosenWali($u['dosen_penguji2'])->name,
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
        ];
    }
    $data['preview2'] = $userslist;
    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/sidang", $data);
    $this->load->view("templates/dashboard/footer");
  }

  public function insertKuotaPembimbing()
  {
    $id  = $this->input->post('id_dosen');
    $kbimbingan  = $this->input->post('kbimbingan');
    $cek = $this->db->get_where('user', ['id' => $id])->row_array();
    if ($cek['kuota_bimbingan'] != $kbimbingan) {
      $data = [
        'kuota_bimbingan' => $kbimbingan
      ];
      $this->db->update('user', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kuota bimbingan untuk dosen ' . $cek['name'] . ' berhasil ditambahkan menjadi ' . $kbimbingan . ' Mahasiswa.</div>');
      redirect('koordinator_ta/kuotadosen');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kuota bimbingan untuk dosen ' . $cek['name'] . ' sekarang sudah ' . $kbimbingan . ' Mahasiswa.</div>');
      redirect('koordinator_ta/kuotadosen');
    }
  }

  public function insertKuotaPenguji()
  {
    $id  = $this->input->post('id_dosen');
    $kpenguji  = $this->input->post('kpenguji');
    $cek = $this->db->get_where('user', ['id' => $id])->row_array();
    if ($cek['kuota_penguji'] != $kpenguji) {
      $data = [
        'kuota_penguji' => $kpenguji
      ];
      $this->db->update('user', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kuota penguji untuk dosen ' . $cek['name'] . ' berhasil ditambahkan menjadi ' . $kpenguji . ' Mahasiswa.</div>');
      redirect('koordinator_ta/kuotadosen');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kuota bimbingan untuk dosen ' . $cek['name'] . ' sekarang sudah ' . $kpenguji . ' Mahasiswa.</div>');
      redirect('koordinator_ta/kuotadosen');
    }
  }

  public function addDosenPembimbing()
  {

    $values = explode(',', $this->input->post('dosbing1'));
    $dosbing1 = $values[0];
    $dosbing2 = $this->input->post('dosbing2');
    $idguidance = $this->input->post('id_guidance');
    $pemb1 = $this->adminlaa_model->getDosenWali($dosbing1);
    $pemb2 = $this->adminlaa_model->getDosenWali($dosbing2);
    if ($dosbing1 == $dosbing2) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Mohon untuk memilih dosen pembimbing yang berbeda</div>');
      redirect('koordinator_ta');
    } else {
      $data = [
        'id' => uniqid(),
        'id_guidance' => $idguidance,
        'dosen_pembimbing1' => $values[0],
        'kelompok_keahlian' => $values[1],
        'dosen_pembimbing2' => $dosbing2,
        'date' => date('m-d-Y H:i:s'),
      ];
      $this->db->insert('thesis_lecturers', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $pemb1->name . ' dan ' . $pemb2->name . ' berhasil ditambahakan sebagai dosen pembimbing</div>');
      redirect('koordinator_ta');
    }
  }

  public function viewdetail($id)
  {
    $id = decrypt_url($id);
    $id1 = $this->db->get_where('thesis_lecturers', ['id_guidance' => $id])->row()->dosen_pembimbing1;
    $id2 = $this->db->get_where('thesis_lecturers', ['id_guidance' => $id])->row()->dosen_pembimbing2;
    $id_mhs = $this->db->get_where('guidance', ['id' => $id])->row()->id_mhs;
    $id_doswal = $this->db->get_where('user', ['id' => $id_mhs])->row()->dosen_wali;

    $data = [
      'title' => "Laboratotium FIK | Details Mahasiswa",
      'dosbing1' => $this->db->get_where('user', ['id' => $id1])->row()->name,
      'dosbing2' => $this->db->get_where('user', ['id' => $id2])->row()->name,
      'data' => $this->koordinatorta_model->getKK($id),
      'peminatan' => $this->db->get_where('guidance', ['id' => $id])->row()->peminatan,
      'tahun' => $this->db->get_where('guidance', ['id' => $id])->row()->tahun,
      'doswal' => $this->db->get_where('user', ['id' => $id_doswal])->row()->name,
    ];

    $this->load->view("templates/dashboard/headerKoorTa", $data);
    $this->load->view("templates/dashboard/sidebarKoorTa");
    $this->load->view("dashboard/koorta/details", $data);
    $this->load->view("templates/dashboard/footer");
  }
}
