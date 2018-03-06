<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Log;

class IndexController extends Controller
{
    public function  update(Request $request){
        $update = Import::where("id","=",$request->id)->first();
        // log::debug($request->company);
        $update->company = $request->company;
        $update->department = $request->department;
        $update->positon = $request->positon;
        $update->name = $request->name;
        $update->e_mail = $request->e_mail;
        $update->postcode = $request->postcode;
        $update->adress = $request->adress;
        $update->TEL = $request->TEL;
        $update->TELdepartment = $request->TELdepartment;
        $update->TELdirect = $request->TELdirect;
        $update->FAX = $request->FAX;
        $update->phonenumber = $request->phonenumber;
        $update->URL = $request->URL;
        $update->trade_day = $request->trade_day;
        $update->eightfrinds_num = $request->eightfrinds_num;
        $update->now_dating = $request->now_dating;
        $update->question = $request->question;
        $update->save();
        $mail=Import::all();
        return view("maillist")->with('imports',$mail);
    }
        
        
}
