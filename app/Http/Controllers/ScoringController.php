<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoringController extends Controller
{
    public function CalculateTEUsFEUs(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $teus = 0;
        DB::update("update scorings set teus='" . $teus . "' where Period_id=1 and Team_id='" . $teamId . "';");
        return response()->json(array('message' => "ok"), 200);
    }

    public function CalculateStowagePlan(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $stowage_plan = 0;
        DB::update("update scorings set stowage_plan='" . $stowage_plan . "' where Period_id=1 and Team_id='" . $teamId . "';");
        return response()->json(array('message' => "ok"), 200);
    }

    public function CalculateDocking(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $docking = 0;
        DB::update("update scorings set docking_duration='" . $docking . "' where Period_id=1 and Team_id='" . $teamId . "';");
        return response()->json(array('message' => "ok"), 200);
    }

    public function CalculateLateness(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $lateness = $request->get('lateness');
        DB::update("update scorings set lateness='" . $lateness . "' where Period_id=2 and Team_id='" . $teamId . "';");
        return response()->json(array('message' => "ok"), 200);
    }

    public function CalculateCompletionTime(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $completion_time = $request->get('completionTime');
        DB::update("update scorings set completion_time='" . $completion_time . "' where Period_id=2 and Team_id='" . $teamId . "';");

        return redirect()->route('import.index')->with('status', 'Completion Time pada Container Agent telah diterima! Sesi Container Agent anda telah selesai!');
    }

    public function CalculateAcceptance(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $acceptance = 0;
        DB::update("update scorings set acceptance='" . $acceptance . "' where Period_id=2 and Team_id='" . $teamId . "';");
        return response()->json(array('message' => "ok"), 200);
    }
}
