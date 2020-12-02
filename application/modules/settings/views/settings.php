<div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Settings</h3>
                    </div>
                    <?php echo validation_errors(); ?>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="settings/update" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="name" value='<?php
                                if (!empty($settings->title)) {
                                    echo $settings->title;
                                }
                                ?>'>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">System Name</label>
                                <input type="text" name="system_vendor" class="form-control" id="exampleInputEmail1" placeholder="name" value='<?php
                                if (!empty($settings->system_vendor)) {
                                    echo $settings->system_vendor;
                                }
                                ?>'>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='<?php
                                if (!empty($settings->address)) {
                                    echo $settings->address;
                                }
                                ?>'>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='<?php
                                if (!empty($settings->phone)) {
                                    echo $settings->phone;
                                }
                                ?>'>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='<?php
                                if (!empty($settings->email)) {
                                    echo $settings->email;
                                }
                                ?>'>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Date Formate</label>
                                <select class="form-control m-bot15" name="date_format" value=''>
                                    <option value="d-m-Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'd-m-Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>dd-mm-yyyy</option>
                                    <option value="m/d/Y" <?php
                                    if (!empty($settings->date_format)) {
                                        if ($settings->date_format == 'm/d/Y') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>mm/dd/yyyy</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Currency</label>
                                <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                if (!empty($settings->currency)) {
                                    echo $settings->currency;
                                }
                                ?>' placeholder="currency">
                            </div>

                            <div class="form-group">
                                <div class="fileinput-new thumbnail" style="width: 150px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php echo $settings->img_url; ?>">
                                </div>
                                <label for="exampleInputFile">Logo (80px*80px)</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($settings->id)) {
                                echo $settings->id;
                            }
                            ?>'>
                        </div>                      

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>