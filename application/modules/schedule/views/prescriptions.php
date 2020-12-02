<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Prescriptions</h3>
                        <?php if (!$this->ion_auth->in_group(array('patient'))) { ?>
                        <a data-toggle="modal" href="schedule/addPrescriptionView">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Prescription 
                                </button>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Prescription Code</th>
                            <th>Patient Id</th>
                            <th>Patient Name</th>
                            <?php if ($this->ion_auth->in_group(array('patient'))) { ?>
                            <th>Doctor Name</th>
                            <?php } ?>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($prescriptions as $prescription) { ?>
                                    <tr>
                                        <td><?php echo $prescription->payroll_code; ?></td>
                                        <td><?php echo $prescription->patient_id; ?></td>
                                        <td><?php echo $this->patient_model->getPatientById($prescription->patient_id)->name; ?></td>
                                        <?php if ($this->ion_auth->in_group(array('patient'))) { ?>
                                        <td><?php echo $this->doctor_model->getDoctorById($prescription->doctor_id)->name; ?></td>
                                        <?php } ?>
                                        <td><?php echo $prescription->date; ?></td>
                                        <td><?php echo $prescription->status; ?></td>
                                        <td>
                                            <?php if ($this->ion_auth->in_group(array('patient'))) { ?>
                                            <a href="schedule/viewPrescription?id=<?php echo $prescription->id; ?>" type="button" class="btn btn-info">View</a>
                                            <?php } ?>
                                            <?php if (!$this->ion_auth->in_group(array('patient'))) { ?>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Actions</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                <li><a href="schedule/emailPrescription?id=<?php echo $prescription->id; ?>">Email</a></li>
                                                    <li><a href="schedule/viewPrescription?id=<?php echo $prescription->id; ?>">View</a></li>
                                                    <li><a href="schedule/editPrescription?id=<?php echo $prescription->id; ?>">Edit</a></li>
                                                    <li><a href="schedule/deletePrescription?id=<?php echo $prescription->id; ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                            <?php } ?>
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
