<link rel="stylesheet" type="text/css" href="common/frontend/styles/contact.css">
<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="common/frontend/images/services.jpg" data-speed="0.8" ></div>

<div class="home_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">
                    <div style="margin-top: 100px;" class="home_title">Contact</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Contact -->

<div class="contact">
    <div class="container">
        <div class="row">

            <!-- Contact form -->
            <div class="col-lg-2 contact_col"></div>
            <div class="col-lg-8 contact_col">
                <div class="contact_form">
                    <div class="contact_title">Get in touch</div>
                    <div class="contact_form_container">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="frontend/makeContact" method="post" enctype="multipart/form-data">

                            <input type="text" name="name" id="contact_input" class="contact_input" placeholder="Your Name" required="required">
                            <input type="email" name="email" id="contact_email" class="contact_input" placeholder="Your E-mail" required="required">
                            <input type="text" name="subject" id="contact_subject" class="contact_input" placeholder="Subject" required="required">
                            <textarea class="contact_input contact_textarea" name="message" id="contact_textarea" placeholder="Message" required="required"></textarea>
                            <button type="submit" class="contact_button" id="contact_button">send message</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="contact_info">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <div class="contact_info_list">
                            <div class="contact_info_title">Contact Info</div>
                            <ul>
                                <li><span>Address: </span><?php echo $f_setting->h_name; ?></li>
                                <li><span>Email: </span><?php echo $f_setting->email; ?></li>
                                <li><span>Phone: </span><?php echo $f_setting->contact; ?></li>
                            </ul>
                        </div>
                    </div>              
                    <div class="col-lg-4">
                        <div class="contact_info_list">
                            <div class="contact_info_title">Opening Hours</div>
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Monday - Friday</div>
                                    <div class="ml-auto"><?php echo $f_setting->open_a; ?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Saturday</div>
                                    <div class="ml-auto"><?php echo $f_setting->open_b; ?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Sunday</div>
                                    <div class="ml-auto"><?php echo $f_setting->open_c; ?></div>
                                </li>                   
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="info">
</div>
<div class="info">
</div>