<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schedule_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertSchedule($data) {
        $this->db->insert('schedule', $data);
    }

    public function getSchedule() {
        $query = $this->db->get('schedule');
        return $query->result();
    }

    public function getScheduleById($id) {
        $this->db->where('schedule_id', $id);
        $query = $this->db->get('schedule');
        return $query->row();
    }

    public function getScheduleByDoctorAndDate($doctor_id, $date) {
        $this->db->where('doctor_id', $doctor_id);
        $this->db->where('available_date', $date);
        $query = $this->db->get('schedule');
        return $query->result();
    }

    function insertPrescription($data) {
        $this->db->insert('new_prescription', $data);
    }
    
    function updatePayroll($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('new_prescription', $data);
    }

    function getPrescription() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('new_prescription');
        return $query->result();
    }

    function getPayrollById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('new_prescription');
        return $query->row();
    }

    function updateAppointment($schedule_id, $data) {
        $this->db->where('schedule_id', $schedule_id);
        $this->db->update('schedule', $data);
    }

    function checkSchedule($doctor_id, $available_date) {
        $this->db->where('doctor_id', $doctor_id);
        $this->db->where('available_date', $available_date);
        $query = $this->db->get('schedule');
        return $query->row();
    }
    
    function checkPatientSchedule($patient_id, $available_date) {
        $this->db->where('patient_id', $patient_id);
        $this->db->where('available_date', $available_date);
        $query = $this->db->get('schedule');
        return $query->row();
    }
    
    function getPrescriptionByPatientId($patient_id) {
        $this->db->order_by('visit_no', 'asc');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('new_prescription');
        return $query->result();
    }
    
    function getPrescriptionByPatientAndDate($patient_id, $date) {
        $this->db->where('patient_id', $patient_id);
        $this->db->where('date', $date);
        $query = $this->db->get('new_prescription');
        return $query->row();
    }
    
    function getPrescriptionByDate($date) {
        $this->db->where('date', $date);
        $query = $this->db->get('new_prescription');
        return $query->result();
    }
    
    function deletePrescription($id) {
        $this->db->where('id', $id);
        $this->db->delete('new_prescription');
    }
    
    
    

//    Murad vai say's
    public function getScheduleByAddress($address) {
        $this->db->where('date', $address);
        $query = $this->db->get('schedule');
        return $query->result();
    }
// excel data 
    function select() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('schedule');
        return $query;
    }
    
    //multiple delete 
    function deleteAll($id) {
        $this->db->where('schedule_id', $id);
        $this->db->delete('schedule');
    }
}
