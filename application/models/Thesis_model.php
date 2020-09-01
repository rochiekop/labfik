<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis_model extends CI_Model
{
    public function getUsername($thesis_id)
    {
        $this->db->select('username');
        $this->db->from('user');
        $this->db->join('guidance', 'guidance.id_mhs = user.id');
        $this->db->join('thesis', 'thesis.id_guidance = guidance.id');
        $this->db->where('thesis.id', $thesis_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getCorrection($thesis_id)
    {
        $this->db->select('id, correction1, correction2');
        $this->db->from('thesis');
        $this->db->where('id', $thesis_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getAllCorrection($guidance_id)
    {
        $this->db->select('correction1, correction2');
        $this->db->from('thesis');
        $this->db->where('thesis.id_guidance', $guidance_id);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getLecturers($thesis_id)
    {
        $this->db->select('id_guidance');
        $this->db->from('thesis');
        $this->db->where('id', $thesis_id);
        $query = $this->db->get();
        $guidance_id = $query->row()->id_guidance;

        $this->db->select('id_guidance, dosen_pembimbing1, dosen_pembimbing2');
        $this->db->from('thesis_lecturers');
        $this->db->where('id_guidance', $guidance_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function saveCorrection($thesis_id)
    {
        $post = $this->input->post();
        $data = array(
            'correction1' => $post['correction1'],
            'correction2' => $post['correction2']
		);
		$this->db->update('thesis', $data, array('id' => $thesis_id));
    }
    
}