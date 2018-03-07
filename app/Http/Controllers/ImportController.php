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
        
        // $file = mb_convert_encoding(file_get_contents($file), 'UTF8', 'sjis-win');
        //dd($file);      
        // $readers = fopen($file,'');
        
        // $readers = mb_convert_encoding(file_get_contents($readers), 'UTF8', 'sjis-win');
        
        //$readers = file_get_contents($file);
        $readers = Excel::load($file);
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
            // $row = mb_convert_encoding(file_get_contents($row), "UTF8", 'sjis-win');
            //dd($row);
            Import::create($row);

        };




            
        $mail = Import::withTrashed()->get();
        // $mail = Import::paginate(5);
       
        //dd($mail);
        return view('maillist')->with('imports',$mail);

        // $mail=Import::all();
        // $mail=Import::paginate(5);
        //return redirect()->action('MaillistController@maillist');
        
        
        // return view("maillist")->with('imports',$mail);


        
            
    }         
}
