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
    <img src="<?php echo base_url(); ?>assets/images/logo_ugm.png" class="logo-ugm"><br><b class="header">Sistem Informasi PKL DSSDI</b><br> Universitas Gadjah Mada
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Create an account</p>

    <?php
      $notif = $this->session->flashdata('notif');
        if(!empty($notif)){
          echo '<div class="alert alert-danger alert-dismissable">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          echo '<i class="icon fa fa-warning"></i>';
          echo $notif;
          echo '</div>';
        }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/register/simpan">
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>NIS</label>
        <input type="number" class="form-control" placeholder="NIS" name="nis" required>
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
      </div>
      <div class="form-group">
      <label>Jenis Kelamin</label>
      <select class="form-control" name="jenkel">
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
      </select>
      </div>
      <div class="form-group has-feedback">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lhr" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Agama</label>
        <input type="text" class="form-control" placeholder="Agama" name="agama" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Alamat Siswa</label>
        <textarea class="form-control" rows="3" placeholder="Alamat Siswa" name="alamatsiswa" required></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>No HP</label>
        <input type="number" class="form-control" placeholder="No HP" name="nohp" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Asal SMK</label>
        <input type="text" class="form-control" placeholder="Asal SMK" name="asal" required>
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Jurusan</label>
        <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" required>
        <span class="glyphicon glyphicon-education form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>No Telp Sekolah</label>
        <input type="number" class="form-control" placeholder="No HP" name="notelp" required>
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Alamat Sekolah</label>
        <textarea class="form-control" rows="3" placeholder="Alamat Sekolah" name="alamatsekolah" required></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Mulai</label>
        <input type="date" class="form-control" name="tgl_mulai" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Tanggal Selesai</label>
        <input type="date" class="form-control" name="tgl_selesai" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Upload Identitas</label>
        <input type="file" class="form-control" name="identitas" required>
        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
      </div>
      <div class="form-group">
        <label>Captcha</label>
        <p id="captImg"><?php echo $captchaImg; ?></p>
        <input type="text" class="form-control" name="captcha" placeholder="Captcha" style="margin-bottom: 5px"/>
        <a href="<?php echo base_url(); ?>index.php/auth/refresh" class="refreshCaptcha btn btn-info btn-sm" ><i class="glyphicon glyphicon-refresh"></i></a>
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/demo.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    })
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
