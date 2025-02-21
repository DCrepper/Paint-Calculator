<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Mail\CalculationFormSendToAdmin;
use App\Mail\CalculationFormSendToUser;
use App\Models\PaintCategory;
use App\Models\Region;
use App\Models\TilePaintDescription;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CalculateForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public ?TilePaintDescription $selectedPaintDescription = null;

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')
                    ->required()
                    ->label('Teljes név')
                    ->live(),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->visible(fn (Get $get) => $get('full_name'))
                    ->label('Email')
                    ->live(),
                Select::make('selectedPaintCategory')
                    ->options(PaintCategory::all()->pluck('name', 'id'))
                    ->visible(fn (Get $get) => $get('full_name') && $get('email'))
                    ->label('Festés kategóriája')
                    ->live(),
                Select::make('selectedPaint')
                    ->options(fn (Get $get) => $get('selectedPaintCategory') ? PaintCategory::find($get('selectedPaintCategory'))->paints->pluck('name', 'id') : [])
                    ->visible(fn (Get $get) => $get('selectedPaintCategory'))
                    ->label('Csempefestésre')
                    ->live(),
                TextInput::make('area')
                    ->numeric()
                    ->required()
                    ->label('Festés felületének mérete (m2)')
                    ->visible(fn (Get $get) => $get('selectedPaint'))
                    ->live()
                    ->afterStateUpdated(function (Get $get, ?string $state) {
                        // now only need to display the result of min-max of the selected paint type  and display on the screen the description of the selected paint type
                        if (! $state) {
                            $this->selectedPaintDescription = null;

                            return;
                        }
                        $this->selectedPaintDescription = TilePaintDescription::where('tile_paint_id', $get('selectedPaint'))
                            ->where('min', '<=', $state)->where('max', '>=', $state)->first();
                    }),
                Select::make('region')->visible(fn (Get $get) => $get('area'))
                    ->label('Régió')
                    ->options(Region::all()->pluck('name', 'id'))
                    ->live(),
                Select::make('Store')->visible(fn (Get $get) => $get('region'))
                    ->options(fn (Get $get) => $get('region') ? Region::find($get('region'))->stores()->get()->pluck('name', 'id') : [])
                    ->label('Üzlet')
                    ->live(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        // Generate PDF
        $pdf = PDF::loadView('pdf.calculation', ['data' => $data]);
        $pdfPath = storage_path('app/public/calculation.pdf');
        $pdf->save($pdfPath);

        // Email the data to admin, 2 others and form email to the user
        Mail::to($data['email'])->send(new CalculationFormSendToUser($data, $pdfPath));
        // üzlet
        Mail::to('zoltan@cegem360.hu')->send(new CalculationFormSendToAdmin($data, $pdfPath));
        // admin
        Mail::to('tamas@cegem360.hu')->send(new CalculationFormSendToAdmin($data, $pdfPath));

        redirect()->to('/siker');
    }

    public function render(): View
    {
        return view('livewire.calculate-form');
    }
}
