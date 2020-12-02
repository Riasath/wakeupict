<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nurse extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('nurse_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('ion_auth_model');
        $this->load->model('settings/settings_model');
        $this->load->model('email/email_model');
        $this->load->library('upload');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function addNurse() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['email'] = $this->email_model->getEmailSettingsById($id);
        $this->load->view('home/header');
        $this->load->view('add_nurse', $data);
        $this->load->view('home/footer');
    }

    public function addNewNurse() {
        //$userId = $this->ion_auth->get_user_id();
        //$is_v_v = $this->input->post('radio');
        $emailSettings = $this->email_model->getEmailSettings();
        $email = $this->input->post('email');
        $to = $email;


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
            $message = "You become a nurse";
            $subject = "congrats";
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $password = $this->input->post('password');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
           // $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[150]');
            //$this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('address', 'Address', 'trim|max_length[150]');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[500]');

            if ($this->form_validation->run() == FALSE) {
                if (!empty($id)) {
                    redirect("doctor/editDoctor?id=$id");
                } else {
                    redirect("http://savepeople.wakeupict.com/donate.html/formvaliditionfail");
                }
            } else {

                if ($this->ion_auth->email_check($email)) {
                    redirect('http://savepeople.wakeupict.com/email_reg_user.html');
                } else {
                    $this->email->from($emailSettings->admin_email);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                }

                if ($this->email->send()) {
                    $data = array();
                    $date = time();
                    $data = array(
                        'name' => $name,
                        'address' => $address,
                        'phone' => $phone,
                        'subject' => $subject,
                        'message' => $message,
                        'email' => $email,
                        'password' => $password,
//                    'user' => $this->ion_auth->get_user_id()
                    );

                    $username = $this->input->post('name');
                    if (empty($id)) {
                        if ($this->ion_auth->email_check($email)) {
                            $this->session->set_flashdata('feedback', 'This Email Is Already Registered');
                            redirect('nurse/addNurse');
                        } else {
                            $dfg = 7;
                            $this->ion_auth->register($username, $password, $email, $dfg);
                            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                            $group_data = array('group_id' => '7');
                            $this->nurse_model->updateUserGroup($group_data, $ion_user_id);
                            $this->nurse_model->insertNurse($data);
                            $nurse_user_id = $this->db->get_where('nurse', array('email' => $email))->row()->id;
                            $id_info = array('ion_user_id' => $ion_user_id);
                            $this->nurse_model->updateNurse($nurse_user_id, $id_info);
                            $this->session->set_flashdata('feedback', 'Added');
                            redirect('nurse/showNurse');
                        }
                    } else {
                        $ion_user_id = $this->db->get_where('nurse', array('id' => $id))->row()->ion_user_id;
                        if (empty($password)) {
                            $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                        } else {
                            $password = $this->ion_auth_model->hash_password($password);
                        }
                        $this->nurse_model->updateIonUser($username, $email, $password, $ion_user_id);
                        $this->nurse_model->updateNurse($id, $data);
                        $this->session->set_flashdata('feedback', 'Updated');
                    }

                    $this->donor_model->insertDonor($data);
                    $this->session->set_flashdata('feedback', 'Message Sent');
                } else {
                    $this->session->set_flashdata('feedback', 'Email Failed');
                }
            }
        } else {
            $this->session->set_flashdata('feedback', 'Not Sent');
        }
        redirect('http://savepeople.wakeupict.com/donate.html');
        }


