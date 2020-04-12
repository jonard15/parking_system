<!--MODAL DELETE-->
<form>
   <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-center" id="ModalLabel">Delete Events</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <strong>Remove <span id="event_name_delete"></span> ?</strong>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="event_id_delete" id="event_id_delete" class="form-control">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Confirm</button>
            </div>
         </div>
      </div>
   </div>
</form>
<!--END MODAL DELETE-->
<script></script>