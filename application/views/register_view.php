<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PKL UGM | Register</title>
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/css/skins/_all-skins.min.css">
  <!-- my own css -->
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
<div class="col-xs-8 col-xs-offset-2 bg-col">
<div class="register-box mar-top" style="width: 60%;">
  <div class="register-logo mar-bot">
    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo_ugm.png" class="logo-ugm"></a><br><b class="header">Sistem Informasi PKL DSSDI</b><br> Universitas Gadjah Mada
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Create an account</p>

    <?php
      $failed = $this->session->flashdata('failed');
        if(!empty($failed)){
          echo '<div class="alert alert-danger alert-dismissable">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          echo '<i class="icon fa fa-warning"></i>';
          echo $failed;
          echo '</div>';
        }
    ?>

    <form method="post" enctype="multipart/form-data" id="register-form" action="<?php echo base_url();?>index.php/auth/daftar">
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" id="usernmae" value="<?php echo $this->session->flashdata('username_error'); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo $this->session->flashdata('password_error'); ?>" passwordCheck="passwordCheck" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?php echo $this->session->flashdata('confirm_password_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span id='confirm_message'></span>
      </div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $this->session->flashdata('email_error'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>NIS</label>
        <input type="number" class="form-control" placeholder="NIS" name="nis" id="nis" value="<?php echo $this->session->flashdata('nis_error'); ?>" required>
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" value="<?php echo $this->session->flashdata('nama_error'); ?>" required>
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
      </div>
      <div class="form-group">
      <label>Jenis Kelamin</label>
      <select class="form-control" name="jenkel" id="jenkel">
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
      </select>
      </div>
      <div class="form-group has-feedback">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir" id="tempatlahir" value="<?php echo $this->session->flashdata('tempatlahir_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" value="<?php echo $this->session->flashdata('tgl_lhr_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Agama</label>
        <input type="text" class="form-control" placeholder="Agama" name="agama" id="agama" value="<?php echo $this->session->flashdata('agama_error'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Alamat Siswa</label>
        <textarea class="form-control" rows="3" placeholder="Alamat Siswa" name="alamatsiswa" id="alamatsiswa" required><?php echo $this->session->flashdata('alamatsiswa_error'); ?></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>No HP</label>
        <input type="number" class="form-control" placeholder="No HP" name="nohp" id="nohp" value="<?php echo $this->session->flashdata('nohp_error'); ?>" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Asal SMK</label>
        <input type="text" class="form-control" placeholder="Asal SMK" name="asal" id="asal" value="<?php echo $this->session->flashdata('asal_error'); ?>" required>
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Jurusan</label>
        <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" id="jurusan" value="<?php echo $this->session->flashdata('jurusan_error'); ?>" required>
        <span class="glyphicon glyphicon-education form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>No Telp Sekolah</label>
        <input type="number" class="form-control" placeholder="No HP" name="notelp" id="notelp" value="<?php echo $this->session->flashdata('notelp_error'); ?>" required>
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Alamat Sekolah</label>
        <textarea class="form-control" rows="3" placeholder="Alamat Sekolah" name="alamatsekolah" id="alamatsekolah" required><?php echo $this->session->flashdata('alamatsekolah_error'); ?></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Mulai</label>
        <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo $this->session->flashdata('tgl_mulai_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Selesai</label>
        <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" min="<?php echo date("Y-m-d");?>" value="<?php echo $this->session->flashdata('tgl_selesai_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Upload Identitas</label>
        <input type="file" class="form-control" name="identitas" id="identitas" required>
        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
      </div>
      <div class="form-group">
        <label>Captcha</label>
          <p id="captImg" class="captcha-img"><?php echo $captchaImg; ?></p>
        <input type="text" class="form-control" name="captcha" placeholder="Captcha" style="margin-bottom: 5px"/>
        <a href="#" class="reload-captcha refreshCaptcha btn btn-info btn-sm" ><i class="glyphicon glyphicon-refresh"></i></a>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-3">
          <input type="submit" value="Register" class="btn btn-primary btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>
    </form>

      <div class="already">
          Already have an account?<a href="<?php echo base_url(); ?>"><u> Log in</u></a>
      </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/adminlte.min.js"></script>
<!-- validate -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/dist/jquery.validate.js"></script>

<script type="text/javascript">
  $( document ).ready( function () {
    $.validator.addMethod("checkUsername", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"GET",
                async: false,
                url: base_url+'index.php/auth/checkusername/' + value,
                success: function(msg) {
                    result = (msg == "exists") ? false : true;
                }
            });
            return result;
        }, 
        "Username Already Exists"
    );

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

      jQuery.validator.addMethod("passwordCheck",
        function(value, element, param) {
            if (this.optional(element)) {
                return true;
            } else if (!/[0-9]/.test(value)) {
                return false;
            } else if(!/[a-z]/.test(value)){
                return false;
            }

            return true;
        },
        "Password must contain number & alphabet");

        $('#password, #confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#confirm_message').html('Matching').css('color', 'green');
          } else 
            $('#confirm_message').html('Not Matching').css('color', 'red');
        });

      $( "#register-form" ).validate( {
        rules: {
          username: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                } 
            },
            minlength: 4,
            checkUsername: true
          },
          password: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 6
            
          },
          confirm_password: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            
          },
          nis: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 4
          },
          nama: {
            required: true,
            minlength: 6
          },
          tempatlahir: {
            required: true,
            minlength: 4
          },
          agama: {
            required: true,
            minlength: 5
          },
          alamatsiswa: {
            required: true,
            minlength: 10 
          },
          nohp:{
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 9
          },
          asal:{
            required: true,
            minlength: 10
          },
          jurusan:{
            required: true,
            minlength: 5
          },
          notelp:{
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 8
          },
          alamatsekolah: {
            required: true,
            minlength: 10 
          },
          captcha: {
            required: true 
          },
        },
        messages: {
          username: {
            required: "Please enter a username",
            minlength: "Your username must const of at least 4 characters"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirm_password: {
            required: "Please provide a confirm password"
          },
          nis: {
            required: "Please enter your NIS number",
            minlength: "Your NIS number must const of at least 4 characters"
          }, 
          nama: {
            required : "Please enter your full name",
            minlength: "Your full name muct const of at leat 6 characters"
          },
          tempatlahir: {
            required : "Please enter your place of birth",
            minlength: "Your place of birth must const of at least 4 characters"
          },
          agama: {
            required : "Please enter your religion",
            minlength: "Your religion must const of at least 5 characters"
          },
          alamatsiswa: {
            required : "Please enter your home address",
            minlength: "Your home addres must const of at least 10 characters"
          }, 
          nohp:{
            required : "Please enter your phone number",
            minlength: "Your phone number must be at least 9 characters long"
          }, 
          asal:{
            required : "Please enter which school are you from",
            minlength: "Your school must const of at least 10 characters"
          },
          jurusan:{
            required : "Please enter your department",
            minlength: "Your department must const of at least 5 characters"
          },
          notelp:{
            required : "Please enter your school phone number",
            minlength: "Your school phone number must be at least 8 characters long"
          }, 
          alamatsekolah: {
            required : "Please enter your school address",
            minlength: "Your school addres must const of at least 10 characters"
          },
          captcha: {
            required : "Please enter captcha"
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
        },
      } );
    });
</script>
</body>
</html>
