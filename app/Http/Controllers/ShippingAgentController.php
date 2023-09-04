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
        $containerShipsUS = ShippingContainer::whereRaw("(volume_status='safe' or volume_status='less') and weight_status='safe'")->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('ica_target_row', null)->where('ica_sequence', null)->where('ica_target_bay', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();

        $plots = ShippingContainer::select('code', 'row', 'tier', 'bay')->where('row', '!=', null)->where('tier', '!=', null)->where('bay', '!=', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();
        $plotsBay = ShippingContainer::select('code', 'ica_target_row', 'ica_sequence', 'ica_target_bay', 'isa_due_date')->where('ica_target_row', '!=', null)->where('ica_sequence', '!=', null)->where('ica_target_bay', '!=', null)->where('team_id', $idTeam)->where('Period_id', 1)->get();

        $arrPlot = [];
        $arrPlotBay = [];

        foreach ($plots as $plot) {
            $arrPlot[] = $plot->code . '#row' . $plot->row . '#tier' . $plot->tier . '#bay' . $plot->bay;
        }

        foreach ($plotsBay as $plotB) {
            $arrPlotBay[] = $plotB->code . '#row' . $plotB->ica_target_row . '#tier' . $plotB->ica_sequence . '#bay' . $plotB->ica_target_bay . '#bayT' . $plotB->isa_due_date;
        }

        foreach ($containerShipsUS as $cs) {
            $stuff_weight = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $cs->id . ";"))[0]->totalBobot * 1;
            $cs->stuff_weight = $stuff_weight;
        }

        $totalWeightPort = DB::select(DB::raw("select sum(cp.quantity*d.weight) as 'weight' from shipping_container sc inner join container_product cp on sc.id=cp.shipping_id inner join demands d on cp.demand_id=d.id where sc.ica_target_row in (2,4,6) and sc.team_id='.$idTeam.' and sc.Period_id=1;"));
        if ($totalWeightPort != null) {
            $totalWeightPort = $totalWeightPort[0]->weight;
        } else {
            $totalWeightPort = 0;
        }
        $totalWeightStarboard = DB::select(DB::raw("select sum(cp.quantity*d.weight) as 'weight' from shipping_container sc inner join container_product cp on sc.id=cp.shipping_id inner join demands d on cp.demand_id=d.id where sc.ica_target_row in (1,3,5) and sc.team_id='.$idTeam.' and sc.Period_id=1;"));
        if ($totalWeightStarboard != null) {
            $totalWeightStarboard = $totalWeightStarboard[0]->weight;
        } else {
            $totalWeightStarboard = 0;
        }
        $diffPortStarboard = abs($totalWeightPort - $totalWeightStarboard);
        $totalWeightBow = DB::select(DB::raw("select sum(cp.quantity*d.weight) as 'weight' from shipping_container sc inner join container_product cp on sc.id=cp.shipping_id inner join demands d on cp.demand_id=d.id where sc.team_id='.$idTeam.' and sc.Period_id=1 and (sc.ica_target_bay=1 or sc.ica_target_bay=3 or sc.ica_target_bay=5)"));
        if ($totalWeightBow != null) {
            $totalWeightBow = $totalWeightBow[0]->weight;
        } else {
            $totalWeightBow = 0;
        }
        $totalWeightStern = DB::select(DB::raw("select sum(cp.quantity*d.weight) as 'weight' from shipping_container sc inner join container_product cp on sc.id=cp.shipping_id inner join demands d on cp.demand_id=d.id where sc.ica_target_bay in (7,9,11) and sc.team_id='.$idTeam.' and sc.Period_id=1;"));
        if ($totalWeightStern != null) {
            $totalWeightStern = $totalWeightStern[0]->weight;
        } else {
            $totalWeightStern = 0;
        }
        $diffBowStern = abs($totalWeightBow - $totalWeightStern);
        $totalWeightShip = DB::select(DB::raw("select sum(cp.quantity*d.weight) as 'weight' from shipping_container sc inner join container_product cp on sc.id=cp.shipping_id inner join demands d on cp.demand_id=d.id where sc.ica_target_row is not null and sc.ica_target_bay is not null and sc.ica_sequence is not null and sc.team_id='.$idTeam.' and sc.Period_id=1;"));

        if ($totalWeightShip != null) {
            $totalWeightShip = $totalWeightShip[0]->weight;
        } else {
            $totalWeightShip = 0;
        }

        $decision1 = '';
        $decision2 = '';
        $finalDecision = '';

        if ($diffPortStarboard < (0.15 * $totalWeightShip)) {
            $decision1 = 'send';
        } else {
            $decision1 = 'reject';
        }

        if ($diffBowStern < (0.15 * $totalWeightShip)) {
            $decision2 = 'send';
        } else {
            $decision2 = 'reject';
        }

        if ($decision1 == 'send' && $decision2 == 'send') {
            $finalDecision = 'kirim';
        } else {
            $finalDecision = 'reject';
        }

        $containerShips = $containerShipsUS->sortByDesc('stuff_weight');

        return view('export.shipping-agent', compact('containerShips', 'arrPlot', 'totalWeightPort', 'totalWeightStarboard', 'diffPortStarboard', 'totalWeightBow', 'totalWeightStern', 'diffBowStern', 'totalWeightShip', 'decision1', 'decision2', 'finalDecision'));
    }

    public function pushSAExportDeck(Request $request)
    {
        $request->validate(['kontainer' => 'required', 'row' => 'required', 'bay' => 'required']);
        $idContainer = $request->get('kontainer');
        $row = $request->get('row');
        $bay = $request->get('bay');
        $tier = $request->get('tier');

        $idTeam = Auth::user()->team->id;
        if ($tier > 6) {
            return redirect()->route('export.shipping-agent')->with('error', 'Kontainer tidak dapat ditumpuk dengan lebih dari 3 tumpukan!');
        }

        $cekTierBawah = DB::select(DB::raw("select code from shipping_container where (volume_status='safe' or volume_status='less') and weight_status='safe' and Team_id='" . $idTeam . "' and ica_target_row='" . $row . "' and ica_sequence='" . ($tier - 2) . "' and ica_target_bay='" . $bay . "'"));

        if ($cekTierBawah != null) {
            $codeContainerShip = ShippingContainer::select('code')->where('id', $idContainer)->first();
            if (substr($cekTierBawah[0]->code, 0, 1) == '2' && substr($codeContainerShip->code, 0, 1) == '4') {
                return redirect()->route('export.shipping-agent')->with('error', 'Kontainer 40 feet tidak boleh ditaruh di atas kontainer 20 feet!');
            }
        }

        $cekSama = DB::select(DB::raw("select count(id) as 'count' from shipping_container where (volume_status='safe' or volume_status='less') and weight_status='safe' and Team_id='" . $idTeam . "' and `ica_target_row`='" . $row . "' and ica_sequence='" . $tier . "' and ica_target_bay='" . $bay . "'"))[0]->count * 1;
        if ($cekSama == 0) {
            $cekBay40Feet = 0;

            if ($bay == 1) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='1'"))[0]->count;
            } elseif ($bay == 3) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='3'"))[0]->count;
            } else if ($bay == 5) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='5'"))[0]->count;
            } elseif ($bay == 7) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='7'"))[0]->count;
            } else if ($bay == 9) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='9'"))[0]->count;
            } elseif ($bay == 11) {
                $cekBay40Feet = DB::select(DB::raw("select count(isa_due_date) as 'count' from shipping_container where ica_target_row = '" . $row . "' and ica_sequence = '" . $tier . "' and isa_due_date='11'"))[0]->count;
            }

            if ($cekBay40Feet > 0) {
                return redirect()->route('export.shipping-agent')->with('error', 'Kontainer tidak dapat dimasukkan ke dalam Bay ' . $bay . ' dengan Row ' . $row . ' dan Tier ' . $tier . ' karena terdapat kontainer 40 feet pada bay berpasangan (1-3 atau 5-7 atau 9-11)');
            }

            $dataContainerShip = ShippingContainer::find($idContainer);
            $dataContainerShip->ica_target_row = $row;
            $dataContainerShip->ica_sequence = $tier;
            $dataContainerShip->ica_target_bay = $bay;
            
            if (substr($dataContainerShip->code, 0, 1) == '4') {
                if ($bay == 1) {
                    $dataContainerShip->isa_due_date = 3;
                } elseif ($bay == 3) {
                    $dataContainerShip->isa_due_date = 1;
                } else if ($bay == 5) {
                    $dataContainerShip->isa_due_date = 5;
                } elseif ($bay == 7) {
                    $dataContainerShip->isa_due_date = 7;
                } else if ($bay == 9) {
                    $dataContainerShip->isa_due_date = 11;
                } elseif ($bay == 11) {
                    $dataContainerShip->isa_due_date = 9;
                }
            }
            $dataContainerShip->save();

            return redirect()->route('export.shipping-agent')->with('status', 'Kontainer telah berhasil dimasukkan ke dalam Bay ' . $bay . ' dengan Row ' . $row . ' dan Tier ' . $tier);
        } else {
            return redirect()->route('export.shipping-agent')->with('error', 'Row, Tier, dan Bay terkait telah terisi. Silakan pilih row, tier, dan bay lainnya.');
        }
    }

    public function getTierSAExport(Request $request)
    {
        $idTeam = Auth::user()->team->id;
        $bay = $request->get('bay');
        $row = $request->get('row');

        $cekNomor = DB::select(DB::raw("select ica_sequence as 'tier' from shipping_container where ica_target_bay='" . $bay . "' and  ica_target_row='" . $row . "' and Team_id='" . $idTeam . "' and Period_id=1 order by tier desc"));
        if ($cekNomor == null) {
            $cekNomor = 2;
        } else {
            $cekNomor = $cekNomor[0]->tier;
            $cekNomor += 2;
        }

        return response()->json(array('tier' => $cekNomor), 200);
    }

    // Import
    public function showSAImportPage()
    {
        return view('import.shipping-agent');
    }
}
