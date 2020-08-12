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
    if ($this->input->post('filter') != "Filter" or $this->input->post('filter') != "Semua") {
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
    // $data = $this->user_model->getallbimbingan();
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
  public function filterdatakategori()
  {
    $output = '';
    $filter = $this->input->post('filter', true);
    $data = $this->ajax_search->filterdatakategori($filter);
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
}
