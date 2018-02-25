<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class RefreshController extends Controller
{
    public function refresh(Request $request){
        $mail=Maillist::all();
    
        return view('maillist')->with('imports',$mail);
    }
}
