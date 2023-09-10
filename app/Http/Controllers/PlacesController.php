<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function places()
    {
        $places = Places::all();
        return view('places', ['places' => $places]);
    }
}
