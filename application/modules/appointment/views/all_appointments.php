<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">All Appointments</h2>
                        <a href="schedule/appointmentIndex">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Appointment 
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 panel-body no-print">
                        <div class="col-md-12"> 
                            <form role="form" class="f_report" action="appointment/appointmentFilter" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <div class="input-group input-large">
                                            <span class="input-group-addon"><strong>filter</strong></span>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="date_from" class="form-control pull-right"  value="<?php
                                            if (!empty($from)) {
                                                echo $from;
                                            }
                                            ?>" placeholder="Date from" onchange="if (this.value != '0')
                                                        this.form.submit()">
                                            <span class="input-group-addon">to</span>
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" class="form-control pull-right" name="date_to"  value="<?php
                                            if (!empty($to)) {
                                                echo $to;
                                            }
                                            ?>" placeholder="Date to" onchange="if (this.value != '0')
                                                        this.form.submit()">
                                            <span class="input-group-addon">by</span>
                                            <select class="form-control m-bot15" name="doctor" onchange="if (this.value != '0')
                                                        this.form.submit()">  
<!--                                                    <option value=""><?php echo lang('select'); ?> .....</option>-->
                                                <?php foreach ($doctors as $doctor) { ?>
                                                    <option value="<?php echo $doctor->id; ?>"<?php ?>><?php echo $doctor->name; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if (!empty($from)) { ?>
                                        <a class="btn btn-success btn-sm" href="appointment/showAppointment">Cancel Filter</a>
                                    <?php } ?>
                                    <div class="col-md-2 no-print">
                                        <!--                                            <button type="submit" name="submit" class="btn btn-info range_submit">Filter</button>-->
                                    </div>
                                </div>
                            </form>
                        </div> </div>

                    <?php
                    if (!empty($appointments)) {
                        $paid_number = 0;
                        foreach ($appointments as $appointment) {
                            $paid_number = $paid_number + 1;
                        }
                    }
                    ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Status</th>
                            <?php if (!$this->ion_auth->in_group(array('patient'))) { ?>
                                <th>Action</th>
                            <?php } ?>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($appointments as $appointment) {
                                    if ($appointment->status == 'Approved') {
                                        ?>
                                        <tr>
                                            <td><?php echo $appointment->available_date; ?></td>
                                            <td><?php echo $appointment->start_time; ?></td>
                                            <td>
                                                <?php
                                                $p_name = $this->db->get_where('patient', array('id' => $appointment->patient_id))->row();
                                                if (!empty($p_name)) {
                                                    echo $this->patient_model->getPatientById($appointment->patient_id)->name;
                                                } else {
                                                    echo '<span class="btn btn-danger btn-xs btn_width""> No data found</span>';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $this->doctor_model->getDoctorById($appointment->doctor_id)->name; ?></td>
                                            <td>
                                                <?php
                                                date_default_timezone_set("Asia/Dhaka");
                                                $date = date("Y-m-d");
                                                if ($appointment->available_date >= $date) {
                                                    echo "Upcoming";
                                                } else {
                                                    echo $appointment->status;
                                                }
                                                ?>
                                            </td>
                                            <?php if (!$this->ion_auth->in_group(array('patient'))) { ?>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">Actions</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li> <a type="button" class="editAppointment" data-toggle="modal" data-id="<?php echo $appointment->schedule_id; ?>">Edit</a></li>
                                                            <li><a href="schedule/cancelAppointment?schedule_id=<?php echo $appointment->schedule_id; ?>">cancelAppointment</a></li>
                                                            <li><a href="appointment/deleteAppointment?id=<?php echo $appointment->schedule_id; ?>">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
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
