<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Log;

class DeleteController extends Controller
{
    public function delete(Request $request){
        // $post=$request->input('id');
        //  Log::debug($post);
       
        
        $break=Import::findOrFail($request->id);
        
        $break->delete();
        
        // }elseif($request->edit=="edit"){
        // $update= new Import();
        // $update->onamae = $request->input('onamae');
        $mail=Import::withTrashed()->get();

        return view('maillist')->with('imports',$mail);

    }
}
