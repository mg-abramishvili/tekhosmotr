<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use App\Models\City;
use App\Mail\NewLead;
use Illuminate\Http\Request;

class FrontTechpointController extends Controller
{
    public function index($city, Request $request)
    {
        $goroda = City::all();
        $techpoints = Techpoint::whereHas('cities', function ($query) use($city) {
            return $query->where('city_code', '=', $city);
        })
        ->get();
        return view('frontend.techpoints.index', compact('techpoints', 'goroda', 'city'));
    }

    public function show($id)
    {
        $city = '';
        $goroda = City::all();
        $techpoint = Techpoint::find($id);
        return view('frontend.techpoints.show', compact('techpoint', 'goroda', 'city'));
    }

    public function lead($id, Request $request) {
        Mail::to('mg@abramishvili.net')->send(new NewLead($id));
    }

}
