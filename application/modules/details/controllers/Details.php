<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('details_model');
        $this->load->model('doctor/doctor_model');
        $this->load->model('patient/patient_model');
        $this->load->model('schedule/schedule_model');
        $this->load->model('d_medicine/d_medicine_model');
        $this->load->model('settings/settings_model');
        $this->load->library('upload');
    }

    public function addDetailsView() {
        $data['patient_id'] = $this->input->get('patient_id');
        $this->load->view('home/header'); // just the header file
        $this->load->view('add_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function addDetails() {
        $data = array();
        $data = array(
            'patient_id' => $this->input->post('patient_id'),
            'date' => $this->input->post('date'),
        );

        $pneumococcal[] = array(
            'pneumococcal' => $this->input->post('pneumococcal'),
            'pn_date' => $this->input->post('pn_date')
        );

        $influenza[] = array(
            'influenza' => $this->input->post('influenza'),
            'in_date' => $this->input->post('in_date')
        );

        if (!empty($this->input->post('past_medical_history'))) {
            $past_medical_history = array(
                'past_medical_history' => $this->input->post('past_medical_history'),
            );
        }
        $comorbidities_risk_factors = array(
            'htn' => $this->input->post('htn'),
            'asthma' => $this->input->post('asthma'),
            'ba' => $this->input->post('ba'),
            'obstructive_sleep_apnoea' => $this->input->post('obstructive_sleep_apnoea'),
            'dm_type_one' => $this->input->post('dm_type_one'),
            'dm_type_two' => $this->input->post('dm_type_two'),
            'copd' => $this->input->post('copd'),
            'cerebrovascular_accident' => $this->input->post('cerebrovascular_accident'),
            'dl' => $this->input->post('dl'),
            'renal_failure' => $this->input->post('renal_failure'),
            'severe_musculoskeletal_disease' => $this->input->post('severe_musculoskeletal_disease'),
            'positive_fh' => $this->input->post('positive_fh'),
            'associated_cad' => $this->input->post('associated_cad'),
            'cancer' => $this->input->post('cancer'),
            'smoker_yes' => $this->input->post('smoker_yes'),
            'smoker_no' => $this->input->post('smoker_no'),
            'ex_smoker' => $this->input->post('ex_smoker'),
            'valvular_disease' => $this->input->post('valvular_disease'),
            'bleeding_diathesis' => $this->input->post('bleeding_diathesis'),
            'alcohol' => $this->input->post('alcohol'),
            'thyroid_dysfunction' => $this->input->post('thyroid_dysfunction'),
            'peripheral_vascular_disease' => $this->input->post('peripheral_vascular_disease'),
            'other_one' => $this->input->post('other_one'),
            'other_two' => $this->input->post('other_two'),
            'other_three' => $this->input->post('other_three'),
            'anaemia' => $this->input->post('anaemia'),
        );
        $diagnosis = array(
            'diagnosis' => $this->input->post('diagnosis'),
        );

        if (!empty($this->input->post('ecg_date'))) {
            $ecg[] = array(
                'ecg_date' => $this->input->post('ecg_date'),
                'findings' => $this->input->post('findings'),
                'rhythmc_sinus_AF' => $this->input->post('rhythmc_sinus_AF'),
                'qrs_ms' => $this->input->post('qrs_ms'),
                'rbbb_lbbb' => $this->input->post('rbbb_lbbb'),
                'heart_block' => $this->input->post('heart_block'),
                'qt_qtc' => $this->input->post('qt_qtc'),
                'ex_beats' => $this->input->post('ex_beats')
            );
        }
        $echo[] = array(
            'echo_date' => $this->input->post('echo_date'),
            'lvidd_lvids' => $this->input->post('lvidd_lvids'),
            'ef_per' => $this->input->post('ef_per'),
            'rvsp_pasp' => $this->input->post('rvsp_pasp'),
            'rwma' => $this->input->post('rwma'),
            'd_d' => $this->input->post('d_d'),
            'mr_none' => $this->input->post('mr_none'),
            'la' => $this->input->post('la')
        );

        $chest_x_ray[] = array(
            'chest_x_ray_date' => $this->input->post('chest_x_ray_date'),
            'chest_x_ray_findings' => $this->input->post('chest_x_ray_findings'),
            'chest_x_ray_pulmonary_edema' => $this->input->post('chest_x_ray_pulmonary_edema'),
            'chest_x_ray_pvh' => $this->input->post('chest_x_ray_pvh'),
            'chest_x_ray_pleural_effusion' => $this->input->post('chest_x_ray_pleural_effusion'),
            'chest_x_ray_ct_ratio' => $this->input->post('chest_x_ray_ct_ratio')
        );
        $six_min_walk[] = array(
            'six_min_walk_date' => $this->input->post('six_min_walk_date'),
            'six_min_walk_performance' => $this->input->post('six_min_walk_performance'),
            'six_min_walk_speed' => $this->input->post('six_min_walk_speed'),
            'six_min_walk_distance' => $this->input->post('six_min_walk_distance')
        );
        $holter_event_recorder[] = array(
            'holter_date' => $this->input->post('holter_date'),
            'holter_vpc' => $this->input->post('holter_vpc'),
            'holter_ventricular_arrhythmia' => $this->input->post('holter_ventricular_arrhythmia'),
            'holter_ventricular_arrhythmia_yes' => $this->input->post('holter_ventricular_arrhythmia_yes'),
            'holter_atrial_arrhythmia' => $this->input->post('holter_atrial_arrhythmia'),
            'holter_atrial_arrhythmia_yes' => $this->input->post('holter_atrial_arrhythmia_yes'),
            'holter_heart_rate_variability' => $this->input->post('holter_heart_rate_variability'),
            'holter_othrt' => $this->input->post('holter_othrt')
        );

        $stress_test[] = array(
            'stress_test_date' => $this->input->post('stress_test_date'),
            'involved_regions' => $this->input->post('involved_regions'),
            'involved_coronary' => $this->input->post('involved_coronary'),
            'viable' => $this->input->post('viable'),
            'non_viable' => $this->input->post('non_viable'),
            'ischemia' => $this->input->post('ischemia'),
            'arrhythmias' => $this->input->post('arrhythmias'),
            'thr_achieved' => $this->input->post('thr_achieved')
        );
        $mpi[] = array(
            'mpi_date' => $this->input->post('mpi_date'),
            'lvef' => $this->input->post('lvef'),
            'territory' => $this->input->post('territory'),
            'territory_persent' => $this->input->post('territory_persent'),
            'scar' => $this->input->post('scar')
        );
        $angiogram[] = array(
            'angiogram_date' => $this->input->post('s_creatinine_date'),
            'angiogram' => $this->input->post('angiogram')
        );
        $s_creatinine[] = array(
            's_creatinine_date' => $this->input->post('s_creatinine_date'),
            's_creatinine_value' => $this->input->post('s_creatinine_value')
        );
        $s_electrolytes[] = array(
            's_electrolytes_date' => $this->input->post('s_electrolytes_date'),
            's_electrolytes_sodium' => $this->input->post('s_electrolytes_sodium'),
            's_electrolytes_potassium' => $this->input->post('s_electrolytes_potassium')
        );
        $lipid_profile[] = array(
            'lipid_profile_date' => $this->input->post('lipid_profile_date'),
            'lipid_profile_tc' => $this->input->post('lipid_profile_tc'),
            'lipid_profile_ldl' => $this->input->post('lipid_profile_ldl'),
            'lipid_profile_hdl' => $this->input->post('lipid_profile_hdl'),
            'lipid_profile_tg' => $this->input->post('lipid_profile_tg')
        );
        $cbc[] = array(
            'cbc_date' => $this->input->post('cbc_date'),
            'cbc_hb' => $this->input->post('cbc_hb'),
            'cbc_platelet' => $this->input->post('cbc_platelet'),
            'cbc_tc' => $this->input->post('cbc_tc'),
            'cbc_dc' => $this->input->post('cbc_dc')
        );
        $glucose[] = array(
            'glucose_date' => $this->input->post('glucose_date'),
            'glucose_fbs' => $this->input->post('glucose_fbs'),
            'glucose_rbs' => $this->input->post('glucose_rbs'),
            'glucose_hab' => $this->input->post('glucose_hab'),
            'glucose_hbac' => $this->input->post('glucose_hbac')
        );
        $vitamin_d[] = array(
            'vitamin_d_date' => $this->input->post('vitamin_d_date'),
            'vitamin_d_value' => $this->input->post('vitamin_d_value')
        );
        $uric_acid[] = array(
            'uric_acid_date' => $this->input->post('uric_acid_date'),
            'uric_acid_value' => $this->input->post('uric_acid_value')
        );
        $inr[] = array(
            'inr_date' => $this->input->post('inr_date'),
            'inr_value' => $this->input->post('inr_value')
        );
        $tsh[] = array(
            'tsh_date' => $this->input->post('tsh_date'),
            'tsh_value' => $this->input->post('tsh_value')
        );
        $t_three[] = array(
            't_three_date' => $this->input->post('t_three_date'),
            't_three_value' => $this->input->post('t_three_value')
        );
        $t_four[] = array(
            't_four_date' => $this->input->post('t_four_date'),
            't_four_value' => $this->input->post('t_four_value')
        );
        $calcium[] = array(
            'calcium_date' => $this->input->post('calcium_date'),
            'calcium_value' => $this->input->post('calcium_value')
        );
        $magnesium[] = array(
            'magnesium_date' => $this->input->post('magnesium_date'),
            'magnesium_value' => $this->input->post('magnesium_value')
        );
        $nt_pro_bnp[] = array(
            'nt_pro_bnp_date' => $this->input->post('nt_pro_bnp_date'),
            'nt_pro_bnp_value' => $this->input->post('nt_pro_bnp_value')
        );

        $other = array();
        $other_date = $this->input->post('other_date');
        $other_name = $this->input->post('other_name');
        $other_value = $this->input->post('other_value');

        $number_of_entries = sizeof($other_date);

        for ($i = 0; $i < $number_of_entries; $i++) {
            if ($other_date[$i] != "") {
                $new_entry = array(
                    'other_date' => $other_date[$i],
                    'other_name' => $other_name[$i],
                    'other_value' => $other_value[$i]
                );
                array_push($other, $new_entry);
            }
        }

//        $other[] = array(
//            'other_date' => $this->input->post('other_date'),
//            'other_name' => $this->input->post('other_name'),
//            'other_value' => $this->input->post('other_value')
//        );

        $data['pneumococcal'] = json_encode($pneumococcal);
        $data['influenza'] = json_encode($influenza);
        $data['past_medical_history'] = json_encode($past_medical_history);
        $data['comorbidities_risk_factors'] = json_encode($comorbidities_risk_factors);
        $data['diagnosis'] = json_encode($diagnosis);
        $data['ecg'] = json_encode($ecg);
        $data['echo'] = json_encode($echo);
        $data['chest_x_ray'] = json_encode($chest_x_ray);
        $data['six_min_walk'] = json_encode($six_min_walk);
        $data['holter_event_recorder'] = json_encode($holter_event_recorder);
        $data['stress_test'] = json_encode($stress_test);
        $data['mpi'] = json_encode($mpi);
        $data['angiogram'] = json_encode($angiogram);
        $data['s_creatinine'] = json_encode($s_creatinine);
        $data['s_electrolytes'] = json_encode($s_electrolytes);
        $data['lipid_profile'] = json_encode($lipid_profile);
        $data['cbc'] = json_encode($cbc);
        $data['glucose'] = json_encode($glucose);
        $data['vitamin_d'] = json_encode($vitamin_d);
        $data['uric_acid'] = json_encode($uric_acid);
        $data['inr'] = json_encode($inr);
        $data['tsh'] = json_encode($tsh);
        $data['t_three'] = json_encode($t_three);
        $data['t_four'] = json_encode($t_four);
        $data['calcium'] = json_encode($calcium);
        $data['magnesium'] = json_encode($magnesium);
        $data['nt_pro_bnp'] = json_encode($nt_pro_bnp);
        $data['other'] = json_encode($other);

        $this->db->insert('details', $data);
        redirect('home/calendar');
    }

    public function viewDetails() {
        $patient_id = $this->input->get('patient_id');
        $data['detail'] = $this->details_model->getDetailsByPatientId($patient_id);
        $data['patient'] = $this->details_model->getPatientById($patient_id);
        $data['prescriptions'] = $this->schedule_model->getPrescriptionByPatientId($patient_id);
        //$data['phones'] = $this->d_medicine_model->getOverPhoneInfo();
        //$data['details'] = $this->details_model->getDetails($patient_id);
        $data['patient_id'] = $this->input->get('patient_id');
        $this->load->view('home/header'); // just the header file
        $this->load->view('view_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function viewDetailByPatientId() {
        $patient_id = $this->input->get('id');
        $data['detail'] = $this->details_model->getDetailsByPatientId($patient_id);
        $data['patient_id'] = $this->input->get('patient_id');
        $data['phones'] = $this->d_medicine_model->getOverPhoneInfo();
        $this->load->view('home/header'); // just the header file
        $this->load->view('view_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function updateEcg() {
        $patient_id = $this->input->post('patient_id');

        $ecg_n = array(
            'ecg_date' => $this->input->post('ecg_date'),
            'findings' => $this->input->post('findings'),
            'rhythmc_sinus_AF' => $this->input->post('rhythmc_sinus_AF'),
            'qrs_ms' => $this->input->post('qrs_ms'),
            'rbbb_lbbb' => $this->input->post('rbbb_lbbb'),
            'heart_block' => $this->input->post('heart_block'),
            'qt_qtc' => $this->input->post('qt_qtc'),
            'ex_beats' => $this->input->post('ex_beats')
        );
        
        $ecgs = $this->details_model->getDetailsByPatientId($patient_id)->ecg;
        $ecg = json_decode($ecgs);
        if (!empty($ecg)) {
            array_push($ecg, $ecg_n);
        } else {
            $ecg = array($ecg_n);
        }
        //$outputData=$ecg;
        
        $data['ecg'] = json_encode($ecg);
        $this->details_model->updateDetailsData($patient_id, $data);

        $outputData=$this->details_model->getDetailsByPatientId($patient_id);

        $arrayName = array(
            'key' => $outputData->id,
            'ecg_data' =>$ecg , 
        );

        if($this->input->post('ajax_call')==1){
            echo json_encode($ecg_n);
            
        }
        else{
            redirect('details/viewDetails?patient_id=' . $patient_id);
        }
    }

    function deleteEcgFromArray() {
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $removeKeys = $this->input->post('delete');

        //$prescription = $this->schedule_model->getPayrollById($id);
        $details = $this->details_model->getDetailsById($id);
        $ecgs = json_decode($details->ecg);
//        echo '<pre>';
//        print_r($ecgs);
//        die();
        //singlr
//        unset($deductions[$key]);
//        $deductions = array_merge($deductions);
        //multiple
        foreach ($removeKeys as $key) {
            unset($ecgs[$key]);
        }

        $ecgs = array_merge($ecgs);
        echo '<pre>';
        print_r($ecgs);
        die();

        $data['ecg'] = json_encode($ecgs);
        $this->details_model->updateDetailsData($patient_id, $data);
        $this->session->set_flashdata('feedback', 'Updated');
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    function delete_all() {
        if ($this->input->post('checkbox_value')) {

            $id = $this->input->post('details_id');
            $patient_id = $this->input->post('patient_id');
            $removeKeys = $this->input->post('checkbox_value');

            //$prescription = $this->schedule_model->getPayrollById($id);
            $details = $this->details_model->getDetailsById($id);
            $ecgs = json_decode($details->ecg);
//        echo '<pre>';
//        print_r($ecgs);
//        die();
            //singlr
//        unset($deductions[$key]);
//        $deductions = array_merge($deductions);
            //multiple
            foreach ($removeKeys as $key) {
                unset($ecgs[$key]);
            }

//            for ($count = 0; $count < count($removeKeys); $count++) {
//                $this->schedule_model->deleteAll($id[$count]);
//                unset($ecgs[$key]);
//            }

            $ecgs = array_merge($ecgs);
//            echo '<pre>';
//            print_r($ecgs);
//            die();

            $data['ecg'] = json_encode($ecgs);
            $this->details_model->updateDetailsData($patient_id, $data);
        }
    }

    public function updateEcho() {
        $patient_id = $this->input->post('patient_id');

        $echo_n = array(
            'echo_date' => $this->input->post('echo_date'),
            'lvidd_lvids' => $this->input->post('lvidd_lvids'),
            'ef_per' => $this->input->post('ef_per'),
            'rvsp_pasp' => $this->input->post('rvsp_pasp'),
            'rwma' => $this->input->post('rwma'),
            'd_d' => $this->input->post('d_d'),
            'mr_none' => $this->input->post('mr_none'),
            'la' => $this->input->post('la')
        );

        $echos = $this->details_model->getDetailsByPatientId($patient_id)->echo;

        $echo = json_decode($echos);
        if (!empty($echo)) {
            array_push($echo, $echo_n);
        } else {
            $echo = array($echo_n);
        }

        $data['echo'] = json_encode($echo);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateChest_x_ray() {
        $patient_id = $this->input->post('patient_id');

        $chest_x_ray_n = array(
            'chest_x_ray_date' => $this->input->post('chest_x_ray_date'),
            'chest_x_ray_findings' => $this->input->post('chest_x_ray_findings'),
            'chest_x_ray_pulmonary_edema' => $this->input->post('chest_x_ray_pulmonary_edema'),
            'chest_x_ray_pvh' => $this->input->post('chest_x_ray_pvh'),
            'chest_x_ray_pleural_effusion' => $this->input->post('chest_x_ray_pleural_effusion'),
            'chest_x_ray_ct_ratio' => $this->input->post('chest_x_ray_ct_ratio')
        );

        $chest_x_rays = $this->details_model->getDetailsByPatientId($patient_id)->chest_x_ray;

        $chest_x_ray = json_decode($chest_x_rays);
        if (!empty($chest_x_ray)) {
            array_push($chest_x_ray, $chest_x_ray_n);
        } else {
            $chest_x_ray = array($chest_x_ray_n);
        }

        $data['chest_x_ray'] = json_encode($chest_x_ray);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateSix_min_walk() {
        $patient_id = $this->input->post('patient_id');

        $six_min_walk_n = array(
            'six_min_walk_date' => $this->input->post('six_min_walk_date'),
            'six_min_walk_performance' => $this->input->post('six_min_walk_performance'),
            'six_min_walk_speed' => $this->input->post('six_min_walk_speed'),
            'six_min_walk_distance' => $this->input->post('six_min_walk_distance')
        );

        $six_min_walks = $this->details_model->getDetailsByPatientId($patient_id)->six_min_walk;

        $six_min_walk = json_decode($six_min_walks);
        if (!empty($six_min_walk)) {
            array_push($six_min_walk, $six_min_walk_n);
        } else {
            $six_min_walk = array($six_min_walk_n);
        }

        $data['six_min_walk'] = json_encode($six_min_walk);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateHolter_event_recorder() {
        $patient_id = $this->input->post('patient_id');

        $holter_event_recorder_n = array(
            'holter_date' => $this->input->post('holter_date'),
            'holter_vpc' => $this->input->post('holter_vpc'),
            'holter_ventricular_arrhythmia' => $this->input->post('holter_ventricular_arrhythmia'),
            'holter_ventricular_arrhythmia_yes' => $this->input->post('holter_ventricular_arrhythmia_yes'),
            'holter_atrial_arrhythmia' => $this->input->post('holter_atrial_arrhythmia'),
            'holter_atrial_arrhythmia_yes' => $this->input->post('holter_atrial_arrhythmia_yes'),
            'holter_heart_rate_variability' => $this->input->post('holter_heart_rate_variability'),
            'holter_othrt' => $this->input->post('holter_othrt')
        );

        $holter_event_recorders = $this->details_model->getDetailsByPatientId($patient_id)->holter_event_recorder;

        $holter_event_recorder = json_decode($holter_event_recorders);
        if (!empty($holter_event_recorder)) {
            array_push($holter_event_recorder, $holter_event_recorder_n);
        } else {
            $holter_event_recorder = array($holter_event_recorder_n);
        }

        $data['holter_event_recorder'] = json_encode($holter_event_recorder);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateStress_test() {
        $patient_id = $this->input->post('patient_id');

        $stress_test_n = array(
            'stress_test_date' => $this->input->post('stress_test_date'),
            'involved_regions' => $this->input->post('involved_regions'),
            'involved_coronary' => $this->input->post('involved_coronary'),
            'viable' => $this->input->post('viable'),
            'non_viable' => $this->input->post('non_viable'),
            'ischemia' => $this->input->post('ischemia'),
            'arrhythmias' => $this->input->post('arrhythmias'),
            'thr_achieved' => $this->input->post('thr_achieved')
        );

        $stress_tests = $this->details_model->getDetailsByPatientId($patient_id)->stress_test;

        $stress_test = json_decode($stress_tests);
        if (!empty($stress_test)) {
            array_push($stress_test, $stress_test_n);
        } else {
            $stress_test = array($stress_test_n);
        }

        $data['stress_test'] = json_encode($stress_test);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateMpi() {
        $patient_id = $this->input->post('patient_id');

        $mpi_n = array(
            'mpi_date' => $this->input->post('mpi_date'),
            'lvef' => $this->input->post('lvef'),
            'territory' => $this->input->post('territory'),
            'territory_persent' => $this->input->post('territory_persent'),
            'scar' => $this->input->post('scar')
        );

        $mpis = $this->details_model->getDetailsByPatientId($patient_id)->mpi;

        $mpi = json_decode($mpis);
        if (!empty($mpi)) {
            array_push($mpi, $mpi_n);
        } else {
            $mpi = array($mpi_n);
        }

        $data['mpi'] = json_encode($mpi);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateAngiogram() {
        $patient_id = $this->input->post('patient_id');

        $angiogram_n = array(
            'angiogram_date' => $this->input->post('s_creatinine_date'),
            'angiogram' => $this->input->post('angiogram')
        );

        $angiograms = $this->details_model->getDetailsByPatientId($patient_id)->angiogram;

        $angiogram = json_decode($angiograms);
        if (!empty($angiogram)) {
            array_push($angiogram, $angiogram_n);
        } else {
            $angiogram = array($angiogram_n);
        }

        $data['angiogram'] = json_encode($angiogram);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateS_creatinine() {
        $patient_id = $this->input->post('patient_id');

        $s_creatinine_n = array(
            's_creatinine_date' => $this->input->post('s_creatinine_date'),
            's_creatinine_value' => $this->input->post('s_creatinine_value')
        );

        $s_creatinines = $this->details_model->getDetailsByPatientId($patient_id)->s_creatinine;

        $s_creatinine = json_decode($s_creatinines);
        if (!empty($s_creatinine)) {
            array_push($s_creatinine, $s_creatinine_n);
        } else {
            $s_creatinine = array($s_creatinine_n);
        }

        $data['s_creatinine'] = json_encode($s_creatinine);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateS_electrolytes() {
        $patient_id = $this->input->post('patient_id');

        $s_electrolytes_n = array(
            's_electrolytes_date' => $this->input->post('s_electrolytes_date'),
            's_electrolytes_sodium' => $this->input->post('s_electrolytes_sodium'),
            's_electrolytes_potassium' => $this->input->post('s_electrolytes_potassium')
        );

        $s_electrolytess = $this->details_model->getDetailsByPatientId($patient_id)->s_electrolytes;

        $s_electrolytes = json_decode($s_electrolytess);
        if (!empty($s_electrolytes)) {
            array_push($s_electrolytes, $s_electrolytes_n);
        } else {
            $s_electrolytes = array($s_electrolytes_n);
        }

        $data['s_electrolytes'] = json_encode($s_electrolytes);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateLipid_profile() {
        $patient_id = $this->input->post('patient_id');

        $lipid_profile_n = array(
            'lipid_profile_date' => $this->input->post('lipid_profile_date'),
            'lipid_profile_tc' => $this->input->post('lipid_profile_tc'),
            'lipid_profile_ldl' => $this->input->post('lipid_profile_ldl'),
            'lipid_profile_hdl' => $this->input->post('lipid_profile_hdl'),
            'lipid_profile_tg' => $this->input->post('lipid_profile_tg')
        );

        $lipid_profiles = $this->details_model->getDetailsByPatientId($patient_id)->lipid_profile;

        $lipid_profile = json_decode($lipid_profiles);
        if (!empty($lipid_profile)) {
            array_push($lipid_profile, $lipid_profile_n);
        } else {
            $lipid_profile = array($lipid_profile_n);
        }

        $data['lipid_profile'] = json_encode($lipid_profile);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateCbc() {
        $patient_id = $this->input->post('patient_id');

        $cbc_n = array(
            'cbc_date' => $this->input->post('cbc_date'),
            'cbc_hb' => $this->input->post('cbc_hb'),
            'cbc_platelet' => $this->input->post('cbc_platelet'),
            'cbc_tc' => $this->input->post('cbc_tc'),
            'cbc_dc' => $this->input->post('cbc_dc')
        );

        $cbcs = $this->details_model->getDetailsByPatientId($patient_id)->cbc;

        $cbc = json_decode($cbcs);
        if (!empty($cbc)) {
            array_push($cbc, $cbc_n);
        } else {
            $cbc = array($cbc_n);
        }

        $data['cbc'] = json_encode($cbc);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateGlucose() {
        $patient_id = $this->input->post('patient_id');

        $glucose_n = array(
            'glucose_date' => $this->input->post('glucose_date'),
            'glucose_fbs' => $this->input->post('glucose_fbs'),
            'glucose_rbs' => $this->input->post('glucose_rbs'),
            'glucose_hab' => $this->input->post('glucose_hab'),
            'glucose_hbac' => $this->input->post('glucose_hbac')
        );

        $glucoses = $this->details_model->getDetailsByPatientId($patient_id)->glucose;

        $glucose = json_decode($glucoses);
        if (!empty($glucose)) {
            array_push($glucose, $glucose_n);
        } else {
            $glucose = array($glucose_n);
        }

        $data['glucose'] = json_encode($glucose);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateVitamin_d() {
        $patient_id = $this->input->post('patient_id');

        $vitamin_d_n = array(
            'vitamin_date' => $this->input->post('vitamin_d_date'),
            'vitamin_value' => $this->input->post('vitamin_d_value')
        );

        $vitamin_ds = $this->details_model->getDetailsByPatientId($patient_id)->vitamin_d;

        $vitamin_d = json_decode($vitamin_ds);
        if (!empty($vitamin_d)) {
            array_push($vitamin_d, $vitamin_d_n);
        } else {
            $vitamin_d = array($vitamin_d_n);
        }

        $data['vitamin_d'] = json_encode($vitamin_d);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateUric_acid() {
        $patient_id = $this->input->post('patient_id');

        $uric_acid_n = array(
            'uric_acid_date' => $this->input->post('uric_acid_date'),
            'uric_acid_value' => $this->input->post('uric_acid_value')
        );

        $uric_acids = $this->details_model->getDetailsByPatientId($patient_id)->uric_acid;

        $uric_acid = json_decode($uric_acids);
        if (!empty($uric_acid)) {
            array_push($uric_acid, $uric_acid_n);
        } else {
            $uric_acid = array($uric_acid_n);
        }

        $data['uric_acid'] = json_encode($uric_acid);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateInr() {
        $patient_id = $this->input->post('patient_id');

        $inr_n = array(
            'inr_date' => $this->input->post('inr_date'),
            'inr_value' => $this->input->post('inr_value')
        );

        $inrs = $this->details_model->getDetailsByPatientId($patient_id)->inr;

        $inr = json_decode($inrs);
        if (!empty($inr)) {
            array_push($inr, $inr_n);
        } else {
            $inr = array($inr_n);
        }

        $data['inr'] = json_encode($inr);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateTsh() {
        $patient_id = $this->input->post('patient_id');

        $tsh_n = array(
            'tsh_date' => $this->input->post('tsh_date'),
            'tsh_value' => $this->input->post('tsh_value')
        );

        $tshs = $this->details_model->getDetailsByPatientId($patient_id)->tsh;

        $tsh = json_decode($tshs);
        if (!empty($tsh)) {
            array_push($tsh, $tsh_n);
        } else {
            $tsh = array($tsh_n);
        }

        $data['tsh'] = json_encode($tsh);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateT_three() {
        $patient_id = $this->input->post('patient_id');

        $t_three_n = array(
            't_three_date' => $this->input->post('t_three_date'),
            't_three_value' => $this->input->post('t_three_value')
        );

        $t_threes = $this->details_model->getDetailsByPatientId($patient_id)->t_three;

        $t_three = json_decode($t_threes);
        if (!empty($t_three)) {
            array_push($t_three, $t_three_n);
        } else {
            $t_three = array($t_three_n);
        }

        $data['t_three'] = json_encode($t_three);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateT_four() {
        $patient_id = $this->input->post('patient_id');

        $t_four_n = array(
            't_four_date' => $this->input->post('t_four_date'),
            't_four_value' => $this->input->post('t_four_value')
        );

        $t_fours = $this->details_model->getDetailsByPatientId($patient_id)->t_four;

        $t_four = json_decode($t_fours);
        if (!empty($t_four)) {
            array_push($t_four, $t_four_n);
        } else {
            $t_four = array($t_four_n);
        }

        $data['t_four'] = json_encode($t_four);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateCalcium() {
        $patient_id = $this->input->post('patient_id');

        $calcium_n = array(
            'calcium_date' => $this->input->post('calcium_date'),
            'calcium_value' => $this->input->post('calcium_value')
        );

        $calciums = $this->details_model->getDetailsByPatientId($patient_id)->calcium;

        $calcium = json_decode($calciums);
        if (!empty($calcium)) {
            array_push($calcium, $calcium_n);
        } else {
            $calcium = array($calcium_n);
        }

        $data['calcium'] = json_encode($calcium);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateMagnesium() {
        $patient_id = $this->input->post('patient_id');

        $magnesium_n = array(
            'magnesium_date' => $this->input->post('magnesium_date'),
            'magnesium_value' => $this->input->post('magnesium_value')
        );

        $magnesiums = $this->details_model->getDetailsByPatientId($patient_id)->magnesium;

        $magnesium = json_decode($magnesiums);
        if (!empty($magnesium)) {
            array_push($magnesium, $magnesium_n);
        } else {
            $magnesium = array($magnesium_n);
        }

        $data['magnesium'] = json_encode($magnesium);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateNt_pro_bnp() {
        $patient_id = $this->input->post('patient_id');

        $nt_pro_bnp_n = array(
            'nt_pro_bnp_date' => $this->input->post('nt_pro_bnp_date'),
            'nt_pro_bnp_value' => $this->input->post('nt_pro_bnp_value')
        );

        $nt_pro_bnps = $this->details_model->getDetailsByPatientId($patient_id)->nt_pro_bnp;

        $nt_pro_bnp = json_decode($nt_pro_bnps);
        if (!empty($nt_pro_bnp)) {
            array_push($nt_pro_bnp, $nt_pro_bnp_n);
        } else {
            $nt_pro_bnp = array($nt_pro_bnp_n);
        }

        $data['nt_pro_bnp'] = json_encode($nt_pro_bnp);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateOther() {
        $patient_id = $this->input->post('patient_id');

        $other_n = array(
            'other_date' => $this->input->post('other_date'),
            'other_name' => $this->input->post('other_name'),
            'other_value' => $this->input->post('other_value')
        );

        $others = $this->details_model->getDetailsByPatientId($patient_id)->other;

        $other = json_decode($others);
        if (!empty($other)) {
            array_push($other, $other_n);
        } else {
            $other = array($other_n);
        }

        $data['other'] = json_encode($other);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function updateVaccination() {
        $patient_id = $this->input->post('patient_id');

        $pneumococcal_n = array(
            'pneumococcal' => $this->input->post('pneumococcal'),
            'pn_date' => $this->input->post('pn_date')
        );

        $pneumococcals = $this->details_model->getDetailsByPatientId($patient_id)->pneumococcal;

        $pneumococcal = json_decode($pneumococcals);
        if (!empty($pneumococcal)) {
            array_push($pneumococcal, $pneumococcal_n);
        } else {
            $pneumococcal = array($pneumococcal_n);
        }

        $influenza_n = array(
            'influenza' => $this->input->post('influenza'),
            'in_date' => $this->input->post('in_date')
        );

        $influenzas = $this->details_model->getDetailsByPatientId($patient_id)->influenza;

        $influenza = json_decode($influenzas);
        if (!empty($influenza)) {
            array_push($influenza, $influenza_n);
        } else {
            $influenza = array($influenza_n);
        }

        $data['pneumococcal'] = json_encode($pneumococcal);
        $data['influenza'] = json_encode($influenza);
        $this->details_model->updateDetailsData($patient_id, $data);
        redirect('details/viewDetails?patient_id=' . $patient_id);
    }

    public function detailsView() {
        $data['details'] = $this->details_model->getDetails();
        $this->load->view('home/header'); // just the header file
        $this->load->view('details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function deleteDetail() {
        $id = $this->input->get('id');
        $this->details_model->deleteDetail($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('details/detailsView');
    }

    function editPMHByJason() {
        $id = $this->input->get('id');
        
        $detail = $this->details_model->getDetailsById($id);

        $data['details'] = $this->details_model->getDetailsById($id);
        
        $past_medical_history = json_decode($detail->past_medical_history);
        $data['past_medical_history'] = $past_medical_history;
        
        echo json_encode($data);
    }

    function get_ecg_data() {
        $id = $this->input->post('ecg_id');
        $patient_id = $this->input->post('patient_id');
        $ecgs = $this->details_model->getDetailsByPatientId($patient_id)->ecg;
        $ecgs = json_decode($ecgs);
        $len =count($ecgs);
        $desire_ecgs=array();
        $x=0;
        foreach ($ecgs as $ecg ) {
            if($x==$id){
                $desire_ecg=$ecg;
            }
            $x++;
        }
        echo json_encode($desire_ecg);
    }

    function update_ecg_data() {
        $id=$this->input->post('numberofindex');
        $patient_id=$this->input->post('patient_id');
        $storeData = array(
            'ecg_date' => $this->input->post('patient_id'),
            'findings' => $this->input->post('findings'),
            'rhythmc_sinus_AF' => $this->input->post('rhythmc_sinus_AF'),
            'qrs_ms' => $this->input->post('qrs_ms'),
            'rbbb_lbbb' => $this->input->post('rbbb_lbbb'),
            'heart_block' => $this->input->post('heart_block'),
            'qt_qtc' => $this->input->post('qt_qtc'), 
            'ex_beats' => $this->input->post('ex_beats'), 
        );

        $ecgs = $this->details_model->getDetailsByPatientId($patient_id)->ecg;
        $ecgs = json_decode($ecgs);
        $len =count($ecgs);
        $desire_ecgs=array();
        $x=0;
        foreach ($ecgs as $ecg ) {
            if($x==$id){
                $ecgs[$x]=$storeData;
            }
            $x++;
        }
        $data['ecg'] = json_encode($ecgs);
        $this->details_model->updateDetailsData($patient_id, $data);
        echo json_encode($ecgs);


    }

}
