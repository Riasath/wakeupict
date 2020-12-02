<link rel="stylesheet" type="text/css" href="common/frontend/styles/news.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>

<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">About us</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Info Boxes -->
<div style="margin-top: 100px;" class="about">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">A few words about us</div>
                <div class="section_subtitle"><?php echo $f_about->title; ?></div>
            </div>
        </div>
        <div class="row about_row row-eq-height">

            <div class="col-lg-8">
                <div class="about_text_2">
                    <p><?php echo $f_about->description; ?></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info_image"><img style="height:300px; width:100%;" src="<?php echo $f_about->img_url; ?>" alt=""></div>
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
    </div>
</div>

<!-- Departments -->



<!-- Doctors -->

