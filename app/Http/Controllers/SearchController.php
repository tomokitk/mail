<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class SearchController extends Controller
{
    public function search(Request $request){

        #キーワード受け取り
        $keyword = $request->input('keyword');
        
        #クエリ生成
        $query = Maillist::query();

        #もしキーワードがあったら
        if(!empty($keyword))
        {
        $query->where('name','like','%'.$keyword.'%');
        }
        $mail = $query->get();
        //dd($mail);
        return view('maillist')->with('imports',$mail)
                               ->with('keyword',$keyword);


}

}