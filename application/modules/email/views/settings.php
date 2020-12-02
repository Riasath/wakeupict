<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4> Email Settings</h4>
                        <div>
                            <?php echo validation_errors(); ?>
                            <form role="form" action="email/addNewSettings" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                    if (!empty($settings->admin_email)) {
                                        echo $settings->admin_email;
                                    }
                                    ?>' placeholder="From which you want to send the email">
                                </div>

                                <code>
                                   <?php echo "It must be the email from your server. Suppose you host the script in wusoft.net."; ?>
                                    <br>
                                    <?php echo "Then your admin email must be something@wusoft.net for sending the email properly"; ?>
                                </code>


                                <input type="hidden" name="id" value='<?php
                                if (!empty($settings->id)) {
                                    echo $settings->id;
                                }
                                ?>'>
                                <br>
                                <br>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <script src="common/js/codearistos.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".flashmessage").delay(3000).fadeOut(100);
        });
    </script>