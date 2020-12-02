<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="<?php echo $this->settings_model->getSettings()->img_url; ?>">
        <title><?php echo $this->router->fetch_class(); ?> | <?php echo $this->settings_model->getSettings()->title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="common/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="common/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="common/dist/css/skins/_all-skins.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="common/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 now-->
        <link rel="stylesheet" type="text/css" href="common/plugins/select2/css/select2.min.css"/>
        <link href="common/plugins/DataTables/datatables.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="common/plugins/datatables/dataTables.bootstrap.css"> 

    </head>
    <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo" target="_blank">
                    <span class="logo-lg"><span class="">  <?php echo $this->settings_model->getSettings()->title; ?></span></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!-- flashdata -->
                    <style>
                        .msg {
                            background-color: #32c69a;
                            margin-left: 460px;
                            padding: 10px;
                            color: white;
                            font-size: 16px;
                            margin-top: 3px;
                        }
                    </style>
                    <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <div class="flashmessage pull-left msg"><i class="fa fa-check"></i> <?php echo $message; ?></div>
                    <?php }
                    ?>
                    <!-- /flashdata -->
                    <?php
                    $current_user = $this->ion_auth->get_user_id();
                    if ($this->ion_auth->in_group('doctor')) {
                        $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                    }
                    ?>
                    <!-- /flashdata -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="common/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <img src="common/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">  -->
                                    <span class="username"><?php echo $this->ion_auth->user()->row()->username; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                <img src="<?php echo $this->doctor_model->getDoctorById($doctor_id)->img_url; ?>" class="img-circle" alt="User Image">
                            <?php } else { ?>
                                <img src="<?php echo $this->settings_model->getSettings()->img_url; ?>" class="img-circle" alt="User Image">
                            <?php } ?>
                        </div>
                        <div class="pull-left info">
                            <p><span class="username"><?php echo $this->ion_auth->user()->row()->username; ?></span></p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="treeview">
                                <a href="home">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Manage Support Staff</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="department/showDepartment">
                                            <i class="fa fa-folder"></i> <span>Department</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-folder"></i> <span>Doctor</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="doctor/showDoctor"><i class="fa fa-circle-o"></i> Doctors</a></li>
                                            <li><a href="doctor/addDoctor"><i class="fa fa-circle-o"></i> Add Doctor</a></li>
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-folder"></i> <span>Patient</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="patient/showPatient"><i class="fa fa-circle-o"></i> Patients</a></li>
                                            <!-- <li><a href="patient/addPatient"><i class="fa fa-circle-o"></i> Add Patient</a></li> -->
                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="nurse/showNurse">
                                            <i class="fa fa-folder"></i> <span>Nurse</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="receptionist/showReceptionist">
                                            <i class="fa fa-folder"></i> <span>Receptionist</span>
                                        </a>
                                    </li>

                                    <li class="treeview">
                                        <a href="accountant/showAccountant">
                                            <i class="fa fa-folder"></i> <span>Accountant</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="laboratorist/showLaboratorist">
                                            <i class="fa fa-folder"></i> <span>Laboratorist</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="pharmacist/showPharmacist">
                                            <i class="fa fa-folder"></i> <span>Pharmacist</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('doctor', 'patient', 'nurse', 'receptionist', 'laboratorist', 'pharmacist', 'accountant'))) { ?>
                            <li class="treeview">
                                <a href="home/calendar">
                                    <i class="fa fa-home"></i> <span>Home</span>
                                    <span class="pull-right-container">
                                    </span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('doctor', 'nurse', 'receptionist', 'laboratorist', 'pharmacist', 'accountant'))) { ?>
                            <!---------------------------------------------------------------------Chairmain Sir---------------------------------->
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Patient</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="patient/addPatient"><i class="fa fa-circle-o"></i> Add Patient</a></li>
                                    <li><a href="patient/showPatient"><i class="fa fa-circle-o"></i> All Patients</a></li>

                                </ul>
                            </li>

                            <li class="treeview">
                                <a>
                                    <i class="fa fa-calendar"></i> <span>Schedule</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="schedule/AddScheduleView"><i class="fa fa-circle-o"></i>Add schedule</a></li>
                                    <li><a href="schedule/showSchedule"><i class="fa fa-circle-o"></i>Show Schedule</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-plus-square"></i> <span>Appointment</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="schedule/appointmentIndex"><i class="fa fa-circle-o"></i>Add Appointment</a></li>
                                    <li><a href="appointment/showReceptionistPendingAppointment"><i class="fa fa-circle-o"></i>Pending Appointments</a></li>
                                    <li><a href="appointment/showAppointment"><i class="fa fa-circle-o"></i>All Approved Appointment</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-stethoscope"></i> <span>Prescription</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-folder"></i> <span>Helper</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="d_medicine/showMedicine"><i class="fa fa-circle-o"></i> Medicines</a></li>
                                            <li><a href="d_medicine/showType"><i class="fa fa-circle-o"></i>P. Type</a></li>
                                            <li><a href="d_medicine/showComment"><i class="fa fa-circle-o"></i>P. Comment</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="schedule/addPrescriptionView"><i class="fa fa-circle-o"></i> Add Prescription</a></li>
                                    <li><a href="schedule/showPrescriptionList"><i class="fa fa-circle-o"></i> All Prescriptions</a></li>
                                </ul>
                            </li>
                            
                            <li class="treeview">
                                <a href="d_medicine/showoverPhoneInfo">
                                    <i class="fa fa-mobile"></i> <span>Phone FollowUp</span>
                                    <span class="pull-right-container">
                                    </span>
                                </a>
                            </li>

<!--                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-line-chart"></i> <span>Chart</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="chart/echoChart"><i class="fa fa-circle-o"></i>Echo</a></li>
                                    <li><a href="chart/sixChart"><i class="fa fa-circle-o"></i>6-minute walk test</a></li>
                                    <li><a href="chart/chartR"><i class="fa fa-circle-o"></i>Testing --</a></li>
                                </ul>
                            </li>-->

<!--                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-file"></i> <span>Evaluation</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="schedule/showPrescriptionByDate"><i class="fa fa-circle-o"></i>Date wise report</a></li>
                                </ul>
                            </li>-->

<!--                            <li class="treeview">
                                <a>
                                    <i class="fa fa-calendar-check-o"></i> <span>Test works link</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="schedule/AddScheduleView"><i class="fa fa-circle-o"></i>Add schedule</a></li>
                                    <li><a href="schedule/showSchedule"><i class="fa fa-circle-o"></i>show Schedule</a></li>
                                    <li><a href="schedule/appointmentIndex"><i class="fa fa-circle-o"></i>Add Appointment</a></li>
                                    <li><a href="appointment/showAppointment"><i class="fa fa-circle-o"></i>All Approved Appointment</a></li>
                                    <li><a href="appointment/showReceptionistPendingAppointment"><i class="fa fa-circle-o"></i>Pending Appointments</a></li>
                                    <li><a href="patient/viewPatients"><i class="fa fa-circle-o"></i>Riddho List</a></li>
                                    <li><a href="details/detailsView"><i class="fa fa-circle-o"></i>detailsView</a></li>
                                </ul>
                            </li>-->


                            <!------------------------------------------///---------------------------Chairmain Sir---------------------------------->

                            <?php if ($this->ion_auth->in_group('doctor')) { ?>    
                                <!--                            <li class="treeview">
                                                                <a href="#">
                                                                    <i class="fa fa-folder"></i> <span>Appointment</span>
                                                                    <span class="pull-right-container">
                                                                        <i class="fa fa-angle-left pull-right"></i>
                                                                    </span>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    <li><a href="appointment/showAppointmentListByDoctor"><i class="fa fa-circle-o"></i>Appointment List</a></li>
                                                                    <li><a href="appointment/showDoctorPendingAppointment"><i class="fa fa-circle-o"></i>Requested Appointments</a></li>
                                                                </ul>
                                                            </li>-->
                            <?php } ?>

                            <?php if ($this->ion_auth->in_group('patient')) { ?>    

                            <?php } ?>

                            <?php if ($this->ion_auth->in_group('receptionist')) { ?>    
                                <!--                            <li class="treeview">
                                                                <a href="#">
                                                                    <i class="fa fa-folder"></i> <span>Appointment</span>
                                                                    <span class="pull-right-container">
                                                                        <i class="fa fa-angle-left pull-right"></i>
                                                                    </span>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    <li><a href="appointment/showAppointment"><i class="fa fa-circle-o"></i>Appointment List</a></li>
                                                                    <li><a href="appointment/showReceptionistPendingAppointment"><i class="fa fa-circle-o"></i>Requested Appointments</a></li>
                                                                </ul>
                                                            </li>-->
                            <?php } ?>

                            <?php if ($this->ion_auth->in_group('doctor')) { ?>
                                <!--                            <li class="treeview">
                                                                <a href="#">
                                                                    <i class="fa fa-stethoscope"></i> <span>Prescription</span>
                                                                    <span class="pull-right-container">
                                                                        <i class="fa fa-angle-left pull-right"></i>
                                                                    </span>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    <li><a href="prescription/PrescriptionByDoctor"><i class="fa fa-circle-o"></i>Prescription</a></li>
                                                                </ul>
                                                            </li>-->
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('patient'))) { ?>

                            <li class="treeview">
                                <a href="profile/patientHistory">
                                    <i class="fa fa-user"></i> <span>History</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Appointment</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="appointment/showAppointmentListByPatient"><i class="fa fa-circle-o"></i>Appointment List</a></li>
                                    <li><a href="appointment/showPatientPendingAppointment"><i class="fa fa-circle-o"></i>Pending Appointments</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-stethoscope"></i> <span>Prescription</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="schedule/patientPrescriptionList"><i class="fa fa-circle-o"></i> Prescriptions</a></li>
                                </ul>
                            </li>

                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('', 'nurse'))) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Blood Bank</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="blood/showBloodBank"><i class="fa fa-circle-o"></i>Manage Blood Bank</a></li>
                                    <li><a href="blood/showBloodDonor"><i class="fa fa-circle-o"></i>Blood Donor</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('', 'nurse'))) { ?>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Bed / Ward</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if ($this->ion_auth->in_group(array('nurse'))) { ?>
                                        <li><a href="bed/showBed"><i class="fa fa-circle-o"></i>Manage bed</a></li>
                                    <?php } ?>
                                    <li><a href="bed/showBedAllotment"><i class="fa fa-circle-o"></i>Bed Allotment</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('pharmacist')) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Medicine</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="medicine/showMedicineCategory"><i class="fa fa-circle-o"></i>Medicine Category</a></li>
                                    <li><a href="medicine/showMedicine"><i class="fa fa-circle-o"></i>Manage Medicine</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('accountant')) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Invoice</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="payment/addPaymentView"><i class="fa fa-circle-o"></i> Add Invoice</a></li>
                                    <li><a href="payment/showPayment"><i class="fa fa-circle-o"></i> Invoice</a></li>
                                </ul>
                            </li>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user-secret"></i> <span>Monitor Hospital</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
