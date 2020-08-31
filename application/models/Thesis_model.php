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
        $this->db->select('correction1, correction2');
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
        $this->db->select('thesis_lecturers.dosen_pembimbing1, thesis_lecturers.dosen_pembimbing2');
        $this->db->from('thesis_lecturers');
        $this->db->join('guidance', 'thesis_lecturers.id_guidance = guidance.id');
        $this->db->join('thesis', 'guidance.id = thesis.guidance_id');
        $this->db->where('thesis_id', $thesis_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function saveCorrection()
    {
        $post = $this->input->post();
        $data = array(
            'correction1' => $post['correction1'],
            'correction2' => $post['correction2']
		);
		$this->db->update('thesis', $data, array('id' => $id));
    }
    
}