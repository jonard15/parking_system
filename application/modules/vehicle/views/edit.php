<!-- MODAL EDIT -->
<form>
   <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Edit Vehicle</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-md-3 col-form-label">Plate Number</label>
                  <div class="col-md-9">
                     <input type="text" name="plate_number_edit" id="plate_number_edit" class="form-control" placeholder="Plate Number" >
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="vehicle_id_edit" id="vehicle_id_edit" class="form-control">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
            </div>
         </div>
      </div>
   </div>
</form>
<!--END MODAL EDIT-->