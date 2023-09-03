<?php

namespace App\Http\Controllers;

use App\Period;
use App\ShippingContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContainerAgentController extends Controller
{
    // Export
    public function showCAExportPage()
    {
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'export' && $statusPeriodAktif->status == 'container-agent') {
            $idTeam = Auth::user()->team->id;
            $containerShipsUS = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('row', null)->where('tier', null)->where('bay', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();
            $listContainerUS = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('team_id', $idTeam)->where('Period_id', 1)->get();

            $plots = ShippingContainer::select('code', 'row', 'tier', 'bay')->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();
            $arrPlot = [];
            foreach ($plots as $plot) {
                $arrPlot[] = $plot->code . '#row' . $plot->row . '#tier' . $plot->tier . '#bay' . $plot->bay;
            }

            foreach ($containerShipsUS as $cs) {
                $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $cs->id . ";"))[0]->totalBobot * 1;
                $cs->stuff_weight = $stuff_weight;
            }

            foreach ($listContainerUS as $lCont) {
                $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $lCont->id . ";"))[0]->totalBobot * 1;
                $lCont->stuff_weight = $stuff_weight;
            }

            $containerShips = $containerShipsUS->sortByDesc('stuff_weight');
            $listContainer = $listContainerUS->sortByDesc('stuff_weight');

            return view('export.container-agent', compact('containerShips', 'arrPlot', 'listContainer'));
        } else {
            return redirect()->back();
        }
    }

    public function showCAImportPage()
    {
        return view('import.container-agent');
    }

    public function getTierCAExport(Request $request)
    {
        $idTeam = Auth::user()->team->id;
        $bay = $request->get('bay');
        $row = $request->get('row');

        $cekNomor = DB::select(DB::raw("select tier from shipping_container where bay='" . $bay . "' and  `row`='" . $row . "' and Team_id='" . $idTeam . "' and Period_id=1 order by tier desc"));
        if ($cekNomor == null) {
            $cekNomor = 1;
        } else {
            $cekNomor = $cekNomor[0]->tier;
            $cekNomor++;
        }

        return response()->json(array('tier' => $cekNomor), 200);
    }

    public function resetPositionCAExport(Request $request)
    {
        $idTeam = Auth::user()->team->id;

        DB::update("update shipping_container set row=null, bay=null, tier=null where Team_id='" . $idTeam . "' and Period_id=1");

        return response()->json(array('message' => "ok"), 200);
    }

    public function pushCAExportBay(Request $request)
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
        $cekTierBawah = DB::select(DB::raw("select code from shipping_container where (volume_status='safe' or volume_status='less') and weight_status='safe' and Team_id='" . $idTeam . "' and `row`='" . $row . "' and tier='" . ($tier - 1) . "' and bay='" . $bay . "'"));
        if ($cekTierBawah != null) {
            $codeContainerShip = ShippingContainer::select('code')->where('id', $idContainer)->first();
            if (substr($cekTierBawah[0]->code, 0, 1) == '2' && substr($codeContainerShip->code, 0, 1) == '4') {
                return redirect()->route('export.container-agent')->with('error', 'Kontainer 40 feet tidak boleh ditaruh di atas kontainer 20 feet!');
            }
        }
        if ($cekSama == 0) {
            $dataContainerShip = ShippingContainer::find($idContainer);
            $dataContainerShip->row = $row;
            $dataContainerShip->tier = $tier;
            $dataContainerShip->bay = $bay;
            $dataContainerShip->save();

            return redirect()->route('export.container-agent')->with('status', 'Kontainer telah berhasil dimasukkan ke dalam Block ' . $bay . ' dengan Row ' . $row . ' dan Tier ' . $tier);
        } else {
            return redirect()->route('export.container-agent')->with('error', 'Row, Tier, dan Block terkait telah terisi. Silakan pilih row, tier, dan block lainnya.');
        }
    }
}
