<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContainerAgentController extends Controller
{
    public function showCAExportPage(){
        return view('export.container-agent');
    }
    
    public function showCAImportPage(){
        
    }
}
