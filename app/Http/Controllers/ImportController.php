<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use App\Maillist;
use Excel;
use Log;

class ImportController extends Controller
{
    public function import(Request $request)
     {

        $file = $request->file('csv_file');
        // $rows = mb_convert_encoding($rows, 'UTF-8', 'sjis-win');
        $data = file_get_contents($file);
        
        
        // $data =  $data->toArray();
        $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
        
        $temp = tmpfile();
        // $csv  = array(
        // );
        // dd($data);
        fwrite($temp, $data);
        rewind($temp);
        
        // dd($temp);
        while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
            // dd($data);
            $csv[] = $data;
        }
        
        fclose($temp);
        // dd($temp);
        //dd($csv);
        //一回目は真
        $firstFlag=true;
        foreach($csv as $row){
    
            if($firstFlag==false){
                $getdata = new Import;
                 $importArray=array(
                        $getdata ->company=$row[0],
                        $getdata ->department="栗岡",
                        $getdata ->position=$row[2],
                        $getdata ->name=$row[3],
                        $getdata ->e_mail=$row[4],
                        $getdata ->postcode=$row[5],
                        $getdata ->address=$row[6],
                        $getdata ->TEL=$row[7],
                        $getdata ->TELdepartment=$row[8],
                        $getdata ->TELdirect=$row[9],
                        $getdata ->FAX=$row[10],
                        $getdata ->phonenumber=$row[11],
                        $getdata ->trade_day=$row[12],
                        $getdata ->eightfriends_num=$row[13],
                        $getdata ->now_dating=$row[14],
                        $getdata ->question=$row[15],
                                   );
                        $getdata->save();
                //   dd($importArray);
                // Import::create($importArray);
                }
            
            //ここで偽になる
        $firstFlag=false;
            }
        $mail = Import::withTrashed()->paginate(10);
        return view('maillist')->with('imports',$mail);    
    }         


}

        
        
        
        
        
        
        
        
        
        // dd($data);
        // $rows = explode(",", $data, -1);
        // dd($rows);
       
        // // $rows = mb_convert_encoding($rows, 'UTF-8', 'sjis-win');
        // $a = mb_convert_variables("sjis","UTF-8",$file);
        // dd($data);
        // $temp = tmpfile();
        // $csv  = array();

        // fwrite($temp, $data);
        // rewind($temp);


                // $rows =  $data->toArray(); 
        // dd($temp);
        // // $file = mb_convert_encoding(file_get_contents($file), 'UTF8', 'sjis');
        // $readers = fopen($data,"r");
        // dd($temp);
        // $readers = Excel::load($file);
        // $rows =  $readers->toArray(); 
        
