<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('settings_model');
        //$this->load->model('student/student_model');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
        $this->load->helper('security');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group(array('admin', ''))) {
            redirect('home/permission');
        }
    }

    public function index() {
        if (!$this->ion_auth->in_group(array('admin'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/header', $data); // just the header file
        $this->load->view('settings', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function update() {
        $id = $this->input->post('id');
        $system_vendor = $this->input->post('system_vendor');
        $title = $this->input->post('title');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $date_format = $this->input->post('date_format');
        $currency = $this->input->post('currency');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('system_vendor', 'System Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        $this->form_validation->set_rules('title', 'Title', 'rtrim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|max_length[50]|xss_clean');
        // Validating Department Field   
        $this->form_validation->set_rules('currency', 'Currency', 'trim|required|min_length[1]|max_length[10]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/header', $data); // just the header file
            $this->load->view('settings', $data);
            $this->load->view('home/footer'); // just the footer file
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
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'system_vendor' => $system_vendor,
                    'title' => $title,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'date_format' => $date_format,
                    'currency' => $currency
                );
            } else {
                //$error = array('error' => $this->upload->display_errors()); 
                $data = array();
                $data = array(
                    'system_vendor' => $system_vendor,
                    'title' => $title,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'date_format' => $date_format,
                    'currency' => $currency
                );
            }
            $this->settings_model->updateSettings($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
            // Loading View
            redirect('settings');
        }
    }

}

/* End of file settings.php */
/* Location: ./application/modules/settings/controllers/settings.php */
