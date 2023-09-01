<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function openPeriod()
    {
    }

    // Export
    public function indexExport()
    {
        $statusPeriod = Period::select('status')->where('name', 'export')->first();

        return view('export.index', compact('statusPeriod'));
    }
}
