
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('employee')) {
    $employee_id = $this->db->get_where('employee', array('ion_user_id' => $current_user))->row()->worker_id;
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="clearfix">
                        <div class="box-header">
                            <center><h1 class="box-title">Add Doctor's Schedule</h1> </center>
                        </div>
                        <div>
                    <form name="cart" role="form" action="schedule/AddNewSchedule" method="post" enctype="multipart/form-data">

                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Select Doctor</label>
                            <select class="form-control m-bot15 " name="doctor_id" value='' required>  
<!--                                <option value="">Select .....</option>-->
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
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Select Date</label>
                            <input type="date" name="available_date" class="form-control datepicker" placeholder="" value='' required>
                        </div>
                        <div class="box-body">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Start</th>
                                        <th>End</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='1'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:00"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="10:10" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='2'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:10"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="10:20" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='3'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:20"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="10:30" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='4'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:30"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="10:40" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='5'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:40"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="10:50" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='6'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="10:50"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:00" ></td>
                                </tr>
                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='7'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:00"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:10" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='8'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:10"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:20" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='9'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:20"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:30" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='10'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:30"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:40" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='11'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:40"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="11:50" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='12'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="11:50"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="12:00" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='13'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="12:30"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="12:40" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='14'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="12:40"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="12:50" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='15'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="12:50"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:00" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='16'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:00"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:10" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='17'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:10"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:20" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='18'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:20"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:30" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='19'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:30"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:40" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='20'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:40"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="01:50" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='21'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="01:50"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="02:00" ></td>
                                </tr>

                                <tr>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='22'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="02:00"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="02:10" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='23'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="02:10"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="02:20" ></td>
                                <input type="hidden" name="sl_no[]" class="form-control datepicker" value='24'>
                                <td><input type="text" name="start_time[]" class="Time1 time" value="02:20"></td>
                                <td><input type="text" name="end_time[]" class="Time2 time" value="02:30" ></td>
                                </tr>
                                </tbody>
                            </table>    
                            <input type="hidden" name="id" value=''>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>