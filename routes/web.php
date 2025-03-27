<?php

use App\Http\Controllers\ActiviloggingController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CabVoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GatepassController;
use App\Http\Controllers\GatepassItemController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Models\Asset;
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
        'assets' => AssetController::class,
        'lendings' => LendingController::class,
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
    // specific routes related to gatepass controller
    Route::post('/gatepassItems/addGatepassItems/{gatepass}', [GatepassItemController::class, 'addGatepassItems'])->name('addGatepassItems');
    Route::get('/gatepassItems/deleteGatepassItem/{gatepassItem}', [GatepassItemController::class, 'deleteGatepassItem'])->name('deleteGatepassItem');

    // specific routes of Cab voucher controler
    Route::get('/cab-voucher/issue/{cabVoucher}', [CabVoucherController::class, 'issueCabVoucher'])->name('cabVoucher.issue');
    Route::post('/cab-voucher/issue/storeCabVoucherNumber/{cabVoucher}', [CabVoucherController::class, 'storeCabVoucherNumber'])->name('cabVoucher.storeCabVoucherNumber');
    Route::get('/cab-voucher/show/{cabVoucher}', [CabVoucherController::class, 'showCabVoucher'])->name('cabVoucher.show');
    Route::get('/cab-voucher/return/{cabVoucher}', [CabVoucherController::class, 'returnCabVoucher'])->name('cabVoucher.return');
    Route::get('/cab-voucher/sendReceipt/{cabVoucher}', [CabVoucherController::class, 'sendReceipt'])->name('cabVoucher.sendReceipt');
    Route::post('/cab-voucher/sendReceiptCV/{cabVoucher}', [CabVoucherController::class, 'sendReceiptCV'])->name('cabVoucher.sendReceiptCV');
    Route::get('/cab-voucher/printCV/{cabVoucher}', [CabVoucherController::class, 'printCV'])->name('printCV');
    Route::get('/cab-voucher/showCVHistory/{user}', [CabVoucherController::class, 'showCVHistory'])->name('showCVHistory');
    Route::get('/cab-voucher/delete/{cabVoucher}', [CabVoucherController::class, 'cvDelete'])->name('cabVoucher.delete');

    // Assets related routes
    //Route::get();


    // sending mails
    Route::get('/sendWelcomemail', [MailController::class, 'sendWelcomeMail'])->name('sendWelcomemail');

    // routes related to lending functionality
    Route::get('/lendingAssets', [LendingController::class, 'index'])->name('lendingAsset.index');
    Route::get('/lendingAssets/returnAsset/{id}', [LendingController::class, 'returnAsset'])->name('lendingAsset.returnAsset');

    // user management
    Route::get('/manage-users',[UserController::class, 'index'])->name('manageUsers');
    Route::get('/manage-user/edit-user/{user}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/manage-users/edit-user/changeUserRole/{user}', [UserController::class, 'changeUserRole'])->name('changeUserRole');
    Route::post('/manage-users/addNewUser', [UserController::class, 'addNewUser'])->name('addNewUser');

    // activity log
    Route::get('/activity-log/showActivites', [ActiviloggingController::class, 'showActivites'])->name('showActivites');
});