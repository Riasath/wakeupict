<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_year() {
        $this->db->select('year');
        $this->db->from('chart_data');
        $this->db->group_by('year');
        $this->db->order_by('year', 'DESC');
        return $this->db->get();
    }

    function fetch_chart_data($year) {
        $this->db->where('year', $year);
        $this->db->order_by('year', 'ASC');
        return $this->db->get('chart_data');
    }



    function fetch_year_details() {
        $this->db->select('patient_id');
        $this->db->from('details');
        //$this->db->group_by('year');
        $this->db->order_by('id', 'ASC');
        return $this->db->get();
    }

    function fetch_chart_data_details($year) {
        $this->db->where('patient_id', $year);
        //$this->db->from('details');
        //$this->db->order_by('year', 'ASC');
        return $this->db->get('details');
    }
    
    public function getChart() {   
        $query = $this->db->get('details');
        return $query->result();
    }
}
