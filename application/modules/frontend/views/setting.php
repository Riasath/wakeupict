<div class="content-wrapper">    
    <section class="content">
        <div class="row">
            <div class="callout callout-info">
                <h4>Manage Hospital Website</h4>
            </div>
            <div class="col-md-2">
                <a href="frontend/homePage"> <input  type="button" class="btn btn-primary btn-block margin-bottom" value="Home Page"> </a>
                <a href="frontend/aboutPage"><input type="button" class="btn btn-primary btn-block margin-bottom" value="About Us"></a>
                <a href="frontend/blogPage"> <input type="button" class="btn btn-primary btn-block margin-bottom" value="Blog"></a>
                <a href="frontend/servicePage">   <input type="button" class="btn btn-primary btn-block margin-bottom" value="Services"></a>
                <a href="frontend/settingPage"> <input type="button" class="btn btn-primary btn-block margin-bottom" value="Settings"></a>
            </div>
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    
                    <form role="form" action="frontend/frontSetting" method="post" enctype="multipart/form-data">
                    <div class="tab-content" style="margin-top:16px;">
                        <div class="tab-pane active" id="intake_details">
                            <div class="panel panel-default">
                                <div class="panel-heading"> Setting Section</div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Hospital Name</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="h_name" value="<?php
                                                if (!empty($f_setting->h_name)) {
                                                    echo $f_setting->h_name;
                                                }
                                                ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Emergency Contact</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="contact" value="<?php
                                                if (!empty($f_setting->contact)) {
                                                    echo $f_setting->contact; }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Email</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="email" value="<?php
                                                if (!empty($f_setting->email)) {
                                                    echo $f_setting->email;
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Opening Hours</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" name="open_a" value="<?php
                                                if (!empty($f_setting->open_a)) {
                                                    echo $f_setting->open_a;
                                                }?>" required>
                                                <label for="exampleInputEmail1">Monday - Friday</label>
                                            </div>
                                             <div class="col-xs-2">
                                                <input type="text" class="form-control" name="open_b" value="<?php
                                                if (!empty($f_setting->open_b)) {
                                                    echo $f_setting->open_b;
                                                }?>" required>
                                                <label for="exampleInputEmail1">Saturday</label>
                                            </div>
                                             <div class="col-xs-2">
                                                <input type="text" class="form-control" name="open_c" value="<?php
                                                if (!empty($f_setting->open_c)) {
                                                    echo $f_setting->open_c;
                                                }?>" required>
                                                <label for="exampleInputEmail1">Sunday</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Facebook Link</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="facebook" value="<?php
                                                if (!empty($f_setting->facebook)) {
                                                    echo $f_setting->facebook;
                                                } ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Twitter Link</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="twitter" value="<?php
                                                if (!empty($f_setting->twitter)) {
                                                    echo $f_setting->twitter;
                                                } ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Google Link</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="google" value="<?php
                                                if (!empty($f_setting->google)) {
                                                    echo $f_setting->google;
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Youtube Link</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="youtube" value="<?php
                                                if (!empty($f_setting->youtube)) {
                                                    echo $f_setting->youtube;
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Copyright Text</label>
                                            <div class="col-xs-7">
                                                <input type="text" class="form-control" name="copyright" value="<?php
                                                if (!empty($f_setting->copyright)) {
                                                    echo $f_setting->copyright;
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($f_setting->id)) {
                                            echo $f_setting->id;
                                        }
                                        ?>'>
                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-info btn-block">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</div>