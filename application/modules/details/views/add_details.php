<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add details</h3>
                    </div>
                    <form role="form" action="details/addDetails" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Hospital ID:</label>
                                    <div class="col-sm-9">
                                        <?php echo $this->patient_model->getPatientById($patient_id)->mr_no; ?>
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail3" class="col-sm-4 control-label">HF ID</label>
                                    <div class="col-sm-8">
                                        <?php echo $this->patient_model->getPatientById($patient_id)->hf_id; ?>
                                    </div>
                                </div>
                                <div class="col-md-3">  </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name: <?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
                                        <td>Age: 
                                            <?php
                                            $bday = new DateTime($this->patient_model->getPatientById($patient_id)->birth_date); // Your date of birth
                                            $today = new Datetime(date('m.d.y'));
                                            $diff = $today->diff($bday);
                                            echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                                            ?>
                                        </td>
                                        <td>Sex: <?php echo $this->patient_model->getPatientById($patient_id)->sex; ?></td>
                                    </tr>
                                </table>
                            </div>

                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group" row>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vaccination:</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pneumococcal &nbsp;&nbsp;</label>
                                        <input type="checkbox" name="pneumococcal" id="exampleInputEmail1" placeholder="" value="Yes"> &nbsp;&nbsp;
                                        <input type="Date" name="pn_date" class="" value=''>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Influenza &nbsp;&nbsp;</label>
                                        <input type="checkbox" name="influenza" id="exampleInputEmail1" placeholder="" value="Yes"> &nbsp;&nbsp;
                                        <input type="Date" name="in_date" class="" value=''> 
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="bg-info p-3">
                                        <h3 class="text-center ">Initial Clinical Assessment</h3>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Past Medical History</label>
                                    <div class="col-sm-10">
                                        <div id="content">
                                            <textarea name="past_medical_history" id="txt" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Comorbidities & Risk Factors*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Risk Factors</td>
                                                <td>Comorbidities</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>								

                                                    <label for="exampleInputEmail1">
                                                        <input type="checkbox" name="htn" id="exampleInputEmail1" placeholder="" value="Yes"> htn</label>									

                                                </td>
                                                <td>								

                                                    <label for="exampleInputEmail1">
                                                        <input type="checkbox" name="asthma" id="exampleInputEmail1" placeholder="" value="Yes">asthma</label>									
                                                    <label for="exampleInputEmail1">
                                                        <input type="checkbox" name="ba" id="exampleInputEmail1" placeholder="" value="Yes">ba</label>

                                                </td>
                                                <td>								

                                                    <label for="exampleInputEmail1">
                                                        <input type="checkbox" name="obstructive_sleep_apnoea" id="exampleInputEmail1" placeholder="Linkedin" value="Yes">obstructive_sleep_apnoea</label>									

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
<!--                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="dm_type_one" id="exampleInputEmail1" placeholder="" value="Yes">dm_type_one</label>									
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="dm_type_two" id="exampleInputEmail1" placeholder="" value="Yes">dm_type_two</label>									
                                                    </div>-->
                                                    <label for="exampleInputEmail1">Dm Type : &nbsp;&nbsp;</label>
                                                    <input type="checkbox" name="dm_type_one" class="" id="exampleInputEmail1" placeholder="" value="I"> I &nbsp;&nbsp;
                                                    <input type="checkbox" name="dm_type_two" class="" id="exampleInputEmail1" placeholder="" value="II"> II
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="copd" id="exampleInputEmail1" placeholder="" value="Yes">copd</label>									                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="cerebrovascular_accident" id="exampleInputEmail1" placeholder="" value="Yes">cerebrovascular_accident</label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="dl" id="exampleInputEmail1" placeholder="" value="Yes">dl</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="renal_failure" id="exampleInputEmail1" placeholder="" value="Yes">renal_failure</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="severe_musculoskeletal_disease" id="exampleInputEmail1" placeholder="" value="Yes">severe_musculoskeletal_disease</label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="positive_fh" id="exampleInputEmail1" placeholder="" value="Yes">positive_fh</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="associated_cad" id="exampleInputEmail1" placeholder="" value="Yes">associated_cad</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="cancer" id="exampleInputEmail1" placeholder="Linkedin" value="Yes">cancer</label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Smoker: &nbsp;&nbsp;</label>
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="smoker_yes" id="exampleInputEmail1" placeholder="" value="Yes"> Yes</label> &nbsp;&nbsp;									
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="smoker_no" id="exampleInputEmail1" placeholder="" value="No"> No</label>&nbsp;&nbsp;									
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="ex_smoker" id="exampleInputEmail1" placeholder="" value="Ex-Smoker"> Ex-Smoker</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="valvular_disease" id="exampleInputEmail1" placeholder="" value="Yes">valvular_disease</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="bleeding_diathesis" id="exampleInputEmail1" placeholder="" value="Yes">bleeding_diathesis</label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="alcohol" id="exampleInputEmail1" placeholder="" value="Yes">alcohol</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="thyroid_dysfunction" id="exampleInputEmail1" placeholder="" value="Yes">thyroid_dysfunction</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="peripheral_vascular_disease" id="exampleInputEmail1" placeholder="" value="Yes">peripheral_vascular_disease</label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Others:
                                                            <input type="text" name="other_one" id="exampleInputEmail1" placeholder="" value=""></label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">
                                                            <input type="checkbox" name="anaemia" id="exampleInputEmail1" placeholder="" value="Yes">anaemia</label>									
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Others:
                                                            <input type="text" name="other_three" id="exampleInputEmail1" placeholder="" value=""></label>									
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <label for="exampleInputEmail1">Others:
                                                        <input type="text" name="other_two" id="exampleInputEmail1" placeholder="" value=""></label>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Diagnosis*</label>
                                    <div class="col-sm-10">
                                        <div id="content">
                                            <textarea name="diagnosis" id="txt_two" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="bg-info p-3">
                                        <h3 class="text-center ">Investigations</h3>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">ECG*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Findings</th>
                                                <th>Rhythmc Sinus/AF</th>
                                                <th>QRS(ms)</th>
                                                <th>RBBB/LBBB</th>
                                                <th>Heart Block N /1° /2° /3°</th>
                                                <th>QT/QTc</th>
                                                <th>Ex Beats</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="ecg_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="findings" value=""/></td>
                                                <td><input type="text" class="form-control" name="rhythmc_sinus_AF" value=""/></td>
                                                <td><input type="text" class="form-control" name="qrs_ms" value=""/></td>
                                                <td><input type="text" class="form-control" name="rbbb_lbbb" value=""/></td>
                                                <td><input type="text" class="form-control" name="heart_block" value=""/></td>
                                                <td><input type="text" class="form-control" name="qt_qtc" value=""/></td>
                                                <td><input type="text" class="form-control" name="ex_beats" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ECHO*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>LVIDd/LVIDs</th>
                                                <th>EF %</th>
                                                <th>RVSP/PASP</th>
                                                <th>RWMA</th>
                                                <th>D/D I / II / III / IV</th>
                                                <th>MR None/1+/2+/3+/4+</th>
                                                <th>LA</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="echo_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="lvidd_lvids" value=""/></td>
                                                <td><input type="text" class="form-control" name="ef_per" value=""/></td>
                                                <td><input type="text" class="form-control" name="rvsp_pasp" value=""/></td>
                                                <td><input type="text" class="form-control" name="rwma" value=""/></td>
                                                <td><input type="text" class="form-control" name="d_d" value=""/></td>
                                                <td><input type="text" class="form-control" name="mr_none" value=""/></td>
                                                <td><input type="text" class="form-control" name="la" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Chest X-Ray</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Findings</th>
                                                <th>Pulmonary edema</th>
                                                <th>PVH</th>
                                                <th>Pleural effusion</th>
                                                <th>CT Ratio</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="chest_x_ray_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="chest_x_ray_findings" value=""/></td>
                                                <td><input type="text" class="form-control" name="chest_x_ray_pulmonary_edema" value=""/></td>
                                                <td><input type="text" class="form-control" name="chest_x_ray_pvh" value=""/></td>
                                                <td><input type="text" class="form-control" name="chest_x_ray_pleural_effusion" value=""/></td>
                                                <td><input type="text" class="form-control" name="chest_x_ray_ct_ratio" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">6-minute walk test</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Performance</th>
                                                <th>Speed(mph)</th>
                                                <th>Distance(ft)</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="six_min_walk_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="six_min_walk_performance" value=""/></td>
                                                <td><input type="text" class="form-control" name="six_min_walk_speed" value=""/></td>
                                                <td><input type="text" class="form-control" name="six_min_walk_distance" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="bg-info p-3">
                                        <!--                        <h3 class="text-center ">Investigations</h3>-->
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Holter/ Event Recorder</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">

                                            <tr>
                                                <td>
                                                    <input type="date" name="holter_date" id="exampleInputEmail1" placeholder="" value="">
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <div>
                                                            <label for="exampleInputEmail1"> VPC :
                                                                <input type="text" name="holter_vpc" value=""></label>
                                                        </div>
                                                        <div>
                                                            <label>Ventricular Arrhythmia:  </label>
                                                            <input type="checkbox" name="holter_ventricular_arrhythmia" id="exampleInputEmail1" placeholder="" value="No"> No
                                                            <input type="checkbox" name="holter_ventricular_arrhythmia" id="show" placeholder="" value="Yes" onclick="myFunction()"> Yes
                                                        </div>
                                                        <div id="yes" style="display: none"> 
                                                            <h5>If yes:</h5>                                                       
                                                            <label for="exampleInputEmail1"> 
                                                                <input type="checkbox" name="holter_ventricular_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="Complex"> Complex</label>
                                                            <label for="exampleInputEmail1"> 
                                                                <input type="checkbox" name="holter_ventricular_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="VPC"> VPC</label>
                                                            <label for="exampleInputEmail1"> 
                                                                <input type="checkbox" name="holter_ventricular_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="NSV"> NSV </label>
                                                            <label for="exampleInputEmail1"> 
                                                                <input type="checkbox" name="holter_ventricular_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="VT"> VT</label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <div>
                                                            <label for="exampleInputEmail1">Atrial Arrhythmia: </label>
                                                            <input type="checkbox" name="holter_atrial_arrhythmia" id="exampleInputEmail1" placeholder="" value="No">No
                                                            <input type="checkbox" name="holter_atrial_arrhythmia" id="show_two" placeholder="" value="Yes" onclick="myFunction2()">Yes</label>
                                                        </div>
                                                        <div id="yes_two" style="display: none"> 
                                                            <h5>If yes:</h5>
                                                            <input type="checkbox" name="holter_atrial_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="APCs"> APCs
                                                            <input type="checkbox" name="holter_atrial_arrhythmia_yes" id="exampleInputEmail1" placeholder="" value="AF"> AF
                                                            <div>
                                                                <label for="exampleInputEmail1"> Heart rate variability </label>
                                                                <input type="text" name="holter_heart_rate_variability" id="exampleInputEmail1" placeholder="" value="">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <div> 
                                                            <label for="exampleInputEmail1">Other:
                                                                <input type="text" name="holter_othrt" id="exampleInputEmail1" placeholder="" value=""></label>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Stress test (Dobutamine)*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Involved regions</th>
                                                <th>Involved coronary</th>
                                                <th>Viable</th>
                                                <th>Non-viable</th>
                                                <th>Ischemia</th>
                                                <th>Arrhythmias</th>
                                                <th>THR achieved</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="stress_test_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="involved_regions" value=""/></td>
                                                <td><input type="text" class="form-control" name="involved_coronary" value=""/></td>
                                                <td><input type="text" class="form-control" name="viable" value=""/></td>
                                                <td><input type="text" class="form-control" name="non_viable" value=""/></td>
                                                <td><input type="text" class="form-control" name="ischemia" value=""/></td>
                                                <td><input type="text" class="form-control" name="arrhythmias" value=""/></td>
                                                <td><input type="text" class="form-control" name="thr_achieved" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">MPI*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>LVEF</th>
                                                <th>Territory</th>
                                                <th>%</th>
                                                <th>Scar</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="mpi_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="lvef" value=""/></td>
                                                <td><input type="text" class="form-control" name="territory" value=""/></td>
                                                <td><input type="text" class="form-control" name="territory_persent" value=""/></td>
                                                <td><input type="text" class="form-control" name="scar" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Angiogram*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Velue</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" name="angiogram_date" id="exampleInputEmail1" placeholder="" value="">
                                                </td>
                                                <td>								
                                                    <div class="form-group">
                                                        <div class="d-inline">
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="Normal">Normal</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="Non critical"> Non-critical</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="CAD"> CAD</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="SVD"> SVD</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="DVD">DVD</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="TVD">TVD</label>
                                                            <label for="exampleInputEmail1">
                                                                <input type="checkbox" name="angiogram" id="exampleInputEmail1" placeholder="" value="LMCA">LMCA:</label>
                                                        </div>


                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="bg-info p-3">
                                        <h3 class="text-center ">Lab Tests</h3>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">S. Creatinine:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="s_creatinine_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="s_creatinine_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">S. Electrolytes:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Sodium</th>
                                                <th>Potassium</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="s_electrolytes_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="s_electrolytes_sodium" value=""/></td>
                                                <td><input type="text" class="form-control" name="s_electrolytes_potassium" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Lipid Profile:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>TC</th>
                                                <th>LDL</th>
                                                <th>HDL</th>
                                                <th>TG</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="lipid_profile_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="lipid_profile_tc" value=""/></td>
                                                <td><input type="text" class="form-control" name="lipid_profile_ldl" value=""/></td>
                                                <td><input type="text" class="form-control" name="lipid_profile_hdl" value=""/></td>
                                                <td><input type="text" class="form-control" name="lipid_profile_tg" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">CBC:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>HB</th>
                                                <th>Platelet</th>
                                                <th>TC</th>
                                                <th>DC</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="cbc_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="cbc_hb" value=""/></td>
                                                <td><input type="text" class="form-control" name="cbc_platelet" value=""/></td>
                                                <td><input type="text" class="form-control" name="cbc_tc" value=""/></td>
                                                <td><input type="text" class="form-control" name="cbc_dc" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Glucose:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>FBS</th>
                                                <th>RBS</th>
                                                <th>2HAB</th>
                                                <th>HbA1c</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="glucose_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="glucose_fbs" value=""/></td>
                                                <td><input type="text" class="form-control" name="glucose_rbs" value=""/></td>
                                                <td><input type="text" class="form-control" name="glucose_hab" value=""/></td>
                                                <td><input type="text" class="form-control" name="glucose_hbac" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="bg-info p-3">
                                        <h3 class="text-center ">Others</h3>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Vitamin D3 (ng/ml):*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="vitamin_d_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="vitamin_d_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Uric Acid:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="uric_acid_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="uric_acid_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">INR:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="inr_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="inr_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">TSH:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="tsh_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="tsh_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">T3:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="t_three_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="t_three_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">T4:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="t_four_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="t_four_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Calcium:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="calcium_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="calcium_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Magnesium:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="magnesium_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="magnesium_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">NT-pro BNP:*</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td><input type="date" class="form-control" name="nt_pro_bnp_date" value=""/></td>
                                                <td><input type="text" class="form-control" name="nt_pro_bnp_value" value=""/></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Other:*</label>
                                    <div class="col-sm-10">
                                        <span id="allowance">
                                        <div class="form-group" row>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Date </label>
                                                    <input type="date" name="other_date[]" class="form-control" id="exampleInputEmail1" placeholder="" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Test Name</label>
                                                    <input type="text" name="other_name[]" class="form-control" id="exampleInputEmail1" placeholder="Test Name" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Value</label>
                                                    <input type="text" name="other_value[]" class="form-control" id="exampleInputEmail1" placeholder="Value" value=''>
                                                </div>
                                            </div>
                                        </div>
                                            </span>
                                        <span id="allowance_input">
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="date" name="other_date[]" class="form-control" id="exampleInputEmail1" placeholder="" value=''>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="other_name[]" class="form-control" id="exampleInputEmail1" placeholder="Test Name" value=''>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="other_value[]" class="form-control" id="exampleInputEmail1" placeholder="Value" value=''>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger"
                                                            id="allowance_amount_delete" onclick="deleteAllowanceParentElement(this)">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </span>
                                        <div class="form-group">
                                            <div class="col-sm-5" style="text-align: right; margin-top: 10px;">
                                                <button type="button" class="btn btn-default btn-sm" onClick="add_allowance()">
                                                    <i class="fa fa-plus"></i>&nbsp;
                                                    Add Others
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->

                            <!--                            <div class="col-md-3">
                                                            <span id="allowance">
                                                                <div class="form-group">
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control" name="allowance_type[]"
                                                                               placeholder="option"/>
                                                                    </div>
                            
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control" name="allowance_amount[]"
                                                                               placeholder="velu"
                                                                               id="allowance_amount_1"/>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span id="allowance_input">
                                                                <div class="form-group">
                                                                    <div class="col-sm-5" style="margin-top:10px;">
                                                                        <input type="text" class="form-control" name="allowance_type[]"
                                                                               placeholder="option" />
                                                                    </div>
                                                                    <div class="col-sm-5" style="margin-top:10px;">
                                                                        <input type="number" class="form-control" name="allowance_amount[]"
                                                                               placeholder="velu"
                                                                               id="allowance_amount" />
                                                                    </div>
                            
                                                                    <div class="col-sm-2" style="margin-top:10px;">
                                                                        <button type="button" class="btn btn-danger"
                                                                                id="allowance_amount_delete" onclick="deleteAllowanceParentElement(this)">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </span>                                                                                 
                                                            <div class="form-group">
                                                                <div class="col-sm-5" style="text-align: right; margin-top: 10px;">
                                                                    <button type="button" class="btn btn-default btn-sm" onClick="add_allowance()">
                                                                        <i class="fa fa-plus"></i>&nbsp;
                                                                        Add detils
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <!--                            /////-------------------------->


                        </div>
                        <input type="hidden" name="status" value='Done'>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
