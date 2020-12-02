<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    </head>
    <body>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Dashboard Of <?php echo $this->ion_auth->user()->row()->username; ?> 
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    <?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $date = date("Y-m-d");
                                    $this->db->where('available_date', $date);
                                    $this->db->where('status !=', 'Pending');
                                    $this->db->from("schedule");
                                    echo $this->db->count_all_results();
                                    ?>
                                </h3>

                                <h4>Today's Appointment</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clipboard"></i>
                            </div>
                            <a href="appointment/todaysAllAppointment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->                    
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    <?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $date = date("Y-m-d");
                                    $this->db->where('available_date', $date);
                                    $this->db->where('status', "Approved");
                                    $this->db->from("schedule");
                                    echo $this->db->count_all_results();
                                    ?>
                                </h3>

                                <h4>Yet To See</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="appointment/todaysAllAppointment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    <?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $date = date("Y-m-d");
                                    $this->db->where('available_date', $date);
                                    $this->db->where('status', "Done");
                                    $this->db->from("schedule");
                                    echo $this->db->count_all_results();
                                    ?>
                                </h3>

                                <h4>Done</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <a href="appointment/todaysAllAppointment" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    <?php
                                    //echo $this->db->count_all('client');
                                    ?>
                                </h3>

                                <h4>Total Client</h4>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="client/showClients" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </section>
            <!-- /.content -->
        </div>

        <script type="text/javascript">

            var events = <?php echo json_encode($data) ?>;
            var date = new Date()
            var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear()

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: '' //month,agendaWeek,agendaDay
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                events: events
            })
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".flashmessage").delay(3000).fadeOut(100);
            });
        </script>


