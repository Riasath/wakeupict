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
        
        $nextdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
        $data['popup_appointments'] = $this->appointment_model->getPopUpAppointments($date,$nextdate,$patient_id);
        $this->load->view('header');
        $this->load->view('calendar', $data);
        $this->load->view('footer');
    }

    public function test() {
        echo "I love my country";
    }

    public function email_notification() {
        date_default_timezone_set('Asia/Dhaka');
        $data = array();
        $date = date("Y-m-d");
        $nextdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
        $email_notification = $this->appointment_model->getEmailNotification($date,$nextdate);
        $email_body='';
        foreach ($email_notification as $email) {
            $email_body=$email_body.$email->patient.' you have an appointment with '.$email->doctor.' on '.$email->available_date.' at '.$email->start_time.'.';
            print_r($email_body);
            echo '<br>';
            $this->sentEmail($email->email,$email_body);             
        }
        echo 'Massage and Data Set here, Just need to configure Email to sent email';
    }

    public function sentEmail($emailTo,$massage) {
        $this->load->library('email');
        $config=array(
               'charset'=>'utf-8',
               'wordwrap'=> TRUE,
               'mailtype' => 'html'
               );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->to($emailTo);
        $this->email->from('yourdomainemail.com','Doctors Appointment');
        $this->email->subject('Doctors Appointment From yourdomainemail.');
        $this->email->message($massage);
        $this->email->send();
    }

}
