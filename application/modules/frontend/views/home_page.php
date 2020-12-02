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
                        <h3 class="box-title">Header Image</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="frontend/header" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Header Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                if (!empty($f_header->title)) {
                                    echo $f_header->title;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label>Header Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder=""><?php
                                    if (!empty($f_header->description)) {
                                        echo $f_header->description;
                                    }
                                    ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Header Image</label>
                                <div class="fileinput-new thumbnail" style="width: 356px; height: 200px;" data-trigger="fileinput">
                                    <img style="width: 356px; height: 190px;" src="<?php echo $f_header->img_url; ?>"  alt="...">
                                </div>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($f_header->id)) {
                                echo $f_header->id;
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
                        <h3 class="box-title">Welcome Message Section</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="frontend/welcome" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Welcome Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value='<?php
                                if (!empty($f_welcome->title)) {
                                    echo $f_welcome->title;
                                }
                                ?>'>
                            </div>
                            <div class="form-group">
                                <label>Welcome Message</label>
                                <textarea name="description" class="form-control" rows="3" placeholder=""><?php
                                    if (!empty($f_welcome->description)) {
                                        echo $f_welcome->description;
                                    }
                                    ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Left Image</label>
                                <div class="fileinput-new thumbnail" style="width: 356px; height: 200px;" data-trigger="fileinput">
                                    <img style="width: 356px; height: 190px;" src="<?php echo $f_welcome->img_url; ?>"  alt="...">
                                </div>
                                <input type="file" name="img_url" id="exampleInputFile">                 
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($f_welcome->id)) {
                                echo $f_welcome->id;
                            }
                            ?>'>
                        </div>                      
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>