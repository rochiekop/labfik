<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis_model extends CI_Model
{

    public function getFile($thesis_id)
    {
        $this->db->select('user.username');
        $this->db->from('thesis');
        $this->db->join('guidance', 'thesis.id_guidance = guidance.id');
        $this->db->join('user', 'guidance.id_mhs = user.id');
        $this->db->where('thesis.id', $thesis_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function saveCorrection()
    {
        $post = $this->input->post();
        $this->id-> = uniqid();
        $this->thesis_id = $post['thesis_id'];
        $this->corrector_id = $this->session->userdata('id');
        $this->correction = $post['correction'];
        $this->db->insert('correction', $this);
    }

    public function getCorrection($thesis_id, $corrector_id)
    {
        $this->db->select('correction');
        $this->db->from('correction');
        $this->db->where('id', $thesis_id);
        $this->db->where('corrector_id', $corrector_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllCorrection($guidance_id, $corrector_id)
    {
        $this->db->select('correction.correction');
        $this->db->from('correction');
        $this->db->join('thesis', 'correction.thesis_id = thesis.id');
        $this->db->where('thesis.id_guidance', $guidance_id);
        $this->db->where('corrector_id', $corrector_id);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}