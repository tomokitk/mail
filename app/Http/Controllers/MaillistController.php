<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;
use App\users;

class MaillistController extends Controller
{
    public function maillist(Request $request){
        
        $mail = Import::withTrashed()->get();

        
       
        //dd($mail);
        return view('maillist')->with('imports',$mail);
                                // ->with('keyword',$keyword)
                                // ->with('keyword2',$keyword2);
 }

}    

        #ページネーション
        // $data = $query->orderBy('created_at','desc')->paginate(10);
        // return view('crud.index')->with('data',$data)
        // ->with('keyword',$keyword)
        // ->with('message','ユーザーリスト');
    
