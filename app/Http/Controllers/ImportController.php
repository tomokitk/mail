<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Excel;
use App\Maillist;

class ImportController extends Controller
{

    //protected $task = null;

    // public function __construct(Task $task)
    // {
    //     $this->task = $task;
    // }
    public function import(Request $request)
    {
        // $file = $request->file('csv_file');;
        // //dd($file);
        // $data = file_get_contents($file);
        // $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
        // $temp = tmpfile();
        // $csv  = array();
        
        // fwrite($temp, $data);
        $import = new Import;
        $file = $request->file('csv_file');
        //dd($file);
    
        $reader = Excel::load($file);

         $rows = $reader->toArray();

         foreach ($rows as $row){  
             //dd($row);  
            //  $record = $this->task->firstOrNew(['name' => $row['name']]);
            //  $record->name = $row['name'];
            //$tweet = new MikeTweet ();
            //$user=Auth::user(); // ログインしているidを取っている
            $import->company=$row['fax'];
            $import->department=$row['e_mail'];
            $import->position=$row['e_mail'];
            $import->name=$row['e_mail'];
            $import->e_mail=$row['e_mail'];
            $import->postcode=$row['e_mail'];
            $import->adress=$row['e_mail'];
            $import->TELcompany=$row['e_mail'];
            $import->TELdepartment=$row['e_mail'];
            $import->TELdirect=$row['e_mail'];
            $import->FAX=$row['e_mail'];
            $import->phonenumber=$row['e_mail'];
            $import->URL=$row['e_mail'];
            $import->trade_day=$row['e_mail'];
            $import->eightfrinds_num=$row['fax'];
            $import->now_dating=$row['url'];
            //$tweet->message=$request->message;
            //Log::info("likeメソッド".$user->id.$tweet->message_id);
            
            
            
            $import-> save();



            
        }


        $mail=Maillist::all();
        $mail=Maillist::paginate(10);
         return view("maillist")->with('imports',$mail);


        
            
    }         
}
