<link rel="stylesheet" type="text/css" href="common/frontend/styles/contact.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>
<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">Appointment</div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$message = $this->session->flashdata('feedback');
if (!empty($message)) {
    ?>
    <div class="flashmessage pull-left msg"><i class="fa fa-check"></i> <?php echo $message; ?></div>
<?php }
?> 
<div class="contact">
    <div class="container">
        <!--        <div class="row">
        
                     Contact form 
                    <div class="col-lg-12 contact_col">
                        <div class="contact_form">
        <?php
        $message = $this->session->flashdata('feedback');
        if (!empty($message)) {
            ?>
                                        <div class="flashmessage pull-left msg"><i class="fa fa-check"></i> <?php echo $message; ?></div>
        <?php }
        ?> 
                            <div class="contact_title">Make an appointment</div>
                            <div class="contact_form_container">
        <?php echo validation_errors(); ?>
                                <form action="frontend/addNewAppointment" method="post" enctype="multipart/form-data" id="contact_form" class="contact_form"> 
                                    <input type="text" name="name" id="contact_input" class="contact_input" placeholder="Your Name">
                                    <input type="email" name="email" id="contact_email" class="contact_input" placeholder="Your E-mail" >
                                    <input type="text" name="phone" id="contact_input" class="contact_input" placeholder="Your Phone" >
                                    <input type="date" name="date" id="contact_email" class="contact_input" placeholder="Date" >
                                    <div class="form-group">
                                        <select class="contact_input" id="department" name="department" value=''> 
                                            <option value="">Select Department</option>
        <?php
        if (!empty($departmentss)) {
            foreach ($departmentss as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
        } else {
            echo '<option value="">Account not available</option>';
        }
        ?>
                                        </select>                           
                                    </div>
                                    <div class="form-group">
                                        <select class="contact_input" id="doctor" name="doctor" value=''> 
                                            <option value="">Select Department first</option>
                                        </select>
                                    </div>
                                    <textarea class="contact_input contact_textarea" name="message" id="contact_textarea" placeholder="Message" ></textarea>
                                    <button class="contact_button" type="submit" id="contact_button">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>-->
        <style>
            .msg {
                background-color: #32c69a;
                padding: 10px;
                color: white;
                font-size: 16px;
                margin-top: 3px;
            }
        </style>
        <!--Add new patient form -->
        <form class="" role="form" action="patient/addNewPatient" method="post" enctype="multipart/form-data">
            <div>
                <?php
                $r_message = $this->session->flashdata('feedback');
                if (!empty($r_message)) {
                    ?>
                    <div class="flashmessage msg"><i class="fa fa-check"></i> <?php echo $r_message; ?></div>
                <?php }
                ?>
            </div>
            <div class="contact_title py-3">Register yourself before take an Appointment</div>
            <div class="box-body">
                <div class="row p-2">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Patient Name</label>-->
                            <input type="text" name="name" class="contact_input" id="name" placeholder="Full Name" value='<?php
                            if (!empty($patient->name)) {
                                echo $patient->name;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="">Sex</label>-->
                            <select class="contact_input" id="form_fname"  name="sex" value='' required>
                                <option value="" <?php
                                if (!empty($patient->sex)) {
                                    if ($patient->sex == 'Select Sex') {
                                        echo 'selected';
                                    }
                                }
                                ?> > Select Sex </option>
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
                            <span class="error_form" id="fname_error_message"></span>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="">Highest Education Level</label>-->
                            <select class="contact_input"  name="highest_education_level" value='' required>
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
                            <!--                            <label for="exampleInputEmail1">Address</label>-->
                            <input type="text" name="address" class="contact_input" id="exampleInputEmail1" placeholder="Address" value='<?php
                            if (!empty($patient->address)) {
                                echo $patient->address;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Monthly Income</label>-->
                            <input type="text" name="monthly_income" class="contact_input" id="exampleInputEmail1" placeholder="Monthly Income" value='<?php
                            if (!empty($patient->monthly_income)) {
                                echo $patient->monthly_income;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">No of Children</label>-->
                            <input type="text" name="no_of_children" class="contact_input" id="exampleInputEmail1" placeholder="No of Children" value='<?php
                            if (!empty($patient->no_of_children)) {
                                echo $patient->no_of_children;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Menstrual History</label>-->
                            <input type="text" name="menstrual_history" class="contact_input" id="exampleInputEmail1" placeholder="Menstrual History" value='<?php
                            if (!empty($patient->menstrual_history)) {
                                echo $patient->menstrual_history;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Caregiver Phone No</label>-->
                            <input type="text" name="caregiver_phone_no" class="contact_input" id="exampleInputEmail1" placeholder="Caregiver Phone No" value='<?php
                            if (!empty($patient->caregiver_phone_no)) {
                                echo $patient->caregiver_phone_no;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Email address</label>-->
                            <input type="email" name="email" class="contact_input" id="exampleInputEmail1" placeholder="Enter email" value='<?php
                            if (!empty($patient->email)) {
                                echo $patient->email;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputFile">Image</label>-->
                            <input type="file" name="img_url" id="exampleInputFile">                 
                        </div>  
                    </div>
                    <!--=====================================================================================================-->
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <!--                            <label for="">Visit Type</label>-->
                            <select class="contact_input"  name="visit_type" value='' required>
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
                            <!--                            <label for="exampleInputEmail1">Birth Date</label>-->
                            <input type="date" name="birth_date" class="contact_input" id="exampleInputEmail1" placeholder="Birth Date" value='<?php
                            if (!empty($patient->birth_date)) {
                                echo $patient->birth_date;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Phone</label>-->
                            <input type="text" name="phone" class="contact_input" id="exampleInputEmail1"  placeholder="Phone" value='<?php
                            if (!empty($patient->phone)) {
                                echo $patient->phone;
                            }
                            ?>' required>
                        </div>   
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Occupation</label>-->
                            <input type="text" name="occupation" class="contact_input" id="exampleInputEmail1" placeholder="Occupation" value='<?php
                            if (!empty($patient->occupation)) {
                                echo $patient->occupation;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="">Marital Status</label>-->
                            <select class="contact_input"  name="marital_status" value='' required>
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
                            <!--                            <label for="">Blood Group</label>-->
                            <select class="contact_input"  name="blood_group" value='' required>
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
                            <!--                            <label for="exampleInputEmail1">Caregiver Name & Relation</label>-->
                            <input type="text" name="caregiver_name_relation" class="contact_input" id="exampleInputEmail1" placeholder="Caregiver Name & Relation" value='<?php
                            if (!empty($patient->caregiver_name_relation)) {
                                echo $patient->caregiver_name_relation;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputEmail1">Pt Height (in cm)</label>-->
                            <input type="text" name="height" class="contact_input" id="exampleInputEmail1" placeholder="Pt Height (in cm)" value='<?php
                            if (!empty($patient->height)) {
                                echo $patient->height;
                            }
                            ?>' required>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleInputPassword1">Password</label>-->
                            <input type="password" name="password" class="contact_input" id="exampleInputPassword1"  placeholder="Password" value='<?php
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
                <div class="box-footer p-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#department').on('change', function () {
            var departmentID = $(this).val();
            if (departmentID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('frontend/getDoctors'); ?>',
                    data: 'department=' + departmentID,
                    success: function (data) {
                        $('#doctor').html('<option value="">Select Doctor</option>');
                        var dataObj = jQuery.parseJSON(data);
                        if (dataObj) {
                            $(dataObj).each(function () {
                                var option = $('<option />');
                                option.attr('value', this.id).text(this.name);
                                $('#doctor').append(option);
                            });
                        } else {
                            $('#doctor').html('<option value="">Account not available</option>');
                        }
                    }
                });
            } else {
                $('#doctor').html('<option value="">Select Department first</option>');
            }
        });
    });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(4000).fadeOut(100);
    });
</script>
