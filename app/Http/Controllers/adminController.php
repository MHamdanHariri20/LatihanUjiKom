<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard(){
        return view('dashboard.dashboard');
    }

    public function stok(){
        return view('dashboard.stok');
    }

    public function pendataan(){
        return view('dashboard.pendataan');
    }
}
