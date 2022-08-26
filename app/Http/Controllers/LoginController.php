<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // exit;
        // unset($request['_token']);
        // $request['password'] = Hash::make($request->password);
        // dd($request->all());
        if (Auth::attempt($credentials)) {
            // echo "hello world11";exit;
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
  echo "hello world";exit;
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from Real Programmer',
            'body' => 'Body: This is for testing email using smtp'
        ];

        Mail::to('mamir.tvs@gmail.com')->send(new SendMail($details));
        return view('emails.thanks');
    }
}