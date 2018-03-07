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
        if(!empty($keyword['name'])){
        $query->where('name','like','%'.$keyword['name'].'%');
        }
        
        if(!empty($keyword['company'])){
        $query->where('company','like','%'.$keyword['company'].'%');
        }
        
        if(!empty($keyword['kdepartment'])){
        $query->where('department','like','%'.$keyword['department'].'%');
        }
        
        if(!empty($keyword['position'])){
        $query->where('position','like','%'.$keyword['position'].'%');
        }

        if(!empty($keyword['e_mail'])){
        $query->where('e_mail','like','%'.$keyword['e_mail'].'%');
        }

        if(!empty($keyword['postcode'])){
        $query->where('postcode','like','%'.$keyword['postcode'].'%');
        }
        
        if(!empty($keyword['address'])){
        $query->where('address','like','%'.$keyword['address'].'%');
        }

        if(!empty($keyword['TEL'])){
        $query->where('TEL','like','%'.$keyword['TEL'].'%');
        }

        if(!empty($keyword['TELdepartment'])){
        $query->where('TELdepartment','like','%'.$keyword['TELdepartment'].'%');
        }

        if(!empty($keyword['TELdirect'])){
        $query->where('TELdirect','like','%'.$keyword['TELdirect'].'%');
        }

        if(!empty($keyword['FAX'])){
        $query->where('FAX','like','%'.$keyword['FAX'].'%');
        }

        if(!empty($keyword['phonenumber'])){
        $query->where('phonenumber','like','%'.$keyword['phonenumber'].'%');
        }

        if(!empty($keyword['URL'])){
        $query->where('URL','like','%'.$keyword['URL'].'%');
        }

        if(!empty($keyword['trade_day'])){
        $query->where('trade_day','like','%'.$keyword['trade_day'].'%');
        }
        
        if(!empty($keyword['eightfriends_num'])){
        $query->where('eightfriends_num','like','%'.$keyword['eightfriends_num'].'%');
        }

        if(!empty($keyword['now_dating'])){
        $query->where('now_dating','like','%'.$keyword['now_dating'].'%');
        }

        if(!empty($keyword['question'])){
        $query->where('question','like','%'.$keyword['question'].'%');
        }

        if(!empty($keyword['id'])){
        $query->where('id','like','%'.$keyword['id'].'%');
        }

        $mail = $query->get();
        $mail = $query->paginate(5);
        

        // dd("mail");
        return view('maillist')->with('imports',$mail)
                               ->with('keyword',empty($keyword['name'])?"":$keyword['name'])
                               ->with('keyword2',empty($keyword['company'])?"":$keyword['company'])
                               ->with('keyword3',empty($keyword['department'])?"":$keyword['department'])
                               ->with('keyword4',empty($keyword['position'])?"":$keyword['position'])
                               ->with('keyword5',empty($keyword['e_mail'])?"":$keyword['e_mail'])
                               ->with('keyword6',empty($keyword['postcode'])?"":$keyword['postcode'])
                               ->with('keyword7',empty($keyword['address'])?"":$keyword['address'])
                               ->with('keyword8',empty($keyword['TEL'])?"":$keyword['TEL'])
                               ->with('keyword9',empty($keyword['TELdepartment'])?"":$keyword['TELdepartment'])
                               ->with('keyword10',empty($keyword['TELdirect'])?"":$keyword['TELdirect'])
                               ->with('keyword11',empty($keyword['FAX'])?"":$keyword['FAX'])
                               ->with('keyword12',empty($keyword['phonenumber'])?"":$keyword['phonenumber'])
                               ->with('keyword13',empty($keyword['URL'])?"":$keyword['URL'])
                               ->with('keyword14',empty($keyword['trade_day'])?"":$keyword['trade_day'])
                               ->with('keyword15',empty($keyword['eightfriends_num'])?"":$keyword['eightfriends_num'])
                               ->with('keyword16',empty($keyword['now_dating'])?"":$keyword['now_dating'])
                               ->with('keyword17',empty($keyword['question'])?"":$keyword['question'])
                               ->with('keyword18',empty($keyword['id'])?"":$keyword['id']);
                              
                              
                               


}


}

