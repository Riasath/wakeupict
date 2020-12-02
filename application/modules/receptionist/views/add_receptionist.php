<div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Receptionist</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="receptionist/addNewReceptionist" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value='<?php
                                if (!empty($receptionist->name)) {
                                    echo $receptionist->name;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='<?php
                                if (!empty($receptionist->email)) {
                                    echo $receptionist->email;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" value='<?php
                                if (!empty($receptionist->password)) {
                                    echo $receptionist->password;
                                }
                                ?>'>
                            </div>                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='<?php
                                if (!empty($receptionist->address)) {
                                    echo $receptionist->address;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='<?php
                                if (!empty($receptionist->phone)) {
                                    echo $receptionist->phone;
                                }
                                ?>'>
                            </div>                
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>              
                        </div>
                        <input type="hidden" name="id" value='<?php
                        if (!empty($receptionist->id)) {
                            echo $receptionist->id;
                        }
                        ?>'>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>