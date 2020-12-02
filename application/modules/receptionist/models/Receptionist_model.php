<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receptionist_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertReceptionist($data) {
        $this->db->insert('receptionist', $data);
    }
    
    function getReceptionist() {
        $query = $this->db->get('receptionist');
        return $query->result();
    }
    
    function getReceptionistById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('receptionist');
        return $query->row();
    }
    
    function updateReceptionist($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('receptionist', $data);
    }

    function deleteReceptionist($id) {
        $this->db->where('id', $id);
        $this->db->delete('receptionist');
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
}
