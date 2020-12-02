<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Details_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function getDetails() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('details');
        return $query->result();
    }
    
    function getDetailsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('details');
        return $query->row();
    }
    
    function getDetailsByPatientId($patient_id) {
        $this->db->order_by('id', 'ASC');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('details');
        return $query->row();
    }
    
    function getPatientById($patient_id) {
        $this->db->where('id', $patient_id);
        $query = $this->db->get('patient');
        return $query->row();
    }
    
    function getEchoById($patient_id) {
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('details');
        return $query->row();
    }
    
    function updateDetailsData($patient_id, $data) {
        $this->db->where('patient_id', $patient_id);
        $this->db->update('details', $data);
    }
    
    function deleteDetail($id) {
        $this->db->where('id', $id);
        $this->db->delete('details');
    }

}
