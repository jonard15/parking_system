

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
              <h3 class="box-title">Add Parking</h3>
            </div>
            <form role="form" action="<?php base_url('parking/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Events</label>
                  <select class="form-control" id="event_id" name="event_id">
                    <option value="">~~Select~~</option>
                    <?php foreach ($events as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="group_name">Vehicle</label>
                  <select class="form-control" id="vehicle_id" name="vehicle_id">
                    <option value="">~~Select~~</option>
                    <?php foreach ($vehicle as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>"><?php echo $v['plate_number'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="<?php echo base_url('parking/') ?>" class="btn btn-info">Back</a>
              </div>
            </form>
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
      $("#parkingSideTree").addClass('active');
      $("#createParkingSideTree").addClass('active');
    });
  </script>
