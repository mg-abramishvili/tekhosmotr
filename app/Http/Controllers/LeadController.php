<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('backend.leads.index', compact('leads'));
    }

    public function index_period($month, Request $request)
    {
        if($month != '') {
            $month = $month;
        } else {
            $month = Carbon::now()->locale('en')->isoFormat('YYYY-MM');
        }

        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        
        $month_days = [];
        while ($start->lte($end)) {
             $month_days[] = $start->copy();
             $start->addDay();
        }

        $leads = Lead::all();
        return view('backend.leads.index', compact('leads', 'month', 'month_days'));
    }
}
