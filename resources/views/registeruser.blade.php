<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</head>
<body>

<div class="container">

    <a href="{{'/view'}}">View Data</a>&nbsp&nbsp
    <a href="{{'login-view'}}">Login</a>&nbsp&nbsp
    {{-- <a href="{{'/view'}}">View Data</a>&nbsp&nbsp --}}



  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Register</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">

            <form id="rgstr_form">

              <div class="success"></div>
                {{-- <pre>
                   @php
                    print_r($errors->all());   
                   @endphp
                </pre> --}}


                @csrf
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control" id="usr" name="name">
                    <span class="name_error all_errors">&nbsp;</span>
                  </div>
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  <span class="email_error all_errors">&nbsp;</span>
                </div>
                <div class="form-group col-md-6">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                  <span class="password_error all_errors">&nbsp;</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="cnf-pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="cnf_pwd" placeholder="Confirm password" name="password_confirmation">
                    <span class="password_confirmation_error all_errors">&nbsp;</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address">
                 
                    <span class="address_error all_errors">&nbsp;</span></div>

                  <div class="form-group col-md-6">
                    <label for="zip">Zip:</label>
                    <input type="text" class="form-control" id="zip" name="zip">
                    <span class="zip_error all_errors">&nbsp;</span>
                  </div>


                  <div class="form-group">
                    <label for="state">Statae</label>
                    <select class="form-control" id="state" name="state">
                      <option>Punjab</option>
                      <option>Sindh</option>
                      <option>KPK</option>
                      <option>Balochistan</option>
                    </select>
                    <span class="state_error all_errors"></span>
                  </div><br>
                {{-- <div class="checkbox">
                  <label><input type="checkbox" name="remember"> Remember me</label>
                </div> --}}
            
                <button type="submit" id="sbmt" class="btn btn-default">Submit</button>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<script type="text/javascript">
         $(document).ready(function() {
         
            $(document).on("click","#sbmt",function(e) {
          e.preventDefault();
               $('.all_errors').empty();
          $.ajax({
             type: "POST",
             url: "{{route('form_submit')}}",
             dataType: "json",
             data: $('form').serializeArray(),
             success : function(data){
              // console.log(data.errors);
              $('#rgstr_form').trigger('reset');
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
</body>
</html>
