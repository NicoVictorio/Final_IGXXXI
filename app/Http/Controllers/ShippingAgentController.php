<?php

namespace App\Http\Controllers;

use App\ContainerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingAgentController extends Controller
{
    public function showSAExportPage()
    {
        return view('export.shipping-agent');
    }

    public function showSAImportPage()
    {
        return view('import.shipping-agent');
    }
}
