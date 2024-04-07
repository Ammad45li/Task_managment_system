<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
   public function login_view(){
    return view('auth.login');
   }

   public function login(Request $request)
   {
      $request->validate([
        'email' => ['required' , 'email'],
        'password' => ['required'],
      ]);
      if(Auth::attempt($request->except(['_token']))){
        $type = Auth::user()->type;
        if($type == 'admin'){
            return redirect()->route('admin.index');
        }elseif($type == 'manager')
        {
            return redirect()->route('manager.index');
        }elseif($type == 'student')
        {
            return Redirect()->route('student.index');
        }
      }else {
        return back()->with(['failure' => 'Invalid login credentials!']);
    }
   }

   public function logout()
   {
      Auth::logout();
      return redirect()->route('login')->with(['success' => 'Successfully logged out!']);
   }
}
