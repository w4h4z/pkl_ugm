<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Petugas PKL 
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">   
              <h3 class="box-title">Data Petugas PKL</h3>
              <div class="" style="margin-top: 10px">
                <a href="#" data-toggle="modal" data-target="#tambahAdmin" class="btn btn-md btn-primary">Tambah Petugas</a>
              </div>
            
            <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable" style="margin-top: 10px">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

                  $success = $this->session->flashdata('success');
                  if(!empty($success)){
                      echo '<div class="alert alert-success alert-dismissable" style="margin-top: 10px">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-check"></i>';
                      echo $success;
                      echo '</div>';
                  }
                ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>NIP</th>
                  <th>No Hp</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($admin as $data) {
                  echo '
                  <tr>
                    <td>'.$no++.'</td>
                    <td>'.$data->USERNAME.'</td>
                    <td>'.$data->PASSWORD.'</td>
                    <td>'.$data->NAMA_PEMBIMBING.'</td>
                    <td>'.$data->JENKEL_PEMBIMBING.'</td>
                    <td>'.$data->NIP.'</td>
                    <td>'.$data->NOHP_PEMBIMBING.'</td>
                    <td>'.$data->ACCOUNT_EMAIL.'</td>
                    <td>'.$data->ALAMAT_PEMBIMBING.'</td>
                    <td><a href="#" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a><a href="#" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>

                ';}
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

             <div class="modal fade" id="tambahAdmin">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Petugas</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admin/add_admin">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                      </div>
                      <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenkel">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" name="nip" required>
                      </div>
                      <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" class="form-control" name="no_hp" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                      </div>
                      <div class="form-group">
                        <label>Upload Identitas</label>
                        <input type="file" class="form-control" name="identitas" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary pull-right" value="Submit">
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->