<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Users;
use App\Import;

class UsersController extends Controller
{
    public function users(Request $request)
    {
            return view('users');
    }
    //メール配信停止メソッド
    public function stopmail(Request $request)
    {
        $this->validate($request,[
            'e_mail' => 'required',
            'e_mail' => 'email',
            ]); 
        $user_mail=$request->e_mail;
        $stops = Import::where("e_mail","=",$user_mail)->first(); //get でも可（ただ、今回はそんなに重複のアドレスが多くないためfirst）
        if(isset($stops)){
            foreach($stops as $stop)
            $stop->delete();
            return view('users');
        }else{
            $errors_message="そのアドレスは登録されていません";
            return view('users')->with('error_message',$errors_message);
        } 
    }
}

