<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\City;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function show($slug)
    {
        $city = '';
        $goroda = City::all();

        $page = Page::where('slug', $slug)->first();

        if(!$page){
            return abort(404);
        }

        return view('frontend.pages.show', compact('page', 'goroda', 'city'));
    }
}
