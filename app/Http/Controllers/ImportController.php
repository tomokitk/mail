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
        
    
        $readers = Excel::load($file);
        //$readers = file_get_contents($file);
        $rows =  $readers->toArray(); 
       
        // foreach ($n as $reader) {
        //     //dd($reader);
        //     foreach ($reader as $cell) {
        //         $tomita[] = mb_convert_encoding(json_encode($cell), "UTF8", 'sjis-win'); 
                
        //     }
        // }   
            //dd($tomita);
        
        

        //$reader= mb_convert_encoding($reader,'sjis-win','UTF-8');
        

        foreach($rows as $row) {
            // dd($row);
            Import::create($row);
// dd(Import::first());
            // Import::create(array(
            //     "company" => "abc",
            //     // "positon" => false,
            //     "e_mail" => "m_ishinuki@mit.to",
            //     "tel" => "03-6892-3251",
            //     "fax" => "03-6892-3256",
            //     "url" => "http://www.mit.to",
            //     "trade_day" => "2017/5/29",
            // ));
        };




            
        

        $mail=Maillist::all();
        $mail=Maillist::paginate(10);
         return view("maillist")->with('imports',$mail);


        
            
    }         
}
