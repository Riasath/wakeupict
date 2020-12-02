
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Over phone is between follow up:</h3>
                    </div>
                    <div class="box-body">
                        <form action="d_medicine/addOverPhoneInfoView" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Select Patient</label>
                                    <div class="col-sm-9">
                                        <select class="form-control m-bot15 js-example-basic-single" name="patient_id" onchange="if (this.value != '0')
                                                    this.form.submit()">
                                            <option value="">Select Patient</option>
                                            <?php foreach ($patients as $patient) { ?>
                                                <option value="<?php echo $patient->id; ?>" <?php
                                                if (!empty($patient_id)) {
                                                    if ($patient_id == $patient->id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> ><?php echo $patient->name; ?> </option>
                                                    <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="display: none">Submit</button>
                            </div>
                        </form>
                    </div>
                    <?php if (!empty($patient_id)) { ?>
                        <form role="form" action="d_medicine/overPhoneNewInfo" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <table class="table table-bordered  bg-warning">
                                        <tr style="font-size: large;">
                                        <input type="hidden" name="patient_id" value='<?php echo $patient_id; ?>'>
                                        <td> <strong>Patient Id: </strong><?php echo $patient_id; ?></td>
                                        <td><strong>Patient Name: </strong><?php echo $this->patient_model->getPatientById($patient_id)->name; ?></td>
                                        <td><strong>Age:</strong> 
                                            <?php
                                            $bday = new DateTime($this->patient_model->getPatientById($patient_id)->birth_date); // Your date of birth
                                            $today = new Datetime(date('m.d.y'));
                                            $diff = $today->diff($bday);
                                            echo $diff->y . " years, " . $diff->m . " monts, " . $diff->d . " days";
                                            ?>
                                        </td>
                                        <td><strong>Sex:</strong> <?php echo $this->patient_model->getPatientById($patient_id)->sex; ?></td>
                                        <td>
                                            
                                        </td>
                                        </tr>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-md-8">

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
                                            <tr>
                                                <td><input class="" type="date" name="f_date"></td>
                                                <td><input class="" type="time" name="time"></td>
                                                <td><input class="" type="text" name="problem"></td>
                                                <td><input class="" type="text" name="solution"></td>
                                            </tr>         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>