<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacist extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('pharmacist_model');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
    }

    public function addPharmacist() {
        $this->load->view('home/header');
        $this->load->view('add_pharmacist');
        $this->load->view('home/footer');
    }

    public function addNewPharmacist() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('address', 'Address', 'trim|max_length[250]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[20]');
        
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("pharmacist/editPharmacist?id=$id");
            } else {
                redirect("pharmacist/addPharmacist");
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
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'phone' => $phone,
                    'img_url' => $img_url
                );
            } else {
                $data = array();
                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'address' => $address,
                    'phone' => $phone,
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    redirect('pharmacist/addPharmacist');
                } else {
                    $dfg = 6;                                       //group table id for pharmacist
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $group_data = array('group_id' => '6');
                    $this->pharmacist_model->updateUserGroup($group_data, $ion_user_id);
                    $this->pharmacist_model->insertPharmacist($data);
                    $pharmacist_user_id = $this->db->get_where('pharmacist', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->pharmacist_model->updatePharmacist($pharmacist_user_id, $id_info);
                    $this->session->set_flashdata('feedback', 'Added');
                    redirect('pharmacist/showPharmacist');
                }
            } else {
                $ion_user_id = $this->db->get_where('pharmacist', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->pharmacist_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->pharmacist_model->updatePharmacist($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            if (empty($id)) {
                $this->pharmacist_model->insertPharmacist($data);
                redirect('pharmacist/showPharmacist');
            } else {
                $this->pharmacist_model->updatePharmacist($id, $data);
                redirect('pharmacist/showPharmacist');
            }
        }
    }

    public function showPharmacist() {
        $data['pharmacists'] = $this->pharmacist_model->getPharmacist();
        $this->load->view('home/header');
        $this->load->view('pharmacists', $data);
        $this->load->view('home/footer');
    }

    public function editPharmacist() {
        $data = array();
        $id = $this->input->get('id');
        $data['pharmacist'] = $this->pharmacist_model->getPharmacistById($id);
        $this->load->view('home/header', $data); // just the header file
        $this->load->view('add_pharmacist', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('pharmacist', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->pharmacist_model->deletePharmacist($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('pharmacist/showPharmacist');
    }

}
