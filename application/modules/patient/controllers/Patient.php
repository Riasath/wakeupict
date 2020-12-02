<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('patient_model');
        $this->load->model('doctor/doctor_model');
        //$this->load->model('report/report_model');
        $this->load->model('profile/profile_model');
        $this->load->model('details/details_model');
        $this->load->model('schedule/schedule_model');
        $this->load->model('settings/settings_model');
//        $this->load->model('appointmnet/appointment_model');
        $this->load->model('ion_auth_model');
        $this->lang->load('system_syntax');
        $this->load->library('upload');
    }

    public function addPatient() {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->view('home/header');
        $this->load->view('add_patient');
        $this->load->view('home/footer');
    }

    public function addNewPatient() {
        $id = $this->input->post('id');
        $patient_id = $this->input->post('p_id');
        if (empty($patient_id)) {
            $patient_id = "P" . $this->randStrGen(2, 7);
            //'patient_id'   => "P".$this->randStrGen(2,7),
        }
        $assessment_date = $this->input->post('assessment_date');
        $hf_id = $this->input->post('hf_id');
        $mr_no = $this->input->post('mr_no');
        $name = $this->input->post('name');
        $visit_type = $this->input->post('visit_type');
        $sex = $this->input->post('sex');
        $birth_date = $this->input->post('birth_date');
        $highest_education_level = $this->input->post('highest_education_level');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $occupation = $this->input->post('occupation');
        $monthly_income = $this->input->post('monthly_income');
        $marital_status = $this->input->post('marital_status');
        $no_of_children = $this->input->post('no_of_children');
        $blood_group = $this->input->post('blood_group');
        $menstrual_history = $this->input->post('menstrual_history');
        $caregiver_name_relation = $this->input->post('caregiver_name_relation');
        $caregiver_phone_no = $this->input->post('caregiver_phone_no');
        $height = $this->input->post('height');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name', 'Patient Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('visit_type', 'Visit Type', 'trim|max_length[50]');
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('highest_education_level', 'Age', 'trim|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('address', 'Address', 'trim|max_length[250]');
        $this->form_validation->set_rules('occupation', 'Occupation', 'trim|max_length[250]');
        $this->form_validation->set_rules('monthly_income', 'Monthly Income', 'trim|max_length[250]');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'trim|max_length[250]');
        $this->form_validation->set_rules('no_of_children', 'No Of Children Status', 'trim|max_length[250]');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|max_length[10]');
        $this->form_validation->set_rules('menstrual_history', 'Menstrual History', 'trim|max_length[100]');
        $this->form_validation->set_rules('caregiver_name_relation', 'Caregiver Name Relation', 'trim|max_length[100]');
        $this->form_validation->set_rules('caregiver_phone_no', 'Caregiver Phone No', 'trim|required|max_length[15]');
        $this->form_validation->set_rules('height', 'Pt Height (in cm)', 'trim|max_length[10]');
        $this->form_validation->set_rules('email', 'Email address', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("patient/editPatient?id=$id");
            } else {
                redirect("patient/addPatient");
            }
        } else {              //for image uplode
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }
                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "40960000", // Can be set to particular file size , here it is 4 MB(4096 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'id' => $id,
                    'patient_id' => $patient_id,
                    'assessment_date' => $assessment_date,
                    'hf_id' => $hf_id,
                    'mr_no' => $mr_no,
                    'name' => $name,
                    'visit_type' => $visit_type,
                    'sex' => $sex,
                    'birth_date' => $birth_date,
                    'highest_education_level' => $highest_education_level,
                    'phone' => $phone,
                    'address' => $address,
                    'occupation' => $occupation,
                    'monthly_income' => $monthly_income,
                    'marital_status' => $marital_status,
                    'no_of_children' => $no_of_children,
                    'blood_group' => $blood_group,
                    'menstrual_history' => $menstrual_history,
                    'caregiver_name_relation' => $caregiver_name_relation,
                    'caregiver_phone_no' => $caregiver_phone_no,
                    'height' => $height,
                    'email' => $email,
                    'password' => $password,
                    'img_url' => $img_url
                );
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'patient_id' => $patient_id,
                    'assessment_date' => $assessment_date,
                    'hf_id' => $hf_id,
                    'mr_no' => $mr_no,
                    'name' => $name,
                    'visit_type' => $visit_type,
                    'sex' => $sex,
                    'birth_date' => $birth_date,
                    'highest_education_level' => $highest_education_level,
                    'phone' => $phone,
                    'address' => $address,
                    'occupation' => $occupation,
                    'monthly_income' => $monthly_income,
                    'marital_status' => $marital_status,
                    'no_of_children' => $no_of_children,
                    'blood_group' => $blood_group,
                    'menstrual_history' => $menstrual_history,
                    'caregiver_name_relation' => $caregiver_name_relation,
                    'caregiver_phone_no' => $caregiver_phone_no,
                    'height' => $height,
                    'email' => $email,
                    'password' => $password
                );
            }
            $username = $this->input->post('name');

            if (empty($id)) {
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    if (!$this->ion_auth->logged_in()) {
                        redirect('frontend/webAppointmentPage');
                    } else {
                        redirect('patient/addPatient');
                    }
                } else {
                    $dfg = 3;                                       //group table id for patient
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $group_data = array('group_id' => '3');
                    $this->patient_model->updateUserGroup($group_data, $ion_user_id);
                    $this->patient_model->insertPatient($data);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    $this->session->set_flashdata('feedback', 'Added');
                    if (!$this->ion_auth->logged_in()) {
                        // redirect them to the login page
                        $this->session->set_flashdata('feedback', 'You have successfully completed the registration process !!! <br> Please log in to get your appointment');
                        redirect('auth/login');
                    } else {
                        redirect('patient/showPatient');
                    }
//                    redirect('patient/showPatient');
                }
            } else {
                $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->patient_model->updatePatient($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            if (empty($id)) {
                $this->patient_model->insertPatient($data);
                redirect('patient/showPatient');
            } else {
                $this->patient_model->updatePatient($id, $data);
                redirect('patient/showPatient');
            }
        }
    }

    #--------------------------------------------------------------#

    public function randStrGen($mode = null, $len = null) {
        $result = "";
        if ($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif ($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }

    #--------------------------------------------------------------#

    public function showPatient() {
        $data['patientss'] = $this->patient_model->getPatient(); // For dropdown patient list
        $data['patients'] = $this->patient_model->getPatient();
        $data['prescriptions'] = $this->schedule_model->getPrescription();
        $this->load->view('home/header');
        $this->load->view('patients', $data);
        $this->load->view('home/footer');
    }
    
    public function showPatientFilter() {
        $patient_id = $this->input->post('patient_id');
        $data['patientss'] = $this->patient_model->getPatient();// For dropdown patient list
        $data['patients'] = $this->patient_model->getPatientByPatient($patient_id);
        $data['prescriptions'] = $this->schedule_model->getPrescription();
        $data['patient_id'] = $patient_id;
        $this->load->view('home/header');
        $this->load->view('patients', $data);
        $this->load->view('home/footer');
    }

    public function editPatient() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $this->load->view('home/header', $data); // just the header file
        $this->load->view('add_patient', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('patient', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->patient_model->deletePatient($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('patient/showPatient');
    }

    function editPatientByJason() {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        echo json_encode($data);
    }

//    View Patient List =>Riddho
    public function viewPatients() {
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('view_patients', $data);
        $this->load->view('home/footer');
    }

    public function patientInfo() {
        $this->load->view('home/header');
        $this->load->view('patient_info');
        $this->load->view('home/footer');
    }

    public function patientDeteils() {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['details'] = $this->patient_model->getDetails($id);

//        $data['profile'] = $this->profile_model->getProfileById($id);
        $this->load->view('home/header', $data); // just the header file
        $this->load->view('patient_info', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function index() {
        if (!$this->ion_auth->in_group(array('patient'))) {
            redirect('home/permission');
        }
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }
        $data = array();
        $data['patient'] = $this->patient_model->getPatientById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('patient_info', $data);
        $this->load->view('home/footer'); // just the footer file
    }

//  Show array data 

    public function viewDetailByPatientId() {
        $id = $this->input->get('id');
        $patient_id = $this->input->get('id');  // pora change korbo --murad

//        $kodu = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['detail'] = $this->patient_model->getDetailsByPatientId($id);
        $data['prescriptions'] = $this->schedule_model->getPrescriptionByPatientId($patient_id);
//        $data ['patient'] = $this->patient_model->getPatientByIdTwo($patient_id); 
        $data['patient_id'] = $this->input->get('id');
//         print_r($data);
//         die();
        $this->load->view('home/header'); // just the header file
        $this->load->view('patient_info', $data);
        $this->load->view('home/footer'); // just the footer file
    }

}
