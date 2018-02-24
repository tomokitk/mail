<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;

class SearchController extends Controller
{
    public function search(Request $request){

        #キーワード受け取り
        $keyword = $request->input('keyword');
        $keyword2 = $request->input('keyword2');
        #クエリ生成
        $query = Maillist::query();

        #もしキーワードがあったら
        if(!empty($keyword || $keyword2))
        {
        $query->where('name','like','%'.$keyword.'%')
              ->where('phonenumber','like','%'.$keyword2.'%');
        }
        $mail = $query->get();
        //dd($mail);
        return view('maillist')->with('imports',$mail)
                               ->with('keyword',$keyword)
                               ->with('keyword2',$keyword2);


}

}