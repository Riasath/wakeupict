<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Prescription</h3>
                    </div>
                    <form role="form" action="schedule/addNew" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <?php if (empty($patient_id)) { ?>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Select Patient</label>
                                        <div class="col-sm-9">
                                            <select class="form-control m-bot15" name="patient_id" value=''>
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
                                    <div class="col-md-3">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="" name="date" class=" form-control" id="exampleInputEmail1" placeholder="Date" value='<?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            echo date("d-m-Y");
                                            ?>'>
                                        </div>
                                    </div>
                                    <div class="col-md-3">  </div>
                                </div>
                            <?php } ?> 
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Patient Id</label>
                                    <div class="col-sm-9">
                                        <?php echo $patient_id; ?>
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                        <input type="hidden" name="doctor_id" value='<?php echo $doctor_id; ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="" name="date" class=" form-control" id="exampleInputEmail1" placeholder="Date" value='<?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        echo date("d-m-Y");
                                        ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">  </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr style="font-size: large;">
                                        <td>Patient Name: <?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
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

                            <div class="col-md-3">
                                <div class="form-group row">
                                    <h4>Signs & Symptoms:</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Exertional SOB:</label> 
                                        <input type="checkbox" name="exertional" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                        <input type="checkbox" name="exertional" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NYHA Classification:</label>
                                        <input type="checkbox" name="nyha" class="" id="exampleInputEmail1" placeholder="" value="I"> I
                                        <input type="checkbox" name="nyha" class="" id="exampleInputEmail1" placeholder="" value="II"> II
                                        <input type="checkbox" name="nyha" class="" id="exampleInputEmail1" placeholder="" value="III"> III
                                        <input type="checkbox" name="nyha" class="" id="exampleInputEmail1" placeholder="" value="IV"> IV
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Onthopnoea:</label>
                                        <input type="checkbox" name="onthopnoea" class="" id="exampleInputEmail1" placeholder="" value="Yes"> Yes									
                                        <input type="checkbox" name="onthopnoea" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">PND:</label>    
                                        <input type="checkbox" name="pnd" class=l" id="exampleInputEmail1" placeholder="" value="Yes"> Yes
                                        <input type="checkbox" name="pnd" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ExertionalChestPain:</label>
                                        <input type="checkbox" name="chestpain" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present									
                                        <input type="checkbox" name="chestpain" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Palpitation:</label>    
                                        <input type="checkbox" name="palpitation" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                        <input type="checkbox" name="palpitation" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fatigue:</label>    
                                        <input type="checkbox" name="fatigue" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                        <input type="checkbox" name="fatigue" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dizziness:</label>  
                                        <input type="checkbox" name="dizziness" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                        <input type="checkbox" name="dizziness" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Syncopy/Presyncopy:</label> 
                                        <input type="checkbox" name="syncopy" class="" id="exampleInputEmail1" placeholder="" value="Yes"> Yes								
                                        <input type="checkbox" name="syncopy" class="" id="exampleInputEmail1" placeholder="" value="No"> No
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Overall QQL:</label>    
                                        <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Poor"> Poor	
                                        <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Medium"> Medium
                                        <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Fair"> Fair	
                                        <input type="checkbox" name="qql" class="" id="exampleInputEmail1" placeholder="" value="Good"> Good
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Leg Swelling:</label>       
                                        <input type="checkbox" name="swelling" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present							
                                        <input type="checkbox" name="swelling" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sleep Disturbance:</label>      
                                        <input type="checkbox" name="sleep" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present							
                                        <input type="checkbox" name="sleep" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Appetite:</label>
                                        <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Poor"> Poor									
                                        <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Fair"> Fair
                                        <input type="checkbox" name="appetite" class="" id="exampleInputEmail1" placeholder="" value="Good"> Good							
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bowel Habit:</label>
                                        <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Normal"> Normal								
                                        <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Diarrhea"> Diarrhea
                                        <input type="checkbox" name="bowel" class="" id="exampleInputEmail1" placeholder="" value="Constipation"> Constipation								
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sexual Activities:</label>
                                        <input type="checkbox" name="sexual" class="" id="exampleInputEmail1" placeholder="" value="Normal"> Normal									
                                        <input type="checkbox" name="sexual" class="" id="exampleInputEmail1" placeholder="" value="Hampered"> Hampered
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mental Status:  </label>
                                        <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Alert"> Alert									
                                        <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Confused"> Confused
                                        <input type="checkbox" name="mental" class="" id="exampleInputEmail1" placeholder="" value="Drowsy"> Drowsy
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Psychological Status:</label>
                                        <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Depression"> Depression					
                                        <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Anxiety"> Anxiety <br>
                                        <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="loss of memory"> Loss of memory			
                                        <input type="checkbox" name="psychological" class="" id="exampleInputEmail1" placeholder="" value="Anger"> Anger
                                    </div>

                                    <h4>Physical Examination</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Weight  
                                            <input type="text" name="weight" class="" id="exampleInputEmail1" placeholder="" value=""> KG</label>									
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Anemia"> Anemia								
                                        <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Jaundice"> Jaundice
                                        <input type="checkbox" name="anemia" class="" id="exampleInputEmail1" placeholder="" value="Cyanosis"> Cyanosis								
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Edema: </label> 
                                        <input type="checkbox" name="edema" class="" id="exampleInputEmail1" placeholder="" value="Present"> Present								
                                        <input type="checkbox" name="edema" class="" id="exampleInputEmail1" placeholder="" value="Absent"> Absent
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">JVP:</label>      
                                        <input type="text" name="jvp" class="" id="exampleInputEmail1" placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pulse:  
                                            <input type="text" name="pulse" class="" id="exampleInputEmail1" placeholder="Pulse" value="">b/m</label>	
                                        <input type="checkbox" name="pulse_con" class="" id="exampleInputEmail1" placeholder="Pulse" value="Reguler"> Reguler			
                                        <input type="checkbox" name="pulse_con" class="" id="exampleInputEmail1" placeholder="Pulse" value="Irregiler"> Irregiler								
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">BP</label>                                   
                                        <input type="text" name="bp" class="" id="exampleInputEmail1" placeholder="bp" value=""> mmHg
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Heart</label>                                   
                                        <input type="text" name="heart" class="" id="exampleInputEmail1" placeholder="Heart" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lungs </label>                                   
                                        <input type="text" name="lungs" class="" id="exampleInputEmail1" placeholder="Lungs" value=""> 
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">6MWT  </label>                                  
                                        <input type="text" name="min_walk" class="" id="exampleInputEmail1" placeholder="6MWT" value=""> 
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Echo  </label>                                  
                                        <input type="text" name="echo" class="" id="exampleInputEmail1" placeholder="Echo" value=""> 
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ECG  </label>   
                                        <input type="text" name="ecg" class="" id="exampleInputEmail1" placeholder="ECG" value=""> 								
                                    </div>
                                </div>
                                <!--------------------------------------------------------------///--------------------------------------------------------------------------->
                            </div>

