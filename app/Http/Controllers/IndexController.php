<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\FormIndexRequest;
use App\Http\Requests;
use App\Import;
use Log;

class IndexController extends Controller
{
    //requestにしないと入らない
    public function update(FormIndexRequest $request)
    {

        Log::debug($request);
        // $validator=Validator::make(
        //     $request->all(),
        //     [
        //     'e_mail' => 'required|email',
        //     'postcode' =>'present|digits:7',
        //     'TEL' =>'present|size:12',
        //     'TELdepartment' =>'present|size:12',
        //     'TELdirect' =>'present|size:12',
        //     'FAX' =>'present|size:12',
        //     'phonenumber' =>'present|size:13',
        //     'URL' => 'present|url',
        //     'trade_day' => 'present|date',
        //     'eightfrinds_num' => 'present|number',
        //     ]
        //     );
        //     if ($validator->fails()) {
        //         $message="適切な値がcsvに入っていません";
        //            return redirect('maillist')
        //                                     ->withErrors($validator)
        //                                     ->withInput()
        //                                     ->with('warning_messages',$message);

        // // ->validate($request,[
        // //     'e_mail' => 'required',
        // //     'e_mail' => 'email',
        // //     // //to do  以下の設定
        // //     'postcode' =>'digits:7',
        // //     'TEL' =>'size:13',
        // //     // 'TELdepartment' =>'size:12',
        //     // 'TELdirect' =>'size:12',
        //     // 'FAX' =>'size:12',
        //     // 'phonenumber' =>'size:13',
        //     // 'URL' => 'url',
        //     // 'trade_day' => 'date',
        //     // 'eightfrinds_num' => 'number',
        // ]); 
        $update = Import::where("id","=",$request->id)->first();
        $update->company = $request->company;
        $update->department = $request->department;
        $update->position = $request->position;
        $update->name = $request->name;
        $update->e_mail = $request->e_mail;
        $update->postcode = $request->postcode;
        $update->address = $request->address;
        $update->TEL = $request->TEL;
        $update->TELdepartment = $request->TELdepartment;
        $update->TELdirect = $request->TELdirect;
        $update->FAX = $request->FAX;
        $update->phonenumber = $request->phonenumber;
        $update->URL = $request->URL;
        $update->trade_day = $request->trade_day;
        $update->eightfriends_num = $request->eightfriends_num;
        $update->now_dating = $request->now_dating;
        $update->question = $request->question;
        $update->deleted_at = $request->deleted_at;
        $update->save(); 
        Log::debug($update);
        return redirect('/maillist');
    }
        
        
}
