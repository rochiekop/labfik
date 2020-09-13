<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Search extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ajax_search');
    $this->load->model('user_model');
    $this->load->model('adminlaa_model');
    $this->load->model('koordinatorta_model');
    // is_logged_in();
  }

  public function fetch()
  {
    $output = '';
    $query = $this->input->post('query');
    $data = $this->ajax_search->fetch_data($query);
    // $data = $this->user_model->getallbimbingan();
    $output .= '
      <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Dosen</th>
            <th scope="col" style="width:30%">Keterangan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">View Dokumen</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
      ';
    if (!empty($data)) {
      foreach ($data as $t) {
        $no = 0;
        $output .= '<tbody> 
                      <tr>
                        <td scope="row">' . ++$no . '</td>
                        <td>' . $t['dosen_name'] . '</td>
                        <td>' . $t['keterangan'] . '</td>
                        <td>' . $t['date'] . '</td>
                        <td>
                        </td>
                      </tr>
                    </tbody>';
      };
    } else {
      $output .= ' <tr>
                      <td colspan="6" style="background-color: whitesmoke;text-align:center">List Tempat kosong</td>
                    </tr>';
    }
    $output .= '</table>';

    echo $output;
  }

  public function fetchdatakategori()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatakategori($query, $filter);
      } else {
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatakategori($filter);
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatakategori($query);
      } else {
        $data = $this->ajax_search->fetchdatakategori();
      }
    }
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $t) {
        $output .= '
                    <tr>
                      <td scope="row" style="width:60px">' . ++$no . '</td>
                      <td style="width:80px">
                      </td>
                      <td>' . $t['kategori'] . '</td>
                      <td>' . $t['date_created'] . '</td>
                      <td class="action">
                        <a data-toggle="modal" data-target="#deletemodal' . encrypt_url($t['id']) . '"><span class="fas fa-trash"></span></a>
                        <a data-toggle="modal" data-target="#editmodal' . encrypt_url($t['id']) . '"><span class="fas fa-edit"></span></a>
                      </td>
                    </tr>
                    ';
      };
    } else {
      $output .= '<tr>
                      <td colspan="5" style="background-color: whitesmoke;text-align:center">Kategori yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdataslider()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdataslider($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdataslider();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdataslider($query);
      } else {
        $data = $this->ajax_search->fetchdataslider();
      }
    }

    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row" style="width:0px">' . ++$no . '</td>
                    <td style="width:40px">
                    </td>
                    <td>' . $i['title'] . '</td>
                    <td>' . $i['body'] . '</td>
                    <td>
                      <div class="img-wrapper">
                        <img src="' . base_url('assets/img/slider/') . $i['images'] . '" alt="">
                      </div>
                    </td>
                    <td>' . format_indo($i['date'], date('d-m-Y')) . '</td>
                    <td class="action">
                      <a data-toggle="modal" id="' . $i['date'] . '" data-target="#deletemodal' . encrypt_url($i['id']) . '"><span class="fas fa-trash"></span></a>
                      <a href="' . base_url() . '/admin/edit_dtslider/' . encrypt_url($i['id']) . '"><span class="fas fa-edit"></span></a>
                    </td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Info slider yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatainfo()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatainfo($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatainfo();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatainfo($query);
      } else {
        $data = $this->ajax_search->fetchdatainfo();
      }
    }

    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row" style="width:60px">' . ++$no . '</td>
                    <td style="width:90px">
                      <div class="img-wrapper">
                        <img src="' . base_url('assets/img/informasi/thumbs/') . $i['images'] . '" alt="">
                      </div>
                    </td>
                    <td>' . $i['title'] . '</td>
                    <td class="desc">' . $i['body'] . '</td>
                    <td>' . $i['uploadby'] . '</td>
                    <td>' . format_indo($i['date'], date('d-m-Y')) . '</td>
                    <td class="action">
                      <a data-toggle="modal" data-target="#deletemodal' . encrypt_url($i['id']) . '"><span class="fas fa-trash"></span></a>
                      <a href="' . base_url() . '/admin/edit_dtinfo/' . encrypt_url($i['id']) . '"><span class="fas fa-edit"></span></a>
                    </td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Informasi yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatalab()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatalab($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatalab();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatalab($query);
      } else {
        $data = $this->ajax_search->fetchdatalab();
      }
    }

    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row" style="width:60px">' . ++$no . '</td>
                    <td style="width:90px">
                      <div class="img-wrapper">
                        <img src="' . base_url('assets/img/laboratorium/thumbs/') . $i['images'] . '" alt="">
                      </div>
                    </td>
                    <td>' . $i['title'] . '</td>
                    <td>' . $i['body'] . '</td>
                    <td>' . format_indo($i['date'], date('d-m-Y')) . '</td>
                    <td class="action">
                      <a data-toggle="modal" data-target="#deletemodal' . encrypt_url($i['id']) . '"><span class="fas fa-trash"></span></a>
                      <a href="' . base_url() . '/admin/edit_dtlab/' . encrypt_url($i['id']) . '"><span class="fas fa-edit"></span></a>
                    </td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="6" style="background-color: whitesmoke;text-align:center">Data Lab. yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapeminjamantmpt()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapeminjamantmpt($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapeminjamantmpt();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatapeminjamantmpt($query);
      } else {
        $data = $this->ajax_search->fetchdatapeminjamantmpt();
      }
    }
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row"><b>' . ++$no . '</b></td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['kategori'] . ' - ' . $i['ruangan'] . '</td>
                    <td>' . $i['date'] . '</td>
                    <td>' . substr($i['time'], 0, 8) . substr($i['time'], -5) . '</td>
                    <td>' . $i['keterangan'] . '</td>
                    <td><b>' . $i['status'] . '</b></td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Data peminjaman yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatatempat()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatatmpt($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatatmpt();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatatmpt($query);
      } else {
        $data = $this->ajax_search->fetchdatatmpt();
      }
    }
    // CONTINUE------------->
  }

  public function fetchdatabimbingan()
  {
    $idguidance = $this->db->get_where('guidance', ['id_mhs' => $this->session->userdata('id')])->row()->id;

    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatabimbingan($idguidance, $query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatabimbingan($idguidance);
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatabimbingan($idguidance, $query);
      } else {
        $data = $this->ajax_search->fetchdatabimbingan($idguidance);
      }
    }

    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row">' . ++$no . '</td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['keterangan'] . '</td>
                    <td>' . date('Y-m-d', strtotime($i['date'])) . '</td>
                    <td><a href=' . base_url('users/viewfilepdf/') . encrypt_url($i['id']) . '>view</a></td>
                    <td>[built]</td>
                    <td>[built]</td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Data bimbingan yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatarequesttoken()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatarequesttoken($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatarequesttoken();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatarequesttoken($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatarequesttoken();
      }
    }
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row" style="width:60px">' . ++$no . '</td>
                    <td scope="row" style="width:90x"></td>
                    <td>' . $i['username'] . '</td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['email'] . '</td>
                    <td class="action">
                    <a data-toggle="modal" data-target="#deletemodal' . encrypt_url($i['id']) . '"><span class="fas fa-times"></span></a>
                    <a data-toggle="modal" data-target="#sendtokenmodal' . encrypt_url($i['id']) . '"><span class="fas fa-check"></span></a>
                    </td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Data dosen yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapermintaanbimbingan()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapermintaanbimbingan($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapermintaanbimbingan();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatapermintaanbimbingan($query);
      } else {
        $data = $this->ajax_search->fetchdatapermintaanbimbingan();
      }
    }
    // var_dump($data);
    // die;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td scope="row"><b>' . ++$no . '</b></td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['nim'] . '</td>
                    <td>' . $i['prodi'] . '</td>
                    <td>' . $i['judul'] . '</td>
                    <td>' . $i['status'] . '</td>
                    <td>[built]</td>
                  </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">Data dosen yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatakarya()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatakarya($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatakarya();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatakarya($query);
      } else {
        $data = $this->ajax_search->fetchdatakarya();
      }
    }

    if (!empty($data)) {
      if ($this->session->userdata('role_id') == 4) {
        $no = 0;
        foreach ($data as $data) {
          if ($data['type'] == 'Foto') {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <img src=' . base_url('assets/upload/images/' . $data['gambar']) . '>
                            </a>
                        </td>
                        <td>' . $data['nim'] . '</td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
          } elseif ($data['type'] == 'Video') {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <video src=' . base_url('assets/upload/images/' . $data['gambar']) . ' width="80"></video>
                            </a>
                        </td>
                        <td>' . $data['nim'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
          } else {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <span class="fas fa-file-pdf fa-4x"></span>
                            </a>
                        </td>
                        <td>' . $data['nim'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
          }
        };
      } elseif ($this->session->userdata('role_id') == 3) {
        $no = 0;
        foreach ($data as $data) {
          if ($data['type'] == 'Foto') {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <img src=' . base_url('assets/upload/images/' . $data['gambar']) . '>
                            </a>
                        </td>
                        <td>' . $data['nama'] . '</td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                            <a href=' . base_url('karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                        </td>
                      </tr>';
          } elseif ($data['type'] == 'Video') {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <video src=' . base_url('assets/upload/images/' . $data['gambar']) . ' width="80"></video>
                            </a>
                        </td>
                        <td>' . $data['nama'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                            <a href=' . base_url('karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                        </td>
                      </tr>';
          } else {
            $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <span class="fas fa-file-pdf fa-4x"></span>
                            </a>
                        </td>
                        <td>' . $data['nama'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                            <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                            <a href=' . base_url('karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                        </td>
                      </tr>';
          }
        };
      }
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">List Karya Kosong.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatakaryaadmin()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatakaryaadmin($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatakaryaadmin();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $data = $this->ajax_search->fetchdatakaryaadmin($query);
      } else {
        $data = $this->ajax_search->fetchdatakaryaadmin();
      }
    }

    if (!empty($data)) {
      $no = 0;
      foreach ($data as $data) {
        if ($data['type'] == 'Foto') {
          $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <img src=' . base_url('assets/upload/images/' . $data['gambar']) . '>
                            </a>
                        </td>
                        <td>' . $data['nama'] . '</td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                          <a href=' . base_url('admin_karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                          <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
        } elseif ($data['type'] == 'Video') {
          $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <video src=' . base_url('assets/upload/images/' . $data['gambar']) . ' width="80"></video>
                            </a>
                        </td>
                        <td>' . $data['nim'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                          <a href=' . base_url('admin_karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                          <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
        } else {
          $output .= ' <tr>
                        <td>' . ++$no . '</td>
                        <td>
                            <a class="img-wrapper" type="button" data-target="#exampleModal' . $data['id_tampilan'] . '" data-toggle="modal">
                                <span class="fas fa-file-pdf fa-4x"></span>
                            </a>
                        </td>
                        <td>' . $data['nim'] . ' </td>
                        <td>' . $data['nama_kategori'] . '</td>
                        <td>' . $data['tanggal_post'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td class="action">
                          <a href=' . base_url('admin_karya/edit/' . $data['id_tampilan']) . '><span class="fas fa-edit"></span></a>
                          <a data-toggle="modal" data-target="#delete-' . $data['id_tampilan'] . '"><span class="fas fa-trash"></span></a>
                        </td>
                      </tr>';
        }
      };
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">List Karya Kosong.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapendaftaranadminlaa()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapendaftaranadminlaa($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapendaftaranadminlaa();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapendaftaranadminlaa($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapendaftaranadminlaa();
      }
    }
    $userslist = [];
    foreach ($data as $u) {
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
    $data = $userslist;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td>' . ++$no . '</td>
                    <td><a href="' . base_url('adminlaa/viewdetail/') . encrypt_url($i['id']) . '" class="btn badge badge-secondary">Details</a></td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['nim'] . '</td>
                    <td>' . $i['prodi'] . '</td>
                    <td>' . $i['peminatan'] . '</td>
                    <td>' . $i['dosen_wali'] . '</td>
                    <td>' . $i['tahun'] . '</td>
                    ';
        if ($i['status_file'] == "Disetujui wali" and $i['diterima'] == "0" and $i['ditolak'] == "0" and $i['updated'] == "0") {
          $output .= '<td><b>Menunggu Persetujuan</b></td>';
        } elseif ($i['diterima'] != 5 and $i['updated'] == "0") {
          $output .= '<td><b>' . $i['diterima'] . ' Diterima, ' . $i['ditolak'] . ' Ditolak</b></td>';
        } elseif ($i['updated'] != "0") {
          $output .= '<td><b>' . $i['updated'] . ' File baru</b></td>';
        } else {
          $output .= '<td><b>Disetujui</b></td>';
        }
        '</tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Mahasiswa yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapendaftarankoorta()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapendaftarankoorta($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapendaftarankoorta();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->ajax_search->fetchdatapendaftarankoorta($query, $filter);
      } else {
        $data = $this->ajax_search->fetchdatapendaftarankoorta();
      }
    }


    $userslist = [];
    foreach ($data as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'tahun' => $u['tahun'],
          'data' => $this->koordinatorta_model->getKK($u['id_guidance']),
          'dosen_wali' => $this->adminlaa_model->getDosenWali($u['dosen_wali'])->name,
          'aksi' => $this->koordinatorta_model->getCheckThesisLecturer($u['id_guidance']),
        ];
    }
    $data = $userslist;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        if ($i['aksi'] == 0) {
          $output .= '<tr style="background-color: #ebecf1;color:black">';
        } else {
          $output .= '<tr>';
        };
        $output .= '<td><b>' . ++$no . '</b></td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['nim'] . '</td>
                    <td>' . $i['prodi'] . '</td>
                    <td>' . $i['peminatan'] . '</td>';
        if (substr($i['data']['kelompok_keahlian'], 0, 5) == "Ketua") {
          $output .= '<td>' . substr($i['data']['kelompok_keahlian'], 6) . '</td>';
        } else {
          $output .= '<td>' . $i['data']['kelompok_keahlian'] . '</td>';
        }
        $output .= '<td>' . $i['dosen_wali'] . '</td>
                    <td>' . $i['tahun'] . '</td>
                              ';
        if ($i['aksi'] != 0) {
          $output .= '<td><b>Ditambahkan</b></td>';
        } else {
          $output .= '<td><a data-toggle="modal" data-target="#exampleModal' . $i['id'] . '" class="badge badge-primary" style="color:#fff;margin-top:6px">+ Pembimbing</a><td>';
        }
        '</tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Mahasiswa yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatakuotadosen()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->koordinatorta_model->getDosen($query, $filter);
      } else {
        $data = $this->koordinatorta_model->getDosen();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->koordinatorta_model->getDosen($query, $filter);
      } else {
        $data = $this->koordinatorta_model->getDosen();
      }
    }
    $userslist = [];
    foreach ($data as $u) {
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

    $data = $userslist;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <th scope="row">' . ++$no . '</th>
                    <td>' . $i['name'] . '</td>';
        $output .= '<td>
                    <form action="' . base_url('koordinator_ta/insertkuotapembimbing') . '" method="POST">
                    <input type="hidden" value="' . $i['id'] . '" name="id_dosen">
                    <div class="form-group" style="margin-bottom:0;">
                      <select id="kbimbingan" name="kbimbingan" class="form-control" style="width:160px;height:28px;float:left;">
                      
                      ' . $x = 1;
        $max = 15;
        while ($x <= $max) {
          if ($i['kuota_bimbingan'] == $x) {
            $output .= '<option value="' . $x . '" selected>' . $x . '</option>';
          } else {
            $output .= '<option value="' . $x . '">' . $x . '</option>';
          }
          $x++;
        };
        $output  .=   '</select>&nbsp 
        <button type="submit" class=" badge badge-success" style="color:#fff;height:28px;line-height:26px;">Simpan</button> &nbsp&nbsp;' . $i['count_bimbingan'] . '/' . $i['kuota_bimbingan'] . '
                      <div class="clearfix"></div>
                    </div>
                  </form></td>';
        $output .= '<td>
                    <form action="' . base_url('koordinator_ta/insertkuotapenguji') . '" method="POST">
                    <input type="hidden" value="' . $i['id'] . '" name="id_dosen">
                    <div class="form-group" style="margin-bottom:0;">
                      <select id="kpenguji" name="kpenguji" class="form-control" style="width:160px;height:28px;float:left;">
                      ' . $x = 1;
        $max = 15;
        while ($x <= $max) {
          if ($i['kuota_penguji'] == $x) {
            $output .=  '<option value="' . $x . '" selected>' . $x . '</option>';
          } else {
            $output .=  '<option value="' . $x . '">' . $x . '</option>';
          }
          $x++;
        };
        $output  .=   '</select>&nbsp;
                      <button type="submit" class=" badge badge-success" style="color:#fff;height:28px;line-height:26px;">Simpan</button> &nbsp&nbsp;' . $i['count_penguji'] . '/' . $i['kuota_penguji'] . '
                      <div class="clearfix"></div>
                    </div>
                  </form></td>
                      </tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Dosen yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapermintaantadosenwali()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getpermintaan($query, $filter);
      } else {
        $data = $this->user_model->getpermintaan();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getpermintaan($query, $filter);
      } else {
        $data = $this->user_model->getpermintaan();
      }
    }
    $userslist = [];
    foreach ($data as $u) {
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
    $data = $userslist;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <td>' . ++$no . '</td>
                    <td><a href="' . base_url('users/daftarfile/') . $i['id'] . '" class="btn badge badge-secondary">Details</a></td>
                    <td>' . $i['name'] . '</td>
                    <td>' . $i['nim'] . '</td>
                    <td>' . $i['prodi'] . '</td>
                    <td>' . $i['peminatan'] . '</td>
                    <td>' . $i['tahun'] . '</td>
                    ';
        if ($i['status_file'] == "Disetujui koor" and $i['diterima'] == "0" and $i['ditolak'] == "0" and $i['updated'] == "0") {
          $output .= '<td><b>Menunggu Persetujuan</b></td>';
        } elseif ($i['diterima'] != 5 and $i['updated'] == "0" and $i['updated'] != "5") {
          $output .= '<td><b>' . $i['diterima'] . ' Diterima, ' . $i['ditolak'] . ' Ditolak, ' . $i['dikirim'] . ' Menunggu</b></td>';
        } elseif ($i['updated'] != "0") {
          $output .= '<td><b>' . $i['updated'] . ' File baru</b></td>';
        } else {
          $output .= '<td><b>Disetujui</b></td>';
        }
        '</tr>';
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Mahasiswa yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatabimbingandosen()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getMhsBimbingan($query, $filter);
      } else {
        $data = $this->user_model->getMhsBimbingan();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getMhsBimbingan($query, $filter);
      } else {
        $data = $this->user_model->getMhsBimbingan();
      }
    }
    $userslist = [];
    foreach ($data as $u) {
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
    $data = $userslist;
    // var_dump($data);
    // die;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        $output .= '<tr>
                    <th scope="row" style="width:60px">' . ++$no . '</th>';
        if ($i['file_bimbingan'] != 0) {
          $output .= '<td>
          <a href="' . base_url('users/progressbimbingan/') . encrypt_url($i['id_guidance']) . '" class="btn badge badge-primary">Lihat Progres</a>
          </td>';
        } else {
          $output .= '<td><b>Belum Melakukan Bimbingan</b></td>';
        };
        $output .= '<td>' . $i['name'] . '</td>
        <td>' . $i['nim'] . '</td>
        <td>' . $i['prodi'] . '</td>
        <td>' . $i['peminatan'] . '</td>
        <td>' . $i['tahun'] . '</td>';
        if ($this->session->userdata('id') == $i['dosen_pemb1']) {
          $output .= '<td><b>Pembimbing 1</b></td>';
        } else {
          $output .= '<td><b>Pembimbing 2</b></td>';
        };
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Mahasiswa yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }

  public function fetchdatapendaftarantakoorkk()
  {
    $output = '';
    if ($this->input->post('filter') != "Semua" and $this->input->post('filter') != "Filter") {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getpermintaanta($query, $filter);
      } else {
        $data = $this->user_model->getpermintaanta();
      }
    } else {
      if ($this->input->post('keyword')) {
        $query = $this->input->post('keyword');
        $filter = $this->input->post('filter');
        $data = $this->user_model->getpermintaanta($query, $filter);
      } else {
        $data = $this->user_model->getpermintaanta();
      }
    }
    $userslist = [];
    foreach ($data as $u) {
      $userslist[] =
        [
          'id' => $u['id'],
          'id_tr' => $u['id_tr'],
          'id_guidance' => $u['id_guidance'],
          'name' => $u['name'],
          'nim' => $u['nim'],
          'prodi' => $u['prodi'],
          'peminatan' => $u['peminatan'],
          'dosen_wali' => $this->user_model->getdosenwalita($u['dosen_wali'])->name,
          'status_file' => $u['status_file'],
          'tahun' => $u['tahun'],
          'data' => $this->koordinatorta_model->getKK($u['id_guidance']),
        ];
    }
    $data = $userslist;
    if (!empty($data)) {
      $no = 0;
      foreach ($data as $i) {
        if ($i['status_file'] == "Dikirim") {
          $output .= '<tr style="background-color: #ebecf1;color:black">';
        } else {
          $output .= '<tr>';
        }
        $output .= '
        <td><b>' . ++$no . '</b><td>
        <td>' . $i['name'] . '</td>
        <td>' . $i['nim'] . '</td>
        <td>' . $i['prodi'] . '</td>
        <td>' . $i['peminatan'] . '</td>
        <td>' . substr($this->session->userdata('koordinator'), 6) . '</td>
        <td>' . $i['tahun'] . '</td>
        <td> <a data-toggle="modal" data-target="#' . encrypt_url($i['id_tr']) . '" class="btn badge badge-danger" style="color: white;">Tolak</a></td>
        ';
      };
    } else {
      $output .= '<tr>
                      <td colspan="9" style="background-color: whitesmoke;text-align:center">Data Mahasiswa yang anda cari tidak ada.</td>
                  </tr>';
    }
    echo $output;
  }
}
