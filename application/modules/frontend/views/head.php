<!DOCTYPE html>
<html lang="en">
    <head><base href="<?php echo base_url(); ?>">
        <link rel="shortcut icon" href="<?php echo $this->settings_model->getSettings()->img_url; ?>">
        <title><?php echo $this->settings_model->getSettings()->title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="DR. NAM MOMENUZZAMAN Project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="common/frontend/styles/bootstrap4/bootstrap.min.css">
        <link href="common/frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="common/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="common/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="common/frontend/plugins/OwlCarousel2-2.2.1/animate.css">
        <link rel="stylesheet" type="text/css" href="common/frontend/styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="common/frontend/styles/responsive.css">


    </head>
    <body>
        <style> 

            .p {float: left; width: 150px; height:20px; background: #32c69a;}
            .q {float: left; width: 150px; height:40px; background: #32c69a;margin-top: 30px;}
            .r {float: left; width: 150px; height:40px; background: #32c69a; text-align: center;}

            ul li ul li {display: none;}
            ul li:hover ul li {display: block;}
        </style>

        <div class="super_container">

            <!-- Menu -->

            <div class="menu trans_500">
                <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="menu_close_container"><div class="menu_close"></div></div>
                    <form action="#" class="menu_search_form">
                        <input type="text" class="menu_search_input" placeholder="Search" required="required">
                        <button class="menu_search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <ul>

                        <li class="menu_item"><a href="">Home</a></li>
                        <li class="menu_item"><a href="#">About us</a></li>
                        <li class="menu_item"><a href="#">Services</a></li>
                        <li class="menu_item"><a href="news.html">News</a></li>
                        <li class="menu_item"><a href="contact.html">Contact</a></li>

                    </ul>
                </div>
                <div class="menu_social">
                    <ul>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Home -->

            <div class="home">
                <!--<div class="background_image" style="background-image:url(common/frontend/images/index_hero.jpg)"></div>-->


                <!-- Header -->

                <header class="header" id="header">
                    <div>
                        <div class="header_top">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="header_top_content d-flex flex-row align-items-center justify-content-start">
                                            <div class="logo">
<!--                                                <a href="#">+<span>M_Hospital</span></a>-->
                                                <link rel="shortcut icon" href="<?php echo $this->settings_model->getSettings()->img_url; ?>">
                                                <a href="">
                                                    <img alt="" src="<?php echo $this->settings_model->getSettings()->img_url; ?>" width="70" height="60">
                                                    <span><?php echo $this->settings_model->getSettings()->title; ?></span></a>
                                            </div>

                                            <div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                                                <div class="header_top_nav">
                                                    <ul class="d-flex flex-row align-items-center justify-content-start">
                                                        <li><a href="#"><?php echo $f_setting->email; ?></a></li>
                                                        <li><a href="#"><?php echo $f_setting->contact; ?></a></a></li>
                                                        <li><a href="frontend/webAppointmentPage">Appointment</a></li>
                                                    </ul>
                                                </div>
                                                <div class="header_top_phone">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <span><?php echo $f_setting->contact; ?></span>
                                                </div>
                                            </div>
                                            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header_nav" id="header_nav_pin">
                            <div class="header_nav_inner">
                                <div class="header_nav_container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                                                    <nav class="main_nav">
                                                        <ul class="d-flex flex-row align-items-center justify-content-start">
                                                            <li class="active"><a href="">Home</a></li>
                                                            <!--                                                            <li class="p"><a href="">Departments</a>
                                                                                                                            <ul class="q ">
                                                            
                                                            <?php foreach ($departments as $department) { ?>
                                                                                                                                                <li class="r"><a class="" href="frontend/webDepartmentDetailsPage?id=<?php echo $department->id; ?>">
                                                                <?php echo $department->name; ?></a></li> 
                                                            <?php } ?>
                                                                                                                            </ul>
                                                                                                                        </li>-->
                                                            <li><a href="frontend/webDoctorPage">Doctors</a></li>
                                                            <li><a href="frontend/webAboutPage">About</a></li>
                                                            <li><a href="frontend/webAppointmentPage">Appointment</a></li>
                                                            <li><div class="dropdown show">
                                                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Appointment
                                                                    </a>

                                                                    <div class="dropdown-menu" style="background:#32c69a;" aria-labelledby="dropdownMenuLink">
                                                                        <a class="text-dark dropdown-item" href="frontend/webAppointmentPage">New Patient </a>
                                                                        <a class="text-dark dropdown-item" href="auth/login">Registered Patient</a>
                                                                    </div>
                                                                </div></li>
                                                            <li><a href="frontend/webBlogPage">Blog</a></li>
                                                            <li><a href="frontend/webContactPage">Contact</a></li>
                                                            <li><a href="auth/login" target="_blank">Login</a></li>
                                                        </ul>
                                                    </nav>
                                                    <!--
                                                    <div class="search_content d-flex flex-row align-items-center justify-content-end ml-auto">
                                                        <form action="#" id="search_container_form" class="search_container_form">
                                                            <input type="text" class="search_container_input" placeholder="Search" required="required">
                                                            <button class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>
                </header>

