<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->departmentTbl = 'department';
        $this->doctorTbl = 'doctor';
    }

    function updateFrontendHeader($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('front_header', $data);
    }

    function getFrontendHeader() {
        $query = $this->db->get('front_header');
        return $query->row();
    }

    function updateWelcomeMessage($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('front_welcome', $data);
    }

    function getWelcomeMessage() {
        $query = $this->db->get('front_welcome');
        return $query->row();
    }

    /* -------------------- About Option ----------------------- */

    function updateAbout($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('front_about', $data);
    }

    function getAbout() {
        $query = $this->db->get('front_about');
        return $query->row();
    }

    /* -------------------- Blog Option ----------------------- */

    function insertBlog($data) {
        $this->db->insert('blog_setting', $data);
    }

    function updateBlog($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('blog_setting', $data);
    }

    function getBlog() {
        $this->db->order_by("id", "asc");
        $query = $this->db->get('blog_setting');
        return $query->result();
    }

    function getBlogById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('blog_setting');
        return $query->row();
    }

    function deleteBlog($id) {
        $this->db->where('id', $id);
        $this->db->delete('blog_setting');
    }

    /* -------------------- Service Option ----------------------- */

    function updateServiceHeader($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('front_service_header', $data);
    }

    function getServiceHeader() {
        $query = $this->db->get('front_service_header');
        return $query->row();
    }

    function insertService($data) {
        $this->db->insert('front_service', $data);
    }

    function updateService($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('front_service', $data);
    }

    function getService() {
        $this->db->order_by("id", "asc");
        $query = $this->db->get('front_service');
        return $query->result();
    }

    function getServiceById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('front_service');
        return $query->row();
    }

    function deleteService($id) {
        $this->db->where('id', $id);
        $this->db->delete('front_service');
    }

    /* -------------------- Setting Option ----------------------- */

    function updateSetting($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('frontend_setting', $data);
    }

    function getSetting() {
        $query = $this->db->get('frontend_setting');
        return $query->row();
    }

    /* -------------------- Contact Option ----------------------- */

    function insertContact($data) {
        $this->db->insert('contact', $data);
    }

    function getContactList() {
        $this->db->order_by("id", "asc");
        $query = $this->db->get('contact');
        return $query->result();
    }

    /* -------------------- Appointment Option ----------------------- */

    function getDepartmentRows($params = array()) {
        $this->db->select('c.id, c.name');
        $this->db->from($this->departmentTbl . ' as c');

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                if (strpos($key, '.') !== false) {
                    $this->db->where($key, $value);
                } else {
                    $this->db->where('c.' . $key, $value);
                }
            }
        }
        //$this->db->where('c.status','1');

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;

        //return fetched data
        return $result;
    }

    /*
     * Get state rows from the countries table
     */

    function getDoctorRows($params = array()) {
        $this->db->select('s.id, s.name');
        $this->db->from($this->doctorTbl . ' as s');

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                if (strpos($key, '.') !== false) {
                    $this->db->where($key, $value);
                } else {
                    $this->db->where('s.' . $key, $value);
                }
            }
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;

        //return fetched data
        return $result;
    }

}
