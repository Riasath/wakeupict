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
                        <h3 class="box-title">Blog Section</h3>
                    </div>
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group" style="float:right;">
                            <button id="" class="btn btn-info pull-right">
                                <i class="fa fa-plus-circle"></i>    Add Blog 
                            </button>
                        </div>
                    </a>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Posted By</th>
                                        <th>Date</th>
                                        <th>Published</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($f_blogs as $f_blog) { ?>
                                        <tr>
                                            <td><?php echo $f_blog->title; ?></td>
                                            <td><?php echo $f_blog->posted_by; ?></td> 
                                            <td><?php echo $f_blog->date; ?></td>
                                            <td><?php echo $f_blog->published; ?></td>   
                                            <td>  
                                                <a type="button" class="editbutton" data-toggle="modal" data-id="<?php echo $f_blog->id; ?>">Edit</a>    /
                                                <a href="frontend/deleteBlog?id=<?php echo $f_blog->id; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Blog</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="frontend/blog" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Title</label>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Short Description</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Post</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="10" cols="10" name="blog_post" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Published</label>
                            <div class="col-xs-7">
                                <select id="paid_by" class="form-control m-bot15" name="published" value=''>
                                    <option value="Yes">Yes </option>
                                    <option value="No">No </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Image</label>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Blog</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="blogEditForm" action="frontend/blog" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Title</label>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" name="title" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Short Description</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="5" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Post</label>
                            <div class="col-xs-7">
                                <textarea class="form-control" rows="10" cols="10" name="blog_post" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label">Blog Published</label>
                            <div class="col-xs-7">
                                <select id="paid_by" class="form-control m-bot15" name="published" value=''>
                                    <option value="Yes">Yes </option>
                                    <option value="No">No </option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value=''>
                        <div class="form-group row">
                            <label for="consent_form_signed" class="col-xs-3 col-form-label"> Image</label>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'frontend/editBlogByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#blogEditForm').find('[name="id"]').val(response.f_blog.id).end()
                $('#blogEditForm').find('[name="title"]').val(response.f_blog.title).end()
                $('#blogEditForm').find('[name="description"]').val(response.f_blog.description).end()
                $('#blogEditForm').find('[name="blog_post"]').val(response.f_blog.blog_post).end()
                $('#blogEditForm').find('[name="published"]').val(response.f_blog.published).end()
                $('#myModal2').modal('show');
            });
        });
    });
</script>
