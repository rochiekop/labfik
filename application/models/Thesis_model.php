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

    public function getAllCorrection($guidance_id, $tahapan)
    {
        $this->db->select('correction1, correction2');
        $this->db->from('thesis');
        $this->db->where('thesis.id_guidance', $guidance_id);
        $this->db->where('tahapan_preview', $tahapan);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllCorrectionByUserId($user_id, $tahapan)
    {
        $this->db->select('id');
        $this->db->from('guidance');
        $this->db->where('id_mhs', $user_id);
        $query = $this->db->get();
        $guidance_id = $query->row()->id;

        $this->db->select('correction1, correction2');
        $this->db->from('thesis');
        $this->db->where('id_guidance', $guidance_id);
        $this->db->where('tahapan_preview', $tahapan);
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

    public function getStepPreview($guidance_id)
    {
        $this->db->select('status_preview');
        $this->db->from('guidance');
        $this->db->where('id', $guidance_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getStepPreviewByUserId($user_id)
    {
        $this->db->select('status_preview');
        $this->db->from('guidance');
        $this->db->where('id_mhs', $user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getInformasiPresentasi($guidance_id)
    {
        $this->db->select('tanggal_presentasi, waktu_presentasi, link_presentasi');
        $this->db->from('guidance');
        $this->db->where('id', $guidance_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getInformasiSidang($guidance_id)
    {
        $this->db->select('tanggal_sidang, waktu_sidang, link_sidang, ruang_sidang');
        $this->db->from('guidance');
        $this->db->where('id', $guidance_id);
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

    public function saveKelayakan($id_guidance)
    {
        $data = array(
            'kelayakan' => implode(',', $this->input->post('kelayakan', true)),
            'komentar_kelayakan' => $this->input->post('komentar_kelayakan', true)
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function saveKelayakan2($id_guidance)
    {
        $data = array(
            'kelayakan2' => implode(',', $this->input->post('kelayakan2', true)),
            'komentar_kelayakan2' => $this->input->post('komentar_kelayakan2', true)
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function savePenilaian($id_guidance)
    {
        $data = array(
            "nilai_pembimbing1" => implode(',', $this->input->post('nilai1', true)),
            "nilai_pembimbing2" => implode(',', $this->input->post('nilai2', true)),
            "penilaian_pembimbing1" => $this->input->post('penilaian1', true),
            "penilaian_pembimbing2" => $this->input->post('penilaian2', true),

            "nilai_penguji1" => implode(',', $this->input->post('nilai3', true)),
            "nilai_penguji2" => implode(',', $this->input->post('nilai4', true)),
            "penilaian_penguji1" => implode(',', $this->input->post('penilaian3', true)),
            "penilaian_penguji2" => implode(',', $this->input->post('penilaian4', true)),
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function savePoin($id_guidance)
    {
        $data = array(
            "poin_pembimbing1" => implode(',', $this->input->post('poin1', true)),
            "poin_pembimbing2" => implode(',', $this->input->post('poin2', true)),
            "evaluasi_pembimbing1" => $this->input->post('evaluasi1', true),
            "evaluasi_pembimbing2" => $this->input->post('evaluasi2', true),

            "poin_penguji1" => implode(',', $this->input->post('poin3', true)),
            "poin_penguji2" => implode(',', $this->input->post('poin4', true)),
            "evaluasi_penguji1" => implode(',', $this->input->post('evaluasi3', true)),
            "evaluasi_penguji2" => implode(',', $this->input->post('evaluasi4', true)),
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function saveInformasiPresentasi($id_guidance)
    {
        $data = array(
            "tanggal_presentasi" => $this->input->post('tanggal_presentasi', true),
            "waktu_presentasi" => $this->input->post('waktu_presentasi', true),
            "link_presentasi" => $this->input->post('link_presentasi', true)
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function getPenilaian($id_guidance)
    {
        $this->db->select('id, nilai_pembimbing1, penilaian_pembimbing1, nilai_pembimbing2, penilaian_pembimbing2, nilai_penguji1, penilaian_penguji1, nilai_penguji1, penilaian_penguji2, nilai_penguji2, poin_pembimbing1, poin_pembimbing2, poin_penguji1, poin_penguji2, evaluasi_pembimbing1, evaluasi_pembimbing2, evaluasi_penguji1, evaluasi_penguji2');
        $this->db->from('guidance');
        $this->db->where('id', $id_guidance);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getKelayakan($id_guidance)
    {
        $this->db->select('kelayakan, kelayakan2, komentar_kelayakan, komentar_kelayakan2');
        $this->db->from('guidance');
        $this->db->where('id', $id_guidance);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function setSesuai($thesis_id)
    {
        $data = array(
            'status' => 'Sesuai'
        );
        $this->db->update('thesis', $data, array('id' => $thesis_id));
    }

    public function setRevisi($thesis_id)
    {
        $data = array(
            'status' => 'Revisi'
        );
        $this->db->update('thesis', $data, array('id' => $thesis_id));
    }

    public function setKembali1($id_guidance)
    {
        $data = array(
            'status_preview' => 'preview1'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setKembali2($id_guidance)
    {
        $data = array(
            'status_preview' => 'preview2'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setKembali3($id_guidance)
    {
        $data = array(
            'status_preview' => 'preview3'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setUlangiBimbingan($id_guidance)
    {
        $data = array(
            'date' => date('d-m-Y'),
            'penilaian_pembimbing1' => '',
            'nilai_pembimbing1' => '',
            'penilaian_pembimbing1' => '',
            'nilai_pembimbing2' => '',
            'penilaian_pembimbing2' => '',
            'nilai_penguji1' => '',
            'penilaian_penguji1' => '',
            'nilai_penguji2' => '',
            'penilaian_penguji2' => '',
            'status_preview' => ''
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));

        $this->db->delete('thesis_lecturer', array('id_guidance' => $id_guidance));
    }

    public function setLanjutKePreview2($id_guidance)
    {
        $data = array(
            'status_preview' => 'preview2'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setLanjutKePreview3($id_guidance)
    {
        $data = array(
            'status_preview' => 'preview3'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setLanjutKeSidang($id_guidance)
    {
        $data = array(
            'status_preview' => 'sidang'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }

    public function setLulus($id_guidance)
    {
        $data = array(
            'status_preview' => 'lulus'
        );
        $this->db->update('guidance', $data, array('id' => $id_guidance));
    }
    
}