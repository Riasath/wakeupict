<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schedule extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('schedule_model');
        $this->load->model('settings/settings_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('d_medicine/d_medicine_model');
        $this->load->model('details/details_model');
//        $this->load->model('nurse/nurse_model');
//        $this->load->model('receptionist/receptionist_model');
        $this->load->model('ion_auth_model');
        $this->load->library('upload');
    }

    #--------------------------------------------------------------------------#

    public function index() {
        //$data['addresss'] = $this->location_model->getAddress();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_schedule', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function create() {
        $schedule_id = $this->input->post('schedule_id');
        $doctor_id = $this->input->post('doctor_id');
        $available_date = $this->input->post('available_date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $per_patient_time = $this->input->post('per_patient_time');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('doctor_id', 'Select Doctor', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('available_date', 'available_date', 'trim|required|max_length[150]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("schedule/editSchedule?id=$id");
            } else {
                $this->session->set_flashdata('feedback', 'form_validation error, Try again');
                redirect("schedule/addSchedule");
            }
        } else {
            $data = array();
            $data = array(
                'doctor_id' => $doctor_id,
                'available_date' => $available_date,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'per_patient_time' => $per_patient_time
            );
        }
        if (empty($schedule_id)) {
            $this->schedule_model->insertSchedule($data);
        } else {
            $this->schedule_model->updateSchedule($schedule_id, $data);
        }
        redirect('schedule/showSchedule');
    }

    public function showSchedule() {
        $data['schedules'] = $this->schedule_model->getSchedule('schedule');
        $this->load->view('home/header');
        $this->load->view('view_schedule', $data);
        $this->load->view('home/footer');
    }

    //New schedule

    public function AddScheduleView() {
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/header');
        $this->load->view('add_Schedule_view', $data);
        $this->load->view('home/footer');
    }

    Public function AddNewSchedule() {
        $validation = array(
            array('field' => 'doctor_id', 'rules' => ''),
            array('field' => 'available_date', 'rules' => ''),
            array('field' => 'sl_no[]', 'rules' => 'required'),
            array('field' => 'start_time[]', 'rules' => 'required'),
            array('field' => 'end_time[]', 'rules' => 'required')
        );
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == true) {
            $doctor_id = $this->input->post('doctor_id');
            $available_date = $this->input->post('available_date');
            $sl_no = $this->input->post('sl_no[]');
            $start_time = $this->input->post('start_time[]');
            $end_time = $this->input->post('end_time[]');

            $available_schedule = $this->schedule_model->checkSchedule($doctor_id, $available_date);

            if (empty($available_schedule)) {
                $value = array();
                for ($i = 0; $i < count($sl_no); $i++) {
                    $value[$i] = array(
                        'doctor_id' => $doctor_id,
                        'available_date' => $available_date,
                        'sl_no' => $sl_no[$i],
                        'start_time' => $start_time[$i],
                        'end_time' => $end_time[$i]
                    );
                }
                $this->db->insert_batch('schedule', $value);
                $this->session->set_flashdata('feedback', 'added');
                redirect('schedule/showSchedule');
            } else {

                $this->session->set_flashdata('feedback', 'The schedule of this date (' . $available_date . ') was already added');
                redirect('schedule/AddScheduleView');
                echo '';
            }
        }
    }

    // appointment

    public function appointmentIndex() {
        //$data['addresss'] = $this->location_model->getAddress();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_appointment', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function search() {
//        if (!$this->ion_auth->in_group(array('admin'))) {
//            redirect('home/permission');
//        };
//        date_default_timezone_set('Asia/Dhaka');
        $data = array();
        $patient_id = $this->input->get("patient_id");
        $doctor_id = $this->input->get("doctor_id");
        $date = $this->input->get("available_date");
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $data['patient_id'] = $patient_id;
        $data['doctor_id'] = $doctor_id;
        $data['date'] = $date;
        $data['schedules'] = $this->schedule_model->getScheduleByDoctorAndDate($doctor_id, $date);
        $this->load->view('home/header');
        $this->load->view('add_appointment', $data);
        $this->load->view('home/footer');
    }

    public function addAppointment() {
        $schedule_id = $this->input->get('schedule_id');
        $status = $this->input->get('status');
        $doctor_id = $this->input->get('doctor_id');
        $patient_id = $this->input->get('patient_id');
        $available_date = $this->input->get('date');

        $availableAppointment = $this->schedule_model->checkPatientSchedule($patient_id, $available_date);
//        echo $status;
//        die();
        //$from = $this->input->post("date_from");
        //$to = $this->input->post("date_to");
        if (empty($availableAppointment)) {
            $data = array(
                'patient_id' => $this->input->get('patient_id'),
                'status' => $this->input->get('status'),
            );

            $this->schedule_model->updateAppointment($schedule_id, $data);
            redirect('appointment/showReceptionistPendingAppointment');
            $this->session->set_flashdata('feedback', 'Added');
        } else {

            $this->session->set_flashdata('feedback', 'The Patient Mr. ' . $this->patient_model->getPatientById($patient_id)->name . ' is already added ');
            redirect('schedule/search?patient_id=' . $patient_id . '&doctor_id=' . $doctor_id . '&available_date=' . $available_date);
        }
    }

    public function cancelAppointment() {
        $schedule_id = $this->input->get('schedule_id');

        $data = array(
            'patient_id' => "",
            'status' => "",
        );

        $this->schedule_model->updateAppointment($schedule_id, $data);
        redirect('home');
        $this->session->set_flashdata('feedback', 'Canceled');
    }

    //Prescription

    public function addPrescriptionView() {
        $data['patient_id'] = $this->input->get('patient_id');
        $data['doctor_id'] = $this->input->get('doctor_id');
        $data['schedule_id'] = $this->input->get('schedule_id');
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_prescription', $data);
        $this->load->view('home/footer');
    }

    public function addSinglePrescriptionView() {
        $patient_id = $this->input->post('patient_id');
        $data['patient_id'] = $this->input->post('patient_id');
//        $data['doctor_id'] = $this->input->get('doctor_id');
//        $data['schedule_id'] = $this->input->get('schedule_id');
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $data['types'] = $this->d_medicine_model->getType();
        $data['comments'] = $this->d_medicine_model->getComment();
        $data['detail'] = $this->details_model->getDetailsByPatientId($patient_id);
        $data['phones'] = $this->d_medicine_model->getOverPhoneInfo();
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_prescription', $data);
        $this->load->view('home/footer');
    }

    public function addPrescriptionSignsView() {
        $data['patient_id'] = $this->input->get('patient_id');
        $data['doctor_id'] = $this->input->get('doctor_id');
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $data['types'] = $this->d_medicine_model->getType();
        $data['comments'] = $this->d_medicine_model->getComment();
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_prescription_signs', $data);
        $this->load->view('home/footer');
    }

    public function addNew() {
        $id = $this->input->post('id');
        $payroll_code = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $patient_id = $this->input->post('patient_id');
        $doctor_id = $this->input->post('doctor_id');
        $date = $this->input->post('date');
        $visit_no = $this->input->post('visit_no');
//        echo $date;
//        die();
        $diagnosis = $this->input->post('diagnosis');
        $chief_complaints = $this->input->post('chief_complaints');
        $schedule_id = $this->input->post('schedule_id');
        //$year = $this->input->post('year');
        //$joining_salary = $this->input->post('joining_salary');
        $status = $this->input->post('status');

        //bangla field
        $daily_water = $this->input->post('daily_water');
        $extra_salt = $this->input->post('extra_salt');
        $saline = $this->input->post('saline');
        $borhani = $this->input->post('borhani');
        $chips = $this->input->post('chips');
        $influenza = $this->input->post('influenza');
        $pneumonia = $this->input->post('pneumonia');
        $next_appointment = $this->input->post('next_appointment');
        $week = $this->input->post('week');
        $month = $this->input->post('month');
        $comment = $this->input->post('comment');
        //$status = $this->input->post('status');
//
//        $hi = $this->input->post('hi');
//        $hello = $this->input->post('hello');
//        $how = $this->input->post('how');
//        $are = $this->input->post('are');
//        $you = $this->input->post('you');

        $nyha1 = $this->input->post('nyha1');
        $nyha2 = $this->input->post('nyha2');
        $nyha3 = $this->input->post('nyha3');
        $nyha4 = $this->input->post('nyha4');
        //$nyha = $nyha1 . " " . $nyha1" . $nyha3" . $nyha4;

        $signs_symptoms = array(
            'Exertional SOB' => $this->input->post('exertional'),
            'NYHA Classification' => $nyha1 . "  " . $nyha2 . "  " . $nyha3 . "  " . $nyha4,
            'Onthopnoea' => $this->input->post('onthopnoea'),
            'PND' => $this->input->post('pnd'),
            'ExertionalChestPain' => $this->input->post('chestpain'),
            'Palpitation' => $this->input->post('palpitation'),
            'Fatigue' => $this->input->post('fatigue'),
            'Dizziness' => $this->input->post('dizziness'),
            'Syncopy/Presyncopy' => $this->input->post('syncopy'),
            'Overall QQL' => $this->input->post('qql'),
            'Leg Swelling' => $this->input->post('swelling'),
            'Sleep Disturbance' => $this->input->post('sleep'),
            'Appetite' => $this->input->post('appetite'),
            'Bowel Habit' => $this->input->post('bowel'),
            'Sexual Activities' => $this->input->post('sexual'),
            'Mental Status' => $this->input->post('mental'),
            'Psychological Status' => $this->input->post('psychological')
        );

        $physical_examination = array(
            'Weight' => $this->input->post('weight'),
            'Anemia/ Jaundice / Cyanosis' => $this->input->post('anemia'), //no heading
            'Edema' => $this->input->post('edema'),
            'JVP' => $this->input->post('jvp'),
            'Pulse' => $this->input->post('pulse'),
            'Pulse B/M' => $this->input->post('pulse_con'), //no heading, related to Pulse
            'BP' => $this->input->post('bp'),
            'Heart' => $this->input->post('heart'),
            'Lungs' => $this->input->post('lungs'),
            '6MWT' => $this->input->post('min_walk'),
            'Echo' => $this->input->post('echo'),
            'ECG' => $this->input->post('ecg')
        );

        $allowances = array();
        $allowance_types = $this->input->post('allowance_type');
        $allowance_amounts = $this->input->post('allowance_amount');

        $number_of_entries = sizeof($allowance_types);

        for ($i = 0; $i < $number_of_entries; $i++) {
            if ($allowance_types[$i] != "" && $allowance_amounts[$i] != "") {
                $new_entry = array(
                    'type' => $allowance_types[$i],
                    'amount' => $allowance_amounts[$i]
                );
                array_push($allowances, $new_entry);
            }
        }

        $deductions = array();
        $deduction_types = $this->input->post('deduction_type');
        $deduction_amounts = $this->input->post('deduction_amount');
        $duration = $this->input->post('duration');
        $number_of_entries = sizeof($deduction_types);

        for ($i = 0; $i < $number_of_entries; $i++) {
            if ($deduction_types[$i] != "" && $deduction_amounts[$i] != "") {
                $new_entry = array(
                    'type' => $deduction_types[$i],
                    'amount' => $deduction_amounts[$i],
                    'duration' => $duration[$i]
                );
                array_push($deductions, $new_entry);
            }
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('patient_id', 'Patient', 'trim|required|min_length[1]|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("schedule/editPrescription?id=$id");
            } else {
                redirect("schedule/addPrescriptionSignsView");
            }
        } else {

            $data = array();
            $data = array(
                'patient_id' => $patient_id,
                'doctor_id' => $doctor_id,
                'date' => $date,
                'visit_no' => $visit_no,
                //'schedule_id' => $schedule_id,
                'payroll_code' => $payroll_code,
                'diagnosis' => $diagnosis,
                'chief_complaints' => $chief_complaints,
                'status' => $status,
                'daily_water' => $daily_water,
                'extra_salt' => $extra_salt,
                'saline' => $saline,
                'borhani' => $borhani,
                'chips' => $chips,
                'influenza' => $influenza,
                'pneumonia' => $pneumonia,
                'next_appointment' => $next_appointment,
                'week' => $week,
                'month' => $month,
                'comment' => $comment
                    //'status' => $status
            );

            if (empty($id)) {
                $data['signs_symptoms'] = json_encode($signs_symptoms);
                $data['physical_examination'] = json_encode($physical_examination);
                $data['allowances'] = json_encode($allowances);
                $data['deductions'] = json_encode($deductions);
                $this->schedule_model->insertPrescription($data);
                $data = array('status' => $status);
                $this->appointment_model->updateAppointment($schedule_id, $data);
                $this->session->set_flashdata('feedback', 'Added');
            }
            if (!empty($id)) {
                $data['deductions'] = json_encode($deductions);
                $this->schedule_model->updatePayroll($id, $data);
                $data = array('status' => $status);
                $this->appointment_model->updateAppointment($schedule_id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            redirect('home/calendar');
        }
    }

    public function showPrescriptionList() {
        $data['prescriptions'] = $this->schedule_model->getPrescription();
        $this->load->view('home/header');
        $this->load->view('prescriptions', $data);
        $this->load->view('home/footer');
    }

    function deletePrescription() {
        $id = $this->input->get('id');
        $this->schedule_model->deletePrescription($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('schedule/showPrescriptionList');
    }

    public function patientPrescriptionList() {
        if ($this->ion_auth->in_group(array('patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
        }

        $data['prescriptions'] = $this->schedule_model->getPrescriptionByPatientId($patient_id);
        $this->load->view('home/header');
        $this->load->view('prescriptions', $data);
        $this->load->view('home/footer');
    }

    public function viewPrescription() {
        $id = $this->input->get('id');
        $data['phones'] = $this->d_medicine_model->getOverPhoneInfo($id);
        $data['prescription'] = $this->schedule_model->getPayrollById($id);
        $this->load->view('home/header');
        $this->load->view('prescription_view_1', $data);
        $this->load->view('home/footer');
    }

    public function emailPrescription() {
        $id = $this->input->get('id');
        $data['phones'] = $this->d_medicine_model->getOverPhoneInfo($id);
        $data['prescription'] = $this->schedule_model->getPayrollById($id);
        $patient_info = $this->patient_model->getPatientById($id);
       
        //$this->load->view('prescription_view_1', $data);
        $html_content = $this->load->view('prescription_view_1',$data,true);
        // Generate PDF
		$this->load->library('pdf');
		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
        $output = $this->pdf->output();
        $name=rand(10000000,99999999).'.pdf';
        file_put_contents($name, $output);
        $massage='Here is your prescription.';
        if($patient_info){
            if($patient_info->email){
                $this->sentEmail($patient_info->email,$massage,$name);
            }
            else{
                echo 'This user has no email address';
            }
        }
        else{
            echo 'Please check database';
        }
        
        
    }

    public function sentEmail($emailTo,$massage,$prescription) {
        echo $emailTo;
        echo $massage;
        echo $prescription;
        exit();

        $this->load->library('email');
        $config=array(
               'charset'=>'utf-8',
               'wordwrap'=> TRUE,
               'mailtype' => 'html'
               );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->to($emailTo);
        $this->email->from('yourdomainemail.com','Doctors Prescription');
        $this->email->subject('Doctors Prescription From yourdomainemail.');
        $this->email->message($massage);
        $prescription='./'.$prescription;
        $this->email->attach($prescription);
        $this->email->send();
    }

    public function viewTodaysPrescription() {
        $patient_id = $this->input->get('patient_id');
        date_default_timezone_set('Asia/Dhaka');
        $date = date("d-m-Y");
        $data['prescription'] = $this->schedule_model->getPrescriptionByPatientAndDate($patient_id, $date);
        $this->load->view('home/header');
        $this->load->view('prescription_view_1', $data);
        $this->load->view('home/footer');
    }

    public function viewPrescriptionByPatientId() {
        $patient_id = $this->input->get('patient_id');
        //$id = $this->input->get('patient_id');  // thik korta hoba
        $data['patient_id'] = $this->input->get('patient_id');
        $data['doctor_id'] = $this->input->get('doctor_id');
        //$data['prescription'] = $this->schedule_model->getPayrollById($id);
        $data['prescriptions'] = $this->schedule_model->getPrescriptionByPatientId($patient_id);
        $this->load->view('home/header');
        $this->load->view('prescription_view', $data);
        $this->load->view('home/footer');
    }

    public function editPrescription() {
        $id = $this->input->get('id');
        $data['prescription'] = $this->schedule_model->getPayrollById($id);
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $this->load->view('home/header'); // just the header file
        $this->load->view('edit_prescription', $data);
        $this->load->view('home/footer');
    }

    public function updatePrescriptionView() {
        date_default_timezone_set('Asia/Dhaka');
        $patient_id = $this->input->get('patient_id');
        $data['schedule_id'] = $this->input->get('schedule_id');
        $data['medicines'] = $this->d_medicine_model->getMedicine();
        $date = date("d-m-Y");
        $data['prescription'] = $this->schedule_model->getPrescriptionByPatientAndDate($patient_id, $date);
        $this->load->view('home/header'); // just the header file
        $this->load->view('update_prescription', $data);
        $this->load->view('home/footer');
    }

    // Exel schedule Emport 

    function importSchedule() {
        $this->load->view('home/header');
        $this->load->view('excel_schedule_import');
        $this->load->view('home/footer');
    }

    function fetch() {
        $data = $this->schedule_model->select();
        $output = '
		<h3 align="center">Total Data - ' . $data->num_rows() . '</h3>
		<table class="table table-striped table-bordered">
			<tr>
                                    <th>Doctor Id</th>
                                    <th>Week Id</th>
                                    <th>Date</th>
                                    <th>In</th>
                                    <th>Out</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Statud</th>
			</tr>
		';
        foreach ($data->result() as $row) {
            $output .= '
			<tr>
				<td>' . $row->worker_id . '</td>
				<td>' . $row->week_id . '</td>
				<td>' . $row->date . '</td>
				<td>' . $row->in . '</td>
				<td>' . $row->out . '</td>
                                <td>' . $row->duration . '</td>
				<td>' . $row->description . '</td>
				<td>' . $row->status . '</td>
			</tr>
			';
        }
        $output .= '</table>';
        echo $output;
    }

    public function RRRRRRRR() {
//        $id = $this->input->post('id');
//
//        $exertional = $this->input->post('exertional');
//        $nyha = $this->input->post('nyha');
//        $onthopnoea = $this->input->post('onthopnoea');
//        $pnd = $this->input->post('pnd');
//        $chestpain = $this->input->post('chestpain');
//        $palpitation = $this->input->post('palpitation');
//        $fatigue = $this->input->post('fatigue');
//        $dizziness = $this->input->post('dizziness');
//        $syncopy = $this->input->post('syncopy');
//        $qql = $this->input->post('qql');
//        $swelling = $this->input->post('swelling');
//        $sleep = $this->input->post('sleep');
//        $appetite = $this->input->post('appetite');
//        $bowel = $this->input->post('bowel');
//        $sexual = $this->input->post('sexual');
//        $mental = $this->input->post('mental');
//        $psychological = $this->input->post('psychological');
//        $weight = $this->input->post('weight');
//        $anemia = $this->input->post('anemia');
//        $edema = $this->input->post('edema');
//        $jvp = $this->input->post('jvp');
//        $pulse = $this->input->post('pulse');
//        $pulse_con = $this->input->post('pulse_con');
//        $heart = $this->input->post('heart');
//        $lungs = $this->input->post('lungs');
//        $min_walk = $this->input->post('min_walk');
//        $echo = $this->input->post('echo');
//        $ecg = $this->input->post('ecg');

        $details = array(
            'exertional' => $this->input->post('exertional'),
            'nyha' => $this->input->post('nyha'),
            'onthopnoea' => $this->input->post('onthopnoea'),
            'pnd' => $this->input->post('pnd'),
            'chestpain' => $this->input->post('chestpain'),
            'palpitation' => $this->input->post('palpitation'),
            'fatigue' => $this->input->post('fatigue'),
            'dizziness' => $this->input->post('dizziness'),
            'syncopy' => $this->input->post('syncopy'),
            'qql' => $this->input->post('qql'),
            'swelling' => $this->input->post('swelling'),
            'sleep' => $this->input->post('sleep'),
            'appetite' => $this->input->post('appetite'),
            'bowel' => $this->input->post('bowel'),
            'sexual' => $this->input->post('sexual'),
            'mental' => $this->input->post('mental'),
            'psychological' => $this->input->post('psychological'),
            'weight' => $this->input->post('weight'),
            'anemia' => $this->input->post('anemia'),
            'edema' => $this->input->post('edema'),
            'jvp' => $this->input->post('jvp'),
            'pulse' => $this->input->post('pulse'),
            'pulse_con' => $this->input->post('pulse_con'),
            'heart' => $this->input->post('heart'),
            'lungs' => $this->input->post('lungs'),
            'min_walk' => $this->input->post('min_walk'),
            'echo' => $this->input->post('echo'),
            'ecg' => $this->input->post('ecg'),
        );

        $data['details'] = json_encode($details);
        if (empty($id)) {
            $this->nurse_model->insertPrescription($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else {
            $this->nurse_model->updatePayroll($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
        }
        redirect('nurse/addNew');
    }

    // multiple delete 

    function delete_all() {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->schedule_model->deleteAll($id[$count]);
            }
        }
    }

    function deleteAllFromArray() {
        $id = $this->input->post('id');
//        if ($this->input->post('checkbox_value')) {
//            $id = $this->input->post('checkbox_value');
//            for ($count = 0; $count < count($id); $count++) {
//                $this->schedule_model->deleteAll($id[$count]);
//            }
//        }
        $removeKeys = $this->input->post('checkbox_value');
        $prescription = $this->schedule_model->getPayrollById($id);
        $deductions = json_decode($prescription->deductions);
        foreach ($removeKeys as $key) {
            unset($deductions[$key]);
        }

        $deductions = array_merge($deductions);
        $data['deductions'] = json_encode($deductions);
        $this->schedule_model->updatePayroll($id, $data);
        $this->session->set_flashdata('feedback', 'Updated');
        redirect('schedule/viewPayroll?id=20');
    }

    function deleteFromArray() {
        $id = $this->input->post('id');
        //$id = 18;
        //$key = $this->input->get('key');
        //multiple
        $removeKeys = $this->input->post('delete');
//                echo '<pre>';
//        print_r($removeKeys);
//        die();
//        echo $id;
//        echo $key;

        $prescription = $this->schedule_model->getPayrollById($id);
        $deductions = json_decode($prescription->deductions);
//        echo '<pre>';
//        print_r($deductions);
//        die();
        //singlr
//        unset($deductions[$key]);
//        $deductions = array_merge($deductions);
        //multiple
        foreach ($removeKeys as $key) {
            unset($deductions[$key]);
        }

        $deductions = array_merge($deductions);
//        echo '<pre>';
//        print_r($deductions);
//        die();

        $data['deductions'] = json_encode($deductions);
        $this->schedule_model->updatePayroll($id, $data);
        $this->session->set_flashdata('feedback', 'Updated');
        redirect('schedule/viewPayroll?id=' . $id);
    }

    //Evaluation Part
    public function showPrescriptionByDate() {
        $data['prescriptions'] = $this->schedule_model->getPrescription();
        $this->load->view('home/header');
        $this->load->view('prescriptions_by_date', $data);
        $this->load->view('home/footer');
    }

    public function dateWisePrescription() {
        $date = $this->input->get('date');
        $data['allDateWisePrescription'] = $this->schedule_model->getPrescriptionByDate($date);
        echo json_encode($data);
    }

}
