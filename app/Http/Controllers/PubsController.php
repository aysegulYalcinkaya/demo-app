<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PubsController extends Controller
{
    public function pubs()
    {
        return view('pubs');
    }
}
