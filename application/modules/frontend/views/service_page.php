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
                    <div class="box-header with-border">
                        <h3 class="box-title">Service Section</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="frontend/serviceHeader" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                if (!empty($f_service_header->title)) {
                                    echo $f_service_header->title;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label>Service Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder=""><?php
                                    if (!empty($f_service_header->description)) {
                                        echo $f_service_header->description;
                                    }
                                    ?></textarea>
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($f_service_header->id)) {
                                echo $f_service_header->id;
                            }
                            ?>'>
                        </div>                      
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Services</h3>
                    </div>
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group" style="float:right;">
                            <button id="" class="btn btn-info pull-right">
                                <i class="fa fa-plus-circle"></i>    Add Service 
                            </button>
                        </div>
                    </a>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Option</th>
                            </thead>
                            <tbody>
                                <?php foreach ($f_services as $f_service) { ?>
                                    <tr>
                                        <td style="width:10%;"><img style="width:95%;" src="<?php echo $f_service->img_url; ?>"></td>                         
                                        <td><?php echo $f_service->title; ?></td>
                                        <td><?php echo $f_service->description; ?></td>                                       
                                        <td>  <a type="button" class="editbutton" data-toggle="modal" data-id="<?php echo $f_service->id; ?>">Edit</a>    / 
                                            <a href="frontend/deleteService?id=<?php echo $f_service->id; ?>">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Service</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="frontend/addService" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Title</label>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Description</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Icon</label>
                            <div class="col-xs-7">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new btn btn-info btn-block">Select Image</span>
                                            <input type="file" name="img_url" >
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Service</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="serviceEditForm" action="frontend/addService" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Title</label>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Description</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Icon</label>
                            <div class="col-xs-7">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new btn btn-info btn-block">Select Image</span>

                                            <input type="file" name="img_url" >
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <input type="hidden" name="id" value=''>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'frontend/editServiceByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#serviceEditForm').find('[name="id"]').val(response.f_service.id).end()
                $('#serviceEditForm').find('[name="title"]').val(response.f_service.title).end()
                $('#serviceEditForm').find('[name="description"]').val(response.f_service.description).end()
               
                $('#myModal2').modal('show');
            });
        });
    });
</script>