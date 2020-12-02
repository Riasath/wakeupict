<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    } 

    function insertPatient($data) {
        $this->db->insert('patient', $data);
    }

    function getPatient() {
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }
    
    function getPatientByPatient($patient_id) {
        $this->db->where('id', $patient_id);
        $query = $this->db->get('patient');
        return $query->result();
    }
    
    function getPatientByIdTwo($patient_id) {
        $this->db->where('id', $patient_id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function updatePatient($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
    }

    function deletePatient($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient');
    }

    function updateUserGroup($group_data, $ion_user_id) {
        $this->db->where("user_id", $ion_user_id);
        $this->db->update('users_groups', $group_data);
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

    //details table data anar jonno
    function getDetails($id) {
        $this->db->order_by('id', 'ASC');
        $this->db->where('patient_id', $id);
        $query = $this->db->get('details');
        return $query->result();
    }

    //  Show array data 

    function getDetailsByPatientId($id) {
        $this->db->order_by('id', 'ASC');
        $this->db->where('patient_id', $id);
        $query = $this->db->get('details');
        return $query->row();
    }

}
