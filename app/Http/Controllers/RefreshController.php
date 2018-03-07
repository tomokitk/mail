<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Refresh;
use App\Import;

class RefreshController extends Controller
{
    public function refresh(Request $request){
        $mail=Import::withTrashed()->paginate(10);
        
    
        return view('maillist')->with('imports',$mail);
    }
}
