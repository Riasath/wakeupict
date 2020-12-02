<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('department_model');
        $this->load->library('upload');
    }

    public function addDepartment() {
        $this->load->view('home/header');
        $this->load->view('add_department');
        $this->load->view('home/footer');
    }

    public function showDepartment() {
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/header');
        $this->load->view('departments', $data);
        $this->load->view('home/footer');
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[100]');



        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("department /editDepartment ?id=$id");
            } else {
                redirect("department /addDepartment ");
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = split('_', $file_name);
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
                    'description' => $description
                );
            } 
            else {
                $data = array();
                $data = array(
                    'name' => $name,
                    'description' => $description
                );
            }

            if (empty($id)) {
                $this->department_model->insertDepartment($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else {
                $this->department_model->updateDepartment($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('department/showDepartment');
        }
    }

    function editDepartment() {
        $data = array();
        $id = $this->input->get('id');
        $data['department'] = $this->department_model->getDepartmentById($id);
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_department', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $this->department_model->deleteDepartment($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('department/showDepartment');
    }

    function editDoctorByJason() {
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        echo json_encode($data);
    }

}
