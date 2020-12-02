<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prescription extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('prescription_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->library('upload');
    }

    public function addPrescriptionView() {
        $data = array();
        $id = $this->input->get('id');
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('add_prescription', $data);
        $this->load->view('home/footer');
    }

    public function addNewPrescription() {
        $id = $this->input->post('id');
        $date = $this->input->post('date');
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $history = $this->input->post('history');
        $medication = $this->input->post('medication');
        $note = $this->input->post('note');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Date Field
        $this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[2]|max_length[100]');
        // Validating Patient Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|required|min_length[2]|max_length[100]');
        // Validating Doctor Field
        $this->form_validation->set_rules('history', 'Case History', 'trim|min_length[1]|max_length[1000]');
        // Validating State Field
        $this->form_validation->set_rules('medication', 'Medication', 'trim|min_length[1]|max_length[1000]');
        // Validating Do And Dont Name Field
        $this->form_validation->set_rules('note', 'Note', 'trim|min_length[2]|max_length[1000]');
        // Validating Validity Field

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect('prescription/editPrescription?id=' . $id);
            } else {
                redirect("prescription/addPrescriptionView");
            }
        } else {
            $data = array();
            $data = array('date' => $date,
                'patient' => $patient,
                'doctor' => $doctor,
                'history' => $history,
                'medication' => $medication,
                'note' => $note
            );
            if (empty($id)) {
                $this->prescription_model->insertPrescription($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else {
                $this->prescription_model->updatePrescription($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('prescription/showPrescription');
        }
    }

    public function showPrescription() {
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescription();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('prescriptions', $data);
        $this->load->view('home/footer');
    }

    function editPrescription() {
        $data = array();
        $id = $this->input->get('id');
        $data['patients'] = $this->patient_model->getPatient();
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_prescription', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $admin = $this->input->get('admin');
        $this->prescription_model->deletePrescription($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('prescription/showPrescription');
    }

    function editPrescriptionByJason() {
        $id = $this->input->get('id');
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        echo json_encode($data);
    }

    function viewPrescription() {
        $id = $this->input->get('id');
        $data['prescription'] = $this->prescription_model->getPrescriptionById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('view_prescription', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function PrescriptionByDoctor() {
        if ($this->ion_auth->in_group(array('doctor'))) {
            $current_user = $this->ion_auth->get_user_id();
            $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
        }
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($doctor_id);
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('prescriptions', $data);
        $this->load->view('home/footer');
    }

}
