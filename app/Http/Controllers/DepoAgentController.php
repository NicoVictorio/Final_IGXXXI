<?php

namespace App\Http\Controllers;

use App\Container;
use App\Demand;
use App\ShippingContainer;
use Illuminate\Http\Request;

class DepoAgentController extends Controller
{
    // Export
    public function indexExport(){
        return view('export.index');
    }

    public function showDAExportPage()
    {
        $listContainers = ShippingContainer::select('id','team_id', 'container_id', 'loss_space', 'volume_status', 'weight_status', 'ship_date', 'period_id')->where('team_id', '1')->where('period_id', '1')->get();

        return view('export.depo-agent', compact('listContainers'));
    }

    public function showDAExportAddContainer()
    {
        $demands = Demand::where('period_id', '1')->get();
        $containers = Container::all();

        return view('export.da-add-container', compact('demands', 'containers'));
    }

    public function showDAExportEditContainer(ShippingContainer $shippingContainer)
    {
        // Nanti kasih pengecekan yang boleh akses ini cuma User yang Punya Kontainer aja!
        $demands = Demand::where('period_id', '1')->get();
        $sContainer = $shippingContainer;

        return view('export.da-edit-container', compact('demands', 'sContainer'));
    }

    public function saveExportContainer(Request $request){
        $requests = $request->all();
        dd($requests);
    }

    // Import
    public function showDAImportPage()
    {
    }
}
