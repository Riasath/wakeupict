<link rel="stylesheet" type="text/css" href="common/frontend/styles/about.css">
<link rel="stylesheet" type="text/css" href="common/frontend/styles/about_responsive.css"> 
<link rel="stylesheet" type="text/css" href="common/frontend/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="common/frontend/styles/news_responsive.css">
<link rel="stylesheet" type="text/css" href="common/frontend/styles/news.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>

<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">All Doctors</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- Milestones -->

<div class="milestones">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 milestone_col">
                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                    <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="common/frontend/images/icon_7.svg" alt=""></div>
                    <div class="milestone_content">
                        <div class="milestone_counter" data-end-value="365">0</div>
                        <div class="milestone_text">Days a year</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 milestone_col">
                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                    <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="common/frontend/images/icon_6.svg" alt=""></div>
                    <div class="milestone_content">
                        <div class="milestone_counter" data-end-value="<?php echo $this->db->count_all('patient'); ?>">0</div>
                        <div class="milestone_text">Patients </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 milestone_col">
                <div class="milestone d-flex flex-row align-items-center justify-content-start">
                    <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="common/frontend/images/icon_8.svg" alt=""></div>
                    <div class="milestone_content">
                        <div class="milestone_counter" data-end-value="<?php echo $this->db->count_all('doctor'); ?>">0</div>
                        <div class="milestone_text">Amazing Doctors</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- CTA -->


<div class="cta">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/cta_1.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cta_container d-flex flex-xl-row flex-column align-items-xl-start align-items-center justify-content-xl-start justify-content-center">
                    <div class="cta_content text-xl-left text-center">
                        <div class="cta_title">Make an appointment with one of our professional Doctors.</div>

                    </div>
                     <div class="button cta_button ml-xl-auto"><a href="frontend/webAppointmentPage"><span> Appointment</span><span> Appointment</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Doctors -->

<div class="doctors">

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">Our Doctors</div>
                <div class="section_subtitle">to choose from</div>
            </div>
        </div>
        <div class="row doctors_row">

            <!-- Doctor -->
            <?php foreach ($doctors as $doctor) { ?>   
                <div class="col-xl-3 col-md-6">
                    <div class="doctor">
                        <div class="doctor_image"><img src="<?php echo $doctor->img_url; ?>" alt=""></div>
                        <div class="doctor_content">
                            <div class="doctor_name"><a href="#"><?php echo $doctor->name; ?></a></div>
                            <div class="doctor_title"><?php echo $this->department_model->getDepartmentById($doctor->department)->name; ?></div>
                            <div class="doctor_link"><a href="#">+</a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Doctor -->


        </div>

    </div>
</div>