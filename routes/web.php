<?php

declare(strict_types=1);

use App\Mail\CalculationFormSendToAdmin;
use App\Models\PaintCategory;
use App\Models\Region;
use App\Models\TilePaint;
use App\Models\TilePaintDescription;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/siker', function () {
    return view('siker');
});

Route::get('/mailable', function () {
    $data = [
        'full_name' => 'John Doe',
        'area' => 10,
        'email' => 'admin@admin.com',
        'phone' => '123456789',
        'selectedPaintCategory' => 1,
        'selectedPaint' => 1,
        'region' => 1,
        'store' => 1,

    ];
    $data['selectedPaintDescription'] = TilePaintDescription::find($data['selectedPaint']);
    $data['selectedPaintCategory'] = PaintCategory::find($data['selectedPaintCategory']);
    $data['TilePaint'] = TilePaint::find($data['selectedPaint']);
    $data['region'] = Region::find($data['region']);
    $data['store'] = $data['region']->stores()->find($data['store']);

    return new CalculationFormSendToAdmin(
        data: $data,
        pdfPath: 'path/to/pdf'
    );
});

Route::get('/pdf', function () {
    $data = [
        'full_name' => 'John Doe',
        'area' => 10,
        'email' => 'admin@admin.com',
        'phone' => '123456789',
        'selectedPaintCategory' => 1,
        'selectedPaint' => 1,
        'region' => 1,
        'store' => 1,

    ];
    $data['selectedPaintDescription'] = TilePaintDescription::find($data['selectedPaint']);
    $data['selectedPaintCategory'] = PaintCategory::find($data['selectedPaintCategory']);
    $data['TilePaint'] = TilePaint::find($data['selectedPaint']);
    $data['region'] = Region::find($data['region']);
    $data['store'] = $data['region']->stores()->find($data['store']);

    return view('pdf.calculation', ['data' => $data]);

    /* return new CalculationFormSendToAdmin(
        data: $data,
        pdfPath: 'path/to/pdf'
    ); */
});
