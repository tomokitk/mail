<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Users;
use App\Import;
use Log;

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
        $email = Import::where("e_mail","=",$user_mail)->first(); 
        if(isset($email))
        {
            $success_message="退会処理が完了しました";
            $email->delete();
            return view('users')->with('responce_message',$success_message);
        }else
        {
            $errors_message="そのアドレスは登録されていません";
            return view('users')->with('responce_message',$errors_message);
        } 
    }
}

