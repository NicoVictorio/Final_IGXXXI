<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingAgentController extends Controller
{
    public function showSAExportPage(){
        return view('export.shipping-agent');
    }

    public function showSAImportPage(){
        return view('import.shipping-agent');
    }
}
