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
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Patient Id</label>
                                    <div class="col-sm-9">
                                        <?php echo $prescription->patient_id; ?>
                                        <input type="hidden" name="patient_id" value='<?php
                                        if (!empty($prescription->patient_id)) {
                                            echo $prescription->patient_id;
                                        }
                                        ?>'>
                                        <input type="hidden" name="doctor_id" value='<?php echo $prescription->doctor_id; ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="" name="date" class=" form-control" id="exampleInputEmail1" placeholder="Date" value='<?php echo $prescription->date; ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">  </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr style="font-size: large;">
                                        <td>Name: <?php echo $this->patient_model->getPatientById($prescription->patient_id)->name; ?></td>
                                        <td>Age: 
                                            <?php
                                            $bday = new DateTime($this->patient_model->getPatientById($prescription->patient_id)->birth_date); // Your date of birth
                                            $today = date_create($prescription->date);
                                            $diff = $today->diff($bday);
                                            echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                                            ?>
                                        </td>
                                        <td>Sex: <?php echo $this->patient_model->getPatientById($prescription->patient_id)->sex; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Diagnosis:</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="diagnosis" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $prescription->diagnosis; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-1 col-form-label">Chief Complaints:</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="chief_complaints" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $prescription->chief_complaints; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <h4>Signs & Symptoms:</h4>
                                    <?php
                                    $signs_symptoms = json_decode($prescription->signs_symptoms);
                                    ?>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>
                                        </tr>
                                        <?php foreach ($signs_symptoms as $titel => $value) { ?>
                                            <tr>
                                                <td style="padding:0px; margin:0px;"><strong><?php echo $titel; ?></strong></td>
                                                <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h4>Physical Examination</h4>
                                    <?php
                                    $physical_examination = json_decode($prescription->physical_examination);
                                    ?>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>
                                        </tr>
                                        <?php foreach ($physical_examination as $titel => $value) { ?>
                                            <tr>
                                                <td style="padding:0px; margin:0px;"><strong><?php echo $titel; ?></strong></td>
                                                <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <!--------------------------------------------------------------///--------------------------------------------------------------------------->
                            </div>
                            <div class = "col-md-8 bg-success">
                                <label for = "exampleInputEmail1">Rx</label>
                                <span id = "deduction">
                                    <div class = "form-group">
                                        <div class = "col-sm-4">
                                        <!--<input type = "text" class = "form-control" name = "deduction_type[]"
                                        placeholder = "medicine" /> -->
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
                                                <option value="1+1+1">1+1+1</option>
                                                <option value="1+0+1">1+0+1</option>
                                                <option value="0+1+0">0+1+0</option>
                                                <option value="0+0+1">0+0+1</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
        <!--                                            <input type="number" class="form-control" name="when[]"
                                                   placeholder="When"
                                                   id="deduction_amount_1" />-->
                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                <option value="Before meals">Before meals</option>
                                                <option value="After meals">After meals</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
        <!--                                            <input type="text" class="form-control" name="duration[]"
                                                   placeholder="duration" />-->
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
                                    <div class="form-group">
                                        <div class="col-sm-4" style="margin-top:10px;">
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

                                        <div class="col-sm-3" style="margin-top:10px;">
                                            <select class="form-control js-example-basic-single" name="deduction_amount[]" value=''>
                                                <option value="1+1+1">1+1+1</option>
                                                <option value="1+0+1">1+0+1</option>
                                                <option value="0+1+0">0+1+0</option>
                                                <option value="0+0+1">0+0+1</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2" style="margin-top:10px;">
                                            <select class="form-control js-example-basic-single" name="when[]" value=''>
                                                <option value="Before meals">Before meals</option>
                                                <option value="After meals">After meals</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-2" style="margin-top:10px;">
                                            <select class="form-control js-example-basic-single" name="duration[]" value=''>
                                                <option value="7 Days">7 Days</option>
                                                <option value="15 Days">15 Days</option>
                                                <option value="30 Days">30 Days</option>
                                                <option value="3 Monts">3 Monts</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-1" style="margin-top:10px;">
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
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php echo $prescription->id; ?>'>
                        <input type="hidden" name="schedule_id" value='<?php echo $schedule_id; ?>'>
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