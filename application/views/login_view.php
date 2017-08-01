<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PKL UGM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url(); ?>assets/images/login_bg.jpeg);background-attachment: fixed;background-position: center;background-size:100%">
<div class="col-xs-8 col-xs-offset-2 bg-col bg-col1">
<div class="login-box mar-top">
  <div class="login-logo mar-bot">
    <img src="<?php echo base_url(); ?>assets/images/logo_ugm.png" class="logo-ugm"><br><b class="header">Sistem Informasi PKL DSSDI</b><br> Universitas Gadjah Mada
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to your account</p>

    <?php
      $notif = $this->session->flashdata('notif');
        if(!empty($notif)){
          echo '<div class="alert alert-danger alert-dismissable">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          echo '<i class="icon fa fa-warning"></i>';
          echo $notif;
          echo '</div>';
        }

      $notif1 = $this->session->flashdata('notif1');
      if(!empty($notif1)){
          echo '<div class="alert alert-success alert-dismissable">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          echo '<i class="icon fa fa-check"></i>';
          echo $notif1;
          echo '</div>';
      }
    ?>

    <form action="<?php echo base_url(); ?>index.php/auth/login/" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8">
              <label><a href="#"><u>Forgot your password?</u></a></label>
        </div>
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?php echo base_url(); ?>index.php/auth/register" class="btn btn-block btn-social btn-google btn-flat center">Don't have an account register here</a>
    </div>
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