//    public function addNurse() {
//        $this->load->view('home/header');
//        $this->load->view('add_nurse');
//        $this->load->view('home/footer');
//    }
//    public function addNewNurse() {
//        $id = $this->input->post('id');
//        $name = $this->input->post('name');
//        $email = $this->input->post('email');
//        $password = $this->input->post('password');
//        $address = $this->input->post('address');
//        $phone = $this->input->post('phone');
//
//        $this->load->library('form_validation');
//        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//        $this->form_validation->set_rules('name', 'Nurse Name', 'trim|required|max_length[50]');
//        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|max_length[50]');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
//        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[50]');
//        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[50]');
//
//        if ($this->form_validation->run() == FALSE) {
//            if (!empty($id)) {
//                redirect("nurse/editNurse?id=$id");
//            } else {
//                redirect("nurse/addNurse");
//            }
//        } else {
//            $file_name = $_FILES['img_url']['name'];
//            $file_name_pieces = split('_', $file_name);
//            $new_file_name = '';
//            $count = 1;
//            foreach ($file_name_pieces as $piece) {
//                if ($count !== 1) {
//                    $piece = ucfirst($piece);
//                }
//                $new_file_name .= $piece;
//                $count++;
//            }
//            $config = array(
//                'file_name' => $new_file_name,
//                'upload_path' => "./uploads/",
//                'allowed_types' => "gif|jpg|png|jpeg|pdf",
//                'overwrite' => False,
//                'max_size' => "2048000000000",
//                'max_height' => "1768",
//                'max_width' => "2024"
//            );
//
//            $this->load->library('Upload', $config);
//            $this->upload->initialize($config);
//
//            if ($this->upload->do_upload('img_url')) {
//                $path = $this->upload->data();
//                $img_url = "uploads/" . $path['file_name'];
//                $data = array();
//                $data = array(
//                    'id' => $id,
//                    'name' => $name,
//                    'email' => $email,
//                    'password' => $password,
//                    'address' => $address,
//                    'phone' => $phone,
//                    'img_url' => $img_url
//                );
//            } else {
//                $data = array();
//                $data = array(
//                    'id' => $id,
//                    'name' => $name,
//                    'email' => $email,
//                    'password' => $password,
//                    'address' => $address,
//                    'phone' => $phone
//                );
//            }
//
//            $username = $this->input->post('name');
//
//            if (empty($id)) {
//                if ($this->ion_auth->email_check($email)) {
//                    $this->session->set_flashdata('feedback', 'This Email Is Already Registered');
//                    redirect('nurse/addNurse');
//                } else {
//                    $dfg = 7;
//                    $this->ion_auth->register($username, $password, $email, $dfg);
//                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
//                    $group_data = array('group_id' => '7');
//                    $this->nurse_model->updateUserGroup($group_data, $ion_user_id);
//                    $this->nurse_model->insertNurse($data);
//                    $nurse_user_id = $this->db->get_where('nurse', array('email' => $email))->row()->id;
//                    $id_info = array('ion_user_id' => $ion_user_id);
//                    $this->nurse_model->updateNurse($nurse_user_id, $id_info);
//                    $this->session->set_flashdata('feedback', 'Added');
//                    redirect('nurse/showNurses');
//                }
//            } else {
//                $ion_user_id = $this->db->get_where('nurse', array('id' => $id))->row()->ion_user_id;
//                if (empty($password)) {
//                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
//                } else {
//                    $password = $this->ion_auth_model->hash_password($password);
//                }
//                $this->nurse_model->updateIonUser($username, $email, $password, $ion_user_id);
//                $this->nurse_model->updateNurse($id, $data);
//                $this->session->set_flashdata('feedback', 'Updated');
//            }
//            if (empty($id)) {
//                $this->nurse_model->insertNurse($data);
//                redirect('nurse/showNurses');
//            } else {
//                $this->nurse_model->updateNurse($id, $data);
//                redirect('nurse/showNurses');
//            }
//        }
//    }


    public function showNurse() {
        $data['nurses'] = $this->nurse_model->getNurse('nurse');
        $this->load->view('home/header');
        $this->load->view('nurses', $data);
        $this->load->view('home/footer');
    }

    public function editNurse() {
        $data = array();
        $id = $this->input->get('id');
        $data['nurse'] = $this->nurse_model->getNurseById($id);
        $this->load->view('home/header', $data);
        $this->load->view('add_nurse', $data);
        $this->load->view('home/footer');
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('nurse', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->nurse_model->deleteNurse($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('nurse/showNurses');
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

}
