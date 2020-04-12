<!-- Content Wrapper. Contains page content -->
<div class = "content-wrapper" >
   <!-- Main content -->
   <section class = "content" >
      <!-- Small boxes (Stat box) -->
      <div class = "row" >
         <div class = "col-md-12 col-xs-12" >
            <div class = "box" >
               <div class = "box-header text-right" >
                      <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#Modal_Add" > <span class = "fa fa-plus" > </span></a> 
                </div>
               <!-- /.box-header -->
               <div class = "box-body" >
                  <table class ="table table-bordered table-striped" id = "mydata" >
                  <h3 class = "box-title text-center"> Vehicle Details </h3>
                     <thead>
                        <tr>
                           <th> Product Code </th>
                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody id = "show_data" >
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
<?php
   require_once('create.php');
   require_once('edit.php');
   require_once('delete.php');
   ?>
<script type = "text/javascript" >
   $(document).ready(function() {
    $("#vihicleSideNav").addClass('active');
    show_vehicle(); //call function show all vechicle
   
       $('#mydata').dataTable({
        "ordering": false
       });
   
       //function show all vechicle
       function show_vehicle() {
           $.ajax({
               type: 'ajax',
               url: "<?php echo base_url('vehicle/vehicle_data')?>",
               async: false,
               dataType: 'json',
               success: function(data) {
                   var html = '';
                   var i;
                   for (i = 0; i < data.length; i++) {
                       html += '<tr>' +
                           '<td>' + data[i].plate_number + '</td>' +
                           '<td>' +
                           '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-vehicle_id="'+data[i].id+'" data-plate_number="'+data[i].plate_number+'"><i class="fa fa-pencil"></i></a>'+' '+
                           '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-vehicle_id="' + data[i].id + '" data-plate_number="'+data[i].plate_number+'"><i class="fa fa-trash"></i></a>' +
                           '</td>' +
                           '</tr>';
                   }
                   $('#show_data').html(html);
               }
   
           });
       }
   
       //Save vihecle
       $('#btn_save').on('click', function() {
           var plate_number = $('#plate_number').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('vehicle/create')?>",
               dataType: "JSON",
               data: {
                   plate_number: plate_number
               },
               success: function(data) {
                   $('[name="plate_number"]').val("");
                   $('#Modal_Add').modal('hide');
                   show_vehicle();
                   location.reload();
               }
           });
           return false;
       });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var vehicle_id = $(this).data('vehicle_id');
            var plate_number = $(this).data('plate_number');
            
            $('#Modal_Edit').modal('show');
            $('[name="vehicle_id_edit"]').val(vehicle_id);
            $('[name="plate_number_edit"]').val(plate_number);
        });
        //update record to database
         $('#btn_update').on('click',function(){
            var vehicle_id = $('#vehicle_id_edit').val();
            var plate_number = $('#plate_number_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('vehicle/edit')?>",
                dataType : "JSON",
                data : {vehicle_id:vehicle_id , plate_number:plate_number},
                success: function(data){
                    $('[name="vehicle_id_edit"]').val("");
                    $('[name="plate_number_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_vehicle();
                    location.reload();
                }
            });
            return false;
        });
   
       //get data for delete record
       $('#show_data').on('click', '.item_delete', function() {
           var vehicle_id = $(this).data('vehicle_id');
           var plate_number = $(this).data('plate_number');
   
           $('#Modal_Delete').modal('show');
           document.getElementById("plate_number_delete").innerHTML = plate_number;
           $('[name="vehicle_id_delete"]').val(vehicle_id);
       });
       //delete record to database
       $('#btn_delete').on('click', function() {
           var vehicle_id = $('#vehicle_id_delete').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('vehicle/delete')?>",
               dataType: "JSON",
               data: {
                   vehicle_id: vehicle_id
               },
               success: function(data) {
                   $('[name="product_code_delete"]').val("");
                   $('#Modal_Delete').modal('hide');
                   show_vehicle();
                   location.reload();
               }
           });
           return false;
       });
   }); 
</script>