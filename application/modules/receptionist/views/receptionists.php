<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Receptionists</h2>
                    </div>
                    <div class="box-header">
                        <a href="receptionist/addReceptionist"><button type="button" class="btn btn-info pull-right">Add Receptionist</button></a>
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
                                <?php foreach ($receptionists as $receptionist) { ?>
                                    <tr>
                                        <td><img src="<?php echo $receptionist->img_url; ?>" class="img-circle" width="40px" height="40px"></td>
                                        <td><?php echo $receptionist->name; ?></td>
                                        <td><?php echo $receptionist->email; ?></td>
                                        <td><?php echo $receptionist->address; ?></td>
                                        <td><?php echo $receptionist->phone; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="receptionist/editReceptionist?id=<?php echo $receptionist->id; ?>">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="receptionist/delete?id=<?php echo $receptionist->id; ?>">Delete</a></li>
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

