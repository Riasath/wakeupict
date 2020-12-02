<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Patient Details</h3>
                    </div>
                    <form role="form" action="appointment/addDetails" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Select Patient</label>
                                    <div class="col-sm-9">
                                        <?php echo $patient_id; ?>
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                    </div>
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="" name="date" class=" form-control" id="exampleInputEmail1" placeholder="Date" value='<?php echo date("d-m-Y"); ?>'>
                                                                    </div>
                                                                </div>-->
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
                                        <td>Date: </td>
                                    </tr>
                                </table>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Initial Clinical Assessment</label>
                                    <div class="col-sm-9">
                                        <input type="" name="clinical_assessment" class=" form-control" placeholder="" value=''>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Comorbidities & Risk Factors*</label>
                                    <div class="col-sm-9">
                                        <input type="" name="risk_factors" class=" form-control" placeholder="" value=''>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Diagnosis*</label>
                                    <div class="col-sm-9">
                                        <input type="" name="diagnosis" class=" form-control" placeholder="" value=''>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <th>Date</th>
                                    <th>Initial Clinical Assessment</th>
                                    <th>Comorbidities & Risk Factors*</th>
                                    <th>Diagnosis*</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($details as $detail) {
                                            //if ($detail->status == 'Approved') {
                                                ?>
                                                <tr>
                                                    <td><?php echo $detail->date; ?></td>
                                                    <td><?php echo $detail->clinical_assessment; ?></td>
                                                    <td><?php echo $detail->risk_factors; ?></td>
                                                    <td><?php echo $detail->diagnosis; ?></td>

                                                    <td>
<!--                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info">Actions</button>
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li> <a type="button" class="editAppointment" data-toggle="modal" data-id="<?php echo $detail->schedule_id; ?>">Edit</a></li>
                                                                <li><a href="appointment/deleteAppointment?id=<?php echo $detail->schedule_id; ?>">Delete</a></li>
                                                            </ul>
                                                        </div>-->
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        //}
                                        ?>
                                    </tbody>
                                </table>
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
        deduction_count++;
        $("#deduction").append(blank_deduction);
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