<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use App\Import;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ExportController extends Controller
{
    public function export(Request $request){
        


        //dd($request->all());
         $keyword = $request->all();
        // dd($keyword);

        $query = Import::query();
        // dd($query);
            if(!empty($keyword['name'])){
            $query->where('name','like','%'.$keyword['name'].'%');
            }
            if(!empty($keyword['company'])){
            $query->where('company','like','%'.$keyword['company'].'%');
            }
            
            if(!empty($keyword['department'])){
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
            
        $users = $query->get()->toArray();
            //  dd($users);
        //php://outputだとrewind()、fseek()が使えずファイルポインタを先頭に戻せないのでphp://tempを使用。
        $stream = fopen('php://temp', 'r+b');
        foreach ($users as $user){
          fputcsv($stream, $user);
          
        }
       //$csv = stream_get_contents($stream);
        //fclose($stream);
        rewind($stream);
        
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');

        //dd($csv);
            
        $filename = 'test.csv';
        $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ];
       
          return Response::make($csv, 200, $headers);
                                                    // ->with('keyword',$keyword['name'])
                                                    // ->with('keyword2',$keyword['company'])
                                                    // ->with('keyword3',$keyword['department'])
                                                    // ->with('keyword4',$keyword['positon'])
                                                    // ->with('keyword5',$keyword['e_mail'])
                                                    // ->with('keyword6',$keyword['postcode'])
                                                    // ->with('keyword7',$keyword['adress'])
                                                    // ->with('keyword8',$keyword['TEL'])
                                                    // ->with('keyword9',$keyword['TELdepartment'])
                                                    // ->with('keyword10',$keyword['TELdirect'])
                                                    // ->with('keyword11',$keyword['FAX'])
                                                    // ->with('keyword12',$keyword['phonenumber'])
                                                    // ->with('keyword13',$keyword['URL'])
                                                    // ->with('keyword14',$keyword['trade_day'])
                                                    // ->with('keyword15',$keyword['eightfrinds_num'])
                                                    // ->with('keyword16',$keyword['now_dating'])
                                                    // ->with('keyword17',$keyword['question'])
                                                    // ->with('keyword18',$keyword['id']);








        //rewide($stream);
        //ダウンロードするプログラム
        // $headers = array(
        //     'Content-Type' =>'text/csv',
        //     //'Content-Length' =>'.filesize($stream)',
        //     'Content-Disposition' => 'attachment; filename="users.csv"',
        // );
    
        // //dd($csv);

        // return Response::make($stream,200,$headers);
        // //download($stream,200,$headers);    
        
        }
    //header('Content-Type:text/csv');
    //header('Content-Disposition: attachment; filename="users.csv"');
    // );
    //return/Response::make('', 200, $headers);


    
}
