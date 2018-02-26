<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maillist;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ExportController extends Controller
{
    public function export(Request $request){
    
        $users = Maillist::all()->toArray();
        
        $stream = fopen('php://output', 'w');
        foreach ($users as $user) {
          fputcsv($stream, $user);
          
        }
       //$csv = stream_get_contents($stream);
        //fclose($stream);
        
        //ダウンロードするプログラム
        $headers = array(
            'Content-Type' =>'application/octet-stream',
            'Content-Length' =>'.filesize($stream)',
            'Content-Disposition' => 'attachment; filename=users.csv',
        );
    
        //dd($stream);

        return Response::make($stream,200,$headers);
        //download($stream,200,$headers);    
    
    }
    //header('Content-Type:text/csv');
    //header('Content-Disposition: attachment; filename="users.csv"');
    // );
    //return/Response::make('', 200, $headers);


    
}
