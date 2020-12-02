<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
        $this->load->model('email_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('settings/settings_model');
        $this->load->helper('url');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function sendView() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['patients'] = $this->patient_model->getPatient();
        $data['email'] = $this->email_model->getEmailSettingsById($id);
        $data['teams'] = $this->doctor_model->getDoctor();
        $this->load->view('home/header'); // just the header file
        $this->load->view('sendview', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function send() {
        $userId = $this->ion_auth->get_user_id();
        $is_v_v = $this->input->post('radio');
        $emailSettings = $this->email_model->getEmailSettings();

        if ($is_v_v == 'allpatient') {
            $patients = $this->patient_model->getpatient();
            foreach ($patients as $patient) {
                $to[] = $patient->email;
            }
            $recipient = 'All Patient';
        }

        if ($is_v_v == 'alldoctor') {
            $doctors = $this->doctor_model->getDoctor();
            foreach ($doctors as $doctor) {
                $to[] = $doctor->email;
            }
            $recipient = 'All Doctor';
        }

        if ($is_v_v == 'single_patient') {
            $patient = $this->input->post('patient');

            $patient_detail = $this->patient_model->getPatientById($patient);
            $single_patient_email = $patient_detail->email;
            $recipient = 'Patient Id: ' . $patient_detail->id . '<br> Patient Name: ' . $patient_detail->name . '<br> Patient Email: ' . $patient_detail->email;
        }

        if ($is_v_v == 'other') {
            $other_email = $this->input->post('other_email');
            $recipient = $other_email;
        }

        if (!empty($single_patient_email)) {
            $to = $single_patient_email;
        } elseif (!empty($other_email)) {
            $to = $other_email;
        } else {
            if (!empty($to)) {
                $to = implode(',', $to);
            }
        }
        // $message = urlencode("Test Message");
        if (!empty($to)) {
            $message = $this->input->post('message');
            $subject = $this->input->post('subject');

            $this->email->from($emailSettings->admin_email);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $data = array();
                $date = time();
                $data = array(
                    'subject' => $subject,
                    'message' => $message,
                    'date' => $date,
                    'recipient' => $recipient,
                    'user' => $this->ion_auth->get_user_id()
                );
                $this->email_model->insertEmail($data);
                $this->session->set_flashdata('feedback', 'Message Sent');
            } else {
                $this->session->set_flashdata('feedback', 'Email Failed');
            }
        } else {
            $this->session->set_flashdata('feedback', 'Not Sent');
        }
        redirect('email/sendView');
    }

#---------------------------------------------------------------------------------#
    //email address change

    public function settings() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['settings'] = $this->email_model->getEmailSettingsById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addNewSettings() {
        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('email', 'Admin Email', 'trim|required|min_length[1]|max_length[100]');
        // Validating Password Field
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[1]|max_length[100]');
        // Validating Email Field
        $this->form_validation->set_rules('api_id', 'Api Id', 'trim|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['email'] = $this->email_model->getEmailSettingsById($id);
            $this->load->view('home/header'); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'admin_email' => $email,
            );
            if (empty($this->email_model->getEmailSettingsById($id)->admin_email)) {
                $this->email_model->addEmailSettings($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else {
                $this->email_model->updateEmailSettings($data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('email/settings');
        }
    }

    #-----------------------------------------------------------------------------------#
    //sent email view

    public function sent() {
        if ($this->ion_auth->in_group(array('admin'))) {
            $data['sents'] = $this->email_model->getEmail();
        } else {
            $current_user_id = $this->ion_auth->user()->row()->id;
            $data['sents'] = $this->email_model->getEmailByUser($current_user_id);
        }
        $this->load->view('home/header');
        $this->load->view('email', $data);
        $this->load->view('home/footer');
    }

    public function delete() {
        $id = $this->input->get('id');
        $this->email_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('email/sent');
    }

}

/* End of file Email.php */
/* Location: ./application/modules/email/controllers/Email.php */
