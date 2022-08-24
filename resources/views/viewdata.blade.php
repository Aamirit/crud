<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <a href="{{'/'}}">Register </a>&nbsp&nbsp
         </div>
         <h2>Table</h2>
         <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>
         <div class="table-responsive table-striped">
            <table class="table">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Zip</th>
                     <th>State</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($customers as $customer )
                  <tr>
                     <td>{{$customer->id}}</td>
                     <td>{{$customer->name}}</td>
                     <td>{{$customer->email}}</td>
                     <td>{{$customer->address}}</td>
                     <td>{{$customer->zip}}</td>
                     <td>{{$customer->state}}</td>
                     <td>
                        {{-- {{route('customeredit',['id' => $customer->id])}} --}}
                        {{-- <a href="{{route('deletecustomer',['id' => $customer->id])}}">Move toTrash</a> --}}
                        <form  id="editForm">
                           @csrf
                           <button type="submit" id="editsbmt" data-id="{{$customer->id}}">Edit</button>
                           {{-- <a href="{{route('customeredit',['id' => $customer->id])}}"   data-toggle="modal" data-target="#myModal">Edit</a> &nbsp &nbsp  --}}
                        </form>
                        <form id="deletefrm">
                           @csrf
                           <button type="submit" id="deletedata" data-id="{{$customer->id}}">Delete</button>
                           {{-- <a href="{{url('delete/')}}/{{$customer->id}}">Delete</a> --}}
                        </form>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update</button> --}}
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog  modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Data</h4>
               </div>
               <div class="modal-body">
                  <form id="rgstr_form">
                     <div class="success"></div>
                     {{-- 
                     <pre>
                 @php
                  print_r($errors->all());   
                 @endphp
              </pre>
                     --}}
                     @csrf
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="usr">Name:</label>
                           <input type="text" class="form-control name" id="usr" name="name">
                           <span class="name_error all_errors">&nbsp;</span>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="email">Email:</label>
                           <input type="email" class="form-control email" id="email" placeholder="Enter email" name="email">
                           <span class="email_error all_errors">&nbsp;</span>
                        </div>
                        <input type="hidden" class="form-control password" id="password" placeholder="Enter password" name="password">
                        {{-- 
                        <div class="form-group col-md-6">
                           <label for="cnf-pwd">Confirm Password:</label>
                           <input type="password" class="form-control cnfrm_pswd" id="cnf_pwd" placeholder="Confirm password" name="password_confirmation">
                           <span class="password_confirmation_error all_errors">&nbsp;</span>
                        </div>
                        --}}
                        <div class="form-group col-md-6">
                           <label for="address">Address:</label>
                           <input type="text" class="form-control address" id="address" name="address">
                           <span class="address_error all_errors">&nbsp;</span>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="zip">Zip:</label>
                           <input type="text" class="form-control zip" id="zip" name="zip">
                           <span class="zip_error all_errors">&nbsp;</span>
                        </div>
                        <div class="form-group">
                           <label for="state">Statae</label>
                           <select class="form-control state" id="state" name="state">
                              <option value="punjab">Punjab</option>
                              <option value="sindh">Sindh</option>
                              <option value="kpk">KPK</option>
                              <option value ="balochistan">Balochistan</option>
                           </select>
                           <span class="state_error all_errors"></span>
                        </div>
                        <br>
                        {{-- 
                        <div class="checkbox">
                           <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        --}}
                        <input type="hidden" class="id" name="id" >
                        <button type="submit" id="sbmit" class="btn btn-default">Submit</button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      {{-- select query data --}}
      <script type="text/javascript">
         $(document).ready(function() {
            $(document).on("click","#editsbmt",function(e) {
          e.preventDefault();
             var id = $(this).attr("data-id");
             var _token = $('#editForm input[name="_token"]').val();
             $.ajax({
               type: "POST",
               url: "{{route('customeredit')}}",
               dataType: "json",
               data: {id,_token},
               success : function(data){
               $('#myModal').modal('show'); 
               $('.name').val(data.name);
               $('.email').val(data.email);
               $('.password').val(data.password);
               $('.cnfrm_pswd').val(data.password);
               $('.address').val(data.address);
               $('.zip').val(data.zip);
               $('.state').val(data.state);
               $('.id').val(data.id);
              console.log(data);
              }
           });
         
         });
         });
      </script>
      {{-- update data --}}
      <script type="text/javascript">
         $(document).ready(function() {
         
            $(document).on("click","#sbmit",function(e) {
          e.preventDefault();
               $('.all_errors').empty();
          $.ajax({
             type: "POST",
             url: "{{route('updateuser')}}",
             dataType: "json",
             data: $('form').serializeArray(),
             success : function(data){
              // console.log(data.errors);
             //  $('#rgstr_form').trigger('reset');
               if(data.response == true){
                swal({
                  title: "Congratulations?",
                  text: data.success,
                  icon: "success"
                })
                .then((value) => {
                  if (value) {
                    window.location.replace(data.redirect);
                  }
                });
                  // $('.success').text(data.success);
                  // window.location.replace(data.redirect);
               }else {
               if(data.errors){
                  $('.name_error').text(data.errors.name);
                  $.each(data.errors, function (key, value) {
         $('.' + key + '_error').html(value);
         });
              
               }
               // console.log(data);
              
             }}
           });
         
         });
         });
      </script>


  {{-- //  delete query data  --}}
      <script type="text/javascript">
         $(document).ready(function() {
            $(document).on("click","#deletedata",function(e) {
          e.preventDefault();
             var id = $(this).attr("data-id");
  
           swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((value) => {
                    if (value) {
                      $.ajax({
                      type: "POST",
                      url: "{{route('deletecustomer')}}",
                      dataType: "json",
                      data: {id,_token},
                      success : function(data){
                        if(data.response == true){   
                          window.location.replace(data.redirect);
                      }     
                      }
                  });
                    } else {
                      swal("Your imaginary file is safe!");
                    }
                  });




         });
         });
      </script>

   </body>
</html>
