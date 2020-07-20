<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Borrowing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('borrowing_model');
        $this->load->model('item_model');
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
    }

    public function listAll()
    {
        $data["borrowing"] = $this->borrowing_model->getAllBorrowing();
        $this->load->view("templates/dashboard/headerKaur");
        $this->load->view("templates/dashboard/sidebarKaur");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllWaiting()
    {
        $data["borrowing"] = $this->borrowing_model->getAllWaiting();
        $this->load->view("templates/dashboard/headerKaur");
        $this->load->view("templates/dashboard/sidebarKaur");
        $this->load->view("item/kaur/logAction", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllAccepted()
    {
        $data["borrowing"] = $this->borrowing_model->getAllAccepted();
        $this->load->view("templates/dashboard/headerKaur");
        $this->load->view("templates/dashboard/sidebarKaur");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllDeclined()
    {
        $data["borrowing"] = $this->borrowing_model->getAllDeclined();
        $this->load->view("templates/dashboard/headerKaur");
        $this->load->view("templates/dashboard/sidebarKaur");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllById($user_id)
    {
        $data["borrowing"] = $this->borrowing_model->getByUserId($user_id);

        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("item/dosenMhs/log", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1')
        {
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("item/kaur/log", $data);
            $this->load->view("templates/dashboard/footer");
        }
    }

    public function listAllByIdWithStatus($user_id, $status)
    {
        $data["borrowing"] = $this->borrowing_model->getByUserIdWithStatus($user_id, $status);
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function showItem($id = null)
    {
        $item = $this->item_model;
        $data["item"] = $item->getById($id);
        if (!$data["item"]) show_404();

        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("item/dosenMhs/borrow", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1')
        {
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("item/admin/borrow", $data);
            $this->load->view("templates/dashboard/footer");
        }

    }

    // public function showItemDosenMhs($id = null)
    // {
    //     $item = $this->item_model;
    //     $data["item"] = $item->getById($id);
    //     if (!$data["item"]) show_404();

    //     $this->load->view("templates/dashboard/headerDosenMhs");
    //     $this->load->view("templates/dashboard/sidebarDosenMhs");
    //     $this->load->view("item/dosenMhs/borrow", $data);
    //     $this->load->view("templates/dashboard/footer");
    // }

    // public function showItemAdmin($id = null)
    // {
    //     $item = $this->item_model;
    //     $data["item"] = $item->getById($id);
    //     if (!$data["item"]) show_404();

    //     $this->load->view("templates/dashboard/headerAdmin");
    //     $this->load->view("templates/dashboard/sidebarAdmin");
    //     $this->load->view("item/admin/borrow", $data);
    //     $this->load->view("templates/dashboard/footer");
    // }

    public function addBorrowing()
    {
        $borrowing = $this->borrowing_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        if ($validation->run()) 
        {
            $borrowing->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
            $data["item"] = $this->item_model->getAll();
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("item/dosenMhs/list", $data);
            $this->load->view("templates/dashboard/footer");
        }
        else if ($this->session->userdata('role_id') == '1')
        {
            $data["item"] = $this->item_model->getAll();
            $this->load->view("templates/dashboard/headerAdmin");
            $this->load->view("templates/dashboard/sidebarAdmin");
            $this->load->view("item/admin/list", $data);
            $this->load->view("templates/dashboard/footer");
        }
    }

    // public function addBorrowingDosenMhs()
    // {
    //     $borrowing = $this->borrowing_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($borrowing->rules());

    //     if ($validation->run()) {
    //         $borrowing->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $data["item"] = $this->item_model->getAll();
    //     $this->load->view("templates/dashboard/headerDosenMhs");
    //     $this->load->view("templates/dashboard/sidebarDosenMhs");
    //     $this->load->view("item/dosenMhs/list", $data);
    //     $this->load->view("templates/dashboard/footer");
    // }

    // public function addBorrowingAdmin($id = null)
    // {
    //     $borrowing = $this->borrowing_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($borrowing->rules());

    //     if ($validation->run()) {
    //         $borrowing->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $data["item"] = $this->item_model->getAll();
    //     $this->load->view("templates/dashboard/headerAdmin");
    //     $this->load->view("templates/dashboard/sidebarAdmin");
    //     $this->load->view("item/admin/list", $data);
    //     $this->load->view("templates/dashboard/footer");
    // }

    public function changeStatusAccepted($id)
    {
        $this->borrowing_model->updateStatusAccepted($id);
        redirect(site_url('borrowing/listAllWaiting'));
    }

    public function changeStatusDeclined($id)
    {
        $this->borrowing_model->updateStatusDeclined($id);
        redirect(site_url('borrowing/listAllWaiting'));
    }

    public function changeStatusDone($id)
    {
        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
            if ($this->borrowing_model->updateStatusDone($id)) {
                redirect(site_url('borrowing/listAllByDosenMhs/'.$id));
            }
        }
        else if ($this->session->userdata('role_id') == '1')
        {
            if ($this->borrowing_model->updateStatusDone($id)) {
                redirect(site_url('borrowing/listAllByIdAdmin/'.$id));
            }
        }
    }

    // public function changeStatusDoneDosenMhs($id)
    // {
    //     if ($this->borrowing_model->updateStatusDone($id)) {
    //         redirect(site_url('borrowing/listAllByDosenMhs/'.$id));
    //     }
    // }

    // public function changeStatusDoneAdmin($id)
    // {
    //     if ($this->borrowing_model->updateStatusDone($id)) {
    //         redirect(site_url('borrowing/listAllByIdAdmin/'.$id));
    //     }
    // }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('auth');

        $borrowing = $this->borrowing_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        if ($validation->run()) {
            $borrowing->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["item"] = $item->getById($id);
        if (!$data["item"]) show_404();

        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/admin/edit", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            redirect(site_url('borrowing/listAll'));
        }
    }

    // Peminjaman Tempat

    public function check()
    {
        $date = $this->input->post('date');
        $check = $this->borrowing_model->check($date);
        if (empty($check)) {
            // $this->borrowing_model->dateinput($date);
            $data = [
                '06.30 - 07.30, 07.30 - 08.30', '08.30 - 09.30',
                '09.30 - 10.30', '10.30 - 11.30', '11.30 - 12.30', '12.30 - 13.30',
                '13.30 - 14.30', '14.30 - 15.30', '15.30 - 16.30', '16.30 - 17.30', '17.30 - 18.30',
                '18.30 - 19.30', '19.30 - 20.30', '20.30 - 21.30', '21.30 - 22.30'
            ];
            echo json_encode($data);
        }
    }

    public function tempat($id)
    {
        $data['title'] = 'FIKLAB | Pinjam Tempat';
        $id = decrypt_url($id);
        $data['kruangan'] = $this->admin_model->kategoriruangan();
        $data['tempatbyid'] = $this->admin_model->getDtTempatById($id);
        $valid = $this->form_validation;
        $valid->set_rules(
            'keterangan',
            'Keterangan',
            'required|trim',
            array(
                'required'      =>  '%s harus diisi',
            )
        );
        if (!$valid->run()) {
            $this->load->view('templates/dashboard/headerDosenMhs', $data);
            $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
            $this->load->view('dashboard/users/pinjamtempat');
            $this->load->view('templates/dashboard/footer');
        } else {
            $data = [
                'id' => uniqid(),
                'id_ruangan' => $this->input->post('id_ruangan'),
                'id_peminjam' => $this->input->post('id_peminjam'),
                'date' => $this->input->post('date'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => 'proses',
            ];
        }
    }
}
