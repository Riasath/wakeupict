<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appointment_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertAppointment($data) {
        $this->db->insert('schedule', $data);
    }

    function getAppointment() {
        $this->db->order_by('schedule_id', 'desc');
        $query = $this->db->get('schedule');
        return $query->result();
    }

    function getAppointmentById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('schedule');
        return $query->row();
    }

    function updateAppointment($schedule_id, $data) {
        $this->db->where('schedule_id', $schedule_id);
        $this->db->update('schedule', $data);
    }

    function deleteAppointment($id) {
        $this->db->where('id', $id);
        $this->db->delete('schedule');
    }

    function getAppointmentByDoctorId($doctor_id) {
        $this->db->order_by('schedule_id', 'desc');
        $this->db->where('doctor_id', $doctor_id);
        $query = $this->db->get('schedule');
        return $query->result();
    }

    function getAppointmentByPatientId($patient_id) {
        $this->db->order_by('schedule_id', 'desc');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('schedule');
        return $query->result();
    }
    
    function getAppointmentByDate($doctor, $date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('doctor_id', $doctor);
        $this->db->where('available_date >=', $date_from);
        $this->db->where('available_date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }
    
    function getAppointmentByDoctorAndDate($doctor_id, $date){
        $this->db->order_by('sl_no', 'ASC');
        $this->db->where('doctor_id', $doctor_id);
        $this->db->where('available_date', $date);
        $query = $this->db->get('schedule');
        return $query->result();
    }
    
    function getTodaysAppointment($date){
        $this->db->order_by('sl_no', 'ASC');
        $this->db->where('available_date', $date);
        $query = $this->db->get('schedule');
        return $query->result();
    }
    
    function getComingAppointment($date, $patient_id){
        $this->db->order_by('sl_no', 'ASC');
        $this->db->where('patient_id', $patient_id);
        $this->db->where('available_date >=', $date);
        $query = $this->db->get('schedule');
        return $query->result();
    }
    
    function getDetails($patient_id) {
        $this->db->order_by('id', 'ASC');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get('details');
        return $query->result();
    }

}
