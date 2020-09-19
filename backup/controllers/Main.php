<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('main_model');
    $this->load->model('user_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    // is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'FIKLAB | TEL-U';
    $data['dt_slider'] = $this->main_model->getDtSlider();
    $data['dt_info'] = $this->main_model->getAllDtInfoDesc9();
    $data['dt_lab'] = $this->main_model->getAllDtLab();
    $data['dt_panel'] = $this->main_model->getDtPanel();
    $data['dt_schedule'] = $this->main_model->getDtBookingSchedule();
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/index', $data);
    $this->load->view('templates/main/footer');
  }


  public function peminjaman()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    // Session name is $newData
    if (isset($_SESSION['id'])) {
      redirect('auth/check');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">
			Ooppss... Kamu harus login untuk menggunakan fitur ini</div>');
      redirect('auth');
    }
  }

  public function helpdesk()
  {
    $data['title'] = 'Laboratorium FIK';
    // Session name is $newData
    if (isset($_SESSION['id'])) {
      // redirect('auth/helpdeskRedirect');
      redirect('chat');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">
			Ooppss... Kamu harus login untuk menggunakan fitur ini</div>');
      redirect('auth');
    }
  }

  public function thesis()
  {
    $data['title'] = 'Laboratorium FIK';
    // Session name is $newData
    if (isset($_SESSION['id'])) {
      redirect('thesis');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">
			Ooppss... Kamu harus login untuk menggunakan fitur ini</div>');
      redirect('auth');
    }
  }

  public function schedule()
  {
    $data['dt_schedule'] = $this->main_model->getDtBookingSchedule();
    $this->load->view('main/schedule', $data);
  }

}
