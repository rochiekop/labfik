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

    public function saveKelayakan($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->saveKelayakan($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function saveKelayakan2($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->saveKelayakan2($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function savePenilaian($id_guidance, $peran)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->savePenilaian($id_guidance, $peran);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function savePoin()
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->savePoin($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function saveInformasiPresentasi($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->saveInformasiPresentasi($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setSesuai($thesis_id, $id_guidance)
    {
        $this->thesis_model->setSesuai($thesis_id);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setRevisi($thesis_id, $id_guidance)
    {
        $this->thesis_model->setRevisi($thesis_id);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function resetBimbingan($thesis_id, $id_guidance)
    {
        $this->thesis_model->resetBimbingan($thesis_id);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setUlangiBimbingan($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setUlangiBimbingan($id_guidance);
        redirect('users/bimbingandsn');
    }

    public function setKembali1($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setKembali1($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setKembali2($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setKembali2($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }

    public function setKembali3($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setKembali3($id_guidance);
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

    public function setLulus($id_guidance)
    {
        $id_guidance = decrypt_url($id_guidance);
        $this->thesis_model->setLulus($id_guidance);
        redirect('users/progressbimbingan/'.encrypt_url($id_guidance));
    }
}

