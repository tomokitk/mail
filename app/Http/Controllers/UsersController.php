<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Users;
use App\Import;

class UsersController extends Controller
{
    public function users(Request $request){

        return view("users");
    }

    //メール配信停止メソッド
    
    public function stopmail(Request $request){
        $stops = Import::where("e_mail","=",$request->e_mail)->delete();
        // dd($stops);
        // foreach($stops as $stop) {
            
        // $stop->delete();
                //     // dd($stop->flag);
        // $stops->save();
        // }
        return view('users');
        
    }


        // $ad=$request->all();
        // dd($ad);
        
    


 
}

