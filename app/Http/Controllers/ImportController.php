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
        $rules = [
            'e_mail' => 'email',
            // 'e_mail' => 'required',
            // // 'postcode'=>'present|digits:7',
            // 'TEL'=>'present|size:12',
            // 'TELdepartment'=>'present|size:12',
            // 'TELdirect' =>'present|size:12',
            // 'FAX' =>'between:12,13',
            // 'phonenumber' =>'between:3,13',
            // 'URL' => 'present|url',
            // 'trade_day' => 'present|date',
        ];
        $file = $request->file('csv_file');
        $data = file_get_contents($file);
        $data=str_replace("-","",$data);
        // dd($data);
        $data = mb_convert_encoding($data, 'UTF-8', 'SJIS-win');
        $temp = tmpfile();
        fwrite($temp, $data);
        rewind($temp);
        while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
            
            $csv[] = $data;
        }
        fclose($temp);

        $Flag=true;
        $validationFlag=true;

        $validationImportData=true;
        $validationMatchData=true;
        foreach($csv as $row)
        {         
            // dd("xxxx");  
            if($Flag==false)
            {   
               
                // dd("ggg");
                   //  if($validationFlag==true)
                    // { 
                        //csvの中身をバリデーション
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
                                                          
                            $validator = Validator::make($getValidationData,$rules);
                            // dd($validator);
                            // $validationImportData=true;
                            if ($validator->fails()) {
                                // $validationImportCount=count($validator);
                                
                                // $message="適切な値がcsvに入っていません";
                                // return redirect('maillist')
                                //     ->withErrors($validator)
                                //     ->withInput()
                                //     ->with('warning_messages',$message);
                                $validationImportData=false;
                            }
                                
                            if(empty($validationImportData==false)){

                            
                        //重複データをみる
                                if($getValidationDatas = Import::where("e_mail","=",$row[4])->Where("name","=",$row[3])->get()){
                                // if($getValidationDatas = Import::where("e_mail","=",$row[4])->get()){   
                                    // dd(count($getValidationDatas));
                                        // $validationCsvCount=count($getValidationDatas);
                                // dd($validationCsvCount);
                                foreach($getValidationDatas as $getValidationData)
                                {
                                    //配列にして一つの箱に埋める
                                    // dd(count($getValidationData));
                                $validationMails[]=array(
                                 0=>$getValidationData->e_mail,
                                 1=>$getValidationData->name,
                                );
                                // Log::debug($validationMails);
                                $validationMatchData=false;
                                }        // $validationCsvCount=count($validationMatchData);
                                    
                                // dd($validationName);
                    // if($getValidationDatas = Import::where("e_mail",$row[4])->Where("name",$row[3])->get())
                    // {
                    //     Log::debug($getValidationDatas);   
                        // }   
                        // $validationFlag=false; 
                                    }  
                                } 
           
            }
            $Flag=false;
        }
       
        // Log::debug($validationMails);
        if($validationImportData==false)
         {
             
             $message="適切な値がcsvに入っていません";
             return redirect('maillist')
             ->withErrors($validator)
             ->withInput()
             ->with('warning_messages',$message);

         }elseif($validationMatchData==false)
        {
            // dd("fff");
            $arrayValidationMail=[];
            foreach($validationMails as $validationMail)
            {
                // $arrayValidationMail[]=$validationMail; 
                // $validations=implode(',',$arrayValidationMail);
                $arrayValidationMail[]=implode(',',$validationMail);
                // $outputValidationMail = implode(',',$arrayValidationMail);
            }
            // dd($arrayValidationMail);
            // dd($a);
            // dd($validationMail);
            $arrayValidationMail=implode("\r\n",$arrayValidationMail);
           Log::debug($arrayValidationMail);

        //    dd("hhhh")
            return redirect('/maillist')
            ->with('status',$arrayValidationMail);                       
            // ->with('status_name',$validationName);
        }
        // if($firstFlag==false)
        // {
        // return redirect('/maillist')->with('status',$validationMail)
        //
        // dd($validationImportData);
        // dd($getValidationDatas);
        // dd($validationMail);
        
        //もし、「csvの中身をバリデーション」と「重複をみる」でfalseではなかったら以下の処理にいく。
        //もし、falseであれば、else以降の処理となる
        if($validationImportData==true && $validationMatchData==true)
        {      
            //   dd('ggg');
        $firstFlag=true;
        
            foreach($csv as $row)
            {
                
                if($firstFlag==false)
                {
                    $getdata = new Import;
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
                        // $checkHyphen=str_replace("-","",$getdata);
                        // dd($checkHyphen);
                        $getdata->save(); 
                    
                }

            $firstFlag=false;
            }
        }
       
        // if($validationImportData==false)
        //  {
        //      $message="適切な値がcsvに入っていません";
        //      return redirect('maillist')
        //      ->withErrors($validator)
        //      ->withInput()
        //      ->with('warning_messages',$message);

        // if ($validationMatchData==false)
        // {
        //     // dd($validationMail);
        //     return redirect('/maillist')
        //     ->with('status',$validationMail)                         
        //     ->with('status_name',$validationName);
        // }else
        // {
            $seccessMessage="読み込み完了しました";
            return redirect('/maillist')->with('seccessMessage',$seccessMessage);
                  
    }
}
// foreach{

//     checkvalidation();

//     insertCSV();

//     if(count(error) > 0){

//     }
//     return view;
// }


