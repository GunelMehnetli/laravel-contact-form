<?php

namespace App\Http\Controllers\Back\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginAction (Request $request){
        // $user =new User;
        // $user->name = 'gunel';
        // $user->email = 'gunel.mehnetli@gmail.com';
        // $user->password = Hash::make('123456');
        // $user->save();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
    }
    
}
