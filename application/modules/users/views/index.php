

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
              <div class = "box-header text-right" >
                 <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#Modal_Add" > <span class = "fa fa-plus" > </span></a> 
              </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class ="table table-bordered table-striped" id = "mydata" >
                  <h3 class = "box-title text-center"> Users </h3>
                     <thead>
                        <tr>
                           <th> User Name </th>
                           <th> Name </th>
                           <th> Phone </th>
                           <th> Role </th>
                           <th> Action </th>
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
    $("#userSideNav").addClass('active');
    show_user(); //call function show all user
   
       $('#mydata').dataTable({
        "ordering": false
       });
   
       //function show all event
       function show_user() {
           $.ajax({
               type: 'ajax',
               url: "<?php echo base_url('users/user_data')?>",
               async: false,
               dataType: 'json',
               success: function(data) {
                   var html = '';
                   var i;
                   for (i = 0; i < data.length; i++) {
                     if(data[i].id != 1)
                     {
                       html += '<tr>' +
                           '<td>' + data[i].username + '</td>' +
                           '<td>' + data[i].firstname + ' ' + ' ' + ' ' + data[i].lastname + '</td>' +
                           '<td>' + data[i].phone + '</td>' +
                           '<td>' + 'Parking Attendant' +'</td>' +
                           '<td>' +
                           '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-user_id="'+data[i].id+'" data-user_name="'+data[i].username+'" data-user_email="'+data[i].email+'" data-user_firstname="'+data[i].firstname+'" data-user_lastname="'+data[i].lastname+'" data-user_phone="'+data[i].phone+'" data-user_password="'+data[i].password+'"><i class="fa fa-pencil"></i></a>'+' '+
                           '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-user_id="' + data[i].id + '" data-user_name="'+data[i].username+'"><i class="fa fa-trash"></i></a>' +
                           '</td>' +
                           '</tr>';
                      }
                   }
                   $('#show_data').html(html);
               }
   
           });
       }

       $('#btn_save').on('click', function() {
           var user_name = $('#user_name').val();
           var user_email = $('#user_email').val();
           var user_firstName = $('#user_firstName').val();
           var user_lastName = $('#user_lastName').val();
           var user_phone = $('#user_phone').val();
           var user_password = $('#user_password').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('users/create')?>",
               dataType: "JSON",
               data: {
                user_name: user_name, user_name: user_name, user_email: user_email, user_firstName: user_firstName, user_lastName: user_lastName, user_phone: user_phone, user_password: user_password,
               },
               success: function(data) {
                   $('[name="event_name"]').val("");
                  //  $('[name="event_status"]').val("");
                   $('#Modal_Add').modal('hide');
                   show_user();
                   location.reload();
               }
           });
           return false;
       });

          //get data for update record
            $('#show_data').on('click','.item_edit',function(){
            var user_id = $(this).data('user_id');
            var user_name = $(this).data('user_name');
            var user_email = $(this).data('user_email');
            var user_firstname = $(this).data('user_firstname');
            var user_lastname = $(this).data('user_lastname');
            var user_phone = $(this).data('user_phone');
            var user_password = $('#user_password').val();
            
            $('#Modal_Edit').modal('show');
            $('[name="user_id_edit"]').val(user_id);
            $('[name="user_name_edit"]').val(user_name);
            $('[name="user_email_edit"]').val(user_email);
            $('[name="user_firstname_edit"]').val(user_firstname);
            $('[name="user_lastname_edit"]').val(user_lastname);
            $('[name="user_phone_edit"]').val(user_phone);
            $('[name="user_password_edit"]').val(user_password);
            
        });

          //update record to database
           $('#btn_update').on('click',function(){
            var user_id = $('#user_id_edit').val();
            var user_name = $('#user_name_edit').val();
            var user_email = $('#user_email_edit').val();
            var user_firstname = $('#user_firstname_edit').val();
            var user_lastname = $('#user_lastname_edit').val();
            var user_phone = $('#user_phone_edit').val();
            var user_password = $('#user_password_edit').val();  
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('users/edit')?>",
                dataType : "JSON",
                data : {user_id:user_id , user_name:user_name , user_email:user_email, user_firstname:user_firstname , user_lastname:user_lastname , user_phone:user_phone , user_password:user_password},
                success: function(data){
                    // $('[name="vehicle_id_edit"]').val("");
                    // $('[name="plate_number_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_user();
                    location.reload();
                }
            });
            return false;
        });

      //get data for delete record
       $('#show_data').on('click', '.item_delete', function() {
           var user_id = $(this).data('user_id');
           var user_name = $(this).data('user_name');
   
           $('#Modal_Delete').modal('show');
           $('[name="user_id_delete"]').val(user_id);
           document.getElementById("user_delete").innerHTML = user_name;
       });

          //delete record to database
          $('#btn_delete').on('click', function() {
           var user_id = $('#user_id_delete').val();
           $.ajax({
               type: "POST",
               url: "<?php echo base_url('users/delete')?>",
               dataType: "JSON",
               data: {
                user_id: user_id
               },
               success: function(data) {
                   $('[name="user_id_delete"]').val("");
                   $('#Modal_Delete').modal('hide');
                   show_user();
                   location.reload();
               }
           });
           return false;
       });
  });

  </script>
