<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function restaurants()
    {
        $places = Places::where('type', 'restaurant')
            ->orWhere('type','bar') ->paginate(Config('app.limit'));
        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('restaurants', ['places' => $places, 'neighbourhoods' => $neighbourhoods]);
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
                ->where(function ($query) {
                    $query->where('type', 'restaurant')
                        ->orWhere('type','bar');
                });
        } else {
            $placesQuery = Places::where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->where(function (Builder $query) use ($searchTerm) {
                    $query->where('establishment', 'LIKE', "%$searchTerm%")
                        ->orWhere('address', 'LIKE', "%$searchTerm%")
                        ->orWhere('city', 'LIKE', "%$searchTerm%");
                })->where(function ($query) {
                    $query->where('type', 'restaurant')
                        ->orWhere('type','bar');
                });
        }
        $places = $placesQuery->paginate(Config('app.limit'));

        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('restaurants', ['places' => $places, 'neighbourhoods' => $neighbourhoods, "selected_neighbourhood" => $neighbourhood, 'search' => $searchTerm, 'indoor' => $indoor]);
    }
}
