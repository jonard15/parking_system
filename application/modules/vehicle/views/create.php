<!-- MODAL ADD -->
<form>
   <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Add New Vehicle</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group row">
                  <label class="col-md-3 col-form-label">Plate Number</label>
                  <div class="col-md-9">
                     <input type="text" name="plate_number" id="plate_number" class="form-control" placeholder="Plate Number">
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
<script type="text/javascript">
   $(document).ready(function() {
    //  $("#eventSideTree").addClass('active');
     // $("#createEventSideTree").addClass('active');
   });
   
</script>