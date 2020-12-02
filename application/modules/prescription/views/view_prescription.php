<div class="content-wrapper"> 
    <section class="invoice col-md-8">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Murad Hospital
                    <small class="pull-right">Date: <?php echo ($prescription->date); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <?php $patient = $this->patient_model->getPatientById($prescription->patient); ?>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Patient Info</strong><br>
                    <b> Patient Name:</b> <?php echo $patient->name ?> <br>
                    <b>Age:</b> <?php echo $patient->age ?><br>
                    <b>Phone:</b> <?php echo $patient->phone ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div>
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Doctor Info</strong><br>
                    <b>Doctor Name:</b> <br>
                    <b>Phone:</b>
                </address>
            </div>
        </div>
        <!-- /.row -->
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>History</td>
                            <td class=""><?php echo $prescription->history; ?> </td>
                        </tr>
                        <tr>
                            <td>Medication </td>
                            <td class=""><?php echo $prescription->medication; ?> </td>
                        </tr>
                        <tr>
                            <td>Note </td>
                            <td class=""><?php echo $prescription->note; ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>