<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class MaillistController extends Controller
{
    public function maillist(Request $request){
        
        $mail = Maillist::all();
        
        var_dump(count($mail));
        return view('maillist')->with('imports',$mail);
}
}
