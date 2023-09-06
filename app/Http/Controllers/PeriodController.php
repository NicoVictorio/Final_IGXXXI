<?php

namespace App\Http\Controllers;

use App\Period;
use App\Scoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    public function openPeriod()
    {
    }

    // Export
    public function indexExport()
    {
        $teamId = Auth::user()->team->id;
        $statusPeriod = Period::select('status')->where('name', 'export')->first();
        $scoring = Scoring::where('Team_id', $teamId)->where('Period_id', 1)->get();

        return view('export.index', compact('statusPeriod', 'scoring'));
    }
}
