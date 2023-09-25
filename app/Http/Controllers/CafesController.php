<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CafesController extends Controller
{
    public function cafes()
    {
        $places = Places::where('type', 'cafe')
            ->orWhere('type', 'coffee shop')->orWhere('type', 'bakery')->orWhere('type', 'ice cream shop')->get();
        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('cafes', ['places' => $places, 'neighbourhoods' => $neighbourhoods]);
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
                    $query->where('type', 'cafe')
                        ->orWhere('type', 'coffee shop')->orWhere('type', 'bakery')->orWhere('type', 'ice cream shop');
                });
        } else {
            $placesQuery = Places::where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->where(function (Builder $query) use ($searchTerm) {
                    $query->where('establishment', 'LIKE', "%$searchTerm%")
                        ->orWhere('address', 'LIKE', "%$searchTerm%")
                        ->orWhere('city', 'LIKE', "%$searchTerm%");
                })->where(function ($query) {
                    $query->where('type', 'cafe')
                        ->orWhere('type', 'coffee shop')->orWhere('type', 'bakery')->orWhere('type', 'ice cream shop');
                });
        }
        $places = $placesQuery->get();

        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        return view('cafes', ['places' => $places, 'neighbourhoods' => $neighbourhoods, "selected_neighbourhood" => $neighbourhood, 'search' => $searchTerm, 'indoor' => $indoor]);
    }
}
