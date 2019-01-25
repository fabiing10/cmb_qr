<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        return redirect('login');
    }
    public function code()
    {
        return view('codigos');
    }
    public function map()
    {
        return view('map');
    }


    public function redirectURL(){
        $userType = Auth::user()->userType;

        if($userType == "admin"){
            return redirect("/administrator");
        }else if($userType == "super-admin"){
            return redirect("/control");
        }else if($userType == "user"){
            return redirect("/user");
        }else{
            return redirect("/logout");
        }
    }



}
