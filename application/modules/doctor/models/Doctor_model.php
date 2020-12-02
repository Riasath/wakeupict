<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function insertDoctor($data) {
        $this->db->insert('doctor', $data);
    }
    
      function getDoctor() {
        $this->db->order_by("id", "asc");
        $query = $this->db->get('doctor');
        return $query->result();
    }
    function getDoctorById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('doctor');
        return $query->row();
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
     function updateDoctor($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('doctor', $data);
    }
      function deleteDoctor($id) {
        $this->db->where('id', $id);
        $this->db->delete('doctor');
    }
}
