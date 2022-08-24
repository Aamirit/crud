<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/wlcm', function () {
    return view('welcome');
});
//methods of route get,post,put,patch,delete we also use any(not a proper method) method to get
Route::get('demo', function(){
    // return view('demo');
    echo"demo";
});
Route::get('param/{name}/{id?}', function($para, $id="null"){
   
    // echo $para;
    $data = compact('para','id');
    // print_r($data);
      return view('demo')->with($data);
});


Route::get('/', function () {
    return view('register');
});

Route::post('/sbmt',[UserController::class,'Create_User'])->name("form_submit");

// Route::get('/view',[UserController::class,'Create_User'])->name("form_submit");
Route::get('view', [UserController::class,'Show_data'])->name("listdata");


Route::post('edit',[UserController::class,'edit'])->name('customeredit');
Route::post('update',[UserController::class,'Update_user'])->name("updateuser");
 Route::post('delete',[UserController::class,'delete'])->name('deletecustomer');