<div class="content-wrapper"> 
    <section class="content">
        <div class="row">           
            <div class="col-md-6">                
                <div class="box box-primary">
                    <?php echo validation_errors(); ?>
                    <form role="form" action="profile/addNew" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($profile->username)) {
                                    echo $profile->username;
                                }
                                ?>' placeholder="" <?php ?>>
                            </div>
                        <?php } else { ?>

                            <div class="col-md-4  col-lg-4 col-sm-4">
                                <section class="panel">
                                    <div class="weather-bg">
                                        <div class="panel-body report_color">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-6">
                                                    <i class="fa fa-user"></i> 
                                                    <?php
                                                    if (!empty($profile->username)) {
                                                        echo $profile->username;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </section>
                            </div>

                            <input type="hidden" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                            if (!empty($profile->username)) {
                                echo $profile->username;
                            }
                            ?>' placeholder="" <?php ?>>

                            <div class="clearfix">
                            </div>
                            <br> <br>
                            <?php
                        }
                        ?>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Change Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                            if (!empty($profile->email)) {
                                echo $profile->email;
                            }
                            ?>' placeholder="" <?php
                                   if (!empty($profile->username)) {
                                       echo $profile->username;
                                   }
                                   ?>' placeholder="" <?php ?>>
                        </div>

                        <input type="hidden" name="id" value='<?php
                        if (!empty($profile->id)) {
                            echo $profile->id;
                        }
                        ?>'>
                        
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>