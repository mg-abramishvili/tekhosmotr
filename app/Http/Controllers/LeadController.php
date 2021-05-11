<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

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

        if(Auth::user()->id == '1') {
            $leads = Lead::all();
        } else {
            $leads = Lead::with('techpoints.users')->whereHas('techpoints.users', function($q) {
                $q->where('user_id', '=', Auth::user()->id);
            })->get();
        }
        return view('backend.leads.index', compact('leads', 'month', 'month_days'));
    }

    public function delete($id)
    {
        $lead = Lead::find($id);
        $lead->delete();
        $lead->techpoints()->detach();
        return redirect('/backend/leads-period/now');
    }
}
