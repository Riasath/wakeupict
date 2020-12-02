<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('chart_model');
        $this->load->model('settings/settings_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('details/details_model');
        $this->load->model('schedule/schedule_model');
        $this->load->library('upload');
    }

    function index() {
        $data['year_list'] = $this->chart_model->fetch_year();
        $this->load->view('dynamic_chart', $data);
    }

    function fetch_data() {
        if ($this->input->post('year')) {
            $chart_data = $this->chart_model->fetch_chart_data($this->input->post('year'));

            foreach ($chart_data->result_array() as $row) {
                $output[] = array(
                    'month' => $row["month"],
                    'profit' => floatval($row["profit"])
                );
            }
            echo json_encode($output);
        }
    }

    function echoChart() {
        $data['year_list'] = $this->chart_model->fetch_year_details();
        $this->load->view('home/header');
        $this->load->view('dynamic_chart_1', $data);
        $this->load->view('home/footer');
    }

    function fetch_data_details() {
        $patient_id = $this->input->post('year');
        //if ($this->input->post('year')) {
        $chart_data = $this->details_model->getDetailsByPatientId($patient_id);
//            print_r($chart_data);
//            die();
        $echos = json_decode($chart_data->echo);

//            print_r($echos);
//            die();

        foreach ($echos as $row) {
            $output[] = array(
                'month' => $row->echo_date,
                'profit' => floatval($row->lvidd_lvids)
            );
        }
        echo json_encode($output);
        //}
    }

    public function chartR() {
        $this->load->view('home/header');
        $this->load->view('chart');
        $this->load->view('home/footer');
    }

    public function getBarChart() {
        $patient_id = 26; //$this->input->get('26');
        $detail = $this->details_model->getDetailsByPatientId($patient_id);
        //echo $detail;
//        print_r($detail);
//        die();

        $echos = json_decode($detail->echo);

//        print_r($echos);
//        die();

        foreach ($echos as $row) {
            $output[] = array(
                'label' => $row->echo_date,
                'rating_label' => $row->lvidd_lvids
            );
        }

        echo json_encode($output);
    }

    function sixChart() {
        $data['year_list'] = $this->chart_model->fetch_year_details();
        $this->load->view('home/header');
        $this->load->view('dynamic_chart_six', $data);
        $this->load->view('home/footer');
    }

    function fetch_data_six() {
        $patient_id = $this->input->post('year');
        $chart_data = $this->details_model->getDetailsByPatientId($patient_id);
        $sixs = json_decode($chart_data->six_min_walk);

        foreach ($sixs as $row) {
            $output[] = array(
                'month' => $row->six_min_walk_date,
                'profit' => floatval($row->six_min_walk_speed)
            );
        }
        echo json_encode($output);
        //}
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
