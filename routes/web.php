<?php

use App\Http\Controllers\CabVoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GatepassController;
use App\Http\Controllers\GatepassItemController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Models\CabVoucher;
use App\Models\GatepassItem;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/forgetPassword', function () {
    return redirect()->route('password.request');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [DashboardController::class, 'displayDashboardInfo'])->name('home');

    Route::resources([
        'gatepasses' => GatepassController::class,
        'cabvouchers' => CabVoucherController::class,
    ]);
    // gatepass related routes listed below
    Route::get('/gatepasses/{gatepass}/show', [GatepassController::class, 'show'])->name('gatepasses.show');
    Route::get('/gatepasses/{gatepass}/verify', [GatepassController::class, 'viewGatepassToVerify'])->name('gatepasses.verify');
    Route::get('/gatepasses/{gatepass}/verifygp', [GatepassController::class, 'verifyGatepass'])->name('gatepasses.verifyGatepass');
    Route::get('/gatepasses/{gatepass}/approve', [GatepassController::class, 'viewGatepassToApprove'])->name('gatepasses.approve');
    Route::get('/gatepasses/{gatepass}/approvegp', [GatepassController::class, 'approveGatepass'])->name('gatepasses.approveGatepass');
    Route::get('/gatepasses/{gatepass}', [GatepassController::class, 'addItemsToGatepass'])->name('gatepasses.addItemsToGatepass');
    Route::get('/gatepasses/{gatepass}/viewBeforeDestroy', [GatepassController::class, 'viewBeforeDestroy'])->name('gatepasses.viewBeforeDestroy');
    Route::get('/gatepasses/{gatepass}/destroy', [GatepassController::class, 'destroy'])->name('gatepasses.destroy');
    // specific routes related to gatepass are listed below
    Route::post('/gatepassItems/addGatepassItems/{gatepass}', [GatepassItemController::class, 'addGatepassItems'])->name('addGatepassItems');
    Route::get('/gatepassItems/deleteGatepassItem/{gatepassItem}', [GatepassItemController::class, 'deleteGatepassItem'])->name('deleteGatepassItem');

    // sending mails
    Route::get('/sendWelcomemail', [MailController::class, 'sendWelcomeMail'])->name('sendWelcomemail');

    // routes related to lending functionality
    Route::get('/lendingAssets', [LendingController::class, 'index'])->name('lendingAsset.index');

    // user management
    Route::get('/manage-users',[UserController::class, 'index'])->name('manageUsers');
    Route::get('/manage-user/edit-user/{user}', [UserController::class, 'edit'])->name('editUser');
});