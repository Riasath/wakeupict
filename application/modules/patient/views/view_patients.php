<div class="content-wrapper">
    <section class="content"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Patients</h2>
                    </div>
                    <div class="box-header">
                        <a data-toggle="modal" href="#myModal"><button type="button" class="btn btn-info pull-right">Add New Patient</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Patient Name</th>
                                    <th>Email address</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($patients as $patient) { ?>
                                    <tr>
                                        <td><img src="<?php echo $patient->img_url; ?>" class="img-circle" width="40px" height="40px"></td>
                                        <td><?php echo $patient->name; ?></td>
                                        <td><?php echo $patient->email; ?></td>
                                        <td>

                                            <!--                                            <div class="btn-group">
                                                                                            <button type="button" class="btn btn-info">Action</button>
                                                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                                                <span class="caret"></span>
                                                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                                            </button>
                                                                                            <ul class="dropdown-menu" role="menu">
                                                                                                <li> <a type="button" class="editbutton" data-toggle="modal" data-id="<?php echo $patient->id; ?>">Edit</a>
                                                                                                <li class="divider"></li>
                                                                                                <li><a href="patient/delete?id=<?php echo $patient->id; ?>">Delete</a></li>
                                                                                            </ul>
                                                                                        </div>-->
                                            <a href="patient/delete?id=<?php echo $patient->id; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            <a href="patient/editPatient?id=<?php echo $patient->id; ?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
<!--                                            <a href="patient/patientDeteils?id=<?php echo $patient->id; ?>"><button class="btn btn-info"><i class="fa fa-info"></i></button></a>-->
                                            <a href="patient/viewDetailByPatientId?id=<?php echo $patient->id; ?>"><button class="btn btn-success"><i class="fa fa-info"></i></button></a>
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

