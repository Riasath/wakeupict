<div class="content-wrapper">
    <section class="content"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Patients</h2>
                        <a data-toggle="modal" href="#myModal"><button type="button" class="btn btn-info pull-right">Add New Patient</button></a>
                        <a href="schedule/appointmentIndex">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-success pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Appointment 
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="box-header">
                        <form action="patient/showPatientFilter" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Filter By Patient</label>
                                    <div class="col-sm-8">
                                        <select class="form-control m-bot15 js-example-basic-single" name="patient_id" onchange="if (this.value != '0')
                                                    this.form.submit()">
                                            <option>Select Patient</option>
                                            <?php foreach ($patientss as $patient) { ?>
                                                <option value="<?php echo $patient->id; ?>" <?php
                                                if (!empty($patient_id)) {
                                                    if ($patient_id == $patient->id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> ><?php echo $patient->name; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>
                                    <?php if (!empty($patient_id)) { ?>
                                        <a class="btn btn-success btn-sm" href="patient/showPatient">Cancel Filter</a>
                                    <?php } ?>
                                </div>
                                <button type="submit" class="btn btn-primary" style="display: none">Submit</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Patient Name</th>
                                    <th>Hospital ID</th>
                                    <th>HFC ID</th>
                                    <th>Phone</th>
                                    <?php if (!$this->ion_auth->in_group(array('laboratorist'))) { ?>
                                        <th>Sex</th>
                                        <th>Birth Date</th>
                                    <?php } ?>
                                    <th>History</th>
                                    <th>Priscriptions</th>
                                    <?php //if ($this->ion_auth->in_group(array('doctor', 'laboratorist'))) { ?>
<!--                                        <th>Pathology Report</th>-->
                                    <?php //} ?>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patients as $patient) { ?>
                                    <tr>
                                        <td><img src="<?php echo $patient->img_url; ?>" class="img-circle" width="40px" height="40px"></td>
                                        <td><?php echo $patient->name; ?></td>
                                        <td><?php echo $patient->mr_no; ?></td>
                                        <td><?php echo $patient->hf_id; ?></td>
                                        <td><?php echo $patient->phone; ?></td>
                                        <?php if (!$this->ion_auth->in_group(array('laboratorist'))) { ?>
                                            <td><?php echo $patient->sex; ?></td>
                                            <td><?php echo $patient->birth_date; ?></td>
                                        <?php } ?>
                                        <td>  
                                            <?php
                                            $patient_details = $this->details_model->getDetailsByPatientId($patient->id);
                                            if (empty($patient_details)) {
                                                ?>
                                                <a class="fa fa-plus btn btn-info" href="details/addDetailsView?patient_id=<?php echo $patient->id; ?>">  Add Details</a>
                                            <?php } else { ?>
                                                <a class="fa fa-eye btn btn-success" href="details/viewDetails?patient_id=<?php echo $patient->id; ?>">  View Details</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($prescriptions as $prescription) {
                                                if ($prescription->patient_id == $patient->id) {
                                                    $date = $prescription->date;
                                                    echo "<a href='schedule/viewPrescription?id=$prescription->id' class='btn btn-primary btn-sm' role='button'>" . $date . "</a>";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <?php //if ($this->ion_auth->in_group(array('doctor', 'laboratorist'))) { ?>
    <!--                                            <td>
                                        <?php
                                        foreach ($pathology_reports as $pathology_report) {
                                            if ($pathology_report->patient == $patient->id) {
                                                $report = $pathology_report->title;
                                                echo "<a href='report/ViewPathologyReport?id=$pathology_report->id' type='button' class='btn btn-success' style='width:70px;' >" . $report . "</a>";
                                            }
                                        }
                                        ?>
                                            </td>-->
                                        <?php //} ?>
                                        <td>
                                            <a type="button" class="editbutton btn btn-warning btn-sm" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="patient/delete?id=<?php echo $patient->id; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Patient</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNewPatient" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--=========================================================================================-->
                        <div class="form-group" row>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Assessment: </label>
                                    <input type="date" name="assessment_date " class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">HF ID</label>
                                    <input type="text" name="hf_id" class="form-control" id="exampleInputEmail1" placeholder="HF ID" value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MR No.</label>
                                    <input type="text" name="mr_no" class="form-control" id="exampleInputEmail1" placeholder="MR No." value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Patient Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="">Sex</label>
                                <select class="form-control js-example-basic-single"  name="sex" value='' required>
                                    <option value="" selected disabled> Select Sex </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Highest Education Level</label>
                                <select class="form-control js-example-basic-single"  name="highest_education_level" value=''>
                                    <option value="" selected disabled> Select Highest Education Level </option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="College">College</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="None">None</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Monthly Income</label>
                                <input type="text" name="monthly_income" class="form-control" id="exampleInputEmail1" placeholder="Monthly Income" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No of Children</label>
                                <input type="text" name="no_of_children" class="form-control" id="exampleInputEmail1" placeholder="No of Children" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Menstrual History</label>
                                <input type="text" name="menstrual_history" class="form-control" id="exampleInputEmail1" placeholder="Menstrual History" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Phone No</label>
                                <input type="text" name="caregiver_phone_no" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Phone No" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>              
                        </div>
                        <!--=========================================================================================-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Visit Type</label>
                                <select class="form-control js-example-basic-single"  name="visit_type" value=''>
                                    <option value="" selected disabled> Select Visit Type </option>
                                    <option value="Inpatient">Inpatient</option>
                                    <option value="Outpatient">Outpatient</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='' required>
                            </div>   
                            <div class="form-group">
                                <label for="exampleInputEmail1">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="exampleInputEmail1" placeholder="Occupation" value=''>
                            </div>
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select class="form-control js-example-basic-single"  name="marital_status" value=''>
                                    <option value="" selected disabled> Select Marital Status </option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Blood Group</label>
                                <select class="form-control js-example-basic-single"  name="blood_group" value='' required>
                                    <option value="" selected disabled> Select Blood Group </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Name & Relation</label>
                                <input type="text" name="caregiver_name_relation" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Name & Relation" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pt Height (in cm)</label>
                                <input type="text" name="height" class="form-control" id="exampleInputEmail1" placeholder="Pt Height (in cm)" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" value='' required>
                            </div>  

                            <input type="hidden" name="id" value=''>
                        </div>
                    </div>
                    <div class="box-footer ml-3 p-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal" id="myModal2">
    <div class="modal-dialog" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Patient Info</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="patientEditForm" action="patient/addNewPatient" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--=========================================================================================-->
                        <div class="form-group" row>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Assessment: </label>
                                    <input type="date" name="assessment_date" class="form-control" id="exampleInputEmail1" placeholder="" value=''>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">HF ID</label>
                                    <input type="text" name="hf_id" class="form-control" id="exampleInputEmail1" placeholder="HF ID" value=''>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MR No.</label>
                                    <input type="text" name="mr_no" class="form-control" id="exampleInputEmail1" placeholder="MR No." value=''>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Patient Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="">Sex</label>
                                <select class="form-control js-example-basic-single"  name="sex" value='' required>
                                    <option value="" selected disabled> Select Sex </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Highest Education Level</label>
                                <select class="form-control js-example-basic-single"  name="highest_education_level" value=''>
                                    <option value="" selected disabled> Select Highest Education Level </option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="College">College</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Graduate">Graduate</option>
                                    <option value="Post Graduate">Post Graduate</option>
                                    <option value="None">None</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='' >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Monthly Income</label>
                                <input type="text" name="monthly_income" class="form-control" id="exampleInputEmail1" placeholder="Monthly Income" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No of Children</label>
                                <input type="text" name="no_of_children" class="form-control" id="exampleInputEmail1" placeholder="No of Children" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Menstrual History</label>
                                <input type="text" name="menstrual_history" class="form-control" id="exampleInputEmail1" placeholder="Menstrual History" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Phone No</label>
                                <input type="text" name="caregiver_phone_no" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Phone No" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>              
                        </div>
                        <!--=========================================================================================-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Visit Type</label>
                                <select class="form-control js-example-basic-single"  name="visit_type" value=''>
                                    <option value="" selected disabled> Select Visit Type </option>
                                    <option value="Inpatient">Inpatient</option>
                                    <option value="Outpatient">Outpatient</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="" value='' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='' required>
                            </div>   
                            <div class="form-group">
                                <label for="exampleInputEmail1">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="exampleInputEmail1" placeholder="Occupation" value=''>
                            </div>
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select class="form-control js-example-basic-single"  name="marital_status" value=''>
                                    <option value="" selected disabled> Select Marital Status </option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Blood Group</label>
                                <select class="form-control js-example-basic-single"  name="blood_group" value=''>
                                    <option value="" selected disabled> Select Blood Group </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Name & Relation</label>
                                <input type="text" name="caregiver_name_relation" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Name & Relation" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pt Height (in cm)</label>
                                <input type="text" name="height" class="form-control" id="exampleInputEmail1" placeholder="Pt Height (in cm)" value=''>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" value='' required>
                            </div>  

                            <input type="hidden" name="id" value=''>
                        </div>
                    </div>
                    <div class="box-footer ml-3 p-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>upload_pathology_report</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="reportForm" action="report/addPathologyReport" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">file</label>
                        <input type="file" name="img_url">
                    </div>
                    <input type="hidden" name="patient" value=''>
                    <button type="submit" name="submit" class="btn btn-info">save</button>
                </form>
            </div>
        </div> /.modal-content 
    </div> /.modal-dialog 
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".addPathologyReport").click(function (e) {
            e.preventDefault(e);
            var iid = $(this).attr('data-id');
            $('#reportForm').trigger("reset");
            $('#modal').modal('show');
            $('#reportForm').find('[name="patient"]').val(iid).end()
        });
    });
</script>-->



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


                                            $(document).ready(function () {
                                                $(".editbutton").click(function (e) {
                                                    e.preventDefault(e);
                                                    // Get the record's ID via attribute  
                                                    var iid = $(this).attr('data-id');
                                                    $.ajax({
                                                        url: 'patient/editPatientByJason?id=' + iid,
                                                        method: 'GET',
                                                        data: '',
                                                        dataType: 'json',
                                                    }).success(function (response) {
                                                        // Populate the form fields with the data returned from server
                                                        $('#patientEditForm').find('[name="id"]').val(response.patient.id).end()
                                                        $('#patientEditForm').find('[name="assessment_date"]').val(response.patient.assessment_date).end()
                                                        $('#patientEditForm').find('[name="hf_id"]').val(response.patient.hf_id).end()
                                                        $('#patientEditForm').find('[name="mr_no"]').val(response.patient.mr_no).end()
                                                        $('#patientEditForm').find('[name="name"]').val(response.patient.name).end()
                                                        $('#patientEditForm').find('[name="visit_type"]').val(response.patient.visit_type).end()
                                                        $('#patientEditForm').find('[name="sex"]').val(response.patient.sex).end()
                                                        $('#patientEditForm').find('[name="birth_date"]').val(response.patient.birth_date).end()
                                                        $('#patientEditForm').find('[name="highest_education_level"]').val(response.patient.highest_education_level).end()
                                                        $('#patientEditForm').find('[name="phone"]').val(response.patient.phone).end()
                                                        $('#patientEditForm').find('[name="address"]').val(response.patient.address).end()
                                                        $('#patientEditForm').find('[name="occupation"]').val(response.patient.occupation).end()
                                                        $('#patientEditForm').find('[name="monthly_income"]').val(response.patient.monthly_income).end()
                                                        $('#patientEditForm').find('[name="marital_status"]').val(response.patient.marital_status).end()
                                                        $('#patientEditForm').find('[name="no_of_children"]').val(response.patient.no_of_children).end()
                                                        $('#patientEditForm').find('[name="blood_group"]').val(response.patient.blood_group).end()
                                                        $('#patientEditForm').find('[name="menstrual_history"]').val(response.patient.menstrual_history).end()
                                                        $('#patientEditForm').find('[name="caregiver_name_relation"]').val(response.patient.caregiver_name_relation).end()
                                                        $('#patientEditForm').find('[name="caregiver_phone_no"]').val(response.patient.caregiver_phone_no).end()
                                                        $('#patientEditForm').find('[name="height"]').val(response.patient.height).end()
                                                        $('#patientEditForm').find('[name="email"]').val(response.patient.email).end()
                                                        $('#patientEditForm').find('[name="password"]').val(response.patient.password).end()
                                                        $('#myModal2').modal('show');
                                                    });
                                                });
                                            });
</script>
