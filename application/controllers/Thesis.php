<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('thesis_model');
        is_logged_in();
    }

    public function index()
    {

    }

    public function openFile($thesis_id, $pdf_file)
    {
        $data['pdf_file'] = $pdf_file;
        $data['username'] = $this->thesis_model->getUsername($thesis_id);
        $data['correction'] = $this->thesis_model->getCorrection($thesis_id);
        $data['lecturers'] = $this->thesis_model->getLecturers($thesis_id);

        $this->load->view('templates/dashboard/headerDosenMhs');
        $this->load->view('templates/dashboard/sidebarDosenMhs');
        $this->load->view("thesis/pdf_viewer", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function saveCorrection($thesis_id, $id_guidance)
    {
        $this->thesis_model->saveCorrection($thesis_id);
        redirect('users/progressbimbingan/'.$id_guidance);
    }

    public function savePenilaianPembimbing($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->savePenilaianPembimbing($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function savePenilaianPenguji($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance); 
        $this->thesis_model->savePenilaianPenguji($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setSelesai($thesis_id)
    {
        $this->thesis_model->setSelesai($thesis_id);
        redirect('users/progressbimbingan/'.$thesis_id);
    }

    public function setRevisi($thesis_id)
    {
        $this->thesis_model->setRevisi($thesis_id);
        redirect('users/progressbimbingan/'.$thesis_id);
    }

    public function setUlangiBimbingan($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->savePenilaianPenguji($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }


    public function setLanjutKePreview2($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setLanjutKePreview2($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setLanjutKePreview3($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setLanjutKePreview3($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setLanjutKeSidang($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setLanjutKeSidang($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }
}

