<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Schedule List</h3>
                        <a href="schedule/appointmentIndex">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Appointment 
                                </button>
                            </div>
                        </a>

                        <a href="schedule/AddScheduleView">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-success pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Schedule 
                                </button>
                            </div>
                        </a>

                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button>
                                        <button type="button" class="btn btn-success btn-xs checkall">Select All</button>
                                    </th>
                                    <th>Doctor</th>
                                    <th>Available Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($schedules as $schedule) { ?>
                                    <tr class="all_remove">
                                        <td><input type="checkbox" class="delete_checkbox" name="delete[]" value="<?php echo $schedule->schedule_id; ?>" />
                                        </td>
                                        <td><?php echo $this->doctor_model->getDoctorById($schedule->doctor_id)->name; ?></td>
                                        <td><?php
                                            $date = date_create($schedule->available_date);
                                            echo date_format($date, "d-m-Y");
                                            ?></td>
                                        <td><?php echo $schedule->start_time; ?></td>
                                        <td><?php echo $schedule->end_time; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li> <a href="schedule/editSchedule?id=<?php echo $schedule->schedule_id; ?>">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="schedule/delete?id=<?php echo $schedule->schedule_id; ?>">Delete</a></li>
                                                </ul>
                                            </div>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

<script>
    $(document).ready(function () {

        $('.delete_checkbox').click(function () {
            if ($(this).is(':checked'))
            {
                $(this).closest('tr').addClass('removeRow');
            } else
            {
                $(this).closest('tr').removeClass('removeRow');
            }
        });

        $('.checkall').click(function () {
            if ($('.delete_checkbox').is(':checked')) {
                $('.all_remove').addClass('removeRow');
            } else {
                $('.all_remove').removeClass('removeRow');
            }
        });

        $('#delete_all').click(function () {
            var checkbox = $('.delete_checkbox:checked');
            if (checkbox.length > 0)
            {
                var checkbox_value = [];
                $(checkbox).each(function () {
                    checkbox_value.push($(this).val());
                });
                $.ajax({
                    url: "<?php echo base_url(); ?>schedule/delete_all",
                    method: "POST",
                    data: {checkbox_value: checkbox_value},
                    success: function ()
                    {
                        $('.removeRow').fadeOut(1500);
                    }
                })
            } else
            {
                alert('Select atleast one records');
            }
        });

    });
    var clicked = false;
    $(".checkall").on("click", function () {
        $(".delete_checkbox").prop("checked", !clicked);
        clicked = !clicked;
        this.innerHTML = clicked ? 'Deselect All' : 'Select All';
    });
</script>


