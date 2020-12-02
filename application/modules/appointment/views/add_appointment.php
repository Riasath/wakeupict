<div class="content-wrapper"> 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Appointment</h3>
                    </div>
                    <form role="form" action="appointment/addNewAppointment" method="post" enctype="multipart/form-data">
                        <div class="box-body ">

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Patient</label>
                                <select class="form-control m-bot15 " id="pos_select" name="patient" value=''> 
                                    <option value="">Select .....</option>

                                    <?php foreach ($patients as $patient) { ?>
                                        <option value="<?php echo $patient->id; ?>" <?php
                                        if (!empty($appointment->patient)) {
                                            if ($appointment->patient == $patient->id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> ><?php echo $patient->name; ?> </option>
                                            <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Doctor</label>
                                <select class="form-control m-bot15 " name="doctor" value=''>  
                                    <option value="">Select .....</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor->id; ?>"<?php
                                        if (!empty($appointment->doctor)) {
                                            if ($appointment->doctor == $doctor->id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo $doctor->name; ?> </option>
                                            <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="date" class="form-control pull-right" id="datepicker" value='<?php
                                    if (!empty($appointment->date)) {
                                        echo $appointment->date;
                                    }
                                    ?>'>
                                </div>
                            </div>

                            <div class="form-group bootstrap-timepicker col-md-6">
                                <label>Time</label>
                                <div class="input-group">
                                    <input type="text" name="s_time" class="form-control timepicker" value='<?php
                                    if (!empty($appointment->s_time)) {
                                        echo $appointment->s_time;
                                    }
                                    ?>'>
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="status" value='Approved'>
                            <input type="hidden" name="type" value='receptionist'>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($appointment->id)) {
                                echo $appointment->id;
                            }
                            ?>'>

                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-info"> submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
