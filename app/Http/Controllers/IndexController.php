<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Log;

class IndexController extends Controller
{
    public function  update(Request $request)
    {
        Log::debug($request->e_mail);
        Log::debug($request->id);
    }



}
