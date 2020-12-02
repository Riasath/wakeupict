<!DOCTYPE html>
<html>
    <head><base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="<?php echo $this->settings_model->getSettings()->img_url; ?>">
        <title><?php echo lang('login'); ?> <?php echo $this->settings_model->getSettings()->title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="common/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="common/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="common/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .msg {
                background-color: #32c69a;
                padding: 10px;
                color: white;
                font-size: 16px;
                margin-top: 3px;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div>
                <?php
                $r_message = $this->session->flashdata('feedback');
                if (!empty($r_message)) {
                    ?>
                    <div class="flashmessage msg"><i class="fa fa-check"></i> <?php echo $r_message; ?></div>
                <?php }
                ?>
            </div>
            <div class="login-logo">
                <img alt="" src="<?php echo $this->settings_model->getSettings()->img_url; ?>" width="70" height="60">
            </div>
            <div class="text-center">
                <h2 class="text-info"><?php echo $this->settings_model->getSettings()->title; ?></h2>
                <h4><?php echo $this->settings_model->getSettings()->system_vendor; ?></h4>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="auth/login" method="post" name="auto_login">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="identity" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <!--          <div class="checkbox icheck">
                                        <label>
                                          <input type="checkbox"> Remember Me
                                        </label>
                                      </div>-->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button id="signIn" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <div class="col-xs-4"> </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                        <b>Auto Login As</b>
                        </tr>
<!--                        <tr>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Password</th>
                        </tr>-->
                        <tr>
                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value = 'admin@example.com';auto_login.password.value = '12345'; auto_sign_in()">Admin</button></td>
                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value = 'doctor@example.com';auto_login.password.value = '12345'; auto_sign_in()">Doctor</button></td>
                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value = 'patient@example.com';auto_login.password.value = '12345'; auto_sign_in()">Patient</button></td> </br>
                        </tr>
                        <tr>
                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value = 'receptionist@example.com';auto_login.password.value = '12345'; auto_sign_in()">Receptionist</button></td>
<!--                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value='AB SIDDIQUE';auto_login.password.value='12345'">AB SIDDIQUE</button></td>
                            <td> <button  class="btn btn-info" onclick="auto_login.identity.value='SIRAM MOJA';auto_login.password.value='12345'">Valoi moja</button></td>-->

                        </tr>
<!--                        <tr>
                            <td>Doctor</td>
                            <td>doctor@example.com</td>
                            <td>12345</td>
                        </tr>
                        <tr>
                            <td>Patient</td>
                            <td>patient@example.com</td>
                            <td>12345</td>
                        </tr>
                        <tr>
                            <td>Assistant</td>
                            <td>assistant@example.com</td>
                            <td>12345</td>
                        </tr>
                        <tr>
                            <td>Receptionist</td>
                            <td>receptionist@example.com</td>
                            <td>12345</td>
                        </tr>-->
                    </table>
                </div>


                <!--                <a href="#">I forgot my password</a><br>
                                <a href="register.html" class="text-center">Register a new membership</a>-->

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="common/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="common/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="common/plugins/iCheck/icheck.min.js"></script>
        <script>
                                $(function () {
                                    $('input').iCheck({
                                        checkboxClass: 'icheckbox_square-blue',
                                        radioClass: 'iradio_square-blue',
                                        increaseArea: '20%' // optional
                                    });
                                });

                                function auto_sign_in() {
                                    document.getElementById('signIn').click()
                                }
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
                                $(document).ready(function () {
                                    $(".flashmessage").delay(10000).fadeOut(700);
                                });
        </script>
    </body>
</html>