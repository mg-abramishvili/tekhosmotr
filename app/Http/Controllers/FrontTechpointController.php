<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use App\Models\City;
use App\Models\Cat;
use App\Models\Lead;
use App\Mail\NewLead;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class FrontTechpointController extends Controller
{
    public function index($city, Request $request)
    {
        $goroda = City::orderBy('sort', 'ASC')->get();
        $techpoints = Techpoint::whereHas('cities', function ($query) use($city) {
            return $query->where('city_code', '=', $city);
        })
        ->get();
        return view('frontend.techpoints.index', compact('techpoints', 'goroda', 'city'));
    }

    public function show($id) {
        $city = '';
        $goroda = City::orderBy('sort', 'ASC')->get();
        $cats = Cat::all();
        $techpoint = Techpoint::find($id);
        
        return view('frontend.techpoints.show', compact('techpoint', 'cats', 'goroda', 'city'));
    }

    public function appointment($id, $cat, $date) {
        $city = '';
        $goroda = City::orderBy('sort', 'ASC')->get();
        $cats = Cat::all();
        $techpoint = Techpoint::find($id);
        $leads = Lead::whereHas('techpoints', function($q) use($id) {
            $q->where('techpoint_id', '=', $id);
        })->where('n_date', Carbon::parse($date)->isoFormat('YYYY-MM-DD'))->get();
        
        $cat = $cat;
        $date = $date;

        return view('frontend.techpoints.appointment', compact('techpoint', 'cats', 'goroda', 'city', 'leads', 'cat', 'date'));
    }

    public function lead($id, Request $request) {

        $rules = [
            'station' => 'required',
            'n_date' => 'required',
            'time' => 'required',
            'number' => 'required',
            'category' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ];
    
        $customMessages = [
            'station.required' => 'Укажите станцию',
            'n_date.required' => 'Укажите дату',
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
        $leads->n_date = Carbon::parse($data['n_date']);

        $leads->time = json_encode($data['time']);

        $leads->number = $data['number'];
        $leads->category = $data['category'];
        $leads->name = $data['name'];
        $leads->phone = $data['phone'];
        
        if (Lead::where('n_date', '=', $request->n_date)->where('time', '=', json_encode($request->time))->exists()) {
            return 'занято';
        } else {
            $leads->save();
            $leads->techpoints()->attach(Techpoint::find($request->station_id));
    
            $lead = Lead::find($leads->id);
            $techpoint = Techpoint::find($id);
    
            //Mail::to($techpoint->email)->send(new NewLead($lead));
            
            return redirect()->back();
        }
        
    }

}
