<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
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
        return view('backend.techpoints.create');
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
            'coordinates' => 'required',
        ]);

        $data = request()->all();
        $techpoints = new Techpoint();
        $techpoints->title = $data['title'];
        $techpoints->coordinates = $data['coordinates'];
        $techpoints->save();
        return redirect('/backend/techpoints');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'coordinates' => 'required',
        ]);

        $data = request()->all();
        $techpoints = Techpoint::find($data['id']);
        $techpoints->title = $data['title'];
        $techpoints->coordinates = $data['coordinates'];
        $techpoints->save();
        return redirect('/backend/techpoints');
    }

}
