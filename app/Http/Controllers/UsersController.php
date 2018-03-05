<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function users(Request $request){

        return view("users");
    }

    public function stopmail(Request $request){
        
        $ad=$request->all();
        dd($ad);
        
    }




}

