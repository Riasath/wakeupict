<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('appointment_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('settings/settings_model');
        $this->load->model('email/email_model');
        $this->load->library('upload');
    }

    public function addAppointment() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/header');
        $this->load->view('add_appointment', $data);
        $this->load->view('home/footer');
    }

    public function addNewAppointment() {
        $id = $this->input->post('id');
        $date = $this->input->post('date');
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $s_time = $this->input->post('s_time');
        $status = $this->input->post('status');
        $type = $this->input->post('type');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[2]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("appointment/editAppointment?id=$id");
            } else {
                redirect("appointment/addAppointment");
            }
        } else {
            $data = array();
            $data = array(
                'date' => $date,
                'patient' => $patient,
                'doctor' => $doctor,
                's_time' => $s_time,
                'status' => $status,
                'type' => $type
            );
        }
        if (empty($id)) {
            $this->appointment_model->insertAppointment($data);
            if ($type == 'doctor') {
                redirect('appointment/showAppointmentListByDoctor');
            } elseif ($type == 'patient') {
                redirect('appointment/showPatientPendingAppointment');
            } else {
                redirect('appointment/showAppointment');
            }
        } else {
            $this->appointment_model->updateAppointment($id, $data);
            if ($type == 'doctor') {
                redirect('appointment/showAppointmentListByDoctor');
            } else {
                redirect('appointment/showAppointment');
            }
        }
    }

    public function showAppointment() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['appointments'] = $this->appointment_model->getAppointment();
        $this->load->view('home/header');
        $this->load->view('all_appointments', $data);
        $this->load->view('home/footer');
    }

    public function editAppointment() {
        $data = array();
        $id = $this->input->get('id');
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['appointment'] = $this->appointment_model->getAppointmentById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_appointment', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function deleteAppointment() {
        $data = array();
        $id = $this->input->get('id');
        $this->appointment_model->deleteAppointment($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('appointment/showAppointmentListByDoctor');
    }

    public function showAppointmentListByDoctor() {
        if ($this->ion_auth->in_group(array('doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['appointments'] = $this->appointment_model->getAppointmentByDoctorId($doctor_id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('appointment_by_doctor', $data);
        $this->load->view('home/footer');
    }

    function editAppointmentByJason() {
        $id = $this->input->get('id');
        $data['appointment'] = $this->appointment_model->getAppointmentById($id);
        echo json_encode($data);
    }

    public function showAppointmentListByPatient() {
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['appointments'] = $this->appointment_model->getAppointmentByPatientId($patient_id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('all_appointments', $data);
        $this->load->view('home/footer');
    }

    public function showPatientPendingAppointment() {
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $data['appointments'] = $this->appointment_model->getAppointmentByPatientId($patient_id);
        $this->load->view('home/header');
        $this->load->view('pending_appointments', $data);
        $this->load->view('home/footer');
    }

    public function showDoctorPendingAppointment() {
        if ($this->ion_auth->in_group(array('doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['appointments'] = $this->appointment_model->getAppointmentByDoctorId($doctor_id);
        $this->load->view('home/header');
        $this->load->view('pending_appointments', $data);
        $this->load->view('home/footer');
    }

    public function showReceptionistPendingAppointment() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['appointments'] = $this->appointment_model->getAppointment();
        $this->load->view('home/header');
        $this->load->view('pending_appointments', $data);
        $this->load->view('home/footer');
    }

    function approvAppointmentByDoctor() {
        $data = array();
        $schedule_id = $this->input->get("schedule_id");
        $patient_id = $this->input->get("patient_id");
        $emailSettings = $this->email_model->getEmailSettings();
        
        
        // patient ar email address anlam
        $patient_detail = $this->patient_model->getPatientByIdTwo($patient_id);
        $to = $patient_detail->email;
        
        //$is_v_v = 'single_patient';
        
       

//        if ($is_v_v == 'single_patient') {
//            //$patient_id = $this->input->get('patient_id');
//            $patient_detail = $this->patient_model->getPatientByIdTwo($patient_id);
//
//            $single_patient_email = $patient_detail->email;
//
//            // $recipient = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Email: ' . $patient_detail->email;
//        }

//        if ($is_v_v == 'other') {
//            $other_email = $this->input->post('other_email');
//            $email = $other_email;
//        }

//        if (!empty($single_patient_email)) {
//            $to = $single_patient_email;
//        } elseif (!empty($other_email)) {
//            $to = $other_email;
//        } else {
//            if (!empty($to)) {
//                $to = implode(',', $to);
//            }
//        }

        if (!empty($to)) {
            $message = "Your Appointment has been approved";
            $subject = "approved";

            $this->email->from($emailSettings->admin_email);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $data = array('status' => 'Approved');
                $this->appointment_model->updateAppointment($schedule_id, $data);
                redirect('appointment/showDoctorPendingAppointment');
            }
        }
    }

    function approvAppointmentByReceptionist() {
        $data = array();
        $schedule_id = $this->input->get("schedule_id");
        $data = array('status' => 'Approved');
        $this->appointment_model->updateAppointment($schedule_id, $data);
        redirect('appointment/showReceptionistPendingAppointment');
    }

    function appointmentFilter() {
//        $date_from = strtotime($this->input->post('date_from'));
//        $date_to = strtotime($this->input->post('date_to'));
//        if (empty($date_to)) {
//            $date_to = $date_from + 86399;
//        }
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        if (empty($date_to)) {
            $date_to = $date_from;
        }
        $doctor = $this->input->post('doctor');
        $data = array();


        $data['appointments'] = $this->appointment_model->getAppointmentByDate($doctor, $date_from, $date_to);

        $data['doctor'] = $this->input->post('doctor');
        $data['from'] = $this->input->post('date_from');
        $data['to'] = $this->input->post('date_to');
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['settings'] = $this->settings_model->getSettings();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header'); // just the header file
        $this->load->view('all_appointments', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    // Chairmain sir ar jonno

    public function addDetailsView() {
        $data['patient_id'] = $this->input->get('patient_id');
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addDetails() {
        $data = array(
            'patient_id' => $this->input->post('patient_id'),
            //'doctor_id' => $this->input->post('doctor_id'),
            'date' => $this->input->post('date'),
            'clinical_assessment' => $this->input->post('clinical_assessment'),
            'risk_factors' => $this->input->post('risk_factors'),
            'diagnosis' => $this->input->post('diagnosis')
        );
        $this->db->insert('details', $data);
        redirect('home/calendar');
    }

    public function viewDetails() {
        $patient_id = $this->input->get('patient_id');
        $data['details'] = $this->appointment_model->getDetails($patient_id);
        $data['patient_id'] = $this->input->get('patient_id');
        $this->load->view('home/header'); // just the header file
        $this->load->view('view_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

}