<!--                                    <li><a href="payment/showPayment"><i class="fa fa-circle-o"></i> Payment History</a></li>
                                    <li><a href="bed/showBedAllotment"><i class="fa fa-circle-o"></i>Bed Allotment</a></li>
                                    <li><a href="blood/showBloodBank"><i class="fa fa-circle-o"></i>Blood Bank</a></li>
                                    <li><a href="blood/showBloodDonor"><i class="fa fa-circle-o"></i>Blood Donor</a></li>
                                    <li><a href="medicine/showMedicine"><i class="fa fa-circle-o"></i>Manage Medicine</a></li>
                                    <li><a href="report/showReport"><i class="fa fa-circle-o"></i>Report</a></li>-->
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('', 'nurse'))) { ?>

                            <li class="treeview">
                                <a href="report/showReport">
                                    <i class="fa fa-folder"></i> <span>Report</span>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group('')) { ?>
<!--                            <li class="treeview">
                                <a href="message/doctorMailBox">
                                    <i class="fa fa-paper-plane-o"></i> <span>Message</span>
                                </a>
                            </li>-->
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('patient')) { ?>
<!--                            <li class="treeview">
                                <a href="message/patientMailBox">
                                    <i class="fa fa-paper-plane-o"></i> <span>Message</span>
                                </a>
                            </li>-->
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="treeview">
                                <a href="settings">
                                    <i class="fa fa-gears"></i> <span>Settings</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="frontend/homePage">
                                    <i class="fa fa-globe"></i> <span>Website</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('laboratorist'))) { ?>
                            <li class="treeview">
                                <a href="patient/showPatient">
                                    <i class="fa fa-folder"></i> <span>Pathology Report</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="treeview">
                            <a href="profile">
                                <i class="fa fa-unlock"></i> <span>Profile</span>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside> 