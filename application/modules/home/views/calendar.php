<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    </head>
    <body>
        <div class="content-wrapper">
            <?php
            // to get corrent user
            if ($this->ion_auth->in_group(array('patient'))) {
                $current_user = $this->ion_auth->get_user_id();
                $patient_id = $this->db->get_where('patient', array('ion_user_id' => $current_user))->row()->id;
            }
            ?>
            <section class="content-header">
                <h1>
                    Dashboard Of <?php echo $this->ion_auth->user()->row()->username; ?> 
                </h1>
            </section>
            <section class="content">
                <?php if (!$this->ion_auth->in_group('patient')) { ?>
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $date = date("Y-m-d");
                                        $this->db->where('available_date', $date);
                                        $this->db->where('status !=', 'Pending');
                                        $this->db->from("schedule");
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>

                                    <h4>Today's Appointment</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                                <a href="appointment/showAppointmentListByDoctor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $date = date("Y-m-d");
                                        $this->db->where('available_date', $date);
                                        $this->db->where('status', "Approved");
                                        $this->db->from("schedule");
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>

                                    <h4>Yet To See</h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="appointment/showDoctorPendingAppointment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $date = date("Y-m-d");
                                        $this->db->where('available_date', $date);
                                        $this->db->where('status', "Done");
                                        $this->db->from("schedule");
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>

                                    <h4>Done Prescription</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-trophy"></i>
                                </div>
                                <a href="schedule/showPayroll" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $this->db->count_all('patient'); ?></h3>

                                    <h4>Total Patient</h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="schedule/showPayroll" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                <?php } ?>
                <?php if ($this->ion_auth->in_group('patient')) { ?>
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $date = date("Y-m-d");
                                        $this->db->where('patient_id', $patient_id);
                                        $this->db->from('new_prescription');
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>

                                    <h4>Prescription</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                                <a href="schedule/patientPrescriptionList" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $date = date("Y-m-d");
                                        $this->db->where('patient_id', $patient_id);
                                        $this->db->where('available_date >=', $date);
                                        $this->db->where('status', "Approved");
                                        $this->db->from("schedule");
                                        echo $this->db->count_all_results();
                                        ?>
                                    </h3>

                                    <h4>Upcoming Appointment</h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="appointment/showAppointmentListByPatient" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        Your
                                    </h3>

                                    <h4>History</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-trophy"></i>
                                </div>
                                <a href="profile/patientHistory" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>Profile</h3>

                                    <h4>Settings</h4>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="profile" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                <?php } ?>
                <!-- /.row -->
                <?php if (!$this->ion_auth->in_group('patient')) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="box-header">
                                        <h2 class="box-title">Today's Appointments</h2>
                                        <!--                                <a data-toggle="modal" href="#myModal3">-->
                                        <a href="schedule/appointmentIndex">
                                            <div class="btn-group" style="float:right;">
                                                <button id="" class="btn btn-info pull-right">
                                                    <i class="fa fa-plus-circle"></i>    Add Appointment 
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
    <!--                                        <th>Doctor</th>-->
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($todaysAppointments as $appointment) {
                                                if ($appointment->status == 'Approved') {
                                                    ?>
                                                    <tr>
                                                        <td><?php
                                                            $date = date_create($appointment->available_date);
                                                            echo date_format($date, "d-m-Y");
                                                            ?></td>
                                                        <td><?php echo $appointment->start_time; ?></td>
                                                        <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
            <!--                                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>-->
                                                        <td>  
                                                            <?php
                                                            $patient_details = $this->details_model->getDetailsByPatientId($appointment->patient_id);
                                                            if (empty($patient_details)) {
                                                                ?>
                                                                <a class="fa fa-plus btn btn-info" href="details/addDetailsView?patient_id=<?php echo $appointment->patient_id; ?>">  Add Details</a>
                                                            <?php } else { ?>
                                                                <a class="fa fa-eye btn btn-info" href="details/viewDetails?patient_id=<?php echo $appointment->patient_id; ?>">  View Details</a>
                                                            <?php } ?>

                                                            <?php //if ($this->ion_auth->in_group('doctor')) {     ?>
                                                            <?php
                                                            $date = date("d-m-Y");
                                                            $tPrescription = $this->schedule_model->getPrescriptionByPatientAndDate($appointment->patient_id, $date);
                                                            if (empty($tPrescription)) {
                                                                ?>    
                                                                <a class="fa fa-check-square btn btn-success" href="schedule/addPrescriptionSignsView?patient_id=<?php echo $appointment->patient_id; ?>&doctor_id=<?php echo $appointment->doctor_id; ?>&schedule_id=<?php echo $appointment->schedule_id; ?>"">  Add Signs & Symptoms</a>
                                                                <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                                                    <a class="fa fa-plus btn btn-success" href="schedule/addPrescriptionView?patient_id=<?php echo $appointment->patient_id; ?>&doctor_id=<?php echo $appointment->doctor_id; ?>&schedule_id=<?php echo $appointment->schedule_id; ?>"">  Add Prescription</a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                                                    <a class="fa fa-check-square btn btn-success" href="schedule/updatePrescriptionView?patient_id=<?php echo $appointment->patient_id; ?>&doctor_id=<?php echo $appointment->doctor_id; ?>&schedule_id=<?php echo $appointment->schedule_id; ?>"">  Update Prescription</a>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                             <?php
                                                            $oldP = $this->schedule_model->getPrescriptionByPatientId($appointment->patient_id);
                                                            if (!empty($oldP)) {
                                                                ?>       
                                                            <a class="fa fa-check-square btn btn-success" href="schedule/viewPrescriptionByPatientId?patient_id=<?php echo $appointment->patient_id; ?>&doctor_id=<?php echo $appointment->doctor_id; ?>&schedule_id=<?php echo $appointment->schedule_id; ?>"">  Old Prescriptions</a>
                                                            <?php } ?>

                                                            <!--                                                        <div class="btn-group">
                                                                                                                        <button type="button" class="btn btn-info">Actions</button>
                                                                                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                                                                            <span class="caret"></span>
                                                                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                                                                        </button>
                                                                                                                        <ul class="dropdown-menu" role="menu">
                                                                                                                            <li> <a type="button" class="editAppointment" data-toggle="modal" data-id="<?php echo $appointment->schedule_id; ?>">Edit</a></li>
                                                                                                                            <li><a href="appointment/deleteAppointment?id=<?php echo $appointment->schedule_id; ?>">Delete</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>-->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="box-header">
                                        <h2 class="box-title">Todays Done Appointments</h2>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
    <!--                                        <th>Doctor</th>-->
                                        <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($todaysAppointments as $appointment) {
                                                if ($appointment->status == 'Done') {
                                                    ?>
                                                    <tr>
                                                        <td><?php
                                                            $date = date_create($appointment->available_date);
                                                            echo date_format($date, "d-m-Y");
                                                            ?></td>
                                                        <td><?php echo $appointment->start_time; ?></td>
                                                        <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
            <!--                                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>-->
                                                        <td>
                                                            <?php
                                                            $patient_details = $this->details_model->getDetailsByPatientId($appointment->patient_id);
                                                            if (empty($patient_details)) {
                                                                ?>
                                                                <a class="fa fa-plus btn btn-info" href="details/addDetailsView?patient_id=<?php echo $appointment->patient_id; ?>">  Add Details</a>
                                                            <?php } else { ?>
                                                                <a class="fa fa-eye btn btn-info" href="details/viewDetails?patient_id=<?php echo $appointment->patient_id; ?>">  View Details</a>
                                                            <?php } ?>
                                                            <a class="fa fa-check-square btn btn-success" href="schedule/viewTodaysPrescription?patient_id=<?php echo $appointment->patient_id; ?>">  Todays Prescription</a>
                                                            <!--                                                        <div class="btn-group">
                                                                                                                        <button type="button" class="btn btn-info">Actions</button>
                                                                                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                                                                            <span class="caret"></span>
                                                                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                                                                        </button>
                                                                                                                        <ul class="dropdown-menu" role="menu">
                                                                                                                            <li> <a type="button" class="editAppointment" data-toggle="modal" data-id="<?php echo $appointment->schedule_id; ?>">Edit</a></li>
                                                                                                                            <li><a href="appointment/deleteAppointment?id=<?php echo $appointment->schedule_id; ?>">Delete</a></li>
                                                                                                                        </ul>
                                                                                                                    </div>-->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="box-header">
                                        <h2 class="box-title">Pending Appointments</h2>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <?php if (!$this->ion_auth->in_group('patient')) { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($appointments as $appointment) {
                                                if ($appointment->status == 'Pending') {
                                                    ?>
                                                    <tr>
                <!--                                        <td><?php echo date($settings->date_format, $appointment->date); ?> - <?php echo $appointment->s_time; ?></td>-->
                                                        <td><?php
                                                            $date = date_create($appointment->available_date);
                                                            echo date_format($date, "d-m-Y");
                                                            ?></td>
                                                        <td><?php echo $appointment->start_time; ?></td>
                                                        <td>
                                                            <?php $patient_name = $this->patient_model->getPatientById($appointment->patient_id);
                                                            if (!empty($patient_name)) {
                                                                echo $this->patient_model->getPatientById($appointment->patient_id)->name;
                                                            }
                                                        ?>
                                                        </td>
                                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                                        <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                                            <td><a class="fa fa-check-square btn btn-success" href="appointment/approvAppointmentByDoctor?schedule_id=<?php echo $appointment->schedule_id; ?>">  Approve</a>
                                                                <a href="schedule/cancelAppointment?schedule_id=<?php echo $appointment->schedule_id; ?>">cancelAppointment</a>
                                                            </td>
                                                        <?php } ?>
                                                        <?php if ($this->ion_auth->in_group('receptionist')) { ?>
                                                            <td><a class="fa fa-check-square btn btn-success" href="appointment/approvAppointmentByReceptionist?schedule_id=<?php echo $appointment->schedule_id; ?>">  Approve</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php } ?>

                <?php if ($this->ion_auth->in_group('patient')) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="box-header">
                                        <h2 class="box-title">Upcoming Appointments</h2>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($comingAppointments as $appointment) {
                                                if ($appointment->status == 'Approved') {
                                                    ?>
                                                    <tr>
                                                        <td><?php
                                                            $date = date_create($appointment->available_date);
                                                            echo date_format($date, "d-m-Y");
                                                            ?></td>
                                                        <td><?php echo $appointment->start_time; ?></td>
                                                        <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
                                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="box-header">
                                        <h2 class="box-title">Pending Appointments</h2>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <?php if (!$this->ion_auth->in_group('patient')) { ?>
                                            <th>Action</th>
                                        <?php } ?>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($appointments as $appointment) {
                                                if ($appointment->status == 'Pending') {
                                                    ?>
                                                    <tr>
                <!--                                        <td><?php echo date($settings->date_format, $appointment->date); ?> - <?php echo $appointment->s_time; ?></td>-->
                                                        <td><?php
                                                            $date = date_create($appointment->available_date);
                                                            echo date_format($date, "d-m-Y");
                                                            ?></td>
                                                        <td><?php echo $appointment->start_time; ?></td>
                                                        <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
                                                        <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                                        <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                                            <td><a class="fa fa-check-square btn btn-success" href="appointment/approvAppointmentByDoctor?schedule_id=<?php echo $appointment->schedule_id; ?>">  Approve</a></td>
                                                        <?php } ?>
                                                        <?php if ($this->ion_auth->in_group('receptionist')) { ?>
                                                            <td><a class="fa fa-check-square btn btn-success" href="appointment/approvAppointmentByReceptionist?schedule_id=<?php echo $appointment->schedule_id; ?>">  Approve</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php } ?>
            </section>
            <!-- /.content -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>                                        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                <?php 
                    if($popup_appointments){
                        $x =count($popup_appointments);
                        $y='<ul>';
                        foreach ($popup_appointments as $appointments ) {
                            $y=$y.'<li>';
                            $y=$y.'you have an appointment with '.$appointments->name.' on '.$appointments->available_date.' at '.$appointments->start_time;
                            $y=$y.'</li>';
                        }
                        $y=$y.'</ul>';
                    ?>
                        
                    
                Swal.fire({
                icon: 'success',
                title: 'You have <?=$x?> appointment in next 3 days',
                html: '<?=$y?>',
            })

                <?php }?>


                $(".flashmessage").delay(3000).fadeOut(100);
            });
        </script>
    </body>
</html>
