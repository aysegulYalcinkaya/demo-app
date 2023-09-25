<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function location($id)
    {
        $place = Places::find($id);
        return view('location', ['place' => $place]);
    }
}
