<?php

namespace App\Http\Controllers;

use App\ShippingContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainerAgentController extends Controller
{
    // Export
    public function showCAExportPage()
    {
        // INI HARUS DIGANTI KLO SUDAH AUTH!
        $idTeam = 1;
        $containerShips = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('row', null)->where('tier', null)->where('bay', null)->where('team_id', $idTeam)->get();
        $listContainer = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('team_id', $idTeam)->get();

        $plots = ShippingContainer::select('code', 'row', 'tier', 'bay')->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('team_id', $idTeam)->get();
        $arrPlot = [];
        foreach($plots as $plot){
            $arrPlot[] = $plot->code.'#row'.$plot->row.'#tier'.$plot->tier.'#bay'.$plot->bay;
        }

        foreach($containerShips as $cs){
            $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $cs->id . ";"))[0]->totalBobot * 1;
            $cs->stuff_weight = $stuff_weight;
        }

        foreach($listContainer as $lCont){
            $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $lCont->id . ";"))[0]->totalBobot * 1;
            $lCont->stuff_weight = $stuff_weight;
        }

        return view('export.container-agent', compact('containerShips', 'arrPlot', 'listContainer'));
    }
    
    public function showCAImportPage(){
        return view('import.container-agent');
    }

    public function pushCAExportBay(Request $request)
    {
        $idContainer = $request->get('kontainer');
        $row = $request->get('row');
        $tier = $request->get('tier');
        $bay = $request->get('bay');

        // NANTI KLO SDH AUTH, GANTI!
        $idTeam = 1;

        $cekSama = DB::select(DB::raw("select count(id) as 'count' from shipping_container where (volume_status='safe' or volume_status='less') and weight_status='safe' and team_id='" . $idTeam . "' and row='" . $row . "' and tier='" . $tier . "' and bay='" . $bay . "'"))[0]->count * 1;

        if ($cekSama == 0) {
            $dataContainerShip = ShippingContainer::find($idContainer);
            $dataContainerShip->row = $row;
            $dataContainerShip->tier = $tier;
            $dataContainerShip->bay = $bay;
            $dataContainerShip->save();

            return redirect()->route('export.container-agent')->with('status', 'Kontainer telah berhasil dimasukkan ke dalam Bay # dengan Row # dan Tier #');
        } else {
            return redirect()->route('export.container-agent')->with('error', 'Row, Tier, dan Bay terkait telah terisi. Silakan pilih row, tier, dan bay lainnya.');
        }
    }
}
