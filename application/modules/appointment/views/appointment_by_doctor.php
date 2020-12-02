<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="clearfix">
                        <div class="box-header">
                            <h2 class="box-title">Appointments</h2>
                        </div>
                        <a data-toggle="modal" href="#myModal3">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Appointment 
                                </button>
                            </div>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $appointment) { 
                                     if ($appointment->status == 'Approved') { ?>
                                    <tr>
                                        <td><?php echo $appointment->available_date; ?></td>
                                        <td><?php echo $appointment->start_time; ?></td>
                                        <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Actions</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li> <a type="button" class="editAppointment" data-toggle="modal" data-id="<?php echo $appointment->schedule_id; ?>">Edit</a></li>
                                                    <li><a href="appointment/deleteAppointment?id=<?php echo $appointment->schedule_id; ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } } ?>
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

<!-- Get current user-->
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<!-- Add Prescription Modal-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Appointment</h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="appointment/addNewAppointment" method="post" enctype="multipart/form-data"> 
                    <div class="box-body bootstrap-timepicker">
                        <div class="form-group col-md-12">
                            <input type="hidden" class="form-control " name="doctor" id="exampleInputEmail1" value='<?php
                            if (!empty($doctor_id)) {
                                echo $doctor_id;
                            }
                            ?>' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Patient</label>
                            <select class="form-control m-bot15" id="pos_select" name="patient" value='' style="width:850px;"> 
                                <option value="">Select .....</option>

                                <?php foreach ($patients as $patient) { ?>
                                    <option value="<?php echo $patient->id; ?>" <?php
                                    ?> ><?php echo $patient->name; ?> </option>
                                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Start time</label>

                            <div class="input-group">
                                <input type="text" name="s_time" class="form-control timepicker">

                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <input type="hidden" name="id" value=''>
                        <input type="hidden" name="type" value='doctor'>
                        <input type="hidden" name="status" value='Approved'>
                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Prescription Modal-->

<!-- Edit Prescription Modal-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Edit Appointment</h4>
            </div> 
            <div class="modal-body">
                <form role="form" id="appointmentEditForm" action="appointment/addNewAppointment" method="post" enctype="multipart/form-data">

                    <div class="box-body bootstrap-timepicker">
                        <div class="form-group col-md-12">
                            <input type="hidden" class="form-control " name="status" id="exampleInputEmail1" value='<?php
                            if (!empty($status)) {
                                echo $status;
                            }
                            ?>' placeholder="">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" name="doctor" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Patient</label>
                            <select class="form-control m-bot15 " id="pos_select" name="patient" value='' style="width:850px;" readonly> 
                                <?php foreach ($patients as $patient) { ?>
                                    <option value="<?php echo $patient->id; ?>" <?php
                                    if (!empty($appointment->patient)) {
                                        if ($patient->id == $appointment->patient) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> ><?php echo $patient->name; ?> </option>
                                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>start time</label>

                            <div class="input-group">
                                <input type="text" name="s_time" class="form-control timepicker">

                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <input type="hidden" name="id" value=''>
                        <input type="hidden" name="type" value='doctor'>
                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info"> Update </button>
                        </div>
                    </div>
                </form>
            </div>     
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editAppointment").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal5').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#appointmentEditForm').find('[name="id"]').val(response.appointment.id).end()
                $('#appointmentEditForm').find('[name="date"]').val(response.appointment.date).end()
                $('#appointmentEditForm').find('[name="patient"]').val(response.appointment.patient).end()
                $('#appointmentEditForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#appointmentEditForm').find('[name="s_time"]').val(response.appointment.s_time).end()
                $('#appointmentEditForm').find('[name="type"]').val(response.appointment.type).end()
                $('#appointmentEditForm').find('[name="status"]').val(response.appointment.status).end()
            });
        });
    });
</script>