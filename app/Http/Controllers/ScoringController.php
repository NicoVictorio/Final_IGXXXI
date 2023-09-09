<?php

namespace App\Http\Controllers;

use App\ShippingContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScoringController extends Controller
{
    public function CalculateTEUsFEUs()
    {
        $teamId = Auth::user()->team->id;
        $teus = 0;

        $shippingsAccepted = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('Team_id', $teamId)->where('Period_id', 1)->get();
        if (count($shippingsAccepted) > 0) {
            foreach ($shippingsAccepted as $sa) {
                if ($sa->container->size == '40ft') {
                    $teus += 2;
                } else {
                    $teus += 1;
                }
            }

            DB::update("update scorings set teus='" . $teus . "' where Period_id=1 and Team_id='" . $teamId . "';");
            return redirect()->route('export.index')->with('status', 'Teus pada Depo Agent telah diterima! Sesi Depo Agent anda telah selesai!');
        } else {
            return redirect()->route('export.depo-agent')->with('error', 'Anda belum membuat satupun kontainer!');
        }
    }

    public function CalculateStowagePlan(Request $request)
    {
        $teamId = Auth::user()->team->id;
        $stowage_plan = $request->get('stowage_plan');

        DB::update("update scorings set stowage_plan='" . $stowage_plan . "' where Period_id=1 and Team_id='" . $teamId . "';");

        return redirect()->route('export.index')->with('status', 'Stowage Plan pada Shipping Agent telah diterima! Sesi Shipping Agent anda telah selesai!');
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
        $cekKosong = ShippingContainer::select('ica_sequence')->whereNull('ica_sequence')->where('Team_id', $teamId)->where('Period_id', 2)->count();
        if ($cekKosong == 0) {
            DB::update("update scorings set lateness='" . $lateness . "' where Period_id=2 and Team_id='" . $teamId . "';");
            return redirect()->route('import.index')->with('status', 'Lateness pada Shipping Agent telah diterima! Sesi Shipping Agent anda telah selesai!');
        } else {
            return redirect()->route('import.shipping-agent')->with('error', 'Belum Semua Kontainer Memiliki Urutan!');
        }
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
        $acceptance = $request->get('acceptance');

        DB::update("update scorings set acceptance=" . $acceptance . " where Period_id=2 and Team_id='" . $teamId . "';");
        
        return redirect()->route('import.index')->with('status', 'Acceptance Rate pada Depo Agent telah diterima! Sesi Depo Agent anda telah selesai!');
    }
}
