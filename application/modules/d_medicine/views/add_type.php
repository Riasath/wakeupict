<div class="content-wrapper"> 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">


                    <form role="form" action="d_medicine/addNewType" method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Type</label>
                                <input type="text" name="type" class="form-control" id="exampleInputEmail1" placeholder="Add Comment" value="<?php
                                if (!empty($medicine->type)) {
                                    echo $medicine->type;
                                }
                                ?>">
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($medicine->id)) {
                                echo $medicine->id;
                            }
                            ?>'>

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