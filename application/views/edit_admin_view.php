<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Petugas PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data tables</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Petugas PKL</h3>
            </div>
            <div class="box-body">  
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/edit_petugas_submit/<?php echo $petugas->PEMBIMBING_ID; ?>">
<?php
    echo '
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$petugas->NAMA_PEMBIMBING.'">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$petugas->JENKEL_PEMBIMBING.'">
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" name="nip" value="'.$petugas->NIP.'">
                      </div>
                      <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="'.$petugas->NOHP_PEMBIMBING.'">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="'.$petugas->ACCOUNT_EMAIL.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat">'.$petugas->ALAMAT_PEMBIMBING.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$petugas->USERNAME.'">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="'.$petugas->PASSWORD.'">
                      </div>
                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$petugas->FOTOIDENTITAS_PEMBIMBING.'" class="user-image form-control" alt="User Image" style="height: inherit">
                      </div>
                      <div class="form-group">
                        <input type="file" class="form-control" name="identitas">
                      </div>

  ';
?>
            <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                <a href="<?php echo base_url(); ?>index.php/admin/data_admin" class="btn btn-danger">Cancel</a>
            </div>
            </form>
            </div>
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
