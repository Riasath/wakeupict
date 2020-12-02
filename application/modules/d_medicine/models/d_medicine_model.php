<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class D_medicine_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

//    function insertMedicineCategory($data) {
//        $this->db->insert('medicine_category', $data);
//    }

//    function getMedicineCategory() {
//        $query = $this->db->get('medicine_category');
//        return $query->result();
//    }

//    function getMedicineCategoryById($id) {
//        $this->db->where('id', $id);
//        $query = $this->db->get('medicine_category');
//        return $query->row();
//    }

//    function updateMedicineCategory($id, $data) {
//        $this->db->where('id', $id);
//        $this->db->update('medicine_category', $data);
//    }

//    function deleteMedicineCategory($id) {
//        $this->db->where('id', $id);
//        $this->db->delete('medicine_category');
//    }

//    function insertMedicine($data) {
//        $this->db->insert('d_medicine', $data);
//    }

    function getMedicine() {
        $query = $this->db->get('d_medicine');
        return $query->result();
    }

    function getMedicineById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('d_medicine');
        return $query->row();
    }

    function updateMedicine($id, $value) {
        $this->db->where('id', $id);
        $this->db->update('d_medicine', $value);
    }

    function deleteMedicine($id) {
        $this->db->where('id', $id);
        $this->db->delete('d_medicine');
    }

    function getOverPhoneInfo($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('overphoneinfo');
        return $query->result();
    }

}
