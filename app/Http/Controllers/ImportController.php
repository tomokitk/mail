<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Excel;
use App\Maillist;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        
        $import = new Import;
        $file = $request->file('csv_file');
        $readers = Excel::load($file);
        $rows =  $readers->toArray(); 
        foreach($rows as $row) {
            Import::create($row);
        };
        $mail = Import::withTrashed()->get();
        return view('maillist')->with('imports',$mail);    
    }         
}
