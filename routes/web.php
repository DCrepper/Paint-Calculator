<?php

declare(strict_types=1);

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/siker', function () {
    return view('siker');
});
