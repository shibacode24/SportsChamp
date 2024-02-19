<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function check_login(Request $request)
{
   // dd($request->all());
   if (auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
   {
      
      // echo json_encode (Auth::user());
      // dd(1);
      return redirect()->route('index');
  }
  else{
   // dd(2);
   // echo "error','Invalid Login Credentials.";
    return redirect()->back()->with('error','Invalid Login Credentials.');
      }
}
public function log_out()
{
   Auth::logout();
  return redirect()->route('login');
}
}
