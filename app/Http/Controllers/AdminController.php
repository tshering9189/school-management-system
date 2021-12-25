<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Logout(){
        Auth::logout();//check if the user is logged in
        return redirect()->route('login');
    }
}
