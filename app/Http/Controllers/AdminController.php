<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       

        $user = User::where('deleted_at','=',NULL)->get();
        return view('admin.home.index',compact('user'));
    }

}
