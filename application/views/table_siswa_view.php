<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa PKL
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
              <h3 class="box-title">Data Siswa PKL</h3>
            
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
                  <th>NIS</th>
                  <th>Asal Sekolah</th>
                  <th>Jurusan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $data) {
                  if($data->STATUS == 'verified'){
                  echo '
                  <tr>
                    <td>'.$no++.'</td>
                    <td>'.$data->USERNAME.'</td>
                    <td>'.$data->PASSWORD.'</td>
                    <td>'.$data->NAMA_SISWA.'</td>
                    <td>'.$data->NIS.'</td>
                    <td>'.$data->ASAL_SMK.'</td>
                    <td>'.$data->JURUSAN.'</td>
                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'" style="margin-right: 5px">Detail</button><a href="'.base_url().'index.php/admin/edit_siswa/'.$data->SISWA_ID.'" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a><a href="'.base_url().'index.php/admin/del_siswa/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>

                ';}
                  }
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
                        <input type="text" class="form-control" name="username" value="'.$data->USERNAME.'" disabled>
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
                        <textarea class="form-control" name="alamatsekolah" disabled>'.$data->ALAMAT_SMK.'</textarea>
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

