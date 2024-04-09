<?php

use App\Http\Controllers\GatepassController;
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

Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resources([
        'gatepasses' => GatepassController::class,
    ]);
});