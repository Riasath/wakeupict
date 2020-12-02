<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Laboratorists</h2>
                    </div>
                    <div class="box-header">
                        <a href="laboratorist/addLaboratorist"><button type="button" class="btn btn-info pull-right">Add Laboratorist</button></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laboratorists as $laboratorist) { ?>
                                    <tr>
                                        <td><img src="<?php echo $laboratorist->img_url; ?>" class="img-circle" width="40px" height="40px"></td>
                                        <td><?php echo $laboratorist->name; ?></td>
                                        <td><?php echo $laboratorist->email; ?></td>
                                        <td><?php echo $laboratorist->address; ?></td>
                                        <td><?php echo $laboratorist->phone; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="laboratorist/editLaboratorist?id=<?php echo $laboratorist->id; ?>">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="laboratorist/delete?id=<?php echo $laboratorist->id; ?>">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
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

