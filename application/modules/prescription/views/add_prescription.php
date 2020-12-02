<!-- Start Code to get Doctor Id -->
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
    <!-- End Code to get Doctor Id -->
<div class="content-wrapper"> 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Prescription</h3>
                    </div>
                    <!-- Start Code to get Doctor Id -->
                    
                    <!-- End Code to get Doctor Id -->
                    <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <input type="hidden" name="doctor" id="exampleInputEmail1" value='<?php
                                if (!empty($doctor_id)) {
                                    echo $doctor_id;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" name="date" class="form-control" id="exampleInputEmail1" placeholder="name" value="<?php
                                if (!empty($prescription->date)) {
                                    echo $prescription->date;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Patient</label>
                                <select class="form-control m-bot15" name="patient" value=''>
                                    <?php foreach ($patients as $patient) { ?>
                                        <option value="<?php echo $patient->id; ?>" <?php
                                        if (!empty($prescription->id)) {
                                            if ($patient->id == $prescription->id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $patient->name; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Case History</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                                    <textarea class="textarea" name="history" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="">
                                        <?php
                                        if (!empty($prescription->history)) {
                                            echo $prescription->history;
                                        }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Medication</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea class="textarea" name="medication" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="">
                                        <?php
                                        if (!empty($prescription->medication)) {
                                            echo $prescription->medication;
                                        }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Note</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                                    <textarea class="textarea" name="note" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="">
                                        <?php
                                        if (!empty($prescription->note)) {
                                            echo $prescription->note;
                                        }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($prescription->id)) {
                                echo $prescription->id;
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
    