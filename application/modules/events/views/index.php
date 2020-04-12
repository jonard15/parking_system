  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
              <div class = "box-header text-right" >
                 <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#Modal_Add" > <span class = "fa fa-plus" > </span></a> 
              </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class ="table table-bordered table-striped" id = "mydata" >
                  <h3 class = "box-title text-center"> Events </h3>
                     <thead>
                        <tr>
                           <th> Event Name </th>
                           <th> Status </th>
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
  <script type="text/javascript">
    $(document).ready(function() {
    $("#eventSideTree").addClass('active');
    show_event(); //call function show all event
   
       $('#mydata').dataTable({
        "ordering": false
       });
   
       //function show all event
       function show_event() {
           $.ajax({
               type: 'ajax',
               url: "<?php echo base_url('events/event_data')?>",
               async: false,
               dataType: 'json',
               success: function(data) {
                   var html = '';
                   var i;
                   for (i = 0; i < data.length; i++) {
                      if(data[i].status == 1){
                        var status = '<span class="label label-success">Active</span>';
                      }else if(data[i].status == 2){
                        var status = '<span class="label label-warning">Inactive</span>';
                      }
                       html += '<tr>' +
                           '<td>' + data[i].name + '</td>' +
                           '<td id="demo">' + status + '</td>' +
                           '<td>' +
                           '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-event_id="'+data[i].id+'" data-event_name="'+data[i].name+'" data-event_status="'+data[i].status+'"><i class="fa fa-pencil"></i></a>'+' '+
                           '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-event_id="' + data[i].id + '" data-event_name="'+data[i].name+'"><i class="fa fa-trash"></i></a>' +
                           '</td>' +
                           '</tr>';
                   }
                   $('#show_data').html(html);
               }
   
           });
       }
       $('#btn_save').on('click', function() {
           var event_name = $('#event_name').val();
           var event_status = $("#event_status option:selected").val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('events/create')?>",
               dataType: "JSON",
               data: {
                event_name: event_name, event_status: event_status
               },
               success: function(data) {
                   $('[name="event_name"]').val("");
                  //  $('[name="event_status"]').val("");
                   $('#Modal_Add').modal('hide');
                   show_event();
                   location.reload();
               }
           });
           return false;
       });

        //get data for update record
            $('#show_data').on('click','.item_edit',function(){
            var event_id = $(this).data('event_id');
            var event_name = $(this).data('event_name');
            var event_status = $(this).data('event_status');
            
            $('#Modal_Edit').modal('show');
            $('[name="event_id_edit"]').val(event_id);
            $('[name="event_name_edit"]').val(event_name);
            $('[name="event_status_edit"]').val(event_status);
        });

          //update record to database
          $('#btn_update').on('click',function(){
            var event_id = $('#event_id_edit').val();
            var event_name = $('#event_name_edit').val();
            var event_status = $('#event_status_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('events/edit')?>",
                dataType : "JSON",
                data : {event_id:event_id , event_name:event_name , event_status:event_status},
                success: function(data){
                    // $('[name="vehicle_id_edit"]').val("");
                    // $('[name="plate_number_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_event();
                    location.reload();
                }
            });
            return false;
        });

      //get data for delete record
       $('#show_data').on('click', '.item_delete', function() {
           var event_id = $(this).data('event_id');
           var event_name = $(this).data('event_name');
   
           $('#Modal_Delete').modal('show');
           document.getElementById("event_name_delete").innerHTML = event_name;
           $('[name="event_id_delete"]').val(event_id);
       });

          //delete record to database
          $('#btn_delete').on('click', function() {
           var event_id = $('#event_id_delete').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('events/delete')?>",
               dataType: "JSON",
               data: {
                   event_id: event_id
               },
               success: function(data) {
                   $('[name="event_id_delete"]').val("");
                   $('#Modal_Delete').modal('hide');
                   show_event();
                   location.reload();
               }
           });
           return false;
       });
    });
  </script>
