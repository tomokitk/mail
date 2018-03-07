<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;

class SearchController extends Controller
{
    public function search(Request $request){

        #キーワード受け取り
        $keyword = $request->all();
        
        //dd($keyword);
        // $a = $request->path();
        // logger($a);
        
        #クエリ生成
        $query = Import::query();
        
        //  dd($keyword['keyword2']);
        #もしキーワードがあったら
        if(!empty($keyword)){
        $query->where('name','like','%'.$keyword['keyword'].'%');
        }
        if(!empty($keyword)){
        $query->where('company','like','%'.$keyword['keyword2'].'%');
        }
        
        if(!empty($keyword)){
        $query->where('department','like','%'.$keyword['keyword3'].'%');
        }
        
        if(!empty($keyword)){
        $query->where('position','like','%'.$keyword['keyword4'].'%');
        }

        if(!empty($keyword)){
        $query->where('e_mail','like','%'.$keyword['keyword5'].'%');
        }

        if(!empty($keyword)){
        $query->where('postcode','like','%'.$keyword['keyword6'].'%');
        }
        
        if(!empty($keyword)){
        $query->where('address','like','%'.$keyword['keyword7'].'%');
        }

        if(!empty($keyword)){
        $query->where('TEL','like','%'.$keyword['keyword8'].'%');
        }

        if(!empty($keyword)){
        $query->where('TELdepartment','like','%'.$keyword['keyword9'].'%');
        }

        if(!empty($keyword)){
        $query->where('TELdirect','like','%'.$keyword['keyword10'].'%');
        }

        if(!empty($keyword)){
        $query->where('FAX','like','%'.$keyword['keyword11'].'%');
        }

        if(!empty($keyword)){
        $query->where('phonenumber','like','%'.$keyword['keyword12'].'%');
        }

        if(!empty($keyword)){
        $query->where('URL','like','%'.$keyword['keyword13'].'%');
        }

        if(!empty($keyword)){
        $query->where('trade_day','like','%'.$keyword['keyword14'].'%');
        }
        
        if(!empty($keyword)){
        $query->where('eightfriends_num','like','%'.$keyword['keyword15'].'%');
        }

        if(!empty($keyword)){
        $query->where('now_dating','like','%'.$keyword['keyword16'].'%');
        }

        if(!empty($keyword)){
        $query->where('question','like','%'.$keyword['keyword17'].'%');
        }

        if(!empty($keyword)){
        $query->where('id','like','%'.$keyword['keyword18'].'%');
        }

        $mail = $query->get();
        // $mail = $query->paginate(5);
        

        //dd($mail);
        return view('maillist')->with('imports',$mail)
                               ->with('keyword',$keyword['keyword'])
                               ->with('keyword2',$keyword['keyword2'])
                               ->with('keyword3',$keyword['keyword3'])
                               ->with('keyword4',$keyword['keyword4'])
                               ->with('keyword5',$keyword['keyword5'])
                               ->with('keyword6',$keyword['keyword6'])
                               ->with('keyword7',$keyword['keyword7'])
                               ->with('keyword8',$keyword['keyword8'])
                               ->with('keyword9',$keyword['keyword9'])
                               ->with('keyword10',$keyword['keyword10'])
                               ->with('keyword11',$keyword['keyword11'])
                               ->with('keyword12',$keyword['keyword12'])
                               ->with('keyword13',$keyword['keyword13'])
                               ->with('keyword14',$keyword['keyword14'])
                               ->with('keyword15',$keyword['keyword15'])
                               ->with('keyword16',$keyword['keyword16'])
                               ->with('keyword17',$keyword['keyword17'])
                               ->with('keyword18',$keyword['keyword18']);
                               //->with('link',$a);
                              
                               


}


}

