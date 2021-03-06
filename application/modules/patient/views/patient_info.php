<div class="content-wrapper"> 
    <section class="content"> 
        <div class="row"> 
            <div class="col-md-12">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo $patient->img_url; ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $patient->name; ?></h3>

                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">HF Patient Assessment</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <td class="bg-info">Patient ID:</td>
                                    <td><strong><?php echo $patient->patient_id; ?></strong></td>
                                    <td class="bg-info">MR No:</td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>Patient Name:</td>
                                    <td><strong><?php echo $patient->name; ?></strong></td>
                                    <td>Visit Type:</td>
                                    <td><strong><?php echo $patient->visit_type; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td><strong><?php echo $patient->sex; ?></strong></td>
                                    <td>Date Of Birth:</td>
                                    <td><strong><?php echo $patient->birth_date; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Age:</td>
                                    <td><strong></strong></td>
                                    <td>Mobile Number:</td>
                                    <td><strong><?php echo $patient->phone; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td><strong><?php echo $patient->address; ?></strong></td>
                                    <td>No Of Children:</td>
                                    <td><strong><?php echo $patient->no_of_children; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Highest Education Level:</td>
                                    <td><strong><?php echo $patient->highest_education_level; ?></strong></td>
                                    <td>Occupation:</td>
                                    <td><strong><?php echo $patient->occupation; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Marital Status:</td>
                                    <td><strong><?php echo $patient->marital_status; ?></strong></td>
                                    <td>Monthly Income:</td>
                                    <td><strong><?php echo $patient->monthly_income; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Blood Group:</td>
                                    <td><strong><?php echo $patient->blood_group; ?></strong></td>
                                    <td>Menstrual History:</td>
                                    <td><strong><?php echo $patient->menstrual_history; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Caregiver Name & Relation:</td>
                                    <td><strong><?php echo $patient->caregiver_name_relation; ?></strong></td>
                                    <td>Caregiver Phone No.:</td>
                                    <td><strong><?php echo $patient->caregiver_phone_no; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Treating Cardiologist:</td>
                                    <td><strong></strong></td>
                                    <td>Pt Height (in cm):</td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>Vaccination:</td>
                                    <td><strong></strong></td>
                                    <td>Influenza :</td>
                                    <td><strong></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div  class="col-md-12" style="font-size: medium;">
            <h3 class="text-center ">Initial Clinical Assessment</h3>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="row bg-info">
                <div class="col-md-12">
                    <div class="bg-info p-3">

                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Past Medical History</label>
                    <div class="col-sm-10">
                        <div id="content" style="font-size: medium;" >
                            <?php
                            if (!empty($detail->past_medical_history)) {
                                $past_medical_history = json_decode($detail->past_medical_history);
                                echo $past_medical_history->past_medical_history;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Comorbidities & Risk Factors*</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered p-3">
                            <tr>
                                <td style="font-size: large;">Risk Factors</td>
                                <td style="font-size: large;">Comorbidities</td>
                                <td></td>
                            </tr>
                            <?php
                            if (!empty($detail->comorbidities_risk_factors)) {
                                $comorbidities_risk_factors = json_decode($detail->comorbidities_risk_factors); {
                                    ?>
                                    <tr>
                                        <td>								
                                            <?php
                                            if ($comorbidities_risk_factors->htn == "") {
                                                echo '<b>' . 'HTN:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'HTN: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->htn . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>								
                                            <?php
                                            if ($comorbidities_risk_factors->asthma == "") {
                                                echo '<b>' . 'Asthma:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Asthma: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->asthma . '</span><br>';
                                            }
                                            if ($comorbidities_risk_factors->ba == "") {
                                                echo '<b>' . 'BA:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'BA: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->ba . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>				 				
                                            <?php
                                            if ($comorbidities_risk_factors->obstructive_sleep_apnoea == "") {
                                                echo '<b>' . 'Obstructive Sleep Apnoea:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Obstructive Sleep Apnoea: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->obstructive_sleep_apnoea . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->dm_type_one == "") {
                                                echo '<b>' . 'Dm Type I:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Dm Type I: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->dm_type_one . '</span><br>';
                                            }
                                            ?>
                                            <?php
                                            if ($comorbidities_risk_factors->dm_type_two == "") {
                                                echo '<b>' . 'Dm Type II:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Dm Type II: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->dm_type_two . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->copd == "") {
                                                echo '<b>' . 'COPD:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'COPD: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->copd . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->cerebrovascular_accident == "") {
                                                echo '<b>' . 'Cerebrovascular Accident:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Cerebrovascular Accident: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->cerebrovascular_accident . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->dl == "") {
                                                echo '<b>' . 'DL:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'DL: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->dl . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->renal_failure == "") {
                                                echo '<b>' . 'Renal Failure:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Renal Failure: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->renal_failure . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->severe_musculoskeletal_disease == "") {
                                                echo '<b>' . 'Severe Musculoskeletal Disease:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Severe Musculoskeletal Disease: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->severe_musculoskeletal_disease . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->positive_fh == "") {
                                                echo '<b>' . 'Positive FH:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Positive FH: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->positive_fh . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->associated_cad == "") {
                                                echo '<b>' . 'Associated CAD:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Associated CAD: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->associated_cad . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->cancer == "") {
                                                echo '<b>' . 'Cancer:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Cancer: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->cancer . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            //<?php
//                                                    if ($comorbidities_risk_factors->smoker_yes == "") {
//                                                        echo '<b>' . 'Smoker (Yes):' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
//                                                    } else {
//                                                        echo '<b>' . 'Smoker (Yes): ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->smoker_yes . '</span><br>';
//                                                    }
//                                                    
                                            ?>
                                            //<?php
//                                                    if ($comorbidities_risk_factors->smoker_no == "") {
//                                                        echo '<b>' . 'Smoker (No) :' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
//                                                    } else {
//                                                        echo '<b>' . 'Smoker (No) : ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->smoker_no . '</span><br>';
//                                                    }
//                                                    
                                            ?>
                                            //<?php
//                                                    if ($comorbidities_risk_factors->ex_smoker == "") {
//                                                        echo '<b>' . 'Ex Smoker:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
//                                                    } else {
//                                                        echo '<b>' . 'Ex Smoker: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->ex_smoker . '</span><br>';
//                                                    }
//                                                    
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->valvular_disease == "") {
                                                echo '<b>' . 'Valvular Disease:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Valvular Disease: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->valvular_disease . '</span><br>';
                                            }
                                            ?>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->bleeding_diathesis == "") {
                                                echo '<b>' . 'Bleeding Diathesis:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Bleeding Diathesis: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->bleeding_diathesis . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->alcohol == "") {
                                                echo '<b>' . 'Alcohol:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Alcohol: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->alcohol . '</span><br>';
                                            }
                                            ?>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->thyroid_dysfunction == "") {
                                                echo '<b>' . 'Thyroid Dysfunction:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Thyroid Dysfunction: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->thyroid_dysfunction . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->peripheral_vascular_disease == "") {
                                                echo '<b>' . 'Peripheral Vascular Disease:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Peripheral Vascular Disease: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->peripheral_vascular_disease . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->other_one == "") {
                                                echo '<b>' . 'Others:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Others: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->other_one . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($comorbidities_risk_factors->anaemia == "") {
                                                echo '<b>' . 'Anaemia:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
                                            } else {
                                                echo '<b>' . 'Anaemia: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->anaemia . '</span><br>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            //<?php
//                                                    if ($comorbidities_risk_factors->other_two == "") {
//                                                        echo '<b>' . 'Others:' . '</b>' . '<span style="color: red; padding: 10px;">' . 'No' . '</span><br>';
//                                                    } else {
//                                                        echo '<b>' . 'Others: ' . '</b><span style="color: green; padding: 10px;">' . $comorbidities_risk_factors->other_two . '</span><br>';
//                                                    }
//                                                    
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <hr>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row bg-success">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Diagnosis*</label>

                    <div class="col-sm-10">
                        <div id="content" style="font-size: medium;" >
                            <?php
                            if (!empty($detail->diagnosis)) {
                                $diagnosis = json_decode($detail->diagnosis);
                                echo $diagnosis->diagnosis;
                            }
                            ?>
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
                                <th class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalEcg">
                                        Add ECG
                                    </button> 
                                    <div class="d-inline">
                                        <button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button>
                                        <button type="button" class="btn btn-success btn-xs checkall">Select All</button>
                                    </div>
                                    <input type="hidden" class="details_id" name="details_id" value="<?php echo $detail->id; ?>" />
                                    <input type="hidden" class="patient_id" name="patient_id" value="<?php echo $detail->patient_id; ?>" />
                                </th>
                            </tr>
                            <?php
                            if (!empty($detail->ecg)) {
                                $ecgs = json_decode($detail->ecg);
                                foreach ($ecgs as $key => $ecg) {
                                    ?>
                                    <tr class="all_remove">
                                        <td><?php echo $ecg->ecg_date; ?></td>
                                        <td><?php echo $ecg->findings; ?></td>
                                        <td><?php echo $ecg->rhythmc_sinus_AF; ?></td>
                                        <td><?php echo $ecg->qrs_ms; ?></td>
                                        <td><?php echo $ecg->rbbb_lbbb; ?></td>
                                        <td><?php echo $ecg->heart_block; ?></td>
                                        <td><?php echo $ecg->qt_qtc; ?></td>
                                        <td><?php echo $ecg->ex_beats; ?></td>
                                        <td>
                                            <input type="checkbox" class="delete_checkbox" name="delete[]" value="<?php echo $key; ?>" />                                   
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row bg-info">
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
                                <td class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalEcho">
                                        Add ECHO*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->echo)) {
                                $echos = json_decode($detail->echo);
                                foreach ($echos as $key => $echo) {
                                    ?>
                                    <tr>
                                        <td><?php echo $echo->echo_date; ?></td>
                                        <td><?php echo $echo->lvidd_lvids; ?></td>
                                        <td><?php echo $echo->ef_per; ?></td>
                                        <td><?php echo $echo->rvsp_pasp; ?></td>
                                        <td><?php echo $echo->rwma; ?></td>
                                        <td><?php echo $echo->d_d; ?></td>
                                        <td><?php echo $echo->mr_none; ?></td>
                                        <td><?php echo $echo->la; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Chest X-Ray*</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Findings</th>
                                <th>Pulmonary edema</th>
                                <th>PVH</th>
                                <th>Pleural effusion</th>
                                <th>CT Ratio</th>
                                <td class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalChestXray">
                                        Add Chest X-Ray*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->chest_x_ray)) {
                                $chest_x_rays = json_decode($detail->chest_x_ray);
                                foreach ($chest_x_rays as $key => $chest_x_ray) {
                                    ?>
                                    <tr>
                                        <td><?php echo $chest_x_ray->chest_x_ray_date; ?></td>
                                        <td><?php echo $chest_x_ray->chest_x_ray_findings; ?></td>
                                        <td><?php echo $chest_x_ray->chest_x_ray_pulmonary_edema; ?></td>
                                        <td><?php echo $chest_x_ray->chest_x_ray_pvh; ?></td>
                                        <td><?php echo $chest_x_ray->chest_x_ray_pleural_effusion; ?></td>
                                        <td><?php echo $chest_x_ray->chest_x_ray_ct_ratio; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">6-minute walk test*</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Performance</th>
                                    <th>Speed(mph)</th>
                                    <th>Distance(ft)</th>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalSixMinWalk">
                                            Add 6-minute walk test*
                                        </button>                                    
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($detail->six_min_walk)) {
                                    $six_min_walks = json_decode($detail->six_min_walk);
                                    foreach ($six_min_walks as $key => $six_min_walk) {
                                        ?>
                                        <tr>
                                            <td><?php echo $six_min_walk->six_min_walk_date; ?></td>
                                            <td><?php echo $six_min_walk->six_min_walk_performance; ?></td>
                                            <td><?php echo $six_min_walk->six_min_walk_speed; ?></td>
                                            <td><?php echo $six_min_walk->six_min_walk_distance; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
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
                            <?php
                            if (!empty($detail->holter_event_recorder)) {
                                $holter_event_recorders = json_decode($detail->holter_event_recorder);
                                foreach ($holter_event_recorders as $key => $holter_event_recorder) {
                                    ?>
                                    <tr>								
                                        <td><?php echo $holter_event_recorder->holter_date; ?></td>
                                        <td>
                                            <div>
                                                <label> VPC :</label> <?php echo $holter_event_recorder->holter_vpc; ?>
                                            </div>
                                            <div>
                                                <label> Ventricular Arrhythmia: </label> <?php echo $holter_event_recorder->holter_ventricular_arrhythmia; ?>
                                                <label>
                                                    <?php
                                                    if ($holter_event_recorder->holter_ventricular_arrhythmia == "Yes") {
                                                        echo $holter_event_recorder->holter_ventricular_arrhythmia_yes;
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label>Atrial Arrhythmia: </label> <?php echo $holter_event_recorder->holter_atrial_arrhythmia; ?>
                                                <label>
                                                    <?php
                                                    if ($holter_event_recorder->holter_atrial_arrhythmia == "Yes") {
                                                        echo $holter_event_recorder->holter_atrial_arrhythmia_yes . "<br>" .
                                                        "Heart rate variability:" . $holter_event_recorder->holter_heart_rate_variability;
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </td>
                                        <td>								
                                            <div class="form-group">
                                                <div> 
                                                    <label>Other: </label> <?php echo $holter_event_recorder->holter_othrt; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                        <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#modalHolterEventRecorder">
                            Add Holter/ Event Recorder*
                        </button>  
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="bg-info p-3">
                        <h3 class="text-center ">Investigations</h3>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Stress test</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Involved regions</th>
                                    <th>Involved coronary</th>
                                    <th>Viable</th>
                                    <th>Non-viable</th>
                                    <th>Ischemia</th>
                                    <th>Arrhythmias</th>
                                    <th>THR achieved</th>
                                    <td  class="text-right">
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalStressTest">
                                            Add Stress test (Dobutamine)*
                                        </button>                                    
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($detail->stress_test)) {
                                    $stress_tests = json_decode($detail->stress_test);
                                    foreach ($stress_tests as $key => $stress_test) {
                                        ?>
                                        <tr>
                                            <td><?php echo $stress_test->stress_test_date; ?></td>
                                            <td><?php echo $stress_test->involved_regions; ?></td>
                                            <td><?php echo $stress_test->involved_coronary; ?></td>
                                            <td><?php echo $stress_test->viable; ?></td>
                                            <td><?php echo $stress_test->non_viable; ?></td>
                                            <td><?php echo $stress_test->ischemia; ?></td>
                                            <td><?php echo $stress_test->arrhythmias; ?></td>
                                            <td><?php echo $stress_test->thr_achieved; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalMPI">
                                        Add MPI
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->mpi)) {
                                $mpis = json_decode($detail->mpi);
                                foreach ($mpis as $key => $mpi) {
                                    ?>

                                    <tr>
                                        <td><?php echo $mpi->mpi_date; ?></td>
                                        <td><?php echo $mpi->lvef; ?></td>
                                        <td><?php echo $mpi->territory; ?></td>
                                        <td><?php echo $mpi->territory_persent; ?></td>
                                        <td><?php echo $mpi->scar; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Angiogram</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Velue</th>
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAngiogram">
                                        Add Angiogram
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->angiogram)) {
                                $angiograms = json_decode($detail->angiogram);
                                foreach ($angiograms as $key => $angiogram) {
                                    ?>
                                    <tr>
                                        <td><?php echo $angiogram->angiogram_date; ?></td>
                                        <td><?php echo $angiogram->angiogram; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalSCreatinine">
                                        Add S. Creatinine*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->s_creatinine)) {
                                $s_creatinines = json_decode($detail->s_creatinine);
                                foreach ($s_creatinines as $key => $s_creatinine) {
                                    ?>

                                    <tr>
                                        <td><?php echo $s_creatinine->s_creatinine_date; ?></td>
                                        <td><?php echo $s_creatinine->s_creatinine_value; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalSElectrolytes">
                                        Add S. Electrolytes*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->s_electrolytes)) {
                                $s_electrolytess = json_decode($detail->s_electrolytes);
                                foreach ($s_electrolytess as $key => $s_electrolytes) {
                                    ?>
                                    <tr>
                                        <td><?php echo $s_electrolytes->s_electrolytes_date; ?></td>
                                        <td><?php echo $s_electrolytes->s_electrolytes_sodium; ?></td>
                                        <td><?php echo $s_electrolytes->s_electrolytes_potassium; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalLipidProfile">
                                        Add Lipid Profile*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->lipid_profile)) {
                                $lipid_profiles = json_decode($detail->lipid_profile);
                                foreach ($lipid_profiles as $key => $lipid_profile) {
                                    ?>
                                    <tr>
                                        <td><?php echo $lipid_profile->lipid_profile_date; ?></td>
                                        <td><?php echo $lipid_profile->lipid_profile_tc; ?></td>
                                        <td><?php echo $lipid_profile->lipid_profile_ldl; ?></td>
                                        <td><?php echo $lipid_profile->lipid_profile_hdl; ?></td>
                                        <td><?php echo $lipid_profile->lipid_profile_tg; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalCBC">
                                        Add CBC*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->cbc)) {
                                $cbcs = json_decode($detail->cbc);
                                foreach ($cbcs as $key => $cbc) {
                                    ?>

                                    <tr>
                                        <td><?php echo $cbc->cbc_date; ?></td>
                                        <td><?php echo $cbc->cbc_hb; ?></td>
                                        <td><?php echo $cbc->cbc_platelet; ?></td>
                                        <td><?php echo $cbc->cbc_tc; ?></td>
                                        <td><?php echo $cbc->cbc_dc; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalGlucose">
                                        Add Glucose*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->glucose)) {
                                $glucoses = json_decode($detail->glucose);
                                foreach ($glucoses as $key => $glucose) {
                                    ?>

                                    <tr>
                                        <td><?php echo $glucose->glucose_date; ?></td>
                                        <td><?php echo $glucose->glucose_fbs; ?></td>
                                        <td><?php echo $glucose->glucose_rbs; ?></td>
                                        <td><?php echo $glucose->glucose_hab; ?></td>
                                        <td><?php echo $glucose->glucose_hbac; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalVitaminD3">
                                        Add Vitamin D3*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->vitamin_d)) {
                                $vitamin_ds = json_decode($detail->vitamin_d);
                                foreach ($vitamin_ds as $key => $vitamin_d) {
                                    ?>

                                    <tr>
                                        <td><?php echo $vitamin_d->vitamin_d_date; ?></td>
                                        <td><?php echo $vitamin_d->vitamin_d_value; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalUricAcid">
                                        Add Uric Acid*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->uric_acid)) {
                                $uric_acids = json_decode($detail->uric_acid);
                                foreach ($uric_acids as $key => $uric_acid) {
                                    ?>

                                    <tr>
                                        <td><?php echo $uric_acid->uric_acid_date; ?></td>
                                        <td><?php echo $uric_acid->uric_acid_value; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
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
                                <td  class="text-right">                                                            
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalINR">
                                        Add INR*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->inr)) {
                                $inrs = json_decode($detail->inr);
                                foreach ($inrs as $key => $inr) {
                                    ?>

                                    <tr>
                                        <td><?php echo $inr->inr_date; ?></td>
                                        <td><?php echo $inr->inr_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalTSH">
                                        Add TSH*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->tsh)) {
                                $tshs = json_decode($detail->tsh);
                                foreach ($tshs as $key => $tsh) {
                                    ?>

                                    <tr>
                                        <td><?php echo $tsh->tsh_date; ?></td>
                                        <td><?php echo $tsh->tsh_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalT3">
                                        Add T3*
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->t_three)) {
                                $t_threes = json_decode($detail->t_three);
                                foreach ($t_threes as $key => $t_three) {
                                    ?>

                                    <tr>
                                        <td><?php echo $t_three->t_three_date; ?></td>
                                        <td><?php echo $t_three->t_three_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalT4">
                                        Add T4
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->t_four)) {
                                $t_fours = json_decode($detail->t_four);
                                foreach ($t_fours as $key => $t_four) {
                                    ?>

                                    <tr>
                                        <td><?php echo $t_four->t_four_date; ?></td>
                                        <td><?php echo $t_four->t_four_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalCalcium">
                                        Add Calcium
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->calcium)) {
                                $calciums = json_decode($detail->calcium);
                                foreach ($calciums as $key => $calcium) {
                                    ?>

                                    <tr>
                                        <td><?php echo $calcium->calcium_date; ?></td>
                                        <td><?php echo $calcium->calcium_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalMagnesium">
                                        Add Magnesium
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->magnesium)) {
                                $magnesiums = json_decode($detail->magnesium);
                                foreach ($magnesiums as $key => $magnesium) {
                                    ?>
                                    <tr>
                                        <td><?php echo $magnesium->magnesium_date; ?></td>
                                        <td><?php echo $magnesium->magnesium_value; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
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
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalBNP">
                                        Add New
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->nt_pro_bnp)) {
                                $nt_pro_bnps = json_decode($detail->nt_pro_bnp);
                                foreach ($nt_pro_bnps as $key => $nt_pro_bnp) {
                                    ?>

                                    <tr>
                                        <td><?php echo $nt_pro_bnp->nt_pro_bnp_date; ?></td>
                                        <td><?php echo $nt_pro_bnp->nt_pro_bnp_value; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Other:*</label>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Test Name</th>
                                <th>Value</th>
                                <td  class="text-right">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalOther">
                                        Add Other
                                    </button>                                    
                                </td>
                            </tr>
                            <?php
                            if (!empty($detail->other)) {
                                $others = json_decode($detail->other);
                                foreach ($others as $key => $other) {
                                    ?>
                                    <tr>
                                        <td><?php echo $other->other_date; ?></td>
                                        <td><?php echo $other->other_name; ?></td>
                                        <td><?php echo $other->other_value; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
            <!----------------------------------------------------->
            <?php
            $visit_no = 1;
            foreach ($prescriptions as $prescription) {
                ?>
                <div class="row">
                    <table class="table table-bordered bg-danger ">
                        <tr class="table-warning" style="font-size: large;">
                            <td><strong>Visit No.:  <?php echo $visit_no++; ?> </strong></td>
                            <td>Date: <?php echo $prescription->date; ?> </td>
                            <td>Name: <?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
                            <td>Age: 
                                <?php
                                $bday = new DateTime($this->patient_model->getPatientById($patient_id)->birth_date); // Your date of birth
                                $today = date_create($prescription->date);
                                $diff = $today->diff($bday);
                                echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                                ?>
                            </td>
                            <td>Sex: <?php echo $this->patient_model->getPatientById($patient_id)->sex; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1">Diagnosis:</td>
                            <td colspan="4"><?php echo $prescription->diagnosis; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1">Chief Complaints:</td>
                            <td colspan="4"><?php echo $prescription->chief_complaints; ?></td>
                        </tr>

                    </table>
                    <div class="row">
                        <div class="col-xs-3 table-responsive bg-warning no-print">
                            <h4>Signs & Symptoms</h4>
                            <?php
                            if (!empty($prescription->signs_symptoms)) {
                                $signs_symptoms = json_decode($prescription->signs_symptoms);
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="padding:0px; margin:0px;">Name</th>
                                        <th style="padding:0px; margin:0px;">Value</th>
                                    </tr>
                                    <?php foreach ($signs_symptoms as $titel => $value) { ?>
                                        <tr>
                                            <td style="padding:0px; margin:0px;"><?php echo $titel; ?></td>
                                            <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
                        </div>
                        <div class="col-xs-3 table-responsive">
                            <h4>Physical Examination</h4>
                            <?php
                            if (!empty($prescription->physical_examination)) {
                                $physical_examination = json_decode($prescription->physical_examination);
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="padding:0px; margin:0px;">Name</th>
                                        <th style="padding:0px; margin:0px;">Value</th>
                                    </tr>
                                    <?php foreach ($physical_examination as $titel => $value) { ?>
                                        <tr>
                                            <td style="padding:0px; margin:0px;"><?php echo $titel; ?></td>
                                            <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
                        </div>

                        <div class="col-xs-6 table-responsive bg-success">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Medicine</th>
                                        <th>Type</th>
                                        <th>when</th>
                                        <th>duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //$total_deduction = 0;
                                    $deductions = json_decode($prescription->deductions);
                                    $i = 1;
                                    foreach ($deductions as $deduction) {
                                        //$total_deduction += $deduction->amount;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td>
                                                <?php echo $deduction->type; ?>
                                            </td>
                                            <td>
                                                <?php echo $deduction->amount; ?>
                                            </td>
                                            <td>
                                                <?php echo $deduction->when; ?>
                                            </td>
                                            <td>
                                                <?php echo $deduction->duration; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                </div>
            <?php } ?>
            <!----------------------------------------------------------------->
        </div>
    </section>

</div>




<!----------------------- Modal For ECG ------------------------------->
<div class="modal" id="modalEcg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add ECG*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateEcg" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For ECHO ------------------------------->
<div class="modal fade" id="modalEcho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add ECG*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateEcho" method="post" enctype="multipart/form-data">
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
                            <td><input type="text" class="form-control" name="ef_%" value=""/></td>
                            <td><input type="text" class="form-control" name="rvsp_pasp" value=""/></td>
                            <td><input type="text" class="form-control" name="rwma" value=""/></td>
                            <td><input type="text" class="form-control" name="d_d" value=""/></td>
                            <td><input type="text" class="form-control" name="mr_none" value=""/></td>
                            <td><input type="text" class="form-control" name="la" value=""/></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Chest X Ray ------------------------------->
<div class="modal fade" id="modalChestXray" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Chest X-Ray*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateChest_x_ray" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Six Min Walk ------------------------------->
<div class="modal fade" id="modalSixMinWalk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add 6-minute walk test*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateSix_min_walk" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Holter/Event Recorder ------------------------------->
<div class="modal fade" id="modalHolterEventRecorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Holter/Event Recorder*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateHolter_event_recorder" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Stress Test ------------------------------->
<div class="modal fade" id="modalStressTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Stress Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateStress_test" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For MPI ------------------------------->
<div class="modal fade" id="modalMPI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add MPI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateMpi" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For Angiogram ------------------------------->
<div class="modal fade" id="modalAngiogram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Angiogram</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateAngiogram" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For S. Creatinine ------------------------------->
<div class="modal fade" id="modalSCreatinine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add S. Creatinine*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateS_creatinine" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For S. Electrolytes ------------------------------->
<div class="modal fade" id="modalSElectrolytes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add S. Electrolytes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateS_electrolytes" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Lipid Profile ------------------------------->
<div class="modal fade" id="modalLipidProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Lipid Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateLipid_profile" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For CBC ------------------------------->
<div class="modal fade" id="modalCBC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add CBC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateCbc" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Glucose ------------------------------->
<div class="modal fade" id="modalGlucose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Glucose</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateGlucose" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Vitamin D3 ------------------------------->
<div class="modal fade" id="modalVitaminD3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vitamin D3 (ng/ml)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateVitamin_d" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For Uric Acid ------------------------------->
<div class="modal fade" id="modalUricAcid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Uric Acid*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateUric_acid" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For INR ------------------------------->
<div class="modal fade" id="modalINR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add INR*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateInr" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For TSH ------------------------------->
<div class="modal fade" id="modalTSH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 70%; " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add TSH*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateTsh" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->
<!----------------------- Modal For T3 ------------------------------->
<div class="modal fade" id="modalT3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add T3*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateT_three" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For T4 ------------------------------->
<div class="modal fade" id="modalT4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add T4</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateT_four" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For Calcium ------------------------------->
<div class="modal fade" id="modalCalcium" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Calcium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateCalcium" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For Magnesium ------------------------------->
<div class="modal fade" id="modalMagnesium" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Magnesium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateMagnesium" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For NT-pro BNP ------------------------------->
<div class="modal fade" id="modalBNP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add NT-pro BNP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateNt_pro_bnp" method="post" enctype="multipart/form-data">
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
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----------------------- Modal For Other ------------------------------->
<div class="modal fade" id="modalOther" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Other</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="details/updateOther" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>Test Name</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><input type="date" class="form-control" name="other_date" value=""/></td>
                            <td><input type="text" class="form-control" name="other_name" value=""/></td>
                            <td><input type="text" class="form-control" name="other_value" value=""/></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <input type="hidden" class="form-control" name="patient_id" value="<?php echo $detail->patient_id; ?>"/>
                        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
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

<!--allowance_input Payroll ar vitor add korar jonno-->
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
    //multiple delete
    $(document).ready(function () {

        $('.delete_checkbox').click(function () {
            if ($(this).is(':checked'))
            {
                $(this).closest('tr').addClass('removeRow');
            } else
            {
                $(this).closest('tr').removeClass('removeRow');
            }
        });

        $('.checkall').click(function () {
            if ($('.delete_checkbox').is(':checked')) {
                $('.all_remove').addClass('removeRow');
            } else {
                $('.all_remove').removeClass('removeRow');
            }
        });

        $('#delete_all').click(function () {
            var checkbox = $('.delete_checkbox:checked');
            var details_id = $('.details_id').val();
            var patient_id = $('.patient_id').val();
            //console.log(details_id);
            if (checkbox.length > 0)
            {
                var checkbox_value = [];
                $(checkbox).each(function () {
                    checkbox_value.push($(this).val());
                });
                $.ajax({
                    url: "<?php echo base_url(); ?>details/delete_all",
                    method: "POST",
                    data: {checkbox_value: checkbox_value, details_id: details_id, patient_id: patient_id},
                    success: function ()
                    {
                        $('.removeRow').fadeOut(1500);
                    }
                })
            } else
            {
                alert('Select atleast one records');
            }
        });
    });
    var clicked = false;
    $(".checkall").on("click", function () {
        $(".delete_checkbox").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect All' : 'Select All';
    });

</script>
