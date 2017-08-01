<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Timeline
        <small>Activity</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-aqua">
                    PKL <small>UGM</small>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php 
                foreach ($kegiatan as $data) {
                    echo '
                    <li>
                      <i class="fa fa-commenting bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-calendar"></i> '.$data->TGL_KEGSIS.'</span>

                        <h3 class="timeline-header"><a href="#">'.$data->NAMA_SISWA.'</a> '.$data->ASAL_SMK.'</h3>

                        <div class="timeline-body">
                          '.$data->ISI_KEGSIS.'
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-xs">Read more</a>
                          <a href="#" class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    ';
                }
              ?>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->