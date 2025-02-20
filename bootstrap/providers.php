<?php

declare(strict_types=1);

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    \Barryvdh\DomPDF\ServiceProvider::class,
];
