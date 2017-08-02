<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_v; ?></h3>

              <p>Siswa PKL</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/auth/data_siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px"></sup></h3>

              <p>Operator</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Grafik Siswa PKL</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

        </section>
        <!-- right col -->

        <div class="col-lg-5">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Admin Approval</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo $total_u; ?> New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                  <ul class="users-list clearfix">
                  <?php
                    foreach ($siswa as $data) {
                      if($data->STATUS == 'unverified'){
                        echo '
                        <li>
                          <img src="'.base_url().'assets/images/blank.png" style="max-width: 80px" alt="User Image">
                          <a class="users-list-name" href="#" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'">'.$data->NAMA_SISWA.'</a>
                          <a href="'.base_url().'index.php/auth/verified/'.$data->SISWA_ID.'" class="btn btn-sm btn-primary">Accept</a><a href="'.base_url().'index.php/auth/unverified/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger" style="margin-left: 1px">x</a>
                        </li>
                      ';}
                    }
                  ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="#" data-toggle="modal" data-target="#viewAll" class="uppercase">View All Users</a>
                </div>
                <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div> -->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->

      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

  <?php
    foreach ($siswa as $data) {
      echo '
      <div class="modal fade" id="modal'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Detail Siswa</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$data->NAMA_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="'.$data->PASSWORD.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="'.$data->ACCOUNT_EMAIL.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" value="'.$data->NIS.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$data->NAMA_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$data->JENKEL_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatlahir" value="'.$data->TEMPATLAHIR_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="'.$data->TANGGALLAHIR_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="'.$data->AGAMA_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Alamat Siswa</label>
                        <textarea class="form-control" name="alamatsiswa" disabled>'.$data->ALAMAT_SISWA.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" name="nohp" value="'.$data->NOHP_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Asal SMK</label>
                        <input type="text" class="form-control" name="asal" value="'.$data->ASAL_SMK.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="'.$data->JURUSAN.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nomor Telp Sekolah</label>
                        <input type="text" class="form-control" name="notelp" value="'.$data->NOTELP_SMK.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Alamat SMK</label>
                        <textarea class="form-control" name="alamatsmk" disabled>'.$data->ALAMAT_SMK.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="text" class="form-control" name="tgl_mulai" value="'.$data->TGL_MULAI.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="text" class="form-control" name="tgl_selesai" value="'.$data->TGL_SELESAI.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$data->FOTOIDENTITAS_SISWA.'" class="user-image form-control" alt="User Image" style="height: 50%">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->  
    ';}
  ?>


              <div class="modal fade" id="viewAll">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">All User</h4>
                    </div>
                    <div class="modal-body">
                      <ul class="users-list clearfix">
                      <?php
                        foreach ($siswa as $data) {
                          if($data->STATUS == 'unverified'){
                            echo '
                            <li>
                              <img src="'.base_url().'assets/images/blank.png" style="max-width: 80px" alt="User Image">
                              <a class="users-list-name" href="#" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'">'.$data->NAMA_SISWA.'</a>
                              <a href="'.base_url().'index.php/auth/verified/'.$data->SISWA_ID.'" class="btn btn-sm btn-primary">Accept</a><a href="'.base_url().'index.php/auth/unverified/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger" style="margin-left: 1px">x</a>
                            </li>
                          ';}
                        }
                      ?>
                      </ul>
                      <!-- /.users-list -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->  