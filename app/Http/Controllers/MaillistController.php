<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class MaillistController extends Controller
{
    public function maillist(Request $request){
        
        $mail = Maillist::all();
        
        //dd($mail);
        return view('maillist')->with('imports',$mail);
}

}    

        #ページネーション
        // $data = $query->orderBy('created_at','desc')->paginate(10);
        // return view('crud.index')->with('data',$data)
        // ->with('keyword',$keyword)
        // ->with('message','ユーザーリスト');
    
