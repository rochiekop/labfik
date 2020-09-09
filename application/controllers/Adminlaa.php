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

    //konfigurasi pagination
    $name = $this->adminlaa_model->getMhs();
    // $config['base_url'] = site_url('adminlaa/index'); //site url
    // $config['total_rows'] = count($name); //total row
    // $config['per_page'] = 1;  //show record per halaman
    // $config["uri_segment"] = 3;  // uri parameter
    // $choice = $config["total_rows"] / $config["per_page"];
    // $config["num_links"] = floor($choice);
    // // Membuat Style pagination untuk BootStrap v4
    // $config['first_link']       = 'First';
    // $config['last_link']        = 'Last';
    // $config['next_link']        = 'Next';
    // $config['prev_link']        = 'Prev';
    // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    // $config['full_tag_close']   = '</ul></nav></div>';
    // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    // $config['num_tag_close']    = '</span></li>';
    // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['prev_tagl_close']  = '</span>Next</li>';
    // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    // $config['first_tagl_close'] = '</span></li>';
    // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    // $config['last_tagl_close']  = '</span></li>';

    // $this->pagination->initialize($config);
    // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    // $name = $this->adminlaa_model->getMhs($config["per_page"], $data['page']);
    // $data['pagination'] = $this->pagination->create_links();
    $data['guidance'] = $this->db->get('guidance')->result_array();

    $data['title'] = 'LABFIK | Pendaftaran TA';
    $infolist = array(
      'disetujui' => $this->adminlaa_model->countInfo('Disetujui'),
      'ditolak' => $this->adminlaa_model->countInfo('Ditolak'),
      'updated' => $this->adminlaa_model->countInfo('Update'),
      'menunggu' => $this->adminlaa_model->countInfo('Dikirim'),
      'all' => $this->adminlaa_model->countAllInfo(),
    );

    $data['info'] = $infolist;
    $userslist = [];
    foreach ($name as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
          'status_file' => $u['status_file'],
          'tahun' => $u['tahun'],
          'diterima' => $this->adminlaa_model->countStatus($u['id'], 'Disetujui'),
          'ditolak' => $this->adminlaa_model->countStatus($u['id'], 'Ditolak'),
          'updated' => $this->adminlaa_model->countStatus($u['id'], 'Update'),
        ];
    }
    $data['mahasiswa'] = $userslist;

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
          'status_file' => 'Disetujui Adminlaa',
          'status_preview' => 'preview1'
        ];
        $this->db->update('guidance', $data, ['id_mhs' => $file['id_mhs']]);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $file['nama'] . ' disetujui</div>');

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
    $file = $this->db->get_where('file_pendaftaran', ['id' => $id])->row_array();
    $nama = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->nama;
    if ($file) {
      $data = [
        'status_adminlaa' => 'Ditolak',
      ];
      $this->db->update('file_pendaftaran', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ' . $nama . ' ditolak</div>');
      redirect('adminlaa/viewdetail/' . encrypt_url($file['id_mhs']));
    }
  }

  function berikomentar($id)
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
      redirect('adminlaa/viewdetail/' . encrypt_url($data1));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Komentar Anda Tidak Terkirim/div>');
      $data1 = $this->db->get_where('file_pendaftaran', ['id' => $id])->row()->id_mhs;
      redirect('adminlaa/viewdetail' . encrypt_url($data1));
    }
  }
}
