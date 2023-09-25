<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndoorsController extends Controller
{
    public function indoors()
    {
        $places = Places::where('inside', 1) ->get();
        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('indoors', ['places' => $places, 'neighbourhoods' => $neighbourhoods,"inside"=>1]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $indoor = $request->has('indoor') ? $request->input('indoor') : 0;
        $neighbourhood = $request->has('neighbourhood') ? $request->input('neighbourhood') : "";
        if ($indoor) {
            $placesQuery = Places::where(function ($query) use ($searchTerm) {
                $query->where('establishment', 'LIKE', "%$searchTerm%")
                    ->orWhere('address', 'LIKE', "%$searchTerm%")
                    ->orWhere('city', 'LIKE', "%$searchTerm%");
            })->where('inside', $indoor)
                ->where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->where('inside', 1);
        } else {
            $placesQuery = Places::where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->where(function (Builder $query) use ($searchTerm) {
                    $query->where('establishment', 'LIKE', "%$searchTerm%")
                        ->orWhere('address', 'LIKE', "%$searchTerm%")
                        ->orWhere('city', 'LIKE', "%$searchTerm%");
                })->where('inside', 1) ;
        }
        $places = $placesQuery->get();

        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('indoors', ['places' => $places, 'neighbourhoods' => $neighbourhoods, "selected_neighbourhood" => $neighbourhood, 'search' => $searchTerm, 'indoor' => "1"]);
    }
}
