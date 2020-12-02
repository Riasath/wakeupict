
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header">
                        <a href="d_medicine/overPhoneInfo">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Over The Phone Information 
                                </button>
                            </div>
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Problem</th>
                            <th>Solution</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($medicines as $medicine) { ?>
                                    <tr>
                                        <td><?php echo $this->patient_model->getPatientById($medicine->patient_id)->name; ?></td>
                                        <td><?php echo $medicine->f_date; ?></td>
                                        <td><?php echo $medicine->time; ?></td>                                       
                                        <td><?php echo $medicine->problem; ?></td>                                       
                                        <td><?php echo $medicine->solution; ?></td>                                       
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Actions</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="d_medicine/deleteoverPhoneInfo?id=<?php echo $medicine->id; ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
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
<!-- /.content-wrapper --> 
