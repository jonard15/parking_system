<!-- MODAL EDIT -->
<form>
   <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Update User</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
            <div class="form-group row">
                  <label class="col-md-3 col-form-label">User Name</label>
                  <div class="col-md-9">
                     <input type="text" name="user_name_edit" id="user_name_edit" class="form-control" placeholder="User Name">
                  </div>
            </div>
            <!-- <div class="form-group row">
                  <label class="col-md-3 col-form-label">Email</label>
                  <div class="col-md-9">
                     <input type="text" name="user_email_edit" id="user_email_edit" class="form-control" placeholder="Email">
                  </div>
            </div> -->
            <div class="form-group row">
                  <label class="col-md-3 col-form-label">First Name</label>
                  <div class="col-md-9">
                     <input type="text" name="user_firstname_edit" id="user_firstname_edit" class="form-control" placeholder="First Name">
                  </div>
                </div>
            <div class="form-group row">
                  <label class="col-md-3 col-form-label">Last Name</label>
                  <div class="col-md-9">
                     <input type="text" name="user_lastname_edit" id="user_lastname_edit" class="form-control" placeholder="User Name">
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-md-3 col-form-label">Phone</label>
                  <div class="col-md-9">
                     <input type="text" name="user_phone_edit" id="user_phone_edit" class="form-control" placeholder="Phone">
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-md-3 col-form-label">Password</label>
                  <div class="col-md-9">
                     <input type="password" name="user_password_edit" id="user_password_edit" class="form-control" placeholder="Password">
                  </div>
            </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="user_id_edit" id="user_id_edit" class="form-control" >
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
            </div>
         </div>
      </div>
   </div>
</form>
<!--END MODAL EDIT-->