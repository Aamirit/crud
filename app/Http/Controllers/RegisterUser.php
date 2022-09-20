<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterUser extends Controller
{
    //

    public function register_user(Request $req){
        $data = [];
    $data['response'] = false;

    $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
        
        
    );
    $messages = array(
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'password.required' => 'Password is required',
        
    );
    $validations  = Validator::make($req->all(), $rules, $messages);
    if($validations->fails()){
        $data['errors'] = $validations->errors();
        $data['response'] = false;
        // return redirect('call/add')->withErrors($validator, 'login')->withInput();
    } else {
       
        $user = new User;
        $user->name = $req['name'];
        $user->email = $req['email'];
        // $request['password'] =
        $user->password = Hash::make($req->password);
        $user->save();
        // print_r($user);
        // exit;
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
}
