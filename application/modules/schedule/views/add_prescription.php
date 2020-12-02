
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Prescription</h3>
                    </div>

                    <?php if (empty($patient_id)) { ?>
                        <form action="schedule/addSinglePrescriptionView" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Select Patient</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-bot15 js-example-basic-single" name="patient_id" onchange="if (this.value != '0')
                                                        this.form.submit()">
                                            <option value="">Select Patient</option>
                                            <?php foreach ($patients as $patient) { ?>
                                                <option value="<?php echo $patient->id; ?>" <?php
                                                if (!empty($appointment->patient)) {
                                                    if ($appointment->patient == $patient->id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> ><?php echo $patient->name; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="display: none">Submit</button>
                            </div>
                        </form>
                    <?php } ?>
                    <?php if (!empty($patient_id)) { ?>
                        <form role="form" action="schedule/addNew" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <table class="table table-bordered  bg-warning">
                                        <tr style="font-size: large;">
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                        <input type="hidden" name="doctor_id" value='<?php echo $doctor_id; ?>'>

                                        <td> <strong>Patient Id: </strong><?php echo $patient_id; ?></td>
                                        <td><strong>Patient Name: </strong><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
                                        <td><strong>Age:</strong> 
                                            <?php
                                            $bday = new DateTime($this->patient_model->getPatientById($patient_id)->birth_date); // Your date of birth
                                            $today = new Datetime(date('m.d.y'));
                                            $diff = $today->diff($bday);
                                            echo $diff->y . " years.";
                                            ?>
                                        </td>
                                        <td><strong>Sex:</strong> <?php echo $this->patient_model->getPatientById($patient_id)->sex; ?></td>
                                        <td>
                                            <label for="inputEmail3" class="col-sm-4 control-label">Date</label> 
                                            <input type="" name="date" id="exampleInputEmail1" placeholder="Date" value='<?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            echo date("d-m-Y");
                                            ?>'> 
                                        </td>
                                        <td>
                                            <label for="inputEmail3" class="col-sm-4 control-label">Visit No.:</label> 
                                            <input type="text" name="visit_no" id="" placeholder="" value=''> 
                                        </td>
                                        </tr>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Diagnosis:</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="diagnosis" class="form-control" id="exampleInputEmail1" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Chief Complaints:</label>
                                        <div class="col-sm-11">
                                            <input type="text" name="chief_complaints" class="form-control" id="exampleInputEmail1" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <table class="table table-bordered">
                                            <h4>Signs & Symptoms:</h4>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Exertional SOB:</label> 
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="exertional" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                                    <input type="checkbox" name="exertional" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">NYHA Classification:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="nyha1" class="" id="exampleInputEmail1" placeholder="" value="I"> I
                                                    <input type="checkbox" name="nyha2" class="" id="exampleInputEmail1" placeholder="" value="II"> II
                                                    <input type="checkbox" name="nyha3" class="" id="exampleInputEmail1" placeholder="" value="III"> III
                                                    <input type="checkbox" name="nyha4" class="" id="exampleInputEmail1" placeholder="" value="IV"> IV
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Onthopnoea:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="onthopnoea" class="" id="exampleInputEmail1" placeholder="" value="Yes"> Yes									
                                                    <input type="checkbox" name="onthopnoea" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">PND:</label>    
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="pnd" class=l" id="exampleInputEmail1" placeholder="" value="Yes"> Yes
                                                    <input type="checkbox" name="pnd" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">ExertionalChestPain:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="chestpain" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present									
                                                    <input type="checkbox" name="chestpain" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>   
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Palpitation:</label>    
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="palpitation" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                                    <input type="checkbox" name="palpitation" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Fatigue:</label> 
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="fatigue" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                                    <input type="checkbox" name="fatigue" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>                                                   
                                                    <label for="exampleInputEmail1">Dizziness:</label> 
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="dizziness" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                                    <input type="checkbox" name="dizziness" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>    
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Syncopy/Presyncopy:</label> 
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="syncopy" class="" id="exampleInputEmail1" placeholder="" value="Yes"> Yes								
                                                    <input type="checkbox" name="syncopy" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Overall QQL:</label>    
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Poor"> Poor	
                                                    <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Medium"> Medium
                                                    <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Fair"> Fair	
                                                    <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Good"> Good
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Leg Swelling:</label>  
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="swelling" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present							
                                                    <input type="checkbox" name="swelling" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Sleep Disturbance:</label>  
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="sleep" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present							
                                                    <input type="checkbox" name="sleep" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Appetite:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Poor"> Poor									
                                                    <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Fair"> Fair
                                                    <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Good"> Good							
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Bowel Habit:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Normal"> Normal								
                                                    <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Diarrhea"> Diarrhea
                                                    <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Constipation"> Constipation								
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Sexual Activities:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="sexual" class="" id="exampleInputEmail1" placeholder="" value="Normal"> Normal									
                                                    <input type="checkbox" name="sexual" class="" id="exampleInputEmail1" placeholder="" value="Hampered"> Hampered
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Mental Status:  </label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Alert"> Alert									
                                                    <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Confused"> Confused
                                                    <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Drowsy"> Drowsy
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Psychological Status:</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Depression"> Depression					
                                                    <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Anxiety"> Anxiety <br>
                                                    <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="loss of memory"> Loss of memory			
                                                    <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Anger"> Anger
                                                </td>
                                            </tr>
                                        </table>
                                        <h4>Physical Examination</h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Weight  </label>
                                                </td>
                                                <td>
                                                    <input type="text" name="weight" class="" id="exampleInputEmail1" placeholder="" value=""> KG									
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Anemia"> Anemia								
                                                    <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Jaundice"> Jaundice
                                                    <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Cyanosis"> Cyanosis								
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Edema: </label> 
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="edema" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                                    <input type="checkbox" name="edema" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">JVP:</label>  
                                                </td>
                                                <td>
                                                    <input type="text" name="jvp" class="" id="exampleInputEmail1" placeholder="" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Pulse:</label>  
                                                </td>
                                                <td>
                                                    <input type="text" name="pulse" class="" id="exampleInputEmail1" placeholder="Pulse" value=""> b/m	
                                                    <input type="checkbox" name="pulse_con" class="" id="exampleInputEmail1" placeholder="Pulse" value="Reguler"> Reguler			
                                                    <input type="checkbox" name="pulse_con" class="" id="exampleInputEmail1" placeholder="Pulse" value="Irregiler"> Irregiler								
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">BP</label>   
                                                </td>
                                                <td>
                                                    <input type="text" name="bp" class="" id="exampleInputEmail1" placeholder="bp" value=""> mmHg
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Heart</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="heart" class="" id="exampleInputEmail1" placeholder="Heart" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="exampleInputEmail1">Lungs </label>  
                                                </td>
                                                <td>
                                                    <input type="text" name="lungs" class="" id="exampleInputEmail1" placeholder="Lungs" value=""> 
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr> <strong>6-minute walk test*:</strong></tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>Performance</th>
                                                <th>Speed(mph)</th>
                                                <th>Distance(ft)</th>
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

                                    <!--------------------------------------------------------------///--------------------------------------------------------------------------->

                                    <div class="col-md-8" >
                                        <div class="bg-success my-5">
                                            <label for="exampleInputEmail1">Rx</label>
                                            <!--                                            <div class="form-group row">
                                                                                            <div class="col-sm-4">
                                                                                                <a href="d_medicine/addMedicine" target="_blank">
                                                                                                    <div class="btn-group" style="float:right;">
                                                                                                        <button id="" class="btn btn-info btn-sm pull-right">
                                                                                                            <i class="fa fa-plus-circle"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                            
                                                                                            <div class="col-sm-3">
                                                                                                <a href="d_medicine/addType" target="_blank">
                                                                                                    <div class="btn-group" style="float:right;">
                                                                                                        <button id="" class="btn btn-info btn-sm pull-right">
                                                                                                            <i class="fa fa-plus-circle"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <a href="d_medicine/addComment" target="_blank">
                                                                                                    <div class="btn-group" style="float:right;">
                                                                                                        <button id="" class="btn btn-info btn-sm pull-right">
                                                                                                            <i class="fa fa-plus-circle"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>-->
                                            <span id="deduction">
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <select class="form-control m-bot15 js-example-basic-single" name="deduction_type[]" value=''> 
                                                            <option value="">Select medicine</option>
                                                            <?php foreach ($medicines as $medicine) { ?>
                                                                <option value="<?php echo $medicine->name; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$medicine->name') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $medicine->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-3">
            <!--                                            <input type="number" class="form-control" name="deduction_amount[]"
                                                               placeholder="procedure"
                                                               id="deduction_amount_1" />-->
                                                        <select class="form-control js-example-basic-single" name="deduction_amount[]" value=''>
                                                            <?php foreach ($types as $type) { ?>
                                                                <option value="<?php echo $type->type; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$type->type') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $type->type; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!--                                                    <div class="col-sm-2">
                                                                                                            <input type="number" class="form-control" name="when[]"
                                                                                                                   placeholder="When"
                                                                                                                   id="deduction_amount_1" />
                                                                                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                                                                                <option value="Before meals">Before meals</option>
                                                                                                                <option value="After meals">After meals</option>
                                                                                                            </select>
                                                                                                        </div>-->
                                                    <div class="col-sm-4">
            <!--                                            <input type="text" class="form-control" name="duration[]"
                                                               placeholder="duration" />-->
                                                        <select class="form-control js-example-basic-single" name="duration[]" value=''>
                                                            <option value="">Select Comments</option>
                                                            <?php foreach ($comments as $comment) { ?>
                                                                <option value="<?php echo $comment->comment; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$comment->comment') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $comment->comment; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </span>
                                            <span id="deduction_input">
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <select class="form-control m-bot15 js-example-basic-single" name="deduction_type[]" value=''> 
                                                            <option value="">Select medicine</option>
                                                            <?php foreach ($medicines as $medicine) { ?>
                                                                <option value="<?php echo $medicine->name; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$medicine->name') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $medicine->name; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <select class="form-control js-example-basic-single" name="deduction_amount[]" value=''>
                                                            <?php foreach ($types as $type) { ?>
                                                                <option value="<?php echo $type->type; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$type->type') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $type->type; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!--                                                    <div class="col-sm-2">
                                                                                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                                                                                <option value="Before meals">Before meals</option>
                                                                                                                <option value="After meals">After meals</option>
                                                                                                            </select>
                                                                                                        </div>-->

                                                    <div class="col-sm-4">
                                                        <select class="form-control js-example-basic-single" name="duration[]" value=''>
                                                            <option value="">Select Comments</option>
                                                            <?php foreach ($comments as $comment) { ?>
                                                                <option value="<?php echo $comment->comment; ?>" <?php
                                                                if (!empty($deduction->type)) {
                                                                    if ($deduction->type == '$comment->comment') {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> ><?php echo $comment->comment; ?> </option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-1">
                                                        <button type="button" class="btn btn-danger"
                                                                id="deduction_amount_delete" onclick="deleteDeductionParentElement(this)">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </span>

                                            <div class="form-group">
                                                <div class="col-sm-5" style="text-align: right; margin-top:10px;">
                                                    <button type="button" class="btn btn-default btn-sm" onClick="add_deduction()">
                                                        <i class="fa fa-plus"></i>&nbsp;
                                                        Add New Entry
                                                    </button>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                        <hr>
                                        <!----------------------------------------------------------->

                                        <div class="py-5">
                                            <div class="my-5">
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">পানি প্রতিদিন (24 ঘন্টা)
                                                        <input class="" type="text" id="inlineFormCheck" name="daily_water">
                                                        লিটার
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">
                                                        ভাতে বাড়তি লবণ খাবেন না : 
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="extra_salt" value="yes">
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">
                                                        অপ্রয়োজনে খাবার স্যালাইন খাবেন না : 
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="saline" value="yes">
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">
                                                        বোরহানি লবণ বা মিষ্টি পানি খাবেন না : 
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="borhani" value="yes">
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">
                                                        চিপস চানাচুর পনির খাবেন না : 
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="chips" value="yes">
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">
                                                        টিকা নিবেন : 
                                                        ইনফ্লুয়েঞ্জা
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="influenza" value="Influenza"> 
                                                        <br>
                                                        নিউমোনিয়া
                                                        <input class="" type="checkbox" id="inlineFormCheck" name="pneumonia" value="Pneumonia">
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2 mr-sm-2">
                                                    <label class="form-check-label" for="inlineFormCheck">পরবর্তী সাক্ষাৎকার
                                                        <input class="" type="text" id="inlineFormCheck" name="next_appointment"> <input class="" type="checkbox" id="inlineFormCheck" name="week" value="Week"> সপ্তাহ / <input class="" type="checkbox" name="month" id="inlineFormCheck" value="Month"> মাস
                                                        পর
                                                    </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="">
                                                <p>Over phone is between caller follow up: </p>
                                                <div class="col-md-6">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Time</th>
                                                                <th scope="col">Problem</th>
                                                                <th scope="col">Solution </th>
                                                            </tr>
                                                        </thead>
                                                        <?php foreach ($phones as $phone) { ?>
                                                            <tr>
                                                                <td><?php echo $phone->f_date; ?></td>
                                                                <td><?php echo $phone->time; ?></td>                                       
                                                                <td><?php echo $phone->problem; ?></td>                                       
                                                                <td><?php echo $phone->solution; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <br>
                                            <div class="">
                                                <div>
                                                    <img src="../uploads/heart.jpg" class="" alt="Heart Image" height="350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Comment</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----------------------------------------------------------->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <table class="table table-bordered">
                                            <tr> <strong>ECG:</strong></tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>Findings</th>
                                                <th>Rhythmc Sinus/AF</th>
                                                <th>QRS(ms)</th>
                                                <th>RBBB/ LBBB</th>
                                                <th>Heart Block N /1° /2° /3°</th>
                                                <th>QT/ QTc</th>
                                                <th>Ex Beats</th>
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
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <table class="table table-bordered">
                                            <tr> <strong>ECHO:</strong></tr>
                                            <tr>
                                                <th>Date</th>
                                                <th>LVIDd/ LVIDs</th>
                                                <th>EF %</th>
                                                <th>RVSP/ PASP</th>
                                                <th>RWMA</th>
                                                <th>D/D I / II / III / IV</th>
                                                <th>MR None/ 1+/2+/3+/4+</th>
                                                <th>LA</th>
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


                                <!----------------------------------------------------------->
                                <input type="hidden" name="status" value='Done'>
                                <input type="hidden" name="schedule_id" value='<?php echo $schedule_id; ?>'>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
                                                        var allowance_count = 1;
                                                        var deduction_count = 1;
                                                        var total_allowance = 0;
                                                        var total_deduction = 0;
                                                        var deleted_allowances = [];
                                                        var deleted_deductions = [];
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
                                                            $('#allowance_amount').attr('id', 'allowance_amount_' + allowance_count);
                                                            $('#allowance_amount_delete').attr('id', 'allowance_amount_delete_' + allowance_count);
                                                            $('#allowance_amount_delete_' + allowance_count).attr('onclick', 'deleteAllowanceParentElement(this, ' + allowance_count + ')');
                                                        }
                                                        function deleteAllowanceParentElement(n, allowance_count) {
                                                            n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
                                                            deleted_allowances.push(allowance_count);
                                                        }
                                                        function calculate_total_allowance()
                                                        {
                                                            var amount;
                                                            for (i = 1; i <= allowance_count; i++) {
                                                                if (jQuery.inArray(i, deleted_allowances) == -1)
                                                                {
                                                                    amount = $('#allowance_amount_' + i).val();
                                                                    if (amount != '') {
                                                                        amount = parseInt(amount);
                                                                        total_allowance = amount + total_allowance;
                                                                        $('#total_allowance').attr('value', total_allowance);
                                                                    }
                                                                }
                                                            }
                                                            net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
                                                            $('#net_salary').attr('value', net_salary);
                                                            total_allowance = 0;
                                                        }
                                                        $('#deduction_input').hide();

                                                        // CREATING BLANK DEDUCTION INPUT
                                                        var blank_deduction = '';
                                                        $(document).ready(function () {
                                                            blank_deduction = $('#deduction_input').html();
                                                        });
                                                        function add_deduction()
                                                        {
                                                            $(".js-example-basic-single").select2("destroy");
                                                            deduction_count++;
                                                            $("#deduction").append(blank_deduction);
                                                            $(".js-example-basic-single").select2();
                                                            $('#deduction_amount').attr('id', 'deduction_amount_' + deduction_count);
                                                            $('#deduction_amount_delete').attr('id', 'deduction_amount_delete_' + deduction_count);
                                                            $('#deduction_amount_delete_' + deduction_count).attr('onclick', 'deleteDeductionParentElement(this, ' + deduction_count + ')');
                                                        }
                                                        function deleteDeductionParentElement(n, deduction_count) {
                                                            n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
                                                            deleted_deductions.push(deduction_count);
                                                        }
                                                        function calculate_total_deduction()
                                                        {
                                                            var amount;
                                                            for (i = 1; i <= deduction_count; i++) {
                                                                if (jQuery.inArray(i, deleted_deductions) == -1)
                                                                {
                                                                    amount = $('#deduction_amount_' + i).val();
                                                                    if (amount != '') {
                                                                        amount = parseInt(amount);
                                                                        total_deduction = amount + total_deduction;
                                                                        $('#total_deduction').attr('value', total_deduction);
                                                                    }
                                                                }
                                                            }
                                                            net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
                                                            $('#net_salary').attr('value', net_salary);
                                                            total_deduction = 0;
                                                        }
                                                        jQuery('#basic').keyup(function () {
                                                            this.value = this.value.replace(/[^0-9\.]/g, '');
                                                            net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
                                                            $('#net_salary').attr('value', net_salary);
                                                        });
</script>

