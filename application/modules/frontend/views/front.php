

<div class="background_image" style="background-image:url(<?php echo $f_header->img_url; ?>)"></div>

<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div class="home_title"><?php echo $f_header->title; ?></div>
                    <div class="home_text"><?php echo $f_header->description; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Welcome Message Section  -->

<div class="info">
    <div class="container">
        <div class="row row-eq-height">

            <!-- Info Box -->
            <div class="col-lg-12 info_box_col">
                <div class="info_box">

                    <div class="info_content">
                        <div class="info_title" style="text-align: center;" ><?php echo $f_welcome->title; ?></div>
                        <div class="info_text"><?php echo $f_welcome->description; ?></div>
                    </div>
                    <div class="info_image" ><img style="height:300px; width:100%;" src="<?php echo $f_welcome->img_url; ?>" alt=""></div>
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
                        <div class="cta_subtitle">Morbi arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas.</div>
                    </div>
                    <div class="button cta_button ml-xl-auto"><a href="frontend/webAppointmentPage"><span> Appointment</span><span> Appointment</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title"><?php echo $f_service_header->title; ?></div>
                <div class="section_subtitle"><?php echo $f_service_header->description; ?></div>
            </div>
        </div>
        <div class="row icon_boxes_row">
            <?php foreach ($f_services as $f_service) { ?>
                <div class="col-xl-4 col-lg-6">
                    <div class="icon_box">
                        <div class="icon_box_title_container d-flex flex-row align-items-center justify-content-start">
                            <div class="icon_box_icon"><img src="<?php echo $f_service->img_url; ?>" alt=""></div>
                            <div class="icon_box_title"><?php echo $f_service->title; ?></div>
                        </div>
                        <div class="icon_box_text"><?php echo $f_service->description; ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="button services_button ml-auto mr-auto"><a href="#"><span>read more</span><span>read more</span></a></div>
            </div>
        </div>
    </div>
</div>

<!-- Departments -->

<!--<div class="departments">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">Our Departments</div>
                <div class="section_subtitle">to choose from</div>
            </div>
        </div>
        <div class="row dept_row">
            <div class="col">
                <div class="dept_slider_container_outer">
                    <div class="dept_slider_container">
                         Slider 
                        <div class="owl-carousel owl-theme dept_slider">
                             Slide 
                            <?php // foreach ($departments as $department) { ?>
                                <div class="owl-item dept_item">
                                    <div class="dept_image"><img src="<?php // echo $department->img_url; ?>" alt=""></div>
                                    <div class="dept_content">
                                        <div class="dept_title"><?php // echo $department->name; ?></div>
                                        <div class="dept_link"><a href="#">Read More</a></div>
                                    </div>
                                </div>
                            <?php // } ?>
                             Slide 
                        </div>
                    </div>
                     Dept Slider Nav 
                    <div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>-->



<!--<div class="doctors">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">Our Doctors</div>
                <div class="section_subtitle">to choose from</div>
            </div>
        </div>
        <div class="row doctors_row">
             Doctor 
            <?php // foreach ($doctors as $doctor) { ?>   
                <div class="col-xl-3 col-md-6">
                    <div class="doctor">
                        <div class="doctor_image"><img style="height:150px; width:200px;" src="<?php echo $doctor->img_url; ?>" alt=""></div>
                        <div class="doctor_content">
                            <div class="doctor_name"><a href="#"><?php // echo $doctor->name; ?></a></div>
                            <div class="doctor_title"><?php // echo $this->department_model->getDepartmentById($doctor->department)->name; ?></div>
                        </div>
                    </div>
                </div>
            <?php // } ?>
             Doctor 
        </div>
    </div>
</div>-->

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



