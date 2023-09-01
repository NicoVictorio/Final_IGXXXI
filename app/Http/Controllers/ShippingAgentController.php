<?php

namespace App\Http\Controllers;

use App\ContainerProduct;
use App\ShippingContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShippingAgentController extends Controller
{
    public function showSAExportPage()
    {
        $idTeam = Auth::user()->team->id;
        $containerShipsUS = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();

        $plots = ShippingContainer::select('code', 'row', 'tier', 'bay')->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('team_id', $idTeam)->get();
        $arrPlot = [];
        foreach ($plots as $plot) {
            $arrPlot[] = $plot->code . '#row' . $plot->row . '#tier' . $plot->tier . '#bay' . $plot->bay;
        }

        foreach ($containerShipsUS as $cs) {
            $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $cs->id . ";"))[0]->totalBobot * 1;
            $cs->stuff_weight = $stuff_weight;
        }

        $containerShips = $containerShipsUS->sortByDesc('stuff_weight');

        return view('export.shipping-agent', compact('containerShips', 'arrPlot'));
    }

    public function pushSAExportDeck(Request $request)
    {
        $request->validate(['kontainer' => 'required', 'row' => 'required', 'bay' => 'required']);
        $idContainer = $request->get('kontainer');
        $row = $request->get('row');
        $bay = $request->get('bay');
        $tier = $request->get('tier');

        $idTeam = Auth::user()->team->id;
        if ($tier >= 6) {
            return redirect()->route('export.container-agent')->with('error', 'Kontainer tidak dapat ditumpuk dengan lebih dari 5 tumpukan!');
        }

        $cekSama = DB::select(DB::raw("select count(id) as 'count' from shipping_container where (volume_status='safe' or volume_status='less') and weight_status='safe' and Team_id='" . $idTeam . "' and `row`='" . $row . "' and tier='" . $tier . "' and bay='" . $bay . "'"))[0]->count * 1;
        if ($cekSama == 0) {
            $dataContainerShip = ShippingContainer::find($idContainer);
            $dataContainerShip->ica_target_row = $row;
            $dataContainerShip->ica_sequence = $tier;
            $dataContainerShip->ica_target_bay = $bay;
            $dataContainerShip->save();

            return redirect()->route('export.container-agent')->with('status', 'Kontainer telah berhasil dimasukkan ke dalam Bay ' . $bay . ' dengan Row ' . $row . ' dan Tier ' . $tier);
        } else {
            return redirect()->route('export.container-agent')->with('error', 'Row, Tier, dan Bay terkait telah terisi. Silakan pilih row, tier, dan bay lainnya.');
        }
    }

    // Import
    public function showSAImportPage()
    {
        return view('import.shipping-agent');
    }
}
