<?php

declare(strict_types=1);

use App\Http\Controllers\CsempeCalculatorController;
use App\Models\PartnerShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/csempe-kalkulator', [CsempeCalculatorController::class, 'calculate'])->name('csempe-kalkulator.calculate');
Route::get('/categories', [CsempeCalculatorController::class, 'categories'])->name('csempe-kalkulator.categories');
Route::get('/paints/{PaintCategory}', [CsempeCalculatorController::class, 'paints'])->name('csempe-kalkulator.paints');

Route::get('/partner-shops', function () {
    $partnerShops = PartnerShop::with(['region'])->get();

    return response()->json($partnerShops);
})->name('partner-shops');
