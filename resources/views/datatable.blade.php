<!DOCTYPE html>
<html>
<head>
     <title>Datatables AJAX pagination with Search and Sort in Laravel 8</title>

     <!-- Meta -->
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">

     <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</head>
<style>

    #cars {
        width: 200px;
      }
</style>
<body>
    <div class="filterdiv" style="margin: 50px;">  
    <select name="filtr" id="filtr">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
      </select>
    </div>
    <table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
        <thead>
            <tr>
                 <td>S.no</td>   
                 <td>Name</td>
                 <td>Email</td>
                 <td>Address</td>
            </tr>
         </thead>
     </table>

     <!-- Script -->
     <script type="text/javascript"> 
     $(document).ready(function(){
        $('#empTable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{route('getEmployees')}}",
             columns: [
                 { data: 'id' },
                 { data: 'name' },
                 { data: 'email' },
                 { data: 'address' },

             ]
         });
         $(document).on("change", "#filtr", function (e) {
            
        var val = $(this).val();

            alert(val);
			$("#empTable").DataTable().ajax.reload();
		});
      });
      </script>
</body>
</html>