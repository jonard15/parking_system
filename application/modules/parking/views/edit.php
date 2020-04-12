

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


          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <?php if($this->session->flashdata('payment_error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('payment_error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3>Update payment</h3>
            </div>

            <form action="<?php echo base_url('parking/updatepayment/') ?>" method="post">
            <div class="box-body">
              <?php $date = strtotime('now'); ?>
              <div class="form-group">
                <label for="">Check-out date : <?php echo date('Y-m-d', $date); ?></label> <br />
                <label for="">Check-out time : <?php echo date('h:i a', $date); ?></label>
              </div>
              <div class="form-group">
                <label class="payment_status">Payment status</label>
                <select class="form-control" name="payment_status" id="payment_status">
                  <option value="">~~Select~~</option>
                  <option value="1">Paid</option>
                  <option value="0">Unpaid</option>
                </select>
              </div>
            </div>
            <div class="box-footer">
              <input type="text" name="parking_id" id="parking_id" value="<?php echo $save_parking_data['id'];  ?>">
              <button type="submit" class="btn btn-success">Update payment</button>
              <a href="<?php echo base_url('parking/') ?>" class="btn btn-info">Back</a>
            </div>   

            </form>

          </div>
        </div>
      </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
    $(document).ready(function() {
      $("#parkingSideTree").addClass('active');
      $("#manageParkingSideTree").addClass('active');
    });
  </script>
