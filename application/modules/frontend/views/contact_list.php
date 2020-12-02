<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <header class="panel-heading clearfix">
                        <div class="col-md-7 ">
                           Contact List
                        </div>
                    </header> 
                   
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>                            
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact) { ?>
                                    <tr>
                                        <td><?php echo $contact->name; ?></td>
                                        <td><?php echo $contact->email; ?></td> 
                                        <td><?php echo $contact->subject; ?></td>
                                        <td><?php echo $contact->message; ?></td>                                       
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div> </div> </div>
    </section>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>