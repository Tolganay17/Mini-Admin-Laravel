<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
   
    public function indexx(){
        $data=array();
    if(Session::has('loginId')){
        $data=User::where('id','=',Session::get('loginId'))->first();
    }

        return view('home',compact('data'));
    }
    public function logout(){
    
        if(Session::has('loginId')){
            Session::pull('loginId');
            return view("auth.login");
        }
    }
}
