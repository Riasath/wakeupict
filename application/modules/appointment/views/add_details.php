<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add details</h3>
                    </div>
                    <form role="form" action="appointment/addDetails" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Patient Id</label>
                                    <div class="col-sm-9">
                                        <?php echo $patient_id; ?>
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Date</label>
                                    <div class="col-sm-8">
                                        <input type="" name="date" class=" form-control" id="exampleInputEmail1" placeholder="Date" value='<?php echo date("d-m-Y"); ?>'>
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
                                        <td>Date: </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Initial Clinical Assessment</label>
                                    <div class="col-sm-9">
                                        <input type="" name="clinical_assessment" class=" form-control" placeholder="" value=''>
                                    </div>
                                </div>
                            </div>
                            <!--                            -------------------------------------------->
                            <div class="col-md-3">
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
                            </div>
                            <!--                            /////-------------------------->



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