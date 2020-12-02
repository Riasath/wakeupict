<div class="content-wrapper"> 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">


                    <form role="form" action="doctor/addNew" method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Doctor Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value="<?php
                                if (!empty($doctor->name)) {
                                    echo $doctor->name;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php
                                if (!empty($doctor->email)) {
                                    echo $doctor->email;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php
                                if (!empty($doctor->password)) {
                                    echo $doctor->password;
                                }
                                ?>">
                            </div>                
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address" value="<?php
                                if (!empty($doctor->address)) {
                                    echo $doctor->address;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone" value="<?php
                                if (!empty($doctor->phone)) {
                                    echo $doctor->phone;
                                }
                                ?>">
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
                                <input type="text" name="profile" class="form-control" id="exampleInputEmail1" placeholder="Profile" value="<?php
                                if (!empty($doctor->profile)) {
                                    echo $doctor->profile;
                                }
                                ?>">
                            </div>
                            <p class="help-block">Social Link.</p>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Facebook" value="<?php
                                if (!empty($doctor->facebook)) {
                                    echo $doctor->facebook;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Twitter" value="<?php
                                if (!empty($doctor->twitter)) {
                                    echo $doctor->twitter;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" id="exampleInputEmail1" placeholder="Linkedin" value="<?php
                                if (!empty($doctor->linkedin)) {
                                    echo $doctor->linkedin;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Google Plus</label>
                                <input type="text" name="google" class="form-control" id="exampleInputEmail1" placeholder="Google Plus" 

                                       value="<?php
                                       if (!empty($doctor->google)) {
                                           echo $doctor->google;
                                       }
                                       ?>">
                            </div>          

                            <input type="hidden" name="id" value='<?php
                            if (!empty($doctor->id)) {
                                echo $doctor->id;
                            }
                            ?>'>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>  

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>