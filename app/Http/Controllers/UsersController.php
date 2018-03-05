<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function users(){
        
        return view("users");
    }
}
