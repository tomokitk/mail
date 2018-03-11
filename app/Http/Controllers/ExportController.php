<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ExportController extends Controller
{
    public function export(Request $request)
    {
         $keyword = $request->all();
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
    
            if(!empty($keyword['TEL']))
            {
            $query->where('TEL','like','%'.$keyword['TEL'].'%');
            }
    
            if(!empty($keyword['TELdepartment']))
            {
            $query->where('TELdepartment','like','%'.$keyword['TELdepartment'].'%');
            }
    
            if(!empty($keyword['TELdirect']))
            {
            $query->where('TELdirect','like','%'.$keyword['TELdirect'].'%');
            }
    
            if(!empty($keyword['FAX']))
            {
            $query->where('FAX','like','%'.$keyword['FAX'].'%');
            }
    
            if(!empty($keyword['phonenumber']))
            {
            $query->where('phonenumber','like','%'.$keyword['phonenumber'].'%');
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
        $users = $query->get()->toArray();
        $stream = fopen('php://temp', 'r+b');
        $csvheader = ["id","会社名","部署名","役職名","氏名","メールアドレス","郵便番号","住所","TEL会社","TEL部門","TEL直通","FAX","携帯番号","URL","名刺交換","Eightでつながっている人","再データ化中の名刺","？を含んだデータ"];
        fputcsv($stream,$csvheader);
        foreach ($users as $user){
          fputcsv($stream, $user);
        }
        rewind($stream);
        
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $filename = 'test.csv';
        $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ];
    }
}   
          return Response::make($csv, 200, $headers);
                                                    

      
        
  
