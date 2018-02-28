<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Refresh;

class RefreshController extends Controller
{
    public function refresh(Request $request){
        $mail=Maillist::all();
        $mail=Maillist::paginate(10);
    
        return view('maillist')->with('imports',$mail);
    }
}
