<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;
use App\users;

class MaillistController extends Controller
{
    public function maillist(Request $request)
    {
        $mail = Import::withTrashed()->paginate(10);
        return view('maillist')->with('imports',$mail);
    }                            
}    

       