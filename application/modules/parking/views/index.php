  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">List Car</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Plate Number</th>
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <!-- <th>Total time</th> -->
                  <th>Total Amount</th>
                  <th>Paid Status</th>
                  <?php if(in_array('updateParking', $user_permission) || in_array('deleteParking', $user_permission) || in_array('viewParking', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($parking_data as $k => $v) {
                    ?>
                    <tr>
                      <td><?php echo $v['parking']['plate_number']; ?></td>
                      <td><?php
                       $date=date('Y-m-d', strtotime($v['parking']['date_created_parking']));
                       $time=date('h:i a', strtotime($v['parking']['date_created_parking']));
                       echo $date . '<br />' . $time;
                       ?>  
                      </td>
                      <td><?php 
                      if($v['parking']['time_out'] == '') {
                        echo "-";
                      }
                      else {
                         $date= date('Y-m-d', strtotime($v['parking']['time_out']));
                         $time= date('h:i a', strtotime($v['parking']['time_out']));
                         $plusOne= date('h:i a', strtotime($time) + 60*60);
                         echo $date . '<br />' . $plusOne;
                      }
                      ?></td>

                      
                      <td><?php echo  $v['parking']['total_amount']; ?></td>
                      <td><?php echo ($v['parking']['paid_status'] == 1) ? '<label class="label label-success">Paid</label>' : '<label class="label label-warning">Not Paid</label>'; ?></td>
                      <?php if(in_array('updateParking', $user_permission) || in_array('deleteParking', $user_permission) || in_array('viewParking', $user_permission)): ?>
                      <td>
                        <?php if(in_array('updateParking', $user_permission)): ?>
                          <a href="<?php echo base_url('parking/edit/'.$v['parking']['id']) ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <?php endif; ?>
                        <?php if(in_array('deleteParking', $user_permission)): ?>
                          <a href="<?php echo base_url('parking/delete/'.$v['parking']['id']) ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                        <?php if(in_array('viewParking', $user_permission)): ?>
                            <a href="" class="btn btn-default"><i class="fa fa-print"></i></a>
                        <?php endif; ?>
                      </td>
                    <?php endif; ?>
                    </tr>
                    <?php
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables').DataTable({
        "ordering": false
      });

      $("#parkingSideTree").addClass('active');
      $("#manageParkingSideTree").addClass('active');

    });
  </script>
