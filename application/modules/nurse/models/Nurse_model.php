<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nurse_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertNurse($data) {
        $this->db->insert('nurse', $data);
    }
    
    function getNurse() {
        $query = $this->db->get('nurse');
        return $query->result();
    }
    
    function getNurseById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('nurse');
        return $query->row();
    }
    
    function updateNurse($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('nurse', $data);
    }

    function deleteNurse($id) {
        $this->db->where('id', $id);
        $this->db->delete('nurse');
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
    
    function getEmailSettings() {
        $query = $this->db->get('email_settings');
        return $query->row();
    }
    
    function getEmailSettingsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('email_settings');
        return $query->row();
    }
}
