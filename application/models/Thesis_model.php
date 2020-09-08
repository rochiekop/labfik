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

        $this->db->select('id_guidance, dosen_pembimbing1, dosen_pembimbing2, dosen_penguji1, dosen_penguji2');
        $this->db->from('thesis_lecturers');
        $this->db->where('id_guidance', $guidance_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getLecturersByGuidance($guidance_id)
    {
        $this->db->select('id_guidance, dosen_pembimbing1, dosen_pembimbing2, dosen_penguji1, dosen_penguji2');
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

    public function savePenilaianPembimbing($id_guidance)
    {
        $data = array(
            "nilai_pembimbing1" => implode(',', $this->input->post('nilai1', true)),
            "nilai_pembimbing2" => implode(',', $this->input->post('nilai2', true)),

            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_1', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_2', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_3', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_4', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_5', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_6', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_7', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_8', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_9', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_10', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_11', true)),
            // "nilai_pembimbing1" => implode(', ', $this->input->post('nilai1_12', true)),

            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_1', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_2', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_3', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_4', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_5', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_6', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_7', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_8', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_9', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_10', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_11', true)),
            // "nilai_pembimbing2" => implode(', ', $this->input->post('nilai2_12', true)),

            "penilaian_pembimbing1" => $this->input->post('penilaian1', true),
            "penilaian_pembimbing2" => $this->input->post('penilaian2', true)
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function savePenilaianPenguji($id_guidance)
    {
        $data = array(
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_1', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_2', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_3', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_4', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_5', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_6', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_7', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_8', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_9', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_10', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_11', true)),
            "nilai_penguji1" => implode(', ', $this->input->post('nilai3_12', true)),

            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_1', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_2', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_3', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_4', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_5', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_6', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_7', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_8', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_9', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_10', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_11', true)),
            "nilai_penguji2" => implode(', ', $this->input->post('nilai4_12', true)),

            "penilaian_penguji1" => implode(', ', $this->input->post('penilaian3', true)),
            "penilaian_penguji2" => implode(', ', $this->input->post('penilaian4', true)),
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function getPenilaian($id_guidance)
    {
        $this->db->select('id, nilai_pembimbing1, penilaian_pembimbing1, nilai_pembimbing2, penilaian_pembimbing2, nilai_penguji1, penilaian_penguji1, nilai_penguji1, nilai_penguji2');
        $this->db->from('guidance');
        $this->db->where('id', $id_guidance);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
}