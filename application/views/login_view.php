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
<div class="row">
<div class="">
<div class="login-box" style="margin-top: 25px;">
  <div class="login-logo" style="margin-bottom: 13px;">
    <img src="<?php echo base_url(); ?>assets/images/logo_ugm.png" style="max-width: 75pt;"><br><b style="font-size: 28px">Sistem Informasi PKL DSSDI</b><br> Universitas Gadjah Mada
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to your account</p>

    <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

                  $success = $this->session->flashdata('success');
                  if(!empty($success)){
                      echo '<div class="alert alert-success alert-dismissable">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-check"></i>';
                      echo $success;
                      echo '</div>';
                  }
                ?>

    <form action="<?php echo base_url(); ?>index.php/auth/login/" id="login-form" enctype="multipart/form-data" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo $this->session->flashdata('username_error'); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo $this->session->flashdata('password_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <p class="captcha-img">
            <?php echo $captchaImg; ?>
          </p>
        <input type="text" class="form-control" name="captcha" placeholder="Captcha" style="margin-bottom: 5px"/>
        <a href="#" class="reload-captcha refreshCaptcha btn btn-info btn-sm" ><i class="glyphicon glyphicon-refresh"></i></a>
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

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<!-- validate -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/dist/jquery.validate.js"></script>

<script type="text/javascript">
  $( document ).ready( function () {
      var base_url = '<?php echo base_url(); ?>';
         $('.reload-captcha').click(function(event){
             event.preventDefault();
             $.ajax({
                 url:base_url+'index.php/auth/refresh_captcha',
                 success:function(data){
                     $('.captcha-img').replaceWith("<p class='captcha-img'>" + data + "</p>");
                 }
             });            
          });

      $( "#login-form" ).validate( {
        rules: {
          username: {
            required: true,
          },
          password: {
            required: true,
          },
          captcha: {
            required: true,
          },
        },
        messages: {
          username: {
            required: "Please enter a username"
          },
          password: {
            required: "Please provide a password"
          },
          captcha: {
            required: "Please enter a captcha"
          },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );
    } );
</script>
</body>
</html>
