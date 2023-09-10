<?php

namespace App\Http\Controllers;

use App\Container;
use App\ContainerProduct;
use App\Demand;
use App\Period;
use App\Scoring;
use App\ShippingContainer;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepoAgentController extends Controller
{
    // Penpos
    public function indexPenpos()
    {
        $activePeriod = Period::where('status', '!=', 'standby')->first();
        if ($activePeriod->name == 'export') {
            return redirect('/export/penpos-qc');
        }
    }

    public function qcPenpos(Team $team)
    {
        $teamList = Team::orderBy('name', 'asc')->get();
        $containerShips = ShippingContainer::where('team_id', $team->id)->where('Period_id', 1)->get();
        return view('penpos.export-qc', compact('teamList', 'team', 'containerShips'));
    }

    public function qcPenposProses(Request $request)
    {
        $idContainerShip = $request->get('shipping_container_id');
        $data = ShippingContainer::find($idContainerShip);

        $qcBobot = null;
        $qcVolume = null;
        $lossSpace = 0;

        $totalBobot = DB::select(DB::raw("select sum(d.weight*cp.quantity) as 'totalBobot' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $data->id . ";"))[0]->totalBobot * 1;
        $totalVolume = DB::select(DB::raw("select sum(d.volume*cp.quantity) as 'totalVolume' from container_product cp inner join demands d on cp.demand_id=d.id where shipping_id=" . $data->id . ";"))[0]->totalVolume * 1;

        $productsInside = ContainerProduct::where('Shipping_id', $idContainerShip)->get();

        // Cek Jenis Kontainer
        foreach ($productsInside as $pI) {
            if (str_contains($pI->demand->container, $data->container->name) == false) {
                $data->weight_status = 'Jenis Kontainer Salah';
                $data->volume_status = 'Jenis Kontainer Salah';
                $data->save();

                return redirect()->route('export.qcpenpos', $data->Team_id)->with('status', 'Proses QC Kontainer ' . $data->code . ' Telah Selesai!');
            }
        }

        // Cek Bobot & Volume
        if ($data->container->name != "Tank Container") {
            // QC Bobot
            if ($totalBobot <= $data->container->max_weight) {
                $qcBobot = 'safe';
            } else {
                $qcBobot = 'overload';
            }

            // QC Volume
            if ($totalVolume <= $data->container->volume && $totalVolume >= (2 / 3.0 * $data->container->volume)) {
                $qcVolume = 'safe';
            } else if ($totalVolume < (2 / 3.0 * $data->container->volume) && $totalVolume >= (1 / 3.0 * $data->container->volume)) {
                $qcVolume = 'less';
            } else if ($totalVolume < (1 / 3.0 * $data->container->volume)) {
                $qcVolume = 'reject';
            } else {
                $qcVolume = 'overload';
            }

            $lossSpace = $data->container->max_volume - $totalVolume;
        } else {
            // Cek Qty Tank > 1
            if (count($productsInside) > 1 || $productsInside[0]->quantity > 1) {
                $data->weight_status = 'Kontainer Tank Quantity > 1';
                $data->volume_status = 'Kontainer Tank Quantity > 1';
                $data->save();

                return redirect()->route('export.qcpenpos', $data->Team_id)->with('status', 'Proses QC Kontainer ' . $data->code . ' Telah Selesai!');
            }
            // QC Bobot
            if ($totalBobot <= $data->container->max_weight) {
                $qcBobot = 'safe';
            } else {
                $qcBobot = 'overload';
            }

            // QC Volume
            if ($totalVolume >= ($data->container->min_volume) && $totalVolume <= ($data->container->max_volume)) {
                $qcVolume = 'safe';
            } else {
                $qcVolume = 'reject';
            }

            $lossSpace = $data->container->max_volume - $totalVolume;
        }

        $data->weight_status = $qcBobot;
        $data->volume_status = $qcVolume;
        $data->loss_space = $lossSpace;
        $data->save();

        return redirect()->route('export.qcpenpos', $data->Team_id)->with('status', 'Proses QC Kontainer ' . $data->code . ' Telah Selesai!');
    }

    public function qcPenposModalDetail(Request $request)
    {
        $idShipping = $request->get('idShipping');
        $dataContainer = ShippingContainer::find($idShipping);

        return response()->json(array('data' => view('penpos.export-modaldetail', compact('dataContainer'))->render()), 200);
    }

    public function showDAExportPage()
    {
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'export' && $statusPeriodAktif->status == 'depo-agent') {
            $teamId = Auth::user()->team->id;
            $scoring = Scoring::select('teus')->where('Team_id', $teamId)->where('Period_id', 1)->first();
            if ($scoring->teus != null) {
                return redirect()->route('export.index')->with('error', 'Anda telah menyimpan permanen hasil depo agent anda! Anda tidak dapat mengakses depo agent kembali.');
            }
            $listContainers = ShippingContainer::select('id', 'team_id', 'container_id', 'code', 'volume_status', 'weight_status', 'city', 'period_id')->where('team_id', $teamId)->where('period_id', '1')->get();

            return view('export.depo-agent', compact('listContainers'));
        } else {
            return redirect()->route('export.index')->with('error', 'Saat ini, sesi depo agent sedang tidak aktif!');
        }
    }

    public function showDAExportAddContainer()
    {
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'export' && $statusPeriodAktif->status == 'depo-agent') {
            $teamId = Auth::user()->team->id;
            $scoring = Scoring::select('teus')->where('Team_id', $teamId)->where('Period_id', 1)->first();
            if ($scoring->teus != null) {
                return redirect()->route('export.index')->with('error', 'Anda telah menyimpan permanen hasil depo agent anda! Anda tidak dapat mengakses depo agent kembali.');
            }
            $containers = Container::all();
            $demands = Demand::where('period_id', '1')->get();
            foreach ($demands as $d) {
                $jmlhMasuk = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='" . $teamId . "' and sc.period_id='1' and cp.demand_id='" . $d->id . "'"))[0]->jmlh;
                $d->quantity -= $jmlhMasuk;
            }

            return view('export.da-add-container', compact('demands', 'containers'));
        } else {
            return redirect()->back();
        }
    }

    public function showDAExportEditContainer(ShippingContainer $ShippingContainer)
    {
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'export' && $statusPeriodAktif->status == 'depo-agent') {
            $teamId = Auth::user()->team->id;
            $scoring = Scoring::select('teus')->where('Team_id', $teamId)->where('Period_id', 1)->first();
            if ($scoring->teus != null) {
                return redirect()->route('export.index')->with('error', 'Anda telah menyimpan permanen hasil depo agent anda! Anda tidak dapat mengakses depo agent kembali.');
            }
            $sContainer = $ShippingContainer;
            if ($sContainer->team->id == $teamId) {
                if (($sContainer->volume_status == 'safe' || $sContainer->volume_status == 'less') && $sContainer->weight_status == 'safe') {
                    return redirect()->back();
                } else {
                    $demands = Demand::where('period_id', '1')->get();
                    foreach ($demands as $d) {
                        $jmlhMasuk = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='" . $teamId . "' and sc.period_id='1' and cp.demand_id='" . $d->id . "'"))[0]->jmlh;
                        $d->quantity -= $jmlhMasuk;

                        $jmlhMasukContainer = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='" . $teamId . "' and sc.period_id='1' and cp.demand_id='" . $d->id . "' and cp.shipping_id='" . $sContainer->id . "'"))[0]->jmlh;
                        $d->quantity += $jmlhMasukContainer;
                        $d->jmlhProdukMasuk = $jmlhMasukContainer;
                    }
                    return view('export.da-edit-container', compact('demands', 'sContainer'));
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function saveExportContainer(Request $request)
    {
        $requests = $request->all();
        $teamId = Auth::user()->team->id;
        $containerId = $request->get('container');
        $container = Container::find($containerId);

        $containerCode = "";
        $jmlhContainerPerTim = DB::select(DB::raw("select count(sc.id) as 'jmlh' from shipping_container sc inner join containers c on sc.container_id=c.id where sc.team_id='" . $teamId . "' and sc.period_id='1' and c.name='" . $container->name . "'"))[0]->jmlh * 1 + 1;

        if ($container->size == '20ft') {
            $containerCode .= "2";
        } elseif ($container->size == '40ft') {
            $containerCode .= "4";
        } else {
            $containerCode .= "22T";
        }

        if ($container->name == 'General Container') {
            $containerCode .= "2G" . $jmlhContainerPerTim;
        } elseif ($container->name == 'Refrigerated Container') {
            if ($container->size == '20ft') {
                $containerCode .= "2R" . $jmlhContainerPerTim;
            } else {
                $containerCode .= "5R" . $jmlhContainerPerTim;
            }
        } elseif ($container->name == 'Fantainer/Ventilation') {
            $containerCode .= "2V" . $jmlhContainerPerTim;
        } else {
            $containerCode .= $jmlhContainerPerTim;
        }

        $cekJmlh = [];
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                $cekJmlh[] = $req;
            }
        }
        if (max($cekJmlh) == 0) {
            return redirect()->back()->withInput()->with('error', 'Tidak ditemukan produk untuk dikirim');
        }

        $indexCek = 1;
        $kotaKirimPertama = "";
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req != 0) {
                    $idProduct = substr($key, 3);
                    if ($indexCek == 1) {
                        $kotaKirimPertama = Demand::find($idProduct)->city;
                    } else {
                        $kotaKirimProduk = Demand::find($idProduct)->city;
                        if ($kotaKirimPertama != $kotaKirimProduk) {
                            return redirect()->back()->withInput()->with('error', 'Destinasi Pengiriman Tiap Produk Harus Sama');
                        }
                    }
                    $indexCek++;
                }
            }
        }

        $newShipping = new ShippingContainer();
        $newShipping->team_id = Auth::user()->team->id;
        $newShipping->container_id = $containerId;
        $newShipping->period_id = 1;
        $newShipping->code = $containerCode;
        $newShipping->city = $kotaKirimPertama;
        $newShipping->save();

        $idShipping = $newShipping->id;

        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req > 0) {
                    $idProduct = substr($key, 3);
                    $jumlahKirim = $req;

                    $newContProd = new ContainerProduct();
                    $newContProd->demand_id = $idProduct;
                    $newContProd->shipping_id = $idShipping;
                    $newContProd->quantity = $jumlahKirim;
                    $newContProd->save();
                }
            }
        }

        return redirect()->route('export.depo-agent')->with('status', "Berhasil Menambahkan Kontainer Baru!");
    }

    public function resetExportContainer(Request $request)
    {
        $idShipping = $request->get('idShipping');
        DB::table('container_product')->where('shipping_id', $idShipping)->delete();

        return redirect()->route('export.da-editcontainer', $idShipping)->with('status', 'Berhasil mereset container');
    }

    public function updateExportContainer(Request $request)
    {
        $idShipping = $request->get('idShipping');
        $requests = $request->all();

        $cekJmlh = [];
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                $cekJmlh[] = $req;
            }
        }
        if (max($cekJmlh) == 0) {
            return redirect()->back()->withInput()->with('error', 'Tidak ditemukan produk untuk dikirim');
        }

        $indexCek = 1;
        $kotaKirimPertama = "";
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req != 0) {
                    $idProduct = substr($key, 3);
                    if ($indexCek == 1) {
                        $kotaKirimPertama = Demand::find($idProduct)->city;
                    } else {
                        $kotaKirimProduk = Demand::find($idProduct)->city;
                        if ($kotaKirimPertama != $kotaKirimProduk) {
                            return redirect()->back()->withInput()->with('error', 'Destinasi Pengiriman Tiap Produk Harus Sama');
                        }
                    }
                    $indexCek++;
                }
            }
        }

        $shipping = ShippingContainer::find($idShipping);
        $shipping->volume_status = 'edit';
        $shipping->weight_status = 'edit';
        $shipping->save();

        DB::table('container_product')->where('shipping_id', $idShipping)->delete();

        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req > 0) {
                    $idProduct = substr($key, 3);
                    $jumlahKirim = $req;

                    $newContProd = new ContainerProduct();
                    $newContProd->demand_id = $idProduct;
                    $newContProd->shipping_id = $idShipping;
                    $newContProd->quantity = $jumlahKirim;
                    $newContProd->save();
                }
            }
        }

        return redirect()->route('export.depo-agent')->with('status', "Berhasil Mengedit Kontainer " . $shipping->code . "!");
    }

    // Import
    public function indexImport()
    {
        $teamId = Auth::user()->team->id;
        $statusPeriod = Period::select('status')->where('name', 'import')->first();
        if($statusPeriod->status == 'standby'){
            Auth::logout();
            return redirect('/login');
        }

        $scoring = Scoring::where('Period_id', 2)->where('Team_id', $teamId)->first();
        return view('import.index', compact('scoring'));
    }
    public function showDAImportPage()
    {
        $acceptance = "";
        $statusPeriodAktif = Period::select('name', 'status')->where('status', '!=', 'standby')->first();
        if ($statusPeriodAktif->name == 'import' && $statusPeriodAktif->status == 'depo-agent') {
            $teamId = Auth::user()->team->id;
            $scoring = Scoring::select('acceptance')->where('Team_id', $teamId)->where('Period_id', 2)->first();
            if ($scoring->acceptance != null) {
                return redirect()->route('import.index')->with('error', 'Anda telah menyimpan permanen hasil depo agent anda! Anda tidak dapat mengakses depo agent kembali.');
            }
            $listContainers = ShippingContainer::select('id', 'Team_id', 'Container_id', 'code', 'Period_id')->where('Team_id', $teamId)->where('Period_id', '2')->get();
            $idConts = "";
            foreach ($listContainers as $lCont) {
                $idConts = $idConts . $lCont->id . ',';
            }
            $idConts = rtrim($idConts, ',');
            $checkBlmJawab = DB::select(DB::raw("select count(demand_id) as 'jmlh' from container_product where final_decision is null and shipping_id in (" . $idConts . ");"))[0]->jmlh;
            if($checkBlmJawab == 0){
                $acceptance = DB::select(DB::raw("select count(cp.Shipping_id) as 'count' from container_product cp inner join shipping_container sc on cp.Shipping_id=sc.id where sc.Team_id='".$teamId."' and Period_id=2 and cp.final_decision=cp.answer_key and cp.Shipping_id in (" . $idConts . ");"))[0]->count;
            }

            return view('import.depo-agent', compact('listContainers', 'checkBlmJawab', 'acceptance'));
        } else {
            return redirect()->route('import.index')->with('error', 'Saat ini, sesi depo agent sedang tidak aktif!');
        }
    }
    public function saveDAImport(Request $request)
    {
        // KURANG SCORING
        $shipConts = $request->get('shipCont');
        $proIds = $request->get('proId');
        $keputusans = $request->get('keputusan');

        foreach ($shipConts as $key => $sc) {
            if ($keputusans[$key] == 'accepted') {
                DB::update("update container_product set final_decision='accepted' where Demand_id='" . $proIds[$key] . "' and Shipping_id='" . $sc . "'");
            } else {
                DB::update("update container_product set final_decision='reject' where Demand_id='" . $proIds[$key] . "' and Shipping_id='" . $sc . "'");
            }
        }
        return redirect()->route('import.depo-agent')->with('status', 'Penyimpanan Keputusan Berhasil.');
    }
}
