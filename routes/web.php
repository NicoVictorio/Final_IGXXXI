<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ContainerAgentController;
use App\Http\Controllers\DepoAgentController;
use App\Http\Controllers\ScoringController;
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
    if (!Auth::user()) {
        return redirect('/login');
    } else {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return redirect('/admin');
        } else if ($role == 'player') {
            $activePeriod = Period::where('status', '!=', 'standby')->first();
            if ($activePeriod != null) {
                if ($activePeriod->name == 'export') {
                    return redirect('/export');
                } else if ($activePeriod->name == 'import') {
                    return redirect('/import');
                } else if ($activePeriod->name == 'exportimport') {
                    return redirect('/exportimport');
                }
            } else {
                Auth::logout();
                session()->flash('error', 'Tidak ada sesi yang berlangsung!');
                return redirect('/login');
            }
        } else if ($role == 'penpos') {
            return redirect('/penpos');
        }
    }
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::middleware(['auth', 'admin'])->group(function () {
});

Route::middleware(['auth', 'player'])->group(function () {
    // Export
    Route::get('/export', [PeriodController::class, 'indexExport'])->name('export.index');
    Route::get('/export/depo-agent', [DepoAgentController::class, 'showDAExportPage'])->name('export.depo-agent');
    Route::get('/export/depo-agent/add', [DepoAgentController::class, 'showDAExportAddContainer'])->name('export.da-addcontainer');
    Route::post('/export/depo-agent/add', [DepoAgentController::class, 'saveExportContainer'])->name('export.saveexportcontainer');
    Route::post('/export/depo-agent/reset', [DepoAgentController::class, 'resetExportContainer'])->name('export.resetexportcontainer');
    Route::get('/export/depo-agent/{ShippingContainer}/edit', [DepoAgentController::class, 'showDAExportEditContainer'])->name('export.da-editcontainer');
    Route::post('/export/depo-agent/update', [DepoAgentController::class, 'updateExportContainer'])->name('export.updateexportcontainer');
    Route::post('/export/depo-agent/scoring', [ScoringController::class, 'CalculateTEUsFEUs'])->name('scoring.eda');

    Route::get('/export/container-agent', [ContainerAgentController::class, 'showCAExportPage'])->name('export.container-agent');
    Route::post('/export/container-agent/getTier', [ContainerAgentController::class, 'getTierCAExport'])->name('export.ca-gettier');
    Route::post('/export/container-agent/reset', [ContainerAgentController::class, 'resetPositionCAExport'])->name('export.ca-reset');
    Route::post('/export/container-agent/push', [ContainerAgentController::class, 'pushCAExportBay'])->name('export.ca-push');

    Route::get('/export/shipping-agent', [ShippingAgentController::class, 'showSAExportPage'])->name('export.shipping-agent');
    Route::post('/export/shipping-agent/push', [ShippingAgentController::class, 'pushSAExportDeck'])->name('export.sa-push');
    Route::post('/export/shipping-agent/getTier', [ShippingAgentController::class, 'getTierSAExport'])->name('export.sa-gettier');
    Route::post('/export/shipping-agent/reset', [ShippingAgentController::class, 'resetPositionSAExport'])->name('export.sa-reset');
    Route::post('/export/shipping-agent/scoring', [ScoringController::class, 'CalculateStowagePlan'])->name('scoring.esa');


    // Import
    Route::get('/import', [DepoAgentController::class, 'indexImport'])->name('import.index');

    Route::get('/import/shipping-agent', [ShippingAgentController::class, 'showSAImportPage'])->name('import.shipping-agent');
    Route::post('/import/shipping-agent/cek', [ShippingAgentController::class, 'checkSALateness'])->name('import.sa-ceklateness');
    Route::post('/import/shipping-agent/getrowbaytable', [ShippingAgentController::class, 'getrowbaytable'])->name('import.sa-getrowbaytable');
    Route::post('/import/shipping-agent/scoring', [ScoringController::class, 'CalculateLateness'])->name('scoring.isa');

    Route::get('/import/container-agent', [ContainerAgentController::class, 'showCAImportPage'])->name('import.container-agent');
    Route::post('/import/container-agent/push', [ContainerAgentController::class, 'pushCAImportYard'])->name('import.ca-push');
    Route::post('/import/container-agent/getTier', [ContainerAgentController::class, 'getTierCAImport'])->name('import.ca-gettier');
    Route::post('/import/container-agent/reset', [ContainerAgentController::class, 'resetCAImport'])->name('import.ca-reset');
    Route::post('/import/container-agent/scoring', [ScoringController::class, 'CalculateCompletionTime'])->name('scoring.ica');

    Route::get('/import/depo-agent', [DepoAgentController::class, 'showDAImportPage'])->name('import.depo-agent');
    Route::post('/import/depo-agent/save', [DepoAgentController::class, 'saveDAImport'])->name('import.da-save');
    Route::post('/import/depo-agent/scoring', [ScoringController::class, 'CalculateAcceptance'])->name('scoring.ida');
});

Route::middleware(['auth', 'penpos'])->group(function () {
    // Export
    Route::get('/penpos', [DepoAgentController::class, 'indexPenpos'])->name('penpos');
    Route::get('/export/penpos-qc', [DepoAgentController::class, 'qcPenpos'])->name('export.qcpenpos');
    Route::get('/export/penpos-qc/{team}', [DepoAgentController::class, 'qcPenpos'])->name('export.qcpenpos');
    Route::post('/export/penpos-qc/proses', [DepoAgentController::class, 'qcPenposProses'])->name('export.qcpenposproses');
    Route::post('/export/penpos-qc/modaldetail', [DepoAgentController::class, 'qcPenposModalDetail'])->name('export.qcpenposmodaldetail');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'indexAdmin'])->name('admin.index');
    Route::post('/admin/changestateexport', [AdminController::class, 'changeStateExport'])->name('admin.changestateexport');
    Route::post('/admin/changestateimport', [AdminController::class, 'changeStateImport'])->name('admin.changestateimport');
    Route::get('/admin/listscoring', [AdminController::class, 'scoringList'])->name('admin.listscoring');
});
