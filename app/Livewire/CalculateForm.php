<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Mail\CalculationFormSendToAdmin;
use App\Mail\CalculationFormSendToUser;
use App\Models\PaintCategory;
use App\Models\Region;
use App\Models\TilePaint;
use App\Models\TilePaintDescription;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Filament\Forms\Components\Radio;
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

    public ?TilePaint $selectedTilePaint = null;

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
                    ->label('Kérlek, írd be a neved, minimum a keresztneved')
                    ->live(),
                TextInput::make('Email címed')
                    ->email()
                    ->required()
                    ->visible(fn (Get $get) => $get('full_name'))
                    ->label('Email')
                    ->live(),
                Select::make('selectedPaintCategory')
                    ->options(PaintCategory::all()->pluck('name', 'id'))
                    ->visible(fn (Get $get) => $get('full_name') && $get('email'))
                    ->label('Válaszd ki, hogy milyen munkát szeretnél elvégezni')
                    ->live(),
                Radio::make('selectedPaint')
                    ->options(fn (Get $get) => $get('selectedPaintCategory') ? PaintCategory::find($get('selectedPaintCategory'))->paints()->get()->pluck('name', 'id') : [])
                    ->descriptions(fn (Get $get) => $get('selectedPaintCategory') ? PaintCategory::find($get('selectedPaintCategory'))->paints()->get()->pluck('description', 'id') : [])
                    ->visible(fn (Get $get) => $get('selectedPaintCategory'))
                    ->label('Válaszd ki, a számodra megfelelő csomagot')
                    ->live()
                    ->afterStateUpdated(function (Get $get, ?string $state) {
                        $this->selectedTilePaint = TilePaint::find($get('selectedPaint'));
                    }),
                TextInput::make('area')
                    ->numeric()
                    ->required()
                    ->label('Írd be a festés felületének területét (m2)')
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
                        $this->selectedTilePaint = TilePaint::find($get('selectedPaint'));
                    }),
                Select::make('region')->visible(fn (Get $get) => $get('area'))
                    ->label('Válaszd ki a települést, ahol vásárolni szeretnél')
                    ->options(Region::all()->pluck('name', 'id'))
                    ->live(),
                Select::make('store')->visible(fn (Get $get) => $get('region'))
                    ->options(fn (Get $get) => $get('region') ? Region::find($get('region'))->stores()->get()->pluck('name', 'id') : [])
                    ->label('Válaszd ki a festékboltot')
                    ->live(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        try {
            $data = $this->form->getState();
            $data['selectedPaintDescription'] = TilePaintDescription::find($data['selectedPaint']);
            $data['selectedPaintCategory'] = PaintCategory::find($data['selectedPaintCategory']);
            $data['tilePaint'] = TilePaint::find($data['selectedPaint']);
            $data['region'] = Region::find($data['region']);
            $data['store'] = $data['region']->stores()->find($data['store']);

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
        } catch (\Exception $e) {
            // Handle the exception (e.g., log the error, show an error message)
            \Log::error('Error in form submission: ' . $e->getMessage());
            session()->flash('error', 'There was an error processing your request. Please try again later.');
        }

        redirect()->to('/siker');
    }

    public function render(): View
    {
        return view('livewire.calculate-form');
    }
}
