<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Call: </b> <?php echo $this->settings_model->getSettings()->phone; ?>
    </div>
    <strong>Copyright &copy; 2019 <a href=""><?php echo $this->settings_model->getSettings()->title; ?></a>.</strong> All rights
    reserved.
</footer>

  <div class="control-sidebar-bg"></div>


<!-- jQuery 2.2.3 -->
<script src="common/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="common/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->

<!-- InputMask -->
<script src="common/plugins/input-mask/jquery.inputmask.js"></script>
<script src="common/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="common/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="common/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="common/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="common/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="common/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="common/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="common/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="common/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="common/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="common/dist/js/demo.js"></script>
<!-- Page script -->
<script src="common/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="common/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="common/plugins/DataTables/datatables.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>


<script type="text/javascript" src="common/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $(".js-example-basic-single").select2();

        $(".js-example-basic-multiple").select2();
    });

</script>
<script>
    $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
    });
    });
</script>
<script>
    $(document).ready(function () {
    $('#editable-sample').DataTable({
    responsive: true,
            //   dom: 'lfrBtip',
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
            ],
            buttons: [
            {
            extend: 'copyHtml5',
                    exportOptions: {
                    columns: ':not(:last-child)', // indexes of the columns that should be printed,
                    }                      // Exclude indexes that you don't want to print.
            },
            {
            extend: 'excelHtml5',
                    exportOptions: {
                    columns: ':not(:last-child)',
                    }
            },
            {
            extend: 'csvHtml5',
                    exportOptions: {
                    columns: ':not(:last-child)',
                    }
            },
            {
            extend: 'pdfHtml5',
                    exportOptions: {
                    columns: ':not(:last-child)',
                    }
            },
            {
            extend: 'print',
                    exportOptions: {
                    columns: ':not(:last-child)',
                    }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, - 1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: - 1,
            "order": [[0, "desc"]],
<?php if ($this->router->fetch_method() == 'sent') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>
<?php if ($this->router->fetch_method() == 'upcoming') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>
    "language": {
    "lengthMenu": "_MENU_ records per page",
    }
    });
    });
    </script>
</body>
</html>
