<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('settings/settings_model');
        $this->load->model('details/details_model');
        $this->load->model('schedule/schedule_model');
        $this->load->library('upload');
    }

    public function index() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/calendar', 'refresh');
        } else {
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
        }
    }

    public function calendar() {
        if ($this->ion_auth->in_group(array('doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }
        date_default_timezone_set('Asia/Dhaka');
        $data = array();
        $date = date("Y-m-d");
        //$data['todaysAppointments'] = $this->appointment_model->getAppointmentByDoctorAndDate($doctor_id, $date);
        $data['todaysAppointments'] = $this->appointment_model->getTodaysAppointment($date);
        if ($this->ion_auth->in_group(array('patient'))) {
            $data['comingAppointments'] = $this->appointment_model->getComingAppointment($date, $patient_id);
        }
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        //$data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['appointments'] = $this->appointment_model->getAppointment();
        $this->load->view('header');
        $this->load->view('calendar', $data);
        $this->load->view('footer');
    }

    public function test() {
        echo "I love my country";
    }

}
