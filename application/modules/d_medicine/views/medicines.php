<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-7">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Medicine List</h3>
                        <a href="d_medicine/addMedicine">
                            <div class="btn-group" style="float:right;">
                                <button id="" class="btn btn-info pull-right">
                                    <i class="fa fa-plus-circle"></i>    Add Medicine 
                                </button>
                            </div>
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="editable-sample" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($medicines as $medicine) { ?>
                                    <tr>
                                        <td><?php echo $medicine->name; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="d_medicine/editMedicine?id=<?php echo $medicine->id; ?>">Edit</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="d_medicine/deleteMedicine?id=<?php echo $medicine->id; ?>">Delete</a></li>
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