// text aria ar vitota <br> add kora
                                                        $(function ()
                                                        {
                                                            $('#txt').keyup(function (e) {
                                                                if (e.keyCode == 13) {
                                                                    var curr = getCaret(this);
                                                                    var val = $(this).val();
                                                                    var end = val.length;

                                                                    $(this).val(val.substr(0, curr) + '<br>' + val.substr(curr, end));
                                                                }

                                                            })
                                                        });

                                                        function getCaret(el) {
                                                            if (el.selectionStart) {
                                                                return el.selectionStart;
                                                            } else if (document.selection) {
                                                                el.focus();

                                                                var r = document.selection.createRange();
                                                                if (r == null) {
                                                                    return 0;
                                                                }
                                                                var re = el.createTextRange(),
                                                                        rc = re.duplicate();
                                                                re.moveToBookmark(r.getBookmark());
                                                                rc.setEndPoint('EndToStart', re);

                                                                return rc.text.length;
                                                            }
                                                            return 0;
                                                        }

</script>
<script>
    //text aria ar vitota <br> add kora
    $(function ()
    {
        $('#txt_two').keyup(function (e) {
            if (e.keyCode == 13) {
                var curr = getCaret(this);
                var val = $(this).val();
                var end = val.length;

                $(this).val(val.substr(0, curr) + '<br>' + val.substr(curr, end));
            }

        })
    });

    function getCaret(el) {
        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();

            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }
            var re = el.createTextRange(),
                    rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);

            return rc.text.length;
        }
        return 0;
    }

</script>
<script type="text/javascript">
    var allowance_count = 1;

    $('#allowance_input').hide();
    // CREATING BLANK ALLOWANCE INPUT
    var blank_allowance = '';
    $(document).ready(function () {
        blank_allowance = $('#allowance_input').html();
    });

    function add_allowance()
    {
        allowance_count++;
        $("#allowance").append(blank_allowance);
    }

    function deleteAllowanceParentElement(n, allowance_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_allowances.push(allowance_count);
    }

</script>

<script>
    function myFunction() {
        var x = document.getElementById("yes");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function myFunction2() {
        var x = document.getElementById("yes_two");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>  