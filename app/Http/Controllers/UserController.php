<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\City;
use App\Models\Techpoint;

class UserController extends Controller
{
    public function index() {
        $users = User::with('techpoints')->get();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $cities = City::orderBy('sort', 'ASC')->get();
        $techpoints = Techpoint::all();
        return view('backend.users.create', compact('cities', 'techpoints'));
    }

    public function edit($id)
    {
        $techpoint = Techpoint::find($id);
        $cities = City::orderBy('sort', 'ASC')->get();
        $cats = Cat::all();
        return view('backend.techpoints.edit', compact('techpoint', 'cities', 'cats'));
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
            'name' => 'required',
            'email' => 'unique:users,email',
            'password' => 'required',
        ]);

        $data = request()->all();
        $users = new User();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->save();
        $users->techpoints()->attach($request->techpoints, ['user_id' => $users->id]);
        return redirect('/backend/users');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
            'legal_address' => 'required',
            'tel' => 'required',
            'coordinates' => 'required',
        ]);

        $data = request()->all();
        $techpoints = Techpoint::find($data['id']);
        $techpoints->title = $data['title'];
        $techpoints->address = $data['address'];
        $techpoints->legal_address = $data['legal_address'];
        $techpoints->tel = $data['tel'];
        $techpoints->email = $data['email'];
        $techpoints->coordinates = $data['coordinates'];
        $techpoints->status = $data['status'];
        $techpoints->inn = $data['inn'];
        $techpoints->ogrn = $data['ogrn'];
        $techpoints->number = $data['number'];
        $techpoints->att_number = $data['att_number'];
        $techpoints->working_hours_start = $data['working_hours_start'];
        $techpoints->working_hours_end = $data['working_hours_end'];
        
        if (isset($data['bus_day'])) {
            $techpoints->bus_day = json_encode($data['bus_day']);
        } else {
            $techpoints->bus_day = null;
        }

        $techpoints->save();
        $techpoints->cities()->detach();
        $techpoints->cities()->attach($request->cities, ['techpoint_id' => $techpoints->id]);
        $techpoints->cats()->detach();
        $techpoints->cats()->attach($request->cats, ['techpoint_id' => $techpoints->id]);
        return redirect('/backend/techpoints');
    }
}
