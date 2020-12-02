<div class="content-wrapper">

    <h4 style="text-align: center; margin-top: 60px;margin-bottom: -30px;">View Average Result In Chart </h4> 

    <div style="padding:100px;">
        <div class="chart">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

                        <canvas id="popChart" width="55%" height="20%" style="margin-top: 10px;"></canvas>


                        <script>

                            var ctx = document.getElementById("popChart").getContext("2d");

                            var data_label = [];
                            var data_rating = [];

                            $.post("<?= base_url('index.php/chart/getBarChart') ?>",
                                    function (data) {
                                        var obj = JSON.parse(data);
                                        $.each(obj, function (test, item) {
                                            data_label.push(item.label);
                                            data_rating.push(item.rating_label);
                                        });


                                        var lineChart = new Chart(ctx, {
                                            type: "bar",
                                            data: {
                                                labels: data_label,
                                                datasets: [{
                                                        label: "Value",
                                                        data: data_rating,
                                                        backgroundColor: 'rgba(6,182,0, 0.8)',
                                                        borderColor: "rgba(17, 28, 238, 0.55)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,10)",
                                                        PointBorderWidth: 1
                                                    }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                }
                                            }
                                        });

                                    });
                        </script>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>



        </div>
    </div>
</div>
