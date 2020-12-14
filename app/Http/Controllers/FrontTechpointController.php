<?php

namespace App\Http\Controllers;

use App\Models\Techpoint;
use Illuminate\Http\Request;

class FrontTechpointController extends Controller
{
    public function index()
    {
        $techpoints = Techpoint::all();
        return view('frontend.techpoints.index', compact('techpoints'));
    }

    public function show($id)
    {
        $techpoint = Techpoint::find($id);
        return view('frontend.techpoints.show', compact('techpoint'));
    }

}
