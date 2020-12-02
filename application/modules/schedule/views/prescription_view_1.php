<div class="content-wrapper">
    <section class="invoice">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <u>Doctor</u>
                <address>
                    <strong><?php echo $this->doctor_model->getDoctorById($prescription->doctor_id)->name; ?></strong><br>
                    MBBS, D-Card, MD-Card <br> 
                    Chief Consultant, Cardiology 
                    <br> United Hospital Limited
                    <br> BMDC Reg. No. A-12492 <br>
                    <b>momenuz.zaman@uhlbd.com</b>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                <u>Patient</u>
                <address>
                    <strong><?php echo $this->patient_model->getPatientById($prescription->patient_id)->name; ?></strong><br>
                    <?php echo $this->patient_model->getPatientById($prescription->patient_id)->address; ?><br>
                    <?php echo $this->patient_model->getPatientById($prescription->patient_id)->phone; ?>
                </address>
            </div>
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
        <table class="table table-bordered bg-danger">
            <tr class="table-warning" style="font-size: large;">
                <td>Date: <?php echo $prescription->date; ?> </td>
                <td>Name: <?php echo $this->patient_model->getPatientById($prescription->patient_id)->name; ?></td>
                <td>Age: 
                    <?php
                    $bday = new DateTime($this->patient_model->getPatientById($prescription->patient_id)->birth_date); // Your date of birth
                    $today = date_create($prescription->date);
                    $diff = $today->diff($bday);
                    echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                    ?>
                </td>
                <td>Sex: <?php echo $this->patient_model->getPatientById($prescription->patient_id)->sex; ?></td>
            </tr>
            <tr>
                <td colspan="1">Diagnosis:</td>
                <td colspan="3"><?php echo $prescription->diagnosis; ?></td>
            </tr>
            <tr>
                <td colspan="1">Chief Complaints:</td>
                <td colspan="3"><?php echo $prescription->chief_complaints; ?></td>
            </tr>

        </table>
        <div class="row">
            <div class="col-xs-3 table-responsive bg-warning">
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

            <div class="col-xs-6 table-responsive">
                <div class="bg-success">
                    <label for="exampleInputEmail1" style="font-size: large;">Rx</label>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Medicine</th>
                                <th>Type</th>
                                <th>Comments</th>
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
                                        <?php echo $deduction->duration; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="py-5">
                    <div class="my-5">
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">পানি প্রতিদিন (24 ঘন্টা)
<!--                                <input class="" type="number" id="inlineFormCheck" name="daily_water">-->
                                <?php echo $prescription->daily_water; ?> 
                                লিটার
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">
                                <?php if (!empty($prescription->extra_salt)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> 
                                ভাতে বাড়তি লবণ খাবেন না : 
<!--                                <input class="" type="checkbox" id="inlineFormCheck" name="extra_salt" value="yes">-->
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">
                                <?php if (!empty($prescription->saline)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> 
                                অপ্রয়োজনে খাবার স্যালাইন খাবেন না : 
<!--                                <input class="" type="checkbox" id="inlineFormCheck" name="saline" value="yes">-->
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">
                                <?php if (!empty($prescription->borhani)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> 
                                বোরহানি লবণ বা মিষ্টি পানি খাবেন না : 
<!--                                <input class="" type="checkbox" id="inlineFormCheck" name="borhani" value="yes">-->
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">
                                <?php if (!empty($prescription->chips)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> 
                                চিপস চানাচুর পনির খাবেন না : 
<!--                                <input class="" type="checkbox" id="inlineFormCheck" name="chips" value="yes">-->
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">
                                টিকা নিবেন : 
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp; <?php if (!empty($prescription->influenza)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?>  ইনফ্লুয়েঞ্জা
<!--                                <input class="" type="checkbox" id="inlineFormCheck" name="influenza" value="Influenza"> -->
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp; <?php if (!empty($prescription->pneumonia)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> নিউমোনিয়া
 <!--                                <input class="" type="checkbox" id="inlineFormCheck" name="pneumonia" value="Pneumonia">-->
                            </label>
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                            <label class="form-check-label" for="inlineFormCheck">পরবর্তী সাক্ষাৎকার
                                <input class="" type="text" id="inlineFormCheck" name="next_appointment" value="<?php echo $prescription->next_appointment; ?>"> <?php if (!empty($prescription->week)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?>  সপ্তাহ / <?php if (!empty($prescription->month)) echo "<span class='text-success'><i class='fa fa-check'></i></span>"; ?> মাস
                                পর
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <p>over phone is between caller follow up: </p>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Problem</th>
                                        <th scope="col">Solution </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($phones as $phone) { ?>
                                        <tr>
                                            <td><?php echo $phone->f_date; ?></td>
                                            <td><?php echo $phone->time; ?></td>                                       
                                            <td><?php echo $phone->problem; ?></td>                                       
                                            <td><?php echo $phone->solution; ?></td>
                                        </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="">
                        <div>
                            <img src="../uploads/heart.jpg" alt="Heart Image" height="350px">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" readonly><?php echo $prescription->comment; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <?php //} ?>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row pull-right no-print">
            <div class="col-xs-12">
                <button onclick="window.print()">Print this page</button>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>