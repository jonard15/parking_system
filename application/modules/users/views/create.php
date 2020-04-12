<!-- MODAL ADD -->
<form>
   <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Add New User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-md-3 col-form-label">UserName</label>
                  <div class="col-md-9">
                     <input type="text" name="user_name" id="user_name" class="form-control" placeholder="UserName">
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <label class="col-md-3 col-form-label">Email</label>
                  <div class="col-md-9">
                     <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email">
                  </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">First Name</label>
                  <div class="col-md-9">
                     <input type="text" name="user_firstName" id="user_firstName" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Last Name</label>
                  <div class="col-md-9">
                     <input type="text" name="user_lastName" id="user_lastName" class="form-control" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Phone</label>
                  <div class="col-md-9">
                     <input type="text" name="user_phone" id="user_phone" class="form-control" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Password</label>
                  <div class="col-md-9">
                     <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3 col-form-label">Confirm Password</label>
                  <div class="col-md-9">
                     <input type="password" name="user_confrm_password" id="user_confrm_password" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
            </div>
         </div>
      </div>
   </div>
</form>
<!--END MODAL ADD-->
</script>
