<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tampilan_model');
        $this->load->library('form_validation');
        $this->load->model('gambar_model');
        $this->load->model('ajax');
    }

    public function index()
    {
        $tampilan = $this->tampilan_model->slider();
        $data = array(
            'title' => 'galery',
            'tampilan'  => $tampilan,
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/galleryKarya', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch()
    {
        $output = '';
        $data = $this->ajax->fetch_data($this->input->post('limit'), $this->input->post('start'));
        foreach ($data as $row) {
            $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			';
        }
        echo $output;
    }

    public function kategori1()
    {
        $tampilan = $this->tampilan_model->slider();

        $data = array(
            'title' => 'DKV galery',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/dkv_view', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch1()
    {
        $output = '';
        $data = $this->ajax->fetch_data1($this->input->post('limit'), $this->input->post('start'));
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
        }
        echo $output;
    }

    public function kategori2()
    {
        $tampilan = $this->tampilan_model->slider();

        $data = array(
            'title' => 'Desain Produk galery',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/dp_view', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch2()
    {
        $output = '';
        $this->load->model('ajax');
        $data = $this->ajax->kategori2($this->input->post('limit'), $this->input->post('start'));
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
        }
        echo $output;
    }

    public function kategori3()
    {
        $tampilan = $this->tampilan_model->slider();

        $data = array(
            'title' => 'desain interior galery',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/di_view', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch3()
    {
        $output = '';
        $this->load->model('ajax');
        $data = $this->ajax->kategori3($this->input->post('limit'), $this->input->post('start'));
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
        }
        echo $output;
    }

    public function kategori4()
    {
        $tampilan = $this->tampilan_model->slider();

        $data = array(
            'title' => 'kriya tekstil galery',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/ktm_view', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch4()
    {
        $output = '';
        $this->load->model('ajax');
        $data = $this->ajax->kategori4($this->input->post('limit'), $this->input->post('start'));
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
        }
        echo $output;
    }

    public function kategori5()
    {
        $tampilan = $this->tampilan_model->slider();

        $data = array(
            'title' => 'seni rupa galery',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/sr_view', $data);
        $this->load->view('templates/main/footer');
    }

    public function fetch5()
    {
        $output = '';
        $this->load->model('ajax');
        $data = $this->ajax->kategori5($this->input->post('limit'), $this->input->post('start'));
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <div class="feed-item">
                    <div class="panel">
                        <div class="card">
                            <div class="gambar">
                                <a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '><img class="card-img-top" src= ' . base_url("assets/upload/images/" . $row->gambar) . '></a>
                            </div>
                            <div class="item-text">
                                <h6><a href=' . base_url("galery/detail/" . $row->slug_tampilan) . '>' . $row->judul . '</a></h6>
                                <span>by <b>' . $row->name . '</b></span>
                                <div class="vote">
                                    <a title="Upvote"><i class="fas fa-chevron-up"></i> <span>' . $row->likes . '</span></a>
                                    <a><i class="fas fa-eye"></i> <span>' . $row->views . '</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				';
            }
        }
        echo $output;
    }

    public function detail($slug_tampilan)
    {
        $tampilan = $this->gambar_model->read($slug_tampilan);
        $home = $this->gambar_model->home();
        $data = array(
            'title' => 'Laboratorium Fakultas Industri Kreatif Telkom University',
            'tampilan'  => $tampilan,
            'home'      => $home
        );
        $this->add_count($slug_tampilan);
        $this->load->view('templates/main/header', $data);
        $this->load->view('main/galleryView', $data);
        $this->load->view('templates/main/footer');
    }

    function add_count($slug_tampilan)
    {
        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($slug_tampilan), FALSE);
        $ip = $this->input->ip_address();
        if ($check_visitor == false) {
            $cookie = array("name" => urldecode($slug_tampilan), "value" => "$ip", "expire" => time() + 300, "secure" => false);
            $this->input->set_cookie($cookie);
            $this->ajax->update_counter(urldecode($slug_tampilan));
        }
    }

    public function savelikes()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $id_tampilan = $this->input->post('id_tampilan');


        $fetchlikes = $this->db->query('select likes from tampilan where id_tampilan="' . $id_tampilan . '"');
        $result = $fetchlikes->result();

        $checklikes = $this->db->query('select * from tampilan_like 
		                            where id_tampilan="' . $id_tampilan . '" 
		                            and ip = "' . $ip . '"');
        $resultchecklikes = $checklikes->num_rows();

        if ($resultchecklikes == '0') {
            if ($result[0]->likes == "" || $result[0]->likes == "NULL") {
                $this->db->query('update tampilan set likes=1 where id_tampilan="' . $id_tampilan . '"');
            } else {
                $this->db->query('update tampilan set likes=likes+1 where id_tampilan="' . $id_tampilan . '"');
            }

            $data = array('id_tampilan' => $id_tampilan, 'ip' => $ip);
            $this->db->insert('tampilan_like', $data);
        } else {
            $this->db->delete('tampilan_like', array(
                'id_tampilan' => $id_tampilan,
                'ip' => $ip
            ));
            $this->db->query('update tampilan set likes=likes-1 where id_tampilan="' . $id_tampilan . '"');
        }

        $this->db->select('likes');
        $this->db->from('tampilan');
        $this->db->where('id_tampilan', $id_tampilan);
        $query = $this->db->get();
        $result = $query->result();

        echo $result[0]->likes;
    }
}
