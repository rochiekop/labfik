<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis_model extends CI_Model
{
    public function countCurrentRevision($thesis_id)
    {
        $this->db->select('id');
        $this->db->from('revision');
        $this->db->where('thesis_id', $thesis_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return count($result);
    }

    public function makeRevision()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->thesis_id = $post['thesis_id'];
        $this->times_of_revision = $this->countCurrentRevision($this->thesis_id);
        $this->pdf_file = $post['pdf_file'];
        $query->db->insert('revision', $this);
    }

    public function getRevision($thesis_id)
    {
        $this->db->select('revision.times_of_revision, revision.pdf_file, correction.page, correction.correction');
        $this->db->from('correction');
        $this->db->join('revision', 'correction.revision_id=revision.id');
        $this->db->join('thesis', 'revision.thesis_id=thesis.id');
        $this->db->where('thesis.id', $thesis_id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function makeCorrection($revision_id, $page)
    {
        $this->id = uniqid();
        $this->revision_id = $revision_id;
        $this->page = $page;
        $this->db->insert('correction', $this);
    }

    public function saveCorrection($revision_id, $page)
    {
        $post = $this->input->post();
        $this->correction = $post['correction'];
        $this->db->update('correction', $this, array('revision_id' => $revision_id, 'page' => $page));
    }

    public function getCorrection($revision_id, $page)
    {
        $this->db->select('correction.correction, correction.revision_id, correction.page');
        $this->db->from('correction');
        $this->db->join('revision', 'correction.revision_id=revision.id');
        $this->db->where('correction.revision_id', $revision_id);
        $this->db->where('correction.page', $page);
    }

    public function checkCorrectionEmpty($revision_id, $page)
    {
        $this->db->select('id');
        $this->db->from('correction');
        $this->db->where('revision_id', $revision_id);
        $this->db->where('page', $page);
        $query = $this->db->get();
        $result = $query->result_array();
        if (count($result) == 0)
        {
            return true;
        }
    }

}