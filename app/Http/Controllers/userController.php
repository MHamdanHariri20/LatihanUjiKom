<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('login');
    }

    public function loginAuth(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            $authenticatedUser = Auth::user();

            if ($authenticatedUser) {
                return redirect('/dashboard');
            } else {
                return redirect('/login');
            }
        }
        return redirect('dashboard');
    }

    public function register(){
        return view('register');
    }

    public function registerAuth(Request $request){
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'username' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
        ]);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
