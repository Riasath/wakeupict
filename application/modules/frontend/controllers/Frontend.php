<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('frontend_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('department/department_model');
        $this->load->model('patient/patient_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('settings/settings_model');
        $this->load->library('upload');
    }

    public function index() {
        $id = $this->input->get('id');
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['f_services'] = $this->frontend_model->getService();
        $data['f_service_header'] = $this->frontend_model->getServiceHeader();
        $data['f_welcome'] = $this->frontend_model->getWelcomeMessage();
        $data['f_header'] = $this->frontend_model->getFrontendHeader();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('front', $data);
        $this->load->view('foot');
    }

    /* -------------------- Home Page ----------------------- */

    public function homePage() {
        $data['f_welcome'] = $this->frontend_model->getWelcomeMessage();
        $data['f_header'] = $this->frontend_model->getFrontendHeader();
        $this->load->view('home/header');
        $this->load->view('home_page', $data);
        $this->load->view('home/footer');
    }

    public function header() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', 'Header Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'Header Description', 'trim|required|min_length[1]|max_length[1500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/homePage');
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
                'max_size' => "40920000", // Can be set to particular file size , here it is 4 MB(2048 Kb)
                'max_height' => "17680",
                'max_width' => "20240"
            );
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'title' => $title,
                    'description' => $description
                );
            } else {
                $data = array();
                $data = array(
                    'title' => $title,
                    'description' => $description
                );
            }
            $this->frontend_model->updateFrontendHeader($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
            redirect('frontend/homePage');
        }
    }

    public function welcome() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', 'Welcome Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'Welcome Message', 'trim|required|min_length[1]|max_length[1500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/homePage');
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
                    'img_url' => $img_url,
                    'title' => $title,
                    'description' => $description
                );
            } else {
                $data = array();
                $data = array(
                    'title' => $title,
                    'description' => $description
                );
            }
            $this->frontend_model->updateWelcomeMessage($id, $data);
            redirect('frontend/homePage');
        }
    }

    /* -------------------- About Option ----------------------- */

    public function aboutPage() {
        $data['f_about'] = $this->frontend_model->getAbout();
        $this->load->view('home/header');
        $this->load->view('about_page', $data);
        $this->load->view('home/footer');
    }

    public function about() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', ' Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'About Us', 'trim|required|min_length[1]|max_length[1500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/aboutPage');
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
                    'img_url' => $img_url,
                    'title' => $title,
                    'description' => $description
                );
            } else {
                $data = array();
                $data = array(
                    'title' => $title,
                    'description' => $description
                );
            }
            $this->frontend_model->updateAbout($id, $data);
            redirect('frontend/aboutPage');
        }
    }

    /* -------------------- blog Option ----------------------- */

    public function blogPage() {
        $data['f_blogs'] = $this->frontend_model->getBlog();
        $this->load->view('home/header');
        $this->load->view('blog_page', $data);
        $this->load->view('home/footer');
    }

    public function blog() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $published = $this->input->post('published');
        $description = $this->input->post('description');
        $blog_post = $this->input->post('blog_post');
        $user = $this->ion_auth->get_user_id();
        $user = $this->db->get_where('users', array('id' => $user))->row()->username;
        if ((empty($id))) {
            $add_date = date('m/d/y');
        } else {
            $add_date = $this->db->get_where('blog_setting', array('id' => $id))->row()->date;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', ' Blog Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'Short Description', 'trim|required|min_length[1]|max_length[1500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/blogPage');
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
                    'img_url' => $img_url,
                    'title' => $title,
                    'published' => $published,
                    'blog_post' => $blog_post,
                    'date' => $add_date,
                    'posted_by' => $user,
                    'description' => $description
                );
            } else {
                $data = array();
                $data = array(
                    'title' => $title,
                    'published' => $published,
                    'blog_post' => $blog_post,
                    'date' => $add_date,
                    'posted_by' => $user,
                    'description' => $description
                );
            }

            if (empty($id)) {
                $this->frontend_model->insertBlog($data);
                redirect('frontend/blogPage');
            } else {
                $this->frontend_model->updateBlog($id, $data);
                redirect('frontend/blogPage');
            }
        }
    }

    function editBlogByJason() {
        $id = $this->input->get('id');
        $data['f_blog'] = $this->frontend_model->getBlogById($id);
        echo json_encode($data);
    }

    function deleteBlog() {
        $data = array();
        $id = $this->input->get('id');
        $this->frontend_model->deleteBlog($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('frontend/blogPage');
    }

    /* -------------------- Service Option ----------------------- */

    public function servicePage() {
        $data['f_service_header'] = $this->frontend_model->getServiceHeader();
        $data['f_services'] = $this->frontend_model->getService();
        $this->load->view('home/header');
        $this->load->view('service_page', $data);
        $this->load->view('home/footer');
    }

    public function serviceHeader() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', 'Service Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'Service Description', 'trim|required|min_length[1]|max_length[1500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/servicePage');
        } else {

            $data = array();
            $data = array(
                'title' => $title,
                'description' => $description
            );

            $this->frontend_model->updateServiceHeader($id, $data);
            redirect('frontend/servicePage');
        }
    }

    public function addService() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('title', ' Title', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]|max_length[1500]');

        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/servicePage');
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
                'allowed_types' => "gif|jpg|png|jpeg|svg|pdf",
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
                    'img_url' => $img_url,
                    'title' => $title,
                    'description' => $description
                );
            } else {
                $data = array();
                $data = array(
                    'title' => $title,
                    'description' => $description
                );
            }
            if (empty($id)) {
                $this->frontend_model->insertService($data);
                redirect('frontend/servicePage');
            } else {
                $this->frontend_model->updateService($id, $data);
                redirect('frontend/servicePage');
            }
        }
    }

    function editServiceByJason() {
        $id = $this->input->get('id');
        $data['f_service'] = $this->frontend_model->getServiceById($id);
        echo json_encode($data);
    }

    function deleteService() {
        $data = array();
        $id = $this->input->get('id');
        $this->frontend_model->deleteService($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('frontend/servicePage');
    }

    /* -------------------- setting Option ----------------------- */

    public function settingPage() {
        $data['f_setting'] = $this->frontend_model->getSetting();
        $this->load->view('home/header');
        $this->load->view('setting', $data);
        $this->load->view('home/footer');
    }

    public function frontSetting() {
        $id = $this->input->post('id');
        $h_name = $this->input->post('h_name');
        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $open_a = $this->input->post('open_a');
        $open_b = $this->input->post('open_b');
        $open_c = $this->input->post('open_c');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $google = $this->input->post('google');
        $youtube = $this->input->post('youtube');
        $copyright = $this->input->post('copyright');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('h_name', 'Hospital Name', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('contact', 'Emergency Contact', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('open_a', 'Opening Hours', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('facebook', 'Facebook Link', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('twitter', 'Twitter Link', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('youtube', 'Youtube Link', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('google', 'Google Link', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('copyright', 'Copyright Text', 'trim|required|min_length[1]|max_length[500]');


        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/settingPage');
        } else {

            $data = array();
            $data = array(
                'h_name' => $h_name,
                'contact' => $contact,
                'email' => $email,
                'open_a' => $open_a,
                'open_b' => $open_b,
                'open_c' => $open_c,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'google' => $google,
                'youtube' => $youtube,
                'copyright' => $copyright
            );

            $this->frontend_model->updateSetting($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
            redirect('frontend/settingPage');
        }
    }

    /* -------------------- Website Option ----------------------- */

    public function webDoctorPage() {
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['f_header'] = $this->frontend_model->getFrontendHeader();
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('web_doctor_page', $data);
        $this->load->view('foot', $data);
    }

    public function webAboutPage() {
        $data['f_about'] = $this->frontend_model->getAbout();
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['f_service_header'] = $this->frontend_model->getServiceHeader();
        $data['f_services'] = $this->frontend_model->getService();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('web_about_page', $data);
        $this->load->view('foot', $data);
    }

    /* -------------------- Web contact ----------------------- */

    public function webContactPage() {
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('web_contact_page', $data);
        $this->load->view('foot', $data);
    }

    public function makeContact() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        if ((empty($id))) {
            $add_date = date('m/d/y');
        } else {
            $add_date = $this->db->get_where('contact', array('id' => $id))->row()->add_date;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Your Name', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('subject', 'Subject ', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('email', 'Your E-mail', 'trim|required|min_length[1]|max_length[500]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[1]|max_length[500]');

        if ($this->form_validation->run() == FALSE) {
            redirect('frontend/webContactPage');
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'subject' => $subject,
                'email' => $email,
                'add_date' => $add_date,
                'message' => $message
            );
            if (empty($id)) {
                $this->frontend_model->insertContact($data);
                $this->session->set_flashdata('feedback', 'Message sent successfully');
                redirect('frontend/webContactPage');
            } else {
                $this->frontend_model->updateContact($id, $data);
                redirect('frontend/webContactPage');
            }
        }
    }

    public function contactListPage() {
        $data['contacts'] = $this->frontend_model->getContactList();
        $this->load->view('home/header');
        $this->load->view('contact_list', $data);
        $this->load->view('home/footer');
    }

    /* -------------------- webDepartment ----------------------- */

    public function webDepartmentDetailsPage() {
        $data = array();
        $id = $this->input->get('id');
        $data['departmentt'] = $this->department_model->getDepartmentById($id);
        //$data['facilitys'] = $this->facility_model->getFacilityByDepartmentId($id);
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('web_department_details_page', $data);
        $this->load->view('foot', $data);
    }

    /* -------------------- webBlog ----------------------- */

    public function webBlogPage() {

        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['f_blogs'] = $this->frontend_model->getBlog();
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('head', $data);
        $this->load->view('web_blog_page', $data);
        $this->load->view('foot', $data);
    }

    public function webBlogDetailsPage() {
        $data = array();
        $id = $this->input->get('id');
        $data['f_blog'] = $this->frontend_model->getBlogById($id);
        $data['departments'] = $this->department_model->getDepartment();
        $data['f_setting'] = $this->frontend_model->getSetting();
        $this->load->view('head', $data);
        $this->load->view('web_blog_details_page', $data);
        $this->load->view('foot', $data);
    }

    /* -------------------- web Appointment ----------------------- */

    public function webAppointmentPage() {
        $data = array();
        $data['f_setting'] = $this->frontend_model->getSetting();
        $data['departments'] = $this->department_model->getDepartment();
        $data['departmentss'] = $this->frontend_model->getDepartmentRows();
        $this->load->view('head', $data);
        $this->load->view('web_appointment_page', $data);
        $this->load->view('foot', $data);
    }

    public function getDoctors() {
        $doctors = array();
        $department = $this->input->post('department');
        if ($department) {
            $con['conditions'] = array('department' => $department);
            $doctors = $this->frontend_model->getDoctorRows($con);
        }
        echo json_encode($doctors);
    }

    public function addNewAppointment() {
        $id = $this->input->post('id');
        $patient = $this->input->post('patient');
        $doctor = $this->input->post('doctor');
        $date = $this->input->post('date');
        $date = strtotime($date);
        $status = $this->input->post('status');
        $message = $this->input->post('message');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //$address = $this->input->post('address');
        $phone = $this->input->post('phone');
        if (empty($email)) {
            $email = $name . '-' . rand(1, 1000) . '-' . $name . '-' . rand(1, 1000) . '@example.com';
        }
        if (!empty($name)) {
            $password = $name . '-' . rand(1, 100000000);
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[1]|max_length[100]');
        //$this->form_validation->set_rules('date', 'Date', 'trim|required|min_length[1]|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("frontend/webBlogPage?id=$id");
            } else {

                $data['f_setting'] = $this->frontend_model->getSetting();
                $data['departments'] = $this->department_model->getDepartment();
                $this->load->view('head', $data);
                $this->load->view('web_appointment_page', $data);
                $this->load->view('foot', $data);
            }
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => $password
                    //'how_added' => 'from_appointment'
            );

            $username = $this->input->post('name');

            if (empty($id)) {
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                    redirect('frontend/webAppointmentPage');
                } else {
                    $dfg = 3;                                       //group table id for patient
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $group_data = array('group_id' => '3');
                    $this->patient_model->updateUserGroup($group_data, $ion_user_id);
                    $this->patient_model->insertPatient($data);
                    $inserted_id = $this->db->insert_id();                              //we take this id from patient table for add appointment 
                    $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    $this->session->set_flashdata('feedback', 'Added');
                    //redirect('frontend/webAppointmentPage');
                }
                $patient = $inserted_id;
            }
            $data = array();
            $data = array(
                'patient' => $patient,
                'doctor' => $doctor,
                'date' => $date,
                'message' => $message,
                'status' => 'Pending'
            );
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New department
                $this->appointment_model->insertAppointment($data);

                $this->session->set_flashdata('feedback', 'Appointment request successful');
            } else { // Updating department             
                $this->appointment_model->updateAppointment($id, $data);

                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('frontend/webAppointmentPage');
        }
    }

}
