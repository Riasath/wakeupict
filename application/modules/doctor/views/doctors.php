
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="clearfix">
                        <form class="navbar-form" role="search" action=" member/search_Member_Type" method = "post">
                            <div class="input-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="search" name = "type"size="15px; ">
                                </div>
                                <div class="input-group-btn">
                                    <button class="btn btn-info " type="submit" value = "Search"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            <?php if (!$this->ion_auth->in_group('patient')) { ?>
                                <a data-toggle="modal" href="#myModal">
                                    <div class="btn-group" style="float:right;">
                                        <button id="" class="btn btn-info pull-right">
                                            <i class="fa fa-plus-circle"></i>    Add Doctor 
                                        </button>
                                    </div>
                                </a>
                            <?php } ?>
                        </form>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <?php if (!$this->ion_auth->in_group('patient')) { ?>
                                <th>Action</th>
                            <?php } ?>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $doctor) { ?>
                                    <tr>
                                        <td style="width:10%;"><img style="width:95%;" src="<?php echo $doctor->img_url; ?>"></td>                         
                                        <td><?php echo $doctor->name; ?></td>
                                        <td><?php echo $doctor->email; ?></td>                                       
                                        <td><?php echo $doctor->phone; ?></td>
                                        <td><?php echo $this->department_model->getDepartmentById($doctor->department)->name; ?></td> 
                                        <?php if (!$this->ion_auth->in_group('patient')) { ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">

                                                        <li> <a type="button" class="editbutton" data-toggle="modal" data-id="<?php echo $doctor->id; ?>">Edit</a>                                

                                                        <li class="divider"></li>
                                                        <li><a href="doctor/delete?id=<?php echo $doctor->id; ?>">Delete</a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Doctor</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="doctor/addNew" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Doctor Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="">
                        </div>                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone" value="">
                        </div>                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <select class="form-control m-bot15" name="department" value=''>
                                <?php foreach ($departments as $department) { ?>
                                    <option value="<?php echo $department->id; ?>" <?php
                                    if (!empty($doctor->department)) {
                                        if ($department->id == $doctor->department) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $department->name; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Profile</label>
                            <input type="text" name="profile" class="form-control" id="exampleInputEmail1" placeholder="Profile" value="">
                        </div>
                        <p class="help-block">Social Link.</p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Facebook" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Twitter" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" placeholder="Linkedin" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Google Plus</label>
                            <input type="text" name="google" class="form-control" id="exampleInputEmail1" placeholder="Google Plus" 

                                   value="">
                        </div>          

                        <input type="hidden" name="id" value=''>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" name="img_url" id="exampleInputFile">                 
                        </div>  

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

<!-- Edit Doctor -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Doctor</h4>
            </div>
            <div class="modal-body">

                <form role="form" id="doctorEditForm" action="doctor/addNew" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Doctor Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="">
                        </div>                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone" value="">
                        </div>                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <select class="form-control m-bot15" name="department" value=''>
                                <?php foreach ($departments as $department) { ?>
                                    <option value="<?php echo $department->id; ?>" <?php
                                    if (!empty($doctor->department)) {
                                        if ($department->id == $doctor->department) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $department->name; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Profile</label>
                            <input type="text" name="profile" class="form-control" id="exampleInputEmail1" placeholder="Profile" value="">
                        </div>
                        <p class="help-block">Social Link.</p>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Facebook" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Twitter" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" placeholder="Linkedin" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Google Plus</label>
                            <input type="text" name="google" class="form-control" id="exampleInputEmail1" placeholder="Google Plus" 

                                   value="">
                        </div>          

                        <input type="hidden" name="id" value=''>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" name="img_url" id="exampleInputFile">                 
                        </div>  

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#doctorEditForm').find('[name="id"]').val(response.doctor.id).end()
                $('#doctorEditForm').find('[name="name"]').val(response.doctor.name).end()
                $('#doctorEditForm').find('[name="email"]').val(response.doctor.email).end()
                $('#doctorEditForm').find('[name="password"]').val(response.doctor.password).end()
                $('#doctorEditForm').find('[name="address"]').val(response.doctor.address).end()
                $('#doctorEditForm').find('[name="phone"]').val(response.doctor.phone).end()
                $('#doctorEditForm').find('[name="department"]').val(response.doctor.department).end()
                $('#doctorEditForm').find('[name="profile"]').val(response.doctor.profile).end()
                $('#doctorEditForm').find('[name="facebook"]').val(response.doctor.facebook).end()
                $('#doctorEditForm').find('[name="twitter"]').val(response.doctor.twitter).end()
                $('#doctorEditForm').find('[name="linkedin"]').val(response.doctor.linkedin).end()
                $('#doctorEditForm').find('[name="google"]').val(response.doctor.google).end()
                $('#myModal2').modal('show');
            });
        });
    });
</script>


<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>