<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
               <div class="inner">
                  <h3><?php echo 100 - $total_parking; ?></h3>
                  <p>Available Slots</p>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
               <div class="inner">
                  <h3><?php echo $total_parking; ?></h3>
                  <p>Currently Occupied</p>
               </div>
            </div>
         </div>
      </div>
      <!-- /.row -->

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
          <div class = "box-header text-right" >
                 <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#Modal_Add" > <span class = "fa fa-plus" > </span></a> 
              </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class ="table table-bordered table-striped" id = "mydata" >
                  <h3 class = "box-title text-center"> Parking </h3>
                     <thead>
                        <tr>
                           <th> Plate Numbers </th>
                           <th> Events </th>
                           <th> Time-in </th>
                           <th> Time-out </th>
                           <th> Amount </th>
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
   // require_once('delete.php');
   ?>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#dashboardSideNav").addClass('active');
    show_parking(); //call function show all parking
   
       $('#mydata').dataTable({
        "ordering": false
       });
   
       //function show all parking
       function show_parking() {
           $.ajax({
               type: 'ajax',
               url: "<?php echo base_url('dashboard/parking_data')?>",
               async: false,
               dataType: 'json',
               success: function(data) {
                   var html = '';
                   var i;
                   for (i = 0; i < data.length; i++) {
                      if(data[i].time_in == data[i].time_updated ){
                         var test = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-parking_id="'+data[i].id+'">checkout</a>';
                      }else{
                         var test = data[i].time_updated;
                      }
                       html += '<tr>' +
                           '<td>' + data[i].plate_number + '</td>' +
                           '<td>' + data[i].name + '</td>' +
                           '<td>' + data[i].time_in + '</td>' +
                           '<td>' + test + '</td>' +
                           '<td>' + data[i].total_amount + '</td>' +
                           '</tr>';
                   }
                   $('#show_data').html(html);
               }
   
           });
       }

       $('#btn_save').on('click', function() {
           var event_id = $("#event_id option:selected").val();
         //   var vehicle_id = $("#vehicle_id option:selected").val();
         var plate_number = $('#plate_number').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('dashboard/create')?>",
               dataType: "JSON",
               data: {
                  event_id: event_id, plate_number: plate_number
               },
               success: function(data) {
                   $('#Modal_Add').modal('hide');
                   show_parking();
               }
           });
           return false;
       });

               //get data for update record
         $('#show_data').on('click','.item_edit',function(){
            var parking_id = $(this).data('parking_id');
            var parking_date_updated = $(this).data('parking_date_updated');
            // var event_status = $(this).data('event_status');
            
            $('#Modal_Edit').modal('show');
            $('[name="parking_id_edit"]').val(parking_id);
            // $('[name="parking_date_updated"]').val(parking_date_updated);
            // $('[name="event_status_edit"]').val(event_status);
        });
                  //update record to database
            $('#btn_update').on('click',function(){
            var parking_id = $('#parking_id_edit').val();
            // var date_updated = $('#parking_date_updated').val();
            // var event_status = $('#event_status_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('dashboard/edit')?>",
                dataType : "JSON",
                data : {parking_id:parking_id },
                success: function(data){
                    // $('[name="vehicle_id_edit"]').val("");
                    // $('[name="plate_number_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_parking();
                    location.reload();
                }
            });
            return false;
        });
    });
</script>