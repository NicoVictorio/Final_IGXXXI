<?php

namespace App\Http\Controllers;

use App\Container;
use App\ContainerProduct;
use App\Demand;
use App\ShippingContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepoAgentController extends Controller
{
    // Export
    public function indexExport()
    {
        return view('export.index');
    }

    public function showDAExportPage()
    {
        $listContainers = ShippingContainer::select('id', 'team_id', 'container_id', 'code', 'volume_status', 'weight_status', 'ship_date', 'period_id')->where('team_id', '1')->where('period_id', '1')->get();

        return view('export.depo-agent', compact('listContainers'));
    }

    public function showDAExportAddContainer()
    {
        $containers = Container::all();
        $demands = Demand::where('period_id', '1')->get();
        foreach ($demands as $d) {
            $jmlhMasuk = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='1' and sc.period_id='1' and cp.demand_id='" . $d->id . "'"))[0]->jmlh;
            $d->quantity -= $jmlhMasuk;
        }

        return view('export.da-add-container', compact('demands', 'containers'));
    }

    public function showDAExportEditContainer(ShippingContainer $ShippingContainer)
    {
        // Nanti kasih pengecekan yang boleh akses ini cuma User yang Punya Kontainer aja!
        $sContainer = $ShippingContainer;
        $demands = Demand::where('period_id', '1')->get();
        foreach ($demands as $d) {
            $jmlhMasuk = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='1' and sc.period_id='1' and cp.demand_id='" . $d->id . "'"))[0]->jmlh;
            $d->quantity -= $jmlhMasuk;

            $jmlhMasukContainer = DB::select(DB::raw("select sum(cp.quantity) as 'jmlh' from container_product cp inner join shipping_container sc on cp.shipping_id=sc.id where sc.team_id='1' and sc.period_id='1' and cp.demand_id='" . $d->id . "' and cp.shipping_id='" . $sContainer->id . "'"))[0]->jmlh;
            $d->quantity += $jmlhMasukContainer;
            $d->jmlhProdukMasuk = $jmlhMasukContainer;
        }

        return view('export.da-edit-container', compact('demands', 'sContainer'));
    }

    public function saveExportContainer(Request $request)
    {
        $requests = $request->all();
        $containerId = $request->get('container');
        $container = Container::find($containerId);

        $containerCode = "";
        $jmlhContainerPerTim = DB::select(DB::raw("select count(sc.id) as 'jmlh' from shipping_container sc inner join containers c on sc.container_id=c.id where sc.team_id='1' and sc.period_id='1' and c.name='" . $container->name . "'"))[0]->jmlh * 1 + 1;

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
        $tanggalKirimPertama = "";
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req != 0) {
                    $idProduct = substr($key, 3);
                    if ($indexCek == 1) {
                        $tanggalKirimPertama = Demand::find($idProduct)->ship_date;
                    } else {
                        $tanggalKirimProduk = Demand::find($idProduct)->ship_date;
                        if (strtotime($tanggalKirimPertama) != strtotime($tanggalKirimProduk)) {
                            return redirect()->back()->withInput()->with('error', 'Tanggal Pengiriman Tiap Produk Harus Sama');
                        }
                    }
                    $indexCek++;
                }
            }
        }

        $newShipping = new ShippingContainer();
        $newShipping->team_id = 1; //NANTI GANTI KE AUTH ID
        $newShipping->container_id = $containerId;
        $newShipping->period_id = 1;
        $newShipping->code = $containerCode;
        $newShipping->ship_date = $tanggalKirimPertama;
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

    public function resetExportContainer(Request $request){
        $idShipping = $request->get('idShipping');
        DB::table('container_product')->where('shipping_id', $idShipping)->delete();

        return redirect()->route('export.da-editcontainer', $idShipping)->with('status', 'Berhasil mereset container');
    }

    public function updateExportContainer(Request $request){
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
        $tanggalKirimPertama = "";
        foreach ($requests as $key => $req) {
            if (is_numeric(substr($key, 3)) == true && substr($key, 0, 3) == 'qty') {
                if ($req != 0) {
                    $idProduct = substr($key, 3);
                    if ($indexCek == 1) {
                        $tanggalKirimPertama = Demand::find($idProduct)->ship_date;
                    } else {
                        $tanggalKirimProduk = Demand::find($idProduct)->ship_date;
                        if (strtotime($tanggalKirimPertama) != strtotime($tanggalKirimProduk)) {
                            return redirect()->back()->withInput()->with('error', 'Tanggal Pengiriman Tiap Produk Harus Sama');
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

        return redirect()->route('export.depo-agent')->with('status', "Berhasil Mengedit Kontainer ".$shipping->code."!");
    }

    // Import
    public function showDAImportPage()
    {
    }
}
