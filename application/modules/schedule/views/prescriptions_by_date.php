<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Date wise report</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($prescriptions as $prescription) {
                            $all_dates[] = $prescription->date;
                        }

                        $all_dates = array_unique($all_dates);
                        ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Date</th>
                            <th>Total Count</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($all_dates as $date) { ?>
                                    <tr>
                                        <td><?php echo $date; ?></td>
                                        <td><?php
                                            $this->db->where('date', $date);
                                            $this->db->from("new_prescription");
                                            echo '<b>' . $this->db->count_all_results() . '</b> ';
                                            ?> Data Found
                                        </td>

                                        <td>
                                            <a type="button" class="btn bg-maroon dateDetails" data-toggle="modal" data-id="<?php echo $date; ?>">View Details</a>
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
<!-- /.content-wrapper --> 
<!-- date wise data show modal [for view details button] -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>Date wise data</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient Id</th>
                            <th>Patient Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="viewData">

                    </tbody>
                </table>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /date wise data show modal [for view details button] -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".dateDetails").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var date = $(this).attr('data-id');
            //var employeee = $(this).attr('employee-id');
            //var date_from = $(this).attr('date_from-id');
            //var date_to = $(this).attr('date_to-id');
            $('.viewData').html("");
            $('#modal').modal('show');
            $.ajax({
                url: 'schedule/dateWisePrescription?date=' + date,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var all_prescriptions = response.allDateWisePrescription;
                $.each(all_prescriptions, function (key, value) {
                    var $tr = $('<tr>').append(
                            $('<td>').text(value.date),
                            $('<td>').text(value.patient_id),
                            $('<td>').text(value.patient_id),
                            $('<td><strong>').text(value.status),
                            $('<td>').html('<a href="schedule/viewPrescription?id=' + value.id +'" target="_blank">View</a>')
                            );
                    $(".viewData").append($tr);
                });
            });
        });
    });
</script>