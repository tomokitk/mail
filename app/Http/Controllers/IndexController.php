<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Log;

class IndexController extends Controller
{
    public function  update(Request $request){
        $update = Import::where("id","=",$request->id)->first();
        $update->e_mail = $request->e_mail;
        $update->save();
        $mail=Import::all();
        return view("maillist")->with('imports',$mail);
    }
        
        
}
