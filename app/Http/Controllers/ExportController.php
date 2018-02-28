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
        
        $keyword = $request->all();

        
        $users = Import::all()->toArray();
        //php://outputだとrewind()、fseek()が使えずファイルポインタを先頭に戻せないのでphp://tempを使用。
        $stream = fopen('php://temp', 'r+b');
        foreach ($users as $user) {
          fputcsv($stream, $user);
          
        }
       //$csv = stream_get_contents($stream);
        //fclose($stream);
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
            
        $filename = 'test.csv';
        $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ];
        return Response::make($csv, 200, $headers);








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
