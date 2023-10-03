<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Ad sahəsi boş qoyula bilməz.',
            'surname.required' => 'Soyad sahəsi boş qoyula bilməz.',
            'email.required' => 'Email sahəsi boş qoyula bilməz.',
            'email.email' => 'Düzgün bir email ünvanı daxil edin.',
            'email.max' => 'Email ünvanı maksimum 255 simvol ola bilər.',
            'email.unique' => 'Bu email artıq istifadə olunur.',
            'password.required' => 'Şifrə sahəsi boş qoyula bilməz.',
            'password.min' => 'Şifrə minimum 8 simvol olmalıdır.',
            'password.confirmed' => 'Şifrə təsdiqlənmir.',
        ]);
        

        $user = new User();

        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        
        if ($user->save()) {
            return redirect()->route('login')->with('success', 'Qeydiyyat uğurlu oldu');
        } else {
            return back()->with('error', 'Qeydiyyat uğursuz oldu. Zəhmət olmasa bir daha cəhd edin.');
        }

       
    }
}
