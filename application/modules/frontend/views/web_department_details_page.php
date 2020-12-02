<link rel="stylesheet" type="text/css" href="common/frontend/styles/elements.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>
<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">Departments</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Elements -->

<div class="elements">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Tabs -->
                <div class="elements_tabs">
                    <div class="elements_title">Tabs</div>
                    <div class="tabs_content">
                        <div class="row">
                            <div class="col-lg-3">

                                <!-- Tabs -->
                                <div class="tabs d-flex flex-row align-items-center justify-content-start flex-wrap">
                                    <?php foreach ($departments as $department) { ?>
                                        <div class="tab active">
                                            <a href="frontend/webDepartmentDetailsPage?id=<?php echo $department->id; ?>" class="tab_title"><?php echo $department->name; ?></a>                                       
                                        </div>
                                    <?php } ?>

                                    <div class="tab">
                                        <a href="frontend/webAppointmentPage" class="tab_title">Book Appointment</a>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-9">
                                <div class="accordion_container">
                                    <div class="accordion d-flex flex-row align-items-center active"><div><?php echo $departmentt->name; ?></div></div>
                                    <div class="accordion_panel">
                                        <div>
                                            <p><?php echo $departmentt->description; ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>