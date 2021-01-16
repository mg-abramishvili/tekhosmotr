<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use App\Models\City;
use App\Models\Cat;
use App\Models\Lead;
use App\Mail\NewLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontTechpointController extends Controller
{
    public function index($city, Request $request)
    {
        $goroda = City::orderBy('sort')->get();
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
        $cats = Cat::all();
        $techpoint = Techpoint::find($id);
        return view('frontend.techpoints.show', compact('techpoint', 'cats', 'goroda', 'city'));
    }

    public function lead(Request $request) {

        $rules = [
            'station' => 'required',
            'date' => 'required',
            'time' => 'required',
            'number' => 'required',
            'category' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ];
    
        $customMessages = [
            'station.required' => 'Укажите станцию',
            'date.required' => 'Укажите дату',
            'time.required' => 'Укажите время',
            'number.required' => 'Укажите госномер',
            'category.required' => 'Укажите категорию',
            'name.required' => 'Укажите имя',
            'phone.required' => 'Укажите телефон',
        ];
    
        $this->validate($request, $rules, $customMessages);

        $data = request()->all();
        $leads = new Lead();
        $leads->station = $data['station'];
        $leads->date = $data['date'];
        $leads->time = $data['time'];
        $leads->number = $data['number'];
        $leads->category = $data['category'];
        $leads->name = $data['name'];
        $leads->phone = $data['phone'];
        $leads->save();

        $lead = Lead::find($leads->id);

        Mail::to('mg@abramishvili.net')->send(new NewLead($lead));
        
        return redirect()->back();
    }

}
