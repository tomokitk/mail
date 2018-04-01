<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;
use Log;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->all();    
        #クエリ生成
        $query = Import::query();
        if(!empty($keyword['name']))
        {
        $query->where('name','like','%'.$keyword['name'].'%');
        }
        
        if(!empty($keyword['company']))
        {
        $query->where('company','like','%'.$keyword['company'].'%');
        }
        
        if(!empty($keyword['department']))
        {
        $query->where('department','like','%'.$keyword['department'].'%');
        }
        
        if(!empty($keyword['position']))
        {
        $query->where('position','like','%'.$keyword['position'].'%');
        }

        if(!empty($keyword['e_mail']))
        {
        $query->where('e_mail','like','%'.$keyword['e_mail'].'%');
        }

        if(!empty($keyword['postcode']))
        {
        $query->where('postcode','like','%'.$keyword['postcode'].'%');
        }
        
        if(!empty($keyword['address']))
        {
        $query->where('address','like','%'.$keyword['address'].'%');
        }
        // if(!empty($keyword['TEL']))
        // {
        // $query->whereRaw('replace(TEL,"-","")= :TEL',[$keyword['TEL']]);
        // }

        // todo 検索で入力されたハイフンを除去したものとDBを比較する
        if(!empty($keyword['TEL']))
        {
        $TEL = str_replace(array('-', 'ー', '−', '―', '‐'), "", $keyword['TEL']);
        $query->where('TEL','like','%'.$TEL.'%');
        }

        if(!empty($keyword['TELdepartment']))
        {
        $TELdepartment = str_replace(array('-', 'ー', '−', '―', '‐'), "", $keyword['TELdepartment']);
        $query->where('TELdepartment','like','%'.$TELdepartment.'%');
        }

        if(!empty($keyword['TELdirect']))
        {
        $TELdirect = str_replace(array('-', 'ー', '−', '―', '‐'), "", $keyword['TELdirect']);
        $query->where('TELdirect','like','%'.$TELdirect.'%');
        }

        if(!empty($keyword['FAX']))
        {
        $FAX = str_replace(array('-', 'ー', '−', '―', '‐'), "", $keyword['FAX']);
        $query->where('FAX','like','%'.$FAX.'%');
        }

        if(!empty($keyword['phonenumber']))
        {
        $phonenumber = str_replace(array('-', 'ー', '−', '―', '‐'), "", $keyword['phonenumber']);
        $query->where('phonenumber','like','%'.$phonenumber.'%');
        }

        if(!empty($keyword['URL']))
        {
        $query->where('URL','like','%'.$keyword['URL'].'%');
        }

        if(!empty($keyword['trade_day']))
        {
        $query->where('trade_day','like','%'.$keyword['trade_day'].'%');
        }
        
        if(!empty($keyword['eightfriends_num']))
        {
        $query->where('eightfriends_num','like','%'.$keyword['eightfriends_num'].'%');
        }

        if(!empty($keyword['now_dating']))
        {
        $query->where('now_dating','like','%'.$keyword['now_dating'].'%');
        }

        if(!empty($keyword['question']))
        {
        $query->where('question','like','%'.$keyword['question'].'%');
        }

        if(!empty($keyword['id']))
        {
        $query->where('id','like','%'.$keyword['id'].'%');
        }

        // $csv = str_replace("-","",$query);
        // $mail = $csv->get();
        $mail = $query->get();
        // log::debug($mail);
        $mail = $query->paginate(5);
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

