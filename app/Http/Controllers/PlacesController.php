<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function places()
    {
        $places = Places::paginate(Config('app.limit'));
        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        $types = Places::select("type")->distinct()->orderBy('type', 'asc')->pluck('type');
        return view('places', ['places' => $places, 'neighbourhoods' => $neighbourhoods,'types'=>$types]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $indoor = $request->has('indoor') ? $request->input('indoor') : 0;
        $neighbourhood = $request->has('neighbourhood') ? $request->input('neighbourhood') : "";
        $type = $request->has('type') ? $request->input('type') : "";
        if ($indoor) {
            $placesQuery = Places::where(function ($query) use ($searchTerm) {
                $query->where('establishment', 'LIKE', "%$searchTerm%")
                    ->orWhere('address', 'LIKE', "%$searchTerm%")
                    ->orWhere('city', 'LIKE', "%$searchTerm%");
            })->where('inside', $indoor)
                ->where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->Where('type', 'LIKE', "$type%");;
        } else {
            $placesQuery = Places::where('neighbourhood', 'LIKE', "%$neighbourhood%")
                ->Where('type', 'LIKE', "$type%")
                ->where(function (Builder $query) use ($searchTerm) {
                    $query->where('establishment', 'LIKE', "%$searchTerm%")
                        ->orWhere('address', 'LIKE', "%$searchTerm%")
                        ->orWhere('city', 'LIKE', "%$searchTerm%");
                });
        }

        $places = $placesQuery->paginate(Config('app.limit'));
        $neighbourhoods = Places::select("neighbourhood")->distinct()->orderBy('neighbourhood', 'asc')->pluck('neighbourhood');
        $types = Places::select("type")->distinct()->orderBy('type', 'asc')->pluck('type');
        return view('places', ['places' => $places, 'neighbourhoods' => $neighbourhoods, "selected_neighbourhood"=>$neighbourhood,
            'types' => $types, "selected_type"=>$type,'search' => $searchTerm, 'indoor' => $indoor]);
    }

    public function autocomplete(Request $request)
    {
        $name = Places::select(Places::raw("establishment as name"))
            ->where("establishment", "LIKE", "%{$request->input('query')}%");

        $address = Places::select(Places::raw("address as name"))
            ->where("address", "LIKE", "%{$request->input('query')}%");
        $city = Places::select(Places::raw("city as name"))
            ->where("city", "LIKE", "%{$request->input('query')}%")
            ->union($address)
            ->union($name)
            ->pluck('name');
        return $city;
    }
}
