<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormImportRequest; 
use App\Import;
use App\Maillist;
use Validator;
use Excel;
use Log;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        // $this->validate($request,[
        // 'e_mail' => 'required',
        // //      'e_mail' => 'email',
        // // ]);
    
        $file = $request->file('csv_file');
        $data = file_get_contents($file);
        $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
        $temp = tmpfile();
        fwrite($temp, $data);
        rewind($temp);
        while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
            $csv[] = $data;
            // $csv->validate($request,[
            //     'e_mail' => 'required',
            //     'e_mail' => 'email',
            //     ]);
        }
        fclose($temp);
        
        //to do
        //where 以降でflag を建てて１ループ目で止める。
        $firstFlag=true;
        $validationFlag=true;
        foreach($csv as $row)
        {
            if($firstFlag==false)
            {
                if($validationFlag==true)
                {
                        $getValidationData=array(
                            "company"=>$row[0],
                            "department"=>$row[1],
                            "position"=>$row[2],
                            "name"=>$row[3],
                            "e_mail"=>$row[4],
                            "postcode"=>$row[5],
                            "address"=>$row[6],
                            "TEL"=>$row[7],
                            "TELdepartment"=>$row[8],
                            "TELdirect"=>$row[9],
                            "FAX"=>$row[10],
                            "phonenumber"=>$row[11],
                            "URL"=>$row[12],
                            "trade_day"=>$row[13],
                            "eightfriends_num"=>$row[14],
                            "now_dating"=>$row[15],
                            "question"=>$row[16],
                            );
                            
                            $rules = [
                                'e_mail' => 'email',
                                'e_mail' => 'required',
                                'postcode'=>'present|digits:7',
                                'TEL'=>'present|size:12',
                                'TELdepartment'=>'present|size:12',
                                'TELdirect' =>'present|size:12',
                                'FAX' =>'between:12,13',
                                'phonenumber' =>'between:3,13',
                                'URL' => 'present|url',
                                'trade_day' => 'present|date',
                               
                            ];
                            $validator = Validator::make($getValidationData,$rules
                            );
                            Log::debug($getValidationData);
                            
                            if ($validator->fails()) {
                                $message="適切な値がcsvに入っていません";
                                return redirect('maillist')
                                            ->withErrors($validator)
                                            ->withInput()
                                           ->with('warning_messages',$message);
                            }
                            // $getValidationData->validate($row,[
                            //     'e_mail' => 'required',
                            //     'e_mail' => 'email',
                            //     ]);
                    }else if($validationFlag==false){
                        $errors_message="重複があります";
                        // $mail=Import::all();
                        // $mail=Import::all();

                        return redirect('/maillist')->with('status',$getValidationData->e_mail);
                        // dd($getValidationData->e_mail);
                        // return view('maillist')->with('alert',$errors_message)
                        //                         ->with('imports',$mail)
                        //                         ->with('errorRecord',$getValidationData->e_mail);
                        
                        // return view('maillist')->with('error_message',$errors_message  //                        ->with('imports',$mail);
                    }
                if($getValidationData = Import::where("e_mail","=",$row[4])->first())
                {
                            $validationFlag=false; 
                }
                
            }
            
        $firstFlag=false;
        }
        //一回目は真
        $firstFlag=true;
        foreach($csv as $row){
    
            if($firstFlag==false)
            {
                $getdata = new Import;
                //  $importArray=array(
                    $getdata ->company=$row[0];
                    $getdata ->department=$row[1];
                    $getdata ->position=$row[2];
                    $getdata ->name=$row[3];
                    $getdata ->e_mail=$row[4];
                    $getdata ->postcode=$row[5];
                    $getdata ->address=$row[6];
                    $getdata ->TEL=$row[7];
                    $getdata ->TELdepartment=$row[8];
                    $getdata ->TELdirect=$row[9];
                    $getdata ->FAX=$row[10];
                    $getdata ->phonenumber=$row[11];
                    $getdata ->URL=$row[12];
                    $getdata ->trade_day=$row[13];
                    $getdata ->eightfriends_num=$row[14];
                    $getdata ->now_dating=$row[15];
                    $getdata ->question=$row[16];
                                // );
                    // $getdata ->validate($row,[
                    //     if (filter_var($getdata->e_mail, FILTER_VALIDATE_EMAIL)){
                    // 'e_mail' => 'required',
                    // 'e_mail' => 'email',
                    
                    $getdata->save();
                    
                }
        //ここで偽になる
        $firstFlag=false;
            }
       $seccessMessage="読み込み完了しました";
        return redirect('/maillist')->with('seccessMessage',$seccessMessage);
    }         
    
    // private function defineValidationRules()
    // {
    //     return [
           
    //         'e_mail' => 'required',
    //     ];
    // }

}

