<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");

    }
    public function registration(){
         return view("auth.registration");
    }
    public function registerUser( Request $req){

     $req->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:4|max:12'
     ]);
     $user = new User();
     $user->name=$req->name;
     $user->email=$req->email;
     $user->password=Hash::make($req->password);
     $res= $user->save();
     if($res){
              return back()->with('success','You have registered');
     }else{
        return back()->with('fail','smth wrong');
     }
   }
 
   public function loginUser(Request $req){
    $req->validate([
        'email'=>'required|email',
        'password'=>'required|min:4|max:12'
    ]);
    $user=User::where('email','=',$req->email)->first();
    if($user){
        if(Hash::check($req->password,$user->password)){
           $req->session()->put('loginId',$user->id);
           return redirect('admin');
        }else{
            return back()->with('fail','Password does not match');
        }

    }else{
        return back()->with('fail','This email is not registered');

    }
}
public function dashboard(){
    //$data=array();
    //if(Session::has('loginId')){
      //  $data=User::where('id','=',Session::get('loginId'))->first();
    //}

    //return view('dashboard',compact('data'));
    $data=Customer::paginate(5);
    
    return view('dashboard',['users'=>$data]);
   
}
public function lists(){
 
   $arr['data']=Customer::paginate(5);
  
  return view('admin.lists')->with($arr);
}

}
