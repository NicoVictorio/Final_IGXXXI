<?php

namespace App\Http\Controllers;

use App\Period;
use App\Scoring;
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
            return redirect()->route('export.index')->with('error', 'Saat ini, sesi container agent sedang tidak aktif!');
        }
    }

    public function getTierCAExport(Request $request)
    {
        $idTeam = Auth::user()->team->id;
        $bay = $request->get('bay');
        $row = $request->get('row');

        $cekNomor = DB::select(DB::raw("select tier from shipping_container where bay='" . $bay . "' and  `row`='" . $row . "' and Team_id='" . $idTeam . "' and Period_id=1 order by tier desc limit 1"));
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

    // Import
    public function showCAImportPage()
    {
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'import' && $statusPeriodAktif->status == 'container-agent') {
            $idTeam = Auth::user()->team->id;
            $scoring = Scoring::select('completion_time')->where('Team_id', $idTeam)->where('Period_id', 2)->first();
            // if ($scoring->completion_time != null) {
            //     return redirect()->route('import.index')->with('error', 'Anda telah menyimpan permanen hasil container agent anda! Anda tidak dapat mengakses container agent kembali.');
            // }
            $containerShips = ShippingContainer::whereNotNull('ica_sequence')->whereNull('ica_target_row')->whereNull('ica_target_bay')->whereNull('ica_target_tier')->where('Team_id', $idTeam)->where('Period_id', 2)->get();
            $containerShipsAll = ShippingContainer::whereNotNull('ica_sequence')->where('Team_id', $idTeam)->where('Period_id', 2)->get();

            $countContainers = ShippingContainer::whereNotNull('ica_sequence')->where('Team_id', $idTeam)->where('Period_id', 2)->count();
            $countDone = DB::select(DB::raw("select count(id) as 'count' from shipping_container where ica_target_row is not null and ica_target_bay is not null and ica_target_tier is not null and ica_yard is not null and Team_id='" . $idTeam . "' and Period_id=2"))[0]->count;
            $totalTime = 0;
            $done = false;
            $done = true;
            //Penilaian
            $containersDone = ShippingContainer::whereNotNull('ica_sequence')->whereNotNull('ica_target_row')->whereNotNull('ica_target_bay')->whereNotNull('ica_target_tier')->whereNotNull('ica_yard')->where('Team_id', $idTeam)->where('Period_id', 2)->get();
            $posCraneRow = 0;
            $posCraneTier = 5;
            $posCraneBay = 1;

            $containersDone = $containersDone->sortByDesc('city');

            foreach ($containersDone as $cD) {
                // Ambil
                $selisihRow = abs($cD->ica_target_row - $posCraneRow);
                $posCraneRow = $cD->ica_target_row;
                $selisihTier = abs($cD->ica_target_tier - $posCraneTier) * 0.5;
                $posCraneTier = $cD->ica_target_tier;
                $selisihBay = abs($cD->ica_target_bay - $posCraneBay);
                $posCraneBay = $cD->ica_target_bay;

                // Buang
                if ($cD->city == 'pick_up') {
                    $selisihRow += abs($posCraneRow);
                    $posCraneRow = 0;
                    $selisihTier += abs($posCraneTier - 1) * 0.5;
                    $posCraneTier = 1;
                } else {
                    $selisihRow += abs($posCraneRow - 5);
                    $posCraneRow = 5;
                    $selisihTier += ($posCraneTier - 1) * 0.5;
                    $posCraneTier = 1;
                }

                $totalTime += ($selisihRow + $selisihBay + $selisihTier);
            }

            return view('import.container-agent', compact('containerShips', 'containerShipsAll', 'totalTime', 'done'));
        } else {
            return redirect()->route('import.index')->with('error', 'Saat ini, sesi container agent sedang tidak aktif!');
        }
    }

    public function getTableCAImport(Request $request)
    {
        $idTeam = Auth::user()->team->id;
        $yard = $request->get('yard');
        $tier = $request->get('tier');

        $plots = ShippingContainer::select('code', 'ica_target_row', 'ica_target_bay')->whereNotNull('ica_target_row')->whereNotNull('ica_target_bay')->whereNotNull('ica_target_tier')->where('Period_id', 2)->where('Team_id', $idTeam)->where('ica_yard', $yard)->where('ica_target_tier', $tier)->get();
        $arrPlot = [];
        foreach ($plots as $plot) {
            $arrPlot[] = $plot->code . '#row' . $plot->ica_target_row . '#bay' . $plot->ica_target_bay;
        }

        return response()->json(array('data' => view('import.rowbaytableyard', compact('arrPlot'))->render()), 200);
    }

    public function resetCAImport()
    {
        $idTeam = Auth::user()->team->id;

        DB::update("update shipping_container set ica_target_row=null, ica_target_bay=null, ica_target_tier=null, ica_yard=null where Team_id='" . $idTeam . "' and Period_id=2");

        return response()->json(array('message' => "ok"), 200);
    }

    public function getTierCAImport(Request $request)
    {
        $idTeam = Auth::user()->team->id;
        $bay = $request->get('bay');
        $row = $request->get('row');
        $yard = $request->get('yard');

        $cekNomor = DB::select(DB::raw("select ica_target_tier as 'tier' from shipping_container where ica_target_bay='" . $bay . "' and  ica_target_row='" . $row . "' and ica_yard='" . $yard . "' and Team_id='" . $idTeam . "' and Period_id=2 order by ica_target_tier desc limit 1"));
        if ($cekNomor == null) {
            $cekNomor = 1;
        } else {
            $cekNomor = $cekNomor[0]->tier;
            $cekNomor += 1;
        }

        return response()->json(array('tier' => $cekNomor), 200);
    }

    public function pushCAImportYard(Request $request)
    {
        $idContainer = $request->get('kontainer');
        $yard = $request->get('yard');
        $row = $request->get('row');
        $bay = $request->get('bay');
        $tier = $request->get('tier');

        $idTeam = Auth::user()->team->id;
        if ($tier >= 4) {
            return redirect()->route('import.container-agent')->with('error', 'Kontainer tidak dapat ditumpuk dengan lebih dari 3 tumpukan!');
        }
        $cekSama = DB::select(DB::raw("select count(id) as 'count' from shipping_container where Team_id='" . $idTeam . "' and ica_target_row='" . $row . "' and ica_target_tier='" . $tier . "' and ica_target_bay='" . $bay . "' and ica_yard='" . $yard . "'"))[0]->count * 1;
        $cekTierBawah = DB::select(DB::raw("select code from shipping_container where Team_id='" . $idTeam . "' and ica_target_row='" . $row . "' and ica_target_tier='" . ($tier - 1) . "' and ica_target_bay='" . $bay . "' and ica_yard='" . $yard . "'"));
        if ($cekTierBawah != null) {
            $codeContainerShip = ShippingContainer::select('code')->where('id', $idContainer)->first();
            if (substr($cekTierBawah[0]->code, 0, 1) == '2' && substr($codeContainerShip->code, 0, 1) == '4') {
                return redirect()->route('import.container-agent')->with('error', 'Kontainer 40 feet tidak boleh ditaruh di atas kontainer 20 feet!');
            }
        }
        if ($cekSama == 0) {
            $dataContainerShip = ShippingContainer::find($idContainer);
            if ($dataContainerShip->container->name == 'Refrigerated Container' && $yard != 'rf') {
                return redirect()->route('import.container-agent')->with('error', 'Refrigerated Container harus diletakkan pada RF Yard!');
            }
            if ($dataContainerShip->container->name != 'Refrigerated Container' && $yard == 'rf') {
                return redirect()->route('import.container-agent')->with('error', 'Kontainer selain Refrigerated Container harus diletakkan pada Import Yard!');
            }
            $dataContainerShip->ica_target_row = $row;
            $dataContainerShip->ica_target_tier = $tier;
            $dataContainerShip->ica_target_bay = $bay;
            $dataContainerShip->ica_yard = $yard;
            $dataContainerShip->save();

            return redirect()->route('import.container-agent')->with('status', 'Kontainer telah berhasil dimasukkan ke dalam Bay ' . $bay . ' dengan Row ' . $row . ' dan Tier ' . $tier . ' pada Yard ' . ucfirst($yard));
        } else {
            return redirect()->route('import.container-agent')->with('error', 'Row, Tier, dan Bay pada Yard terkait telah terisi. Silakan pilih row, tier, dan bay lainnya pada Yard ' . ucfirst($yard) . '.');
        }
    }
}
