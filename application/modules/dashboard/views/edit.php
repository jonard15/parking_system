<!-- MODAL EDIT -->
<form>
   <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Update Parking Status</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <strong>Do you really want to update ?</strong>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="parking_id_edit" id="parking_id_edit" class="form-control" >
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
            </div>
         </div>
      </div>
   </div>
</form>
<!--END MODAL EDIT-->