<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Search extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ajax_search');
    $this->load->model('user_model');
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
    } else {
      $output .= '<tr>
                      <td colspan="7" style="background-color: whitesmoke;text-align:center">List Karya Kosong.</td>
                  </tr>';
    }
    echo $output;
  }
}
