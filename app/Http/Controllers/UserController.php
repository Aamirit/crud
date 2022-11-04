<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
// use Storage;
use File;




//crud with ajax
class UserController extends Controller
{
    //
    public function Create_User(Request $req){
// $formData = $req->input();
// print_r($formData);
 
// $file = $req->file('test_file')->store('uploads');
// exit;
    $data = [];
    $data['response'] = false;
    $file = $req->file('file');
    $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
        'address' => 'required',
        'zip' => 'required',
        'state' => 'required',
        'file'=> 'required'

        
    );
    $messages = array(
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        'address.required' => 'Address is required',
        'zip.required' => 'Zip Code is required',
        'state.required' => 'Please Select State',
        'file.required' => 'Please Select File' 

        
    );
    $validations  = Validator::make($req->all(), $rules, $messages);
    if($validations->fails()){
        $data['errors'] = $validations->errors();
        $data['response'] = false;
        // return redirect('call/add')->withErrors($validator, 'login')->withInput();
    } else {
        // exit;
        $customer = new Customer;
        $customer->name = $req['name'];
        $customer->email = $req['email'];
        $customer->password = $req['password'];
        $customer->address = $req['address'];
        $customer->zip = $req['zip'];
        $customer->state = $req['state'];
        $filename = $file->getClientOriginalName();
        $path = public_path('upload/');
        $file->move($path,$filename);
        $customer->file = $filename;
        $customer->save();
        $data['response'] = true;
        $data['success']  = "Data Added Successfully!";
        $data['redirect'] = '/view';
        // $data['user_id'] = Auth::id();
        // Call::create($data);
        // return redirect()->route('call.index')->with('success', 'You have added record Successfully');
    }

echo json_encode($data);
exit;

    }

    public function Show_data(){
        $customers = Customer::all();
        // echo "<pre>";
        // print_r($customers->toArray());
       $data =  compact('customers');
        return view('viewdata')->with($data);
    }
    
    public function edit(Request $req){
        $id = $req->id;
        $customer = Customer::find($id);
        $data =  $customer->toArray();
        echo json_encode($data);
        exit;
    }

public function update_user(Request $req){
    $data = [];
    $data['response'] = false;
    $id = $req->id;
    $customer = Customer::find($id);
    //     $data =  $customer->toArray();
    // print_r($data);
    // exit;
    $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'address' => 'required',
        'zip' => 'required',
        'state' => 'required'

        
    );
    $messages = array(
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        'address.required' => 'Address is required',
        'zip.required' => 'Zip Code is required',
        'state.required' => 'Please Select State' 
        
    );
    $validations  = Validator::make($req->all(), $rules, $messages);
    if($validations->fails()){
        $data['errors'] = $validations->errors();
        $data['response'] = false;
        // return redirect('call/add')->withErrors($validator, 'login')->withInput();
    } else {
        $customer->name = $req['name'];
        $customer->email = $req['email'];
        $customer->password = $req['password'];
        $customer->address = $req['address'];
        $customer->zip = $req['zip'];
        $customer->state = $req['state'];
        $customer->save();
        $data['response'] = true;
        $data['success']  = "Data Updated Successfully!";
        $data['redirect'] = '/view';
        // $data['user_id'] = Auth::id();
        // Call::create($data);
        // return redirect()->route('call.index')->with('success', 'You have added record Successfully');
    }

echo json_encode($data);
exit;
}

public function delete(Request $req){
    $data = [];
    $data['response'] = false;
    $id = $req->id;
        $customer = Customer::find($id);
        $data =  $customer->toArray();
        $file_name = $customer['file'];
        if(File::exists(public_path('upload/'.$file_name.''))){

            File::delete(public_path('upload/'.$file_name.''));

        }
// print_r($file_name);
//         // echo json_encode($data);
//         exit;
        $customer->delete();
        $data['response'] = true;
        $data['success']  = "Data deleted Successfully!";
        $data['redirect'] = '/view';
        
        echo json_encode($data);
    exit;
    }
    public function upload_csv(Request $req){
      $formData = $req->input();
     
    $file = $req->file('file');
    print_r($file);
      exit;
    }

    // Fetch records
    public function getEmployees(Request $request){
        // echo"123";
        $formData = $request->input();
    
        ## Read value
        // $orderByColumnIndex = $request->get(['order'][0]['column']);
        // print_r($orderByColumnIndex);
        // exit;
		// $orderByColumn = $request->get['columns'][$orderByColumnIndex]['data'];
		// $orderType = $request->get['order'][0]['dir'];
		// $offset = $request->input->post('start');
		// $limit = $request->input->post('length');
		// $draw = $request->input->post('draw');
		// $search = $request->get['search']['value'];




        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        
        $columnIndex_arr = $request->get('order');
        
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        // print_r($search_arr);
        // exit;

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        // Total records
        $totalRecords = customer::select('count(*) as allcount')->count();
        // echo"1234";
      
        $totalRecordswithFilter = customer::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
       
        // Fetch records
        $records = customer::orderBy($columnName,$columnSortOrder)->where('customers.name', 'like', '%' .$searchValue . '%')->select('customers.*')->skip($start)->take($rowperpage)->get();
             
        $data_arr = array();

        foreach($records as $record){
           $id = $record->id;
           $name = $record->name;
           $email = $record->email;
           $address = $record->address;

           $data_arr[] = array(
               "id" => $id,
               "name" => $name,
               "email" => $email,
               "address" => $address
           );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );
        // print_r($response);
        // exit;

        return response()->json($response); 
     }




}