<!--                            <div class="col-md-9 bg-success">
                                <label for="exampleInputEmail1">Rx</label>
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

                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="deduction_amount[]"
                                                   placeholder="procedure"
                                                   id="deduction_amount_1" />
                                            <select class="form-control js-example-basic-single" name="deduction_amount[]" value=''>
                                                <option value="1+1+1">1+1+1</option>
                                                <option value="1+0+1">1+0+1</option>
                                                <option value="0+1+0">0+1+0</option>
                                                <option value="0+0+1">0+0+1</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="when[]"
                                                   placeholder="When"
                                                   id="deduction_amount_1" />
                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                <option value="Before meals">Before meals</option>
                                                <option value="After meals">After meals</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="duration[]"
                                                   placeholder="duration" />
                                            <select class="form-control js-example-basic-single" name="duration[]" value=''>
                                                <option value="7 Days">7 Days</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="30 Days">30 Days</option>
                                                <option value="3 Monts">3 Monts</option>
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

                                        <div class="col-sm-2">
                                            <select class="form-control js-example-basic-single" name="deduction_amount[]" value=''>
                                                <option value="1+1+1">1+1+1</option>
                                                <option value="1+0+1">1+0+1</option>
                                                <option value="0+1+0">0+1+0</option>
                                                <option value="0+0+1">0+0+1</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                <option value="Before meals">Before meals</option>
                                                <option value="After meals">After meals</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <select class="form-control js-example-basic-single" name="duration[]" value=''>
                                                <option value="7 Days">7 Days</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="30 Days">30 Days</option>
                                                <option value="3 Monts">3 Monts</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
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
                            </div>-->
                        </div>
<!--                        <input type="hidden" name="status" value='Done'>-->
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

