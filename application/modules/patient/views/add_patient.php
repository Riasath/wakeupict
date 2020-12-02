<div class="content-wrapper">    
    <!-- Main content -->
    <section class="content"> 
        <div class="row">
            <!-- left column -->
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Patient</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="patient/addNewPatient" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--=========================================================================================-->
                        <div class="form-group" row>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Assessment: </label>
                                    <input type="date" name="assessment_date " class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">HF ID</label>
                                    <input type="text" name="hf_id" class="form-control" id="exampleInputEmail1" placeholder="HF ID" value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">MR No.</label>
                                    <input type="text" name="mr_no" class="form-control" id="exampleInputEmail1" placeholder="MR No." value='<?php
                                    if (!empty($patient->name)) {
                                        echo $patient->name;
                                    }
                                    ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Patient Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value='<?php
                                if (!empty($patient->name)) {
                                    echo $patient->name;
                                }
                                ?>' required>
                            </div>
                            <div class="form-group">
                                <label for="">Sex</label>
                                <select class="form-control js-example-basic-single"  name="sex" value='' required>
                                    <option value="" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Select Sex') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> selected disabled> Select Sex </option>
                                    <option value="Male" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Male') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Male</option>
                                    <option value="Female" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Female') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Female</option>
                                    <option value="Others" <?php
                                    if (!empty($patient->sex)) {
                                        if ($patient->sex == 'Others') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Highest Education Level</label>
                                <select class="form-control js-example-basic-single"  name="highest_education_level" value=''>
                                    <option value="" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'Highest Education Level') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> selected disabled> Select Highest Education Level </option>
                                    <option value="Secondary" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'Secondary') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Secondary</option>
                                    <option value="College" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'College') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >College</option>
                                    <option value="Diploma" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'Diploma') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Diploma</option>
                                    <option value="Graduate" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'Graduate') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Graduate</option>
                                    <option value="Post Graduate" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'Post Graduate') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Post Graduate</option>
                                    <option value="None" <?php
                                    if (!empty($patient->highest_education_level)) {
                                        if ($patient->highest_education_level == 'None') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >None</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='<?php
                                if (!empty($patient->address)) {
                                    echo $patient->address;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Monthly Income</label>
                                <input type="text" name="monthly_income" class="form-control" id="exampleInputEmail1" placeholder="Monthly Income" value='<?php
                                if (!empty($patient->monthly_income)) {
                                    echo $patient->monthly_income;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No of Children</label>
                                <input type="text" name="no_of_children" class="form-control" id="exampleInputEmail1" placeholder="No of Children" value='<?php
                                if (!empty($patient->no_of_children)) {
                                    echo $patient->no_of_children;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Menstrual History</label>
                                <input type="text" name="menstrual_history" class="form-control" id="exampleInputEmail1" placeholder="Menstrual History" value='<?php
                                if (!empty($patient->menstrual_history)) {
                                    echo $patient->menstrual_history;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Phone No</label>
                                <input type="text" name="caregiver_phone_no" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Phone No" value='<?php
                                if (!empty($patient->caregiver_phone_no)) {
                                    echo $patient->caregiver_phone_no;
                                }
                                ?>' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='<?php
                                if (!empty($patient->email)) {
                                    echo $patient->email;
                                }
                                ?>' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>              
                        </div>
                        <!--=========================================================================================-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Visit Type</label>
                                <select class="form-control js-example-basic-single"  name="visit_type" value=''>
                                    <option value="" <?php
                                    if (!empty($patient->visit_type)) {
                                        if ($patient->visit_type == 'Visit Type') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> selected disabled> Select Visit Type </option>
                                    <option value="Inpatient" <?php
                                    if (!empty($patient->visit_type)) {
                                        if ($patient->visit_type == 'Inpatient') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Inpatient</option>
                                    <option value="Outpatient" <?php
                                    if (!empty($patient->visit_type)) {
                                        if ($patient->visit_type == 'Outpatient') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Outpatient</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="" value='<?php
                                if (!empty($patient->birth_date)) {
                                    echo $patient->birth_date;
                                }
                                ?>' required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='<?php
                                if (!empty($patient->phone)) {
                                    echo $patient->phone;
                                }
                                ?>' required>
                            </div>   
                            <div class="form-group">
                                <label for="exampleInputEmail1">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="exampleInputEmail1" placeholder="Occupation" value='<?php
                                if (!empty($patient->occupation)) {
                                    echo $patient->occupation;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select class="form-control js-example-basic-single"  name="marital_status" value=''>
                                    <option value="" <?php
                                    if (!empty($patient->marital_Status)) {
                                        if ($patient->marital_Status == 'Marital Status') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> selected disabled> Select Marital Status </option>
                                    <option value="Married" <?php
                                    if (!empty($patient->marital_Status)) {
                                        if ($patient->marital_Status == 'Married') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Married</option>
                                    <option value="Unmarried" <?php
                                    if (!empty($patient->marital_Status)) {
                                        if ($patient->marital_Status == 'Unmarried') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >Unmarried</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Blood Group</label>
                                <select class="form-control js-example-basic-single"  name="blood_group" value='' >
                                    <option value="" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'Select Blood Group') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> selected disabled> Select Blood Group </option>
                                    <option value="A+" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'A+') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >A+</option>
                                    <option value="A-" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'A-') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >A-</option>
                                    <option value="B+" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'B+') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >B+</option>
                                    <option value="B-" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'B-') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >B-</option>
                                    <option value="AB+" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'AB+') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >AB+</option>
                                    <option value="AB-" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'AB-') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >AB-</option>
                                    <option value="O+" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'O+') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >O+</option>
                                    <option value="O-" <?php
                                    if (!empty($patient->blood_group)) {
                                        if ($patient->blood_group == 'O-') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> >O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Caregiver Name & Relation</label>
                                <input type="text" name="caregiver_name_relation" class="form-control" id="exampleInputEmail1" placeholder="Caregiver Name & Relation" value='<?php
                                if (!empty($patient->caregiver_name_relation)) {
                                    echo $patient->caregiver_name_relation;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pt Height (in cm)</label>
                                <input type="text" name="height" class="form-control" id="exampleInputEmail1" placeholder="Pt Height (in cm)" value='<?php
                                if (!empty($patient->height)) {
                                    echo $patient->height;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" value='<?php
                                if (!empty($patient->password)) {
                                    echo $patient->password;
                                }
                                ?>' required>
                            </div>  

                            <input type="hidden" name="id" value='<?php
                            if (!empty($patient->id)) {
                                echo $patient->id;
                            }
                            ?>'>
                        </div>
                    </div>
                    <div class="box-footer ml-3 p-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
</div>
</section>
</div>