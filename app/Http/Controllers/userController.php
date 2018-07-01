<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	return view('admin.users.allUser');
    }
    public function insert(){
    	return view('admin.users.addUser');
    }
}
