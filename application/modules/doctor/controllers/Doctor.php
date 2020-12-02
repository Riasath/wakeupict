<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('doctor_model');
        $this->load->model('department/department_model');
        $this->load->model('settings/settings_model');
        $this->load->library('upload');
    }

    public function addDoctor() {
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/header');
        $this->load->view('add_doctor', $data);
        $this->load->view('home/footer');
    }

    public function showDoctor() {
        $data['departments'] = $this->department_model->getDepartment();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/header');
        $this->load->view('doctors', $data);
        $this->load->view('home/footer');
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $department = $this->input->post('department');
        $profile = $this->input->post('profile');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $linkedin = $this->input->post('linkedin');
        $google = $this->input->post('google');
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name', 'Doctor Name', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email address', 'trim|required|min_length[1]|max_length[100]');
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]');
        }
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('department', 'Department', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('profile', 'Profile', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('linkedin', 'Linkedin', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('google', 'Google Plus', 'trim|required|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("doctor/editDoctor?id=$id");
            } else {
                redirect("doctor/addDoctor");
            }
        } else {
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
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
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
                    'name' => $name,
                    'img_url' => $img_url,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'phone' => $phone,
                    'department' => $department,
                    'profile' => $profile,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'linkedin' => $linkedin,
                    'google' => $google);
            } else {
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'phone' => $phone,
                    'department' => $department,
                    'profile' => $profile,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'linkedin' => $linkedin,
                    'google' => $google
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    redirect('doctor/addDoctor');
                } else {
                    $dfg = 4;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $group_data = array('group_id' => '4');
                    $this->doctor_model->updateUserGroup($group_data, $ion_user_id);
                    $this->doctor_model->insertDoctor($data);
                    $doctor_user_id = $this->db->get_where('doctor', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                    $this->session->set_flashdata('feedback', 'Added');
                    redirect('doctor/showDoctor');
                }
            } else {
                $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->doctor_model->updateDoctor($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            if (empty($id)) {
                $this->doctor_model->insertDoctor($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else {
                $this->doctor_model->updateDoctor($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('doctor/showDoctor');
        }
    }

    function editDoctor() {
        $data = array();
        $id = $this->input->get('id');
        $data['departments'] = $this->department_model->getDepartment();
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_doctor', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('doctor', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->doctor_model->deleteDoctor($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('doctor/showDoctor');
    }

    function editDoctorByJason() {
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        echo json_encode($data);
    }

}
