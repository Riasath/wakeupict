<div class="content-wrapper">
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h3 class="page-header">
                    <center>All Priscription for <strong><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></strong></center>
                </h3>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Doctor
                <address>
                    <strong><?php echo $this->doctor_model->getDoctorById($doctor_id)->name; ?></strong><br>
                    MBBS, D-Card, MD-Card <br> 
                    Chief Consultant, Cardiology 
                    <br> United Hospital Limited
                    <br> BMDC Reg. No. A-12492 <br>
                    <b>momenuz.zaman@uhlbd.com</b>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Patient
                <address>
                    <strong><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></strong><br>
                    <?php echo $this->patient_model->getPatientById($patient_id)->address; ?><br>
                    <?php echo $this->patient_model->getPatientById($patient_id)->phone; ?>
                </address>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <img src="uploads/united-logo.png" alt="united-logo" width="70" height="50"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="text-danger">Hotline: 10666</b><br>
                Plot 15, Road 71, Gulshan</b><br>
                Dhaka 1212, Bangladesh</b><br>
                Appointment Desk: 9852466</b><br> 
                PABX: 8836000, 8836444</b><br>
                Cell: 01941 001142, 01712 060050</b><br>
<!--                <b>www.uhlbd.com</b><br>-->
            </div>
        </div>

        <?php
        $visit_no = 1;
        foreach ($prescriptions as $prescription) {
            ?>
            <table class="table table-bordered bg-danger">
                <tr class="table-warning" style="font-size: large;">
                    <td>Visit No.:  <?php echo $visit_no++; ?> </td>
                    <td>Date: <?php echo $prescription->date; ?> </td>
                    <td>Name: <?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
                    <td>Age: 
                        <?php
                        $bday = new DateTime($this->patient_model->getPatientById($patient_id)->birth_date); // Your date of birth
                        $today = date_create($prescription->date);
                        $diff = $today->diff($bday);
                        echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                        ?>
                    </td>
                    <td>Sex: <?php echo $this->patient_model->getPatientById($patient_id)->sex; ?></td>
                </tr>
                <tr>
                    <td colspan="1">Diagnosis:</td>
                    <td colspan="4"><?php echo $prescription->diagnosis; ?></td>
                </tr>
                <tr>
                    <td colspan="1">Chief Complaints:</td>
                    <td colspan="4"><?php echo $prescription->chief_complaints; ?></td>
                </tr>

            </table>
            <div class="row">
                <div class="col-xs-3 table-responsive bg-warning no-print">
                    <h4>Signs & Symptoms</h4>
                    <?php
                    if (!empty($prescription->signs_symptoms)) {
                        $signs_symptoms = json_decode($prescription->signs_symptoms);
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th style="padding:0px; margin:0px;">Name</th>
                                <th style="padding:0px; margin:0px;">Value</th>
                            </tr>
                            <?php foreach ($signs_symptoms as $titel => $value) { ?>
                                <tr>
                                    <td style="padding:0px; margin:0px;"><?php echo $titel; ?></td>
                                    <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
                <div class="col-xs-3 table-responsive">
                    <h4>Physical Examination</h4>
                    <?php
                    if (!empty($prescription->physical_examination)) {
                        $physical_examination = json_decode($prescription->physical_examination);
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <th style="padding:0px; margin:0px;">Name</th>
                                <th style="padding:0px; margin:0px;">Value</th>
                            </tr>
                            <?php foreach ($physical_examination as $titel => $value) { ?>
                                <tr>
                                    <td style="padding:0px; margin:0px;"><?php echo $titel; ?></td>
                                    <td style="padding:0px; margin:0px;"> <?php echo $value; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>

                <div class="col-xs-6 table-responsive bg-success">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Medicine</th>
                                <th>Type</th>
                                <th>when</th>
                                <th>duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //$total_deduction = 0;
                            $deductions = json_decode($prescription->deductions);
                            $i = 1;
                            foreach ($deductions as $deduction) {
                                //$total_deduction += $deduction->amount;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td>
                                        <?php echo $deduction->type; ?>
                                    </td>
                                    <td>
                                        <?php echo $deduction->amount; ?>
                                    </td>
                                    <td>
                                        <?php echo $deduction->when; ?>
                                    </td>
                                    <td>
                                        <?php echo $deduction->duration; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
        <?php } ?>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
<!--                <p class="lead">Payment Methods:</p>
                <img src="../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>-->
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
<!--                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                        </tr>
                    </table>
                </div>-->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button onclick="window.print()">Print this page</button>
<!--                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>-->
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>