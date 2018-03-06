<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Users;
use App\Import;

class UsersController extends Controller
{
    public function users(Request $request){
            return view('users');
    }
    //メール配信停止メソッド
    public function stopmail(Request $request){
        $user_mail=$request->e_mail;
        $stops = Import::where("e_mail","=",$user_mail)->get();
        if(isset($stops)){
            foreach($stops as $stop)
            $stop->delete();
            return view('users');
        }else{
            $errors_message="sorry we do not have your e_mail address";
            return view('users')->with('error_message',$errors_message);
        } 
    }
}

