<?php

use App\Livewire\CalculatorForm;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CalculatorForm::class)
        ->assertStatus(200);
});
