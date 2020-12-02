<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="clearfix">
                        <form class="navbar-form" role="search" action=" member/search_Member_Type" method = "post">
                            <div class="input-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="search" name = "type"size="15px; ">
                                </div>
                                <div class="input-group-btn">
                                    <button class="btn btn-info " type="submit" value = "Search"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <a data-toggle="modal" href="#myModal">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Prescription 
                                </button>
                            </div>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($prescriptions as $prescription) { ?>
                                    <tr>
                                        <td><?php echo $prescription->date; ?></td>
                                        <td><?php echo $this->patient_model->getPatientById($prescription->patient)->name; ?></td>                                       
                                        <td class="no-print">
                                            <a type="button" class="btn bg-purple margin" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"style="width:150px; margin-right:5px;">View Prescription</a>
                                            <a type="button" class="btn bg-purple margin" data-toggle="modal" href="#myModal3" style="width:150px; margin-right:5px;">Modal Prescription</a>
                                            <a type="button" class="btn bg-maroon margin addDiagnosisReport" data-toggle="modal" data-id="<?php echo $prescription->id; ?>"  href="#modal" style="width:150px; margin-right:5px;">Add Diagnosis Report</a> 
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Actions</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="prescription/delete?id=<?php echo $prescription->id; ?>">Delete</a></li>
                                                    <li> <a type="button" class="editbutton" data-toggle="modal" data-id="<?php echo $prescription->id; ?>">Edit</a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --> 

<!-- Start Code to get Doctor Id -->
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<!-- End Code to get Doctor Id -->
<!-- Add Prescription Modal-->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Prescription</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="doctor" id="exampleInputEmail1" value='<?php
                            if (!empty($doctor_id)) {
                                echo $doctor_id;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Patient</label>
                            <select class="form-control m-bot15" name="patient" value=''>
                                <?php foreach ($patients as $patient) { ?>
                                    <option value="<?php echo $patient->id; ?>" <?php
                                    if (!empty($prescription->id)) {
                                        if ($patient->id == $prescription->id) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $patient->name; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Case History</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">

                                <textarea class="textarea" name="history" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Medication</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea class="textarea" name="medication" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Note</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">

                                <textarea class="textarea" name="note" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value=''>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /Add Prescription Modal-->


<!-- Add Prescription Modal-->
<div class="modal" id="myModal2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit prescription</h4>
            </div> 
            <div class="modal-body">
                <form role="form" id="prescriptionEditForm" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data" style="height:850px;">
                    <div class="form-group col-md-12">
                        <input type="hidden" class="form-control " name="doctor" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">date</label>
                        <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">patient</label>
                        <select class="form-control m-bot15 " name="patient" value=''> 
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Medication</label>
                        <textarea class="textarea" name="medication" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Case History</label>
                        <textarea class="textarea" name="history" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Note</label>
                        <textarea class="textarea" name="note" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value=""></textarea>
                    </div>
                    <input type="hidden" name="patient_id" value=''>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Prescription Modal-->

<div class="modal" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Prescription</h4>
            </div>
            <div class="modal-body">

                
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Murad Hospital
                                    <small class="pull-right">Date: <?php echo ($prescription->date); ?></small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <?php $patient = $this->patient_model->getPatientById($prescription->patient); ?>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Patient Info</strong><br>
                                    <b> Patient Name:</b> <?php echo $patient->name ?> <br>
                                    <b>Age:</b> <?php echo $patient->age ?><br>
                                    <b>Phone:</b> <?php echo $patient->phone ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                            </div>
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Doctor Info</strong><br>
                                    <b>Doctor Name:</b> <br>
                                    <b>Phone:</b>
                                </address>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>History</td>
                                            <td class=""><?php echo $prescription->history; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Medication </td>
                                            <td class=""><?php echo $prescription->medication; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Note </td>
                                            <td class=""><?php echo $prescription->note; ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  Add Diagnosis Report</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                        <tr>
                            <th> id</th>
                            <th> Date</th>
                            <th> Report Type </th>
                            <th> Document Type</th>
                            <th> Description </th>
                            <th class="option_th"> options</th>
                        </tr>
                    </thead>
                    <tbody class="viewP">



                    </tbody>
                </table>

                <form role="form" id="diagnosisReportForm" action="report/addNewDiagnosisReport" method="post" enctype="multipart/form-data" style="height:620px;">

                    <div class="form-group col-md-12">


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Date</label>
                            <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Report Type</label>
                            <select id="" class="form-control m-bot15" name="report_type" value=''>
                                <option value="">Select Option</option>  
                                <option value="X-ray">X-ray </option>
                                <option value="Blood Test">Blood Test </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Document</label>
                            <input type="file" name="img_url" id="exampleInputFile">                 
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Document Type</label>
                            <select id="paid_by" class="form-control m-bot15" name="document_type" value=''>
                                <option value="">Select Option</option>
                                <option value="Image">Image</option>
                                <option value="Doc">Doc </option>
                                <option value="PDF">PDF </option>
                                <option value="Excel">Excel </option>
                                <option value="Other">Other </option>
                            </select>
                        </div>


                        <input type="hidden" name="prescription_id" value='<?php echo $prescription->id; ?>'>
                        <input type="hidden" name="id" value=''>



                        <label class="control-label col-md-3 note">Description</label>
                        <div class="col-md-12 note">
                            <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info"> submit </button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'prescription/editPrescriptionByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()
                $('#prescriptionEditForm').find('[name="date"]').val(response.prescription.date).end()
                $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                $('#prescriptionEditForm').find('[name="medication"]').val(response.prescription.medication).end()
                $('#prescriptionEditForm').find('[name="history"]').val(response.prescription.history).end()
                $('#prescriptionEditForm').find('[name="note"]').val(response.prescription.note).end()
                $('#myModal2').modal('show');
            });
        });
    });
</script>


