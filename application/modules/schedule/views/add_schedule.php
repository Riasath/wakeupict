<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add schedule</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="schedule/create" method="post" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Doctor</label>
                                <select class="form-control m-bot15 " name="doctor_id" value=''>  
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

                            <div class="form-group">
                                <label for="exampleInputEmail1">Available Date</label>
                                <input type="date" name="available_date" class="form-control" id="exampleInputEmail1" placeholder="Date" value='<?php
                                if (!empty($schedule->date)) {
                                    echo $schedule->date;
                                }
                                ?>'>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Available Time</label>
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" placeholder="Time" value='<?php
                                        if (!empty($schedule->time)) {
                                            echo $schedule->time;
                                        }
                                        ?>'>
                                    </div>
                                    <div class="col-md-2"> to 
                                        </div>
                                    <div class="col-md-5">
                                        <input type="time" name="end_time" class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                        if (!empty($schedule->time)) {
                                            echo $schedule->time;
                                        }
                                        ?>'>
                                    </div>
                                </div> </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Per Patient Time</label>
                                <input type="number" name="per_patient_time" class="form-control" id="exampleInputEmail1" placeholder="time" value='<?php
                                if (!empty($schedule->date)) {
                                    echo $schedule->date;
                                }
                                ?>'>
                            </div>

                            <input type="hidden" name="schedule_id" value='<?php
                            if (!empty($schedule->schedule_id)) {
                                echo $schedule->schedule_id;
                            }
                            ?>'>
                            

                        </div>    
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>