<style>    table, tr {     display: block!important;     }     
    tr {       float: left!important;       width: 50%!important;     } 
</style>
<?php
if ($this->ion_auth->in_group(array('patient'))) {
    $current_user = $this->ion_auth->get_user_id();
    $login_patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Appointment</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="schedule/search" method="get" enctype="multipart/form-data">
                        <div class="box-body">
                            <?php if (empty($login_patient_id)) { ?>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1" class="control-label">Select Patient</label>
                                    <select class="form-control m-bot15 js-example-basic-single" name="patient_id" onchange="if (this.value != '0')
                                                    this.form.submit()"> 
                                        <option value="">Select .....</option>
                                        <?php foreach ($patients as $patient) { ?>
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
                            <?php } else { ?>
                                <input type="hidden" name="patient_id" value='<?php echo $login_patient_id; ?>'>
                            <?php } ?>
                            <div class="form-group col-md-4">

                                <label for="exampleInputEmail1" class="control-label">Select Doctor</label>
                                <select class="form-control m-bot15 js-example-basic-single" name="doctor_id" onchange="if (this.value != '0')
                                            this.form.submit()">  
                                    <!--                                    <option value="">Select .....</option>-->
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor->id; ?>"<?php
                                        if (!empty($doctor_id)) {
                                            if ($doctor_id == $doctor->id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo $doctor->name; ?> </option>
                                            <?php } ?>
                                </select> 

                            </div>

                            <div class="form-group col-md-4">

                                <label for="exampleInputEmail1" class="control-label">Select Date</label>
                                <input type="date" name="available_date" class="form-control" id="exampleInputEmail1" placeholder="Date" value='<?php
                                if (!empty($date)) {
                                    echo $date;
                                }
                                ?>' onchange="if (this.value != '0')
                                            this.form.submit()">

                            </div>
                        </div>    
                        <!--                        <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">show avaiable dates</button>
                                                </div>-->
                    </form>
                    <?php if (!empty($schedules)) { ?>
                        <center>
                            <h4 class="bg-success text-white"> Showing data from Doctor: <?php echo '<b>' . $this->doctor_model->getDoctorById($doctor_id)->name . ' </b> Date: <b>' . $date . '</b>'; ?> </h4>
                        </center>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Doctor</th>
                                        <th>Available Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($schedules as $schedule) { ?> 
                                        <tr>
                                            <td>
                                                <?php if ($schedule->status == "") { ?> 
                                                    <a href="schedule/addAppointment?schedule_id=<?php echo $schedule->schedule_id ?>&patient_id=<?php echo $patient_id ?>&doctor_id=<?php echo $doctor_id; ?>&date=<?php echo $date; ?>&status=<?php echo "Pending"; ?>" class="btn btn-info range_submit">Book Now</a>
                                                <?php } ?>
                                                <?php
                                                if ($schedule->status != "") {
                                                    echo "<button> Already Taken </button> ";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $this->doctor_model->getDoctorById($schedule->doctor_id)->name; ?></td>
                                            <td><?php echo $schedule->available_date; ?></td>
                                            <td><?php echo $schedule->start_time; ?></td>
                                            <td><?php echo $schedule->end_time; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            if (!empty($date)) {
                                echo '  <div> <center>
                            <h4 class="bg-danger text-white"> There is no schedule available for <b>' . $this->doctor_model->getDoctorById($doctor_id)->name . ' </b> On <b>' . $date . '</b></h4>
                        </center> </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>