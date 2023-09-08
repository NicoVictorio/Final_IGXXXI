<?php

namespace App\Http\Controllers;

use App\Period;
use App\Scoring;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAdmin(){
        $statusExport = Period::where('name', 'export')->first();
        $statusImport = Period::where('name', 'import')->first();

        return view('admin.index', compact('statusExport', 'statusImport'));
    }

    public function changeStateExport(Request $request){
        $status = $request->get('radioExport');

        $periodExport = Period::where('name', 'export')->first();
        $periodExport->status = $status;
        $periodExport->save();

        return redirect()->route('admin.index')->with('status', 'Status Export Berhasil diubah ke '.$status);
    }

    public function changeStateImport(Request $request){
        $status = $request->get('radioImport');

        $periodImport = Period::where('name', 'import')->first();
        $periodImport->status = $status;
        $periodImport->save();

        return redirect()->route('admin.index')->with('status', 'Status Import Berhasil diubah ke '.$status);
    }

    public function scoringList(){
        $scoringExport = Scoring::where('Period_id', 1)->orderBy('Team_id')->get();
        $scoringImport = Scoring::where('Period_id', 2)->orderBy('Team_id')->get();

        return view('admin.listscoring', compact('scoringExport', 'scoringImport'));
    }
}
