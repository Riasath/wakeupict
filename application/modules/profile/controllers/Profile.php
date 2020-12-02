<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('profile_model');
        $this->load->model('settings/settings_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('details/details_model');
        $this->load->model('schedule/schedule_model');
        $this->load->library('upload');
    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['profile'] = $this->profile_model->getProfileById($id);
        //$data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/header'); // just the header file
        $this->load->view('profile', $data);
        $this->load->view('home/footer'); // just the footer file
    }
    
    public function patientHistory() {
        if (!$this->ion_auth->in_group(array('patient'))) {
            redirect('home/permission');
        }
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }
        $data = array();
        $data['detail'] = $this->details_model->getDetailsByPatientId($patient_id);
        $data['patient'] = $this->details_model->getPatientById($patient_id);
        $data['prescriptions'] = $this->schedule_model->getPrescriptionByPatientId($patient_id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('history', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]');
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[100]');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['profile'] = $this->profile_model->getProfileById($id);
            $this->load->view('home/header', $data); // just the header file
            $this->load->view('profile', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
            );
            $username = $this->input->post('name');
            $ion_user_id = $this->ion_auth->get_user_id();
            $group_id = $this->profile_model->getUsersGroups($ion_user_id)->row()->group_id;
            $group_name = $this->profile_model->getGroups($group_id)->row()->name;
            $group_name = strtolower($group_name);
            if (empty($password)) {
                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
            } else {
                $password = $this->ion_auth_model->hash_password($password);
            }
            $this->profile_model->updateIonUser($username, $email, $password, $ion_user_id);
            if (!$this->ion_auth->in_group('admin')) {
                $this->profile_model->updateProfile($ion_user_id, $data, $group_name);
            }
            $this->session->set_flashdata('feedback', 'Updated');
            redirect('profile');
        }
    }  }

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
