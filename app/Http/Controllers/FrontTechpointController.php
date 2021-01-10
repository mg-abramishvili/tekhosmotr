<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use App\Models\City;
use App\Models\Lead;
use App\Mail\NewLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function lead(Request $request) {

        $this->validate($request, [
            'station' => 'required',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);

        $data = request()->all();
        $leads = new Lead();
        $leads->station = $data['station'];
        $leads->date = $data['date'];
        $leads->time = $data['time'];
        $leads->name = $data['name'];
        $leads->phone = $data['phone'];
        $leads->save();

        $lead = Lead::find($leads->id);

        Mail::to('mg@abramishvili.net')->send(new NewLead($lead));
        
        return redirect()->back();
    }

}
