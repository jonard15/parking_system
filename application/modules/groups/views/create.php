

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
              <h3 class="box-title">Add Role</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="group_name">Role Name</label>
                    <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter role name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                      </tr>
                      <tr>
                        <td>Role</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"></td>
                      </tr>
                      <tr>
                        <td>Event</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createEvent"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateEvent"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewEvent"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteEvent"></td>
                      </tr>
                      <tr>
                        <td>Parking</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewParking"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteParking"></td>
                      </tr>                       
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-info">Back</a>
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
      $("#groupSideTree").addClass('active');
      $("#createGroupSideTree").addClass('active');
    });
  </script>
