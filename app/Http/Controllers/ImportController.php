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
        $data = file_get_contents($file);
        $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
        $temp = tmpfile();
        fwrite($temp, $data);
        rewind($temp);
        while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
            $csv[] = $data;
        }
        fclose($temp);
        //一回目は真
        $firstFlag=true;
        foreach($csv as $row){
    
            if($firstFlag==false){
                $getdata = new Import;
                 $importArray=array(
                        $getdata ->company=$row[0],
                        $getdata ->department=$row[1],
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
                        $getdata ->URL=$row[12],
                        $getdata ->trade_day=$row[13],
                        $getdata ->eightfriends_num=$row[14],
                        $getdata ->now_dating=$row[15],
                        $getdata ->question=$row[16],
                                   );
                        $getdata->save();
                }
            //ここで偽になる
        $firstFlag=false;
            }
        $mail = Import::withTrashed()->paginate(10);
        return redirect('/maillist');
    }         


}

        
        
        
        
        
        
        
        
        
        