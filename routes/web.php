<?php

use App\Http\Controllers\ContainerAgentController;
use App\Http\Controllers\DepoAgentController;
use App\Http\Controllers\ShippingAgentController;
use App\Period;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    } else {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return redirect('/admin');
        } else if ($role == 'player') {
            $activePeriod = Period::where('status', '!=', 'standby')->first();
            if ($activePeriod->name == 'export') {
                return redirect('/export');
            } else if ($activePeriod->name == 'import') {
                return redirect('/import');
            } else if ($activePeriod->name == 'exportimport') {
                return redirect('/exportimport');
            }
        } else if ($role == 'penpos') {
            return redirect('/penpos');
        }
    }
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
});

Route::middleware(['auth', 'player'])->group(function () {
    // Export
    Route::get('/export', [DepoAgentController::class, 'indexExport'])->name('export.index');
    Route::get('/export/depo-agent', [DepoAgentController::class, 'showDAExportPage'])->name('export.depo-agent');
    Route::get('/export/depo-agent/add', [DepoAgentController::class, 'showDAExportAddContainer'])->name('export.da-addcontainer');
    Route::post('/export/depo-agent/add', [DepoAgentController::class, 'saveExportContainer'])->name('export.saveexportcontainer');
    Route::post('/export/depo-agent/reset', [DepoAgentController::class, 'resetExportContainer'])->name('export.resetexportcontainer');
    Route::get('/export/depo-agent/{ShippingContainer}/edit', [DepoAgentController::class, 'showDAExportEditContainer'])->name('export.da-editcontainer');
    Route::post('/export/depo-agent/update', [DepoAgentController::class, 'updateExportContainer'])->name('export.updateexportcontainer');

    Route::get('/export/container-agent', [ContainerAgentController::class, 'showCAExportPage'])->name('export.container-agent');
    Route::post('/export/container-agent/push', [ContainerAgentController::class, 'pushCAExportBay'])->name('export.ca-push');

    Route::get('/export/shipping-agent', [ShippingAgentController::class, 'showSAExportPage'])->name('export.shipping-agent');


    // Import
    Route::get('/import', [DepoAgentController::class, 'indexImport'])->name('import.index');
    Route::get('/import', function () {
        return view('import.index');
    });

    Route::get('/import/depo-agent', [DepoAgentController::class, 'showDAImportPage'])->name('import.depo-agent');
    Route::post('/import/shipping-agent/save', [DepoAgentController::class, 'saveDAImport'])->name('import.da-save');

    Route::get('/import/container-agent', [ContainerAgentController::class, 'showCAImportPage'])->name('import.container-agent');
    Route::get('/import/shipping-agent', [ShippingAgentController::class, 'showSAImportPage'])->name('import.shipping-agent');
});

Route::middleware(['auth', 'penpos'])->group(function () {
    // Export
    Route::get('/penpos', [DepoAgentController::class, 'indexPenpos'])->name('penpos');
    Route::get('/export/penpos-qc', [DepoAgentController::class, 'qcPenpos'])->name('export.qcpenpos');
    Route::get('/export/penpos-qc/{team}', [DepoAgentController::class, 'qcPenpos'])->name('export.qcpenpos');
    Route::post('/export/penpos-qc/proses', [DepoAgentController::class, 'qcPenposProses'])->name('export.qcpenposproses');
    Route::post('/export/penpos-qc/modaldetail', [DepoAgentController::class, 'qcPenposModalDetail'])->name('export.qcpenposmodaldetail');
});
