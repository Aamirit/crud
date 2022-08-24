<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;





//crud with ajax
class UserController extends Controller
{
    //
    public function Create_User(Request $req){
// $formData = $req->input();
// print_r($formData);


    $data = [];
    $data['response'] = false;

    $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
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
        
        $customer = new Customer;
        $customer->name = $req['name'];
        $customer->email = $req['email'];
        $customer->password = $req['password'];
        $customer->address = $req['address'];
        $customer->zip = $req['zip'];
        $customer->state = $req['state'];
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
        // $data =  $customer->toArray();
        // echo json_encode($data);
        // exit;
        $customer->delete();
        $data['response'] = true;
        $data['success']  = "Data deleted Successfully!";
        $data['redirect'] = '/view';
        
        echo json_encode($data);
exit;
}

}
