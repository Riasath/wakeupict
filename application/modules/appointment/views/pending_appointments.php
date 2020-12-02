<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Pending Appointments</h2>
                        <a href="schedule/appointmentIndex">
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
                            <?php if ($this->ion_auth->in_group('patient')) { ?>
                                <th>Status</th>
                            <?php } ?>
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
                                            <td><?php echo $appointment->available_date; ?></td>
                                            <td><?php echo $appointment->start_time; ?></td>
                                            <td><?php echo $this->patient_model->getPatientById($appointment->patient_id)->name; ?></td>
                                            <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                            <?php if ($this->ion_auth->in_group('patient')) { ?>
                                            <td><?php echo $appointment->status; ?></td>
                                            <?php } ?>
                                            <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                                <td><a class="fa fa-check-square btn btn-success" href="appointment/approvAppointmentByDoctor?schedule_id=<?php echo $appointment->schedule_id; ?>&patient_id=<?php echo $appointment->patient_id; ?>">  Approve</a></td>
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
            </div>
        </div>
    </section>
</div>