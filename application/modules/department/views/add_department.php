<div class="content-wrapper"> 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">


                    <form role="form" action="department/addNew" method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name" value="<?php
                                if (!empty($department->name)) {
                                    echo $department->name;
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php
                                if (!empty($department->description)) {
                                    echo $department->description;
                                }
                                ?>">
                            </div>


                            <input type="hidden" name="id" value='<?php
                            if (!empty($department->id)) {
                                echo $department->id;
                            }
                            ?>'>

                            <div class="form-group">
                                <label for="exampleInputFile">Icon</label>
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