<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class D_medicine extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('d_medicine_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('settings/settings_model');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
    }

    public function addMedicine() {
        $this->load->view('home/header');
        $this->load->view('add_medicine');
        $this->load->view('home/footer');
    }

    Public function addNewMedicine() {
        $id = $this->input->post('id');
        if (empty($id)) {
            $validation = array(
                array('field' => 'name[]', 'rules' => 'required')
            );

            $this->form_validation->set_rules($validation);
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name[]');


                $value = array();
                for ($i = 0; $i < count($name); $i++) {
                    $value[$i] = array(
                        'name' => $name[$i]
                    );
                }
            }
            $this->db->insert_batch('d_medicine', $value);
            $this->session->set_flashdata('feedback', 'added');
        } else {
            $name = $this->input->post('name[0]');
            $value = array('name' => $name);

            $this->d_medicine_model->updateMedicine($id, $value);
            $this->session->set_flashdata('feedback', 'Updated');
        }
        redirect('d_medicine/showMedicine');
    }

    public function showMedicine() {
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $this->load->view('home/header');
        $this->load->view('medicines', $data);
        $this->load->view('home/footer');
    }

    public function editMedicine() {
        $data = array();
        $id = $this->input->get('id');
        $data['medicine'] = $this->d_medicine_model->getMedicineById($id);
        $this->load->view('home/header', $data); // just the header file
        $this->load->view('add_medicine', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function deleteMedicine() {
        $data = array();
        $id = $this->input->get('id');
        $this->d_medicine_model->deleteMedicine($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('d_medicine/showMedicine');
    }

//    =========================================================================================

    public function addComment() {
        $this->load->view('home/header');
        $this->load->view('add_comment');
        $this->load->view('home/footer');
    }

    public function addNewComment() {
        $id = $this->input->post('id');
        $comment = $this->input->post('comment');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("d_medicine/editDMedicine?id=$id");
            } else {
                redirect("d_medicine/addComment");
            }
        } else {
            $data = array();
            $data = array(
                'comment' => $comment
            );
        }
        if (empty($id)) {
            $this->d_medicine_model->insertComment($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else {
            $this->d_medicine_model->updateComment($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
        }

        redirect('d_medicine/showComment');
    }

    public function showComment() {
        $data['medicines'] = $this->d_medicine_model->getComment();
        $this->load->view('home/header');
        $this->load->view('view_comment', $data);
        $this->load->view('home/footer');
    }

    public function deleteComment() {
        $data = array();
        $id = $this->input->get('id');
        $this->d_medicine_model->deleteComment($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('d_medicine/showComment');
    }

//    =========================================================================================

    public function addType() {
        $this->load->view('home/header');
        $this->load->view('add_type');
        $this->load->view('home/footer');
    }

    public function addNewType() {
        $id = $this->input->post('id');
        $type = $this->input->post('type');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('type', 'Type', 'trim|required|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("d_medicine/editDMedicine?id=$id");
            } else {
                redirect("d_medicine/addType");
            }
        } else {
            $data = array();
            $data = array(
                'type' => $type
            );
        }
        if (empty($id)) {
            $this->d_medicine_model->insertType($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else {
            $this->d_medicine_model->updateType($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
        }

        redirect('d_medicine/showType');
    }

    public function showType() {
        $data['medicines'] = $this->d_medicine_model->getType();
        $this->load->view('home/header');
        $this->load->view('view_type', $data);
        $this->load->view('home/footer');
    }

    public function deleteType() {
        $data = array();
        $id = $this->input->get('id');
        $this->d_medicine_model->deleteType($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('d_medicine/showType');
    }

    //=========================================

    public function overPhoneInfo() {
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('over_phone', $data);
        $this->load->view('home/footer');
    }
    public function addOverPhoneInfoView() {
        $data['patient_id'] = $this->input->post('patient_id');
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header');
        $this->load->view('over_phone', $data);
        $this->load->view('home/footer');
    }

    public function overPhoneNewInfo() {
        $patient_id = $this->input->post('patient_id');
        $f_date = $this->input->post('f_date');
        $time = $this->input->post('time');
        $problem = $this->input->post('problem');
        $solution = $this->input->post('solution');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('f_date', 'Date', 'trim|required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('time', 'Time', 'trim|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('problem', 'Problem', 'trim|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('solution', 'Solution', 'trim|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("d_medicine/editDMedicine?id=$id");
            } else {
                redirect("d_medicine/overPhoneInfo");
            }
        } else {
            $data = array();
            $data = array(
                'patient_id' => $patient_id,
                'f_date' => $f_date,
                'time' => $time,
                'problem' => $problem,
                'solution' => $solution
            );
        }
        if (empty($id)) {
            $this->d_medicine_model->insertoverPhoneInfo($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else {
            $this->d_medicine_model->overPhoneInfo($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
        }

        redirect('d_medicine/showoverPhoneInfo');
    }

    public function showoverPhoneInfo() {
        $data['medicines'] = $this->d_medicine_model->getOverPhoneInfo();
        $this->load->view('home/header');
        $this->load->view('showoverPhoneInfo', $data);
        $this->load->view('home/footer');
    }

    public function deleteoverPhoneInfo() {
        $data = array();
        $id = $this->input->get('id');
        $this->d_medicine_model->deleteOverPhoneInfo($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('d_medicine/showoverPhoneInfo');
    }

}
