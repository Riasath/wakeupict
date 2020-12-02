
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



                        </form>
                        <a href="department/addDepartment">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Department 
                                </button>
                            </div>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($departments as $department) { ?>
                                    <tr>
                                        <td style="width:10%;"><img style="width:95%;" src="<?php echo $department->img_url; ?>"></td>                         
                                        <td><?php echo $department->name; ?></td>
                                        <td><?php echo $department->description; ?></td>                                       
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Actions</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="department/editDepartment?id=<?php echo $department->id; ?>">Edit</a></li>
                                                    <li><a href="department/delete?id=<?php echo $department->id; ?>">Delete</a></li>
                                                     <li><a  href="facility/facilityy?id=<?php echo $department->id; ?>">Manage Facility</a></li> 

                                                </ul>
                                            </div>
                                        </td>
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
