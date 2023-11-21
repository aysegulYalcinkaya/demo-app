<?php

namespace App\Http\Controllers;

use App\Models\Geocodes;
use App\Models\Places;
use App\Models\Reviews;

use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class LocationController extends Controller
{
    public function location($name)
    {

        $place = Places::where('establishment', '=', "$name")->take(1)->get();

        if ($place->isEmpty())
            return view('location', ['place' => null, 'initialMarkers' => null]);
        else {
            $geocodes = Geocodes::where('place_id','=',$place[0]->id)->get();
            $reviews = Reviews::where('place_id', '=', $place[0]->id)->orderBy('created_at','desc')->get();
            print_r(count($geocodes));
            if (count($geocodes)>0)
                $initialMarkers = [
                    [
                        'position' => [
                            'lat' => $geocodes[0]->latitude,
                            'lng' => $geocodes[0]->longitude
                        ],
                        'draggable' => false
                    ]
                ];

            else
                $initialMarkers = null;

            return view('location', ['place' => $place[0], 'initialMarkers' => $initialMarkers, 'reviews' => $reviews]);
        }
    }

    function save_review(Request $request)
    {
        $review = new Reviews();
        $review->place_id = $request->place_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->save();
        return back();
    }
}
