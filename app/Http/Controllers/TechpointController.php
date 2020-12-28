<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use App\Models\City;
use Illuminate\Http\Request;

class TechpointController extends Controller
{
    public function index()
    {
        $techpoints = Techpoint::all();
        return view('backend.techpoints.index', compact('techpoints'));
    }

    public function create()
    {
        $cities = City::all();
        return view('backend.techpoints.create', compact('cities'));
    }

    public function edit($id)
    {
        $techpoint = Techpoint::find($id);
        return view('backend.techpoints.edit', compact('techpoint'));
    }

    public function delete($id)
    {
        $techpoint = Techpoint::find($id);
        $techpoint->delete();
        return redirect('/backend/techpoints');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'coordinates' => 'required',
        ]);

        $data = request()->all();
        $techpoints = new Techpoint();
        $techpoints->title = $data['title'];
        $techpoints->address = $data['address'];
        $techpoints->tel = $data['tel'];
        $techpoints->email = $data['email'];
        $techpoints->coordinates = $data['coordinates'];
        $techpoints->status = $data['status'];
        $techpoints->save();
        $techpoints->cities()->attach($request->cities, ['techpoint_id' => $techpoints->id]);
        return redirect('/backend/techpoints');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'coordinates' => 'required',
        ]);

        $data = request()->all();
        $techpoints = Techpoint::find($data['id']);
        $techpoints->title = $data['title'];
        $techpoints->address = $data['address'];
        $techpoints->tel = $data['tel'];
        $techpoints->email = $data['email'];
        $techpoints->coordinates = $data['coordinates'];
        $techpoints->status = $data['status'];
        $techpoints->save();
        $stores->cities()->detach();
        $techpoints->cities()->attach($request->cities, ['techpoint_id' => $techpoints->id]);
        return redirect('/backend/techpoints');
    }

}
