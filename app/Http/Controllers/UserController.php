<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RegistersUsers;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    
    function login(){
    	return view('login');
    }
    function out()
    {
    	Auth::logout();
    	return redirect('homepage');
    }
}
