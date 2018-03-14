<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Import;
use Illuminate\Http\RedirectResponse;
use Log;

class DeleteController extends Controller
{
    public function delete(Request $request){
        $break=Import::findOrFail($request->id);
        $break->delete();
        return redirect('/maillist');
    }
}
