<div class="content-wrapper">    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Nurse</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="nurse/addNewNurse" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value='<?php
                                if (!empty($nurse->name)) {
                                    echo $nurse->name;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value='<?php
                                if (!empty($nurse->email)) {
                                    echo $nurse->email;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" value='<?php
                                if (!empty($nurse->password)) {
                                    echo $nurse->password;
                                }
                                ?>'>
                            </div>                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value='<?php
                                if (!empty($nurse->address)) {
                                    echo $nurse->address;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  placeholder="Phone" value='<?php
                                if (!empty($nurse->phone)) {
                                    echo $nurse->phone;
                                }
                                ?>'>
                            </div>                
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>              
                        </div>
                        <input type="hidden" name="id" value='<?php
                        if (!empty($nurse->id)) {
                            echo $nurse->id;
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