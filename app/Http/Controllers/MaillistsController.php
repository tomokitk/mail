<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaillistsController extends Controller
{
    public function maillist()
    {
        return view('maillist');
}
}
