<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;

class DeleteController extends Controller
{
    public function delete(Request $request){
        //dd($request);
        if($request->edit=="delete"){
        $break=Import::findOrFail($request->id);
        
        $break->delete();
        
        }elseif($request->edit=="edit"){
        $update= new Import();
        $update->onamae = $request->input('onamae');
        }


        $mail=Import::all();

        return view('maillist')->with('imports',$mail);

    }
}
