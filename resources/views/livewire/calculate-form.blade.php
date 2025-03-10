<div class="container mx-auto">
    <div class="grid grid-cols-1 gap-6 p-6 bg-white rounded-lg shadow-md sm:grid-cols-2">
        <div class="flex justify-start">
            <form wire:submit="submit" class="w-full space-y-4">
                {{ $this->form }}

                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                    {{ __('filament-actions::modal.actions.submit.label') }}
                </button>
            </form>
        </div>

        @isset($selectedPaintDescription)
            <div class="p-8 bg-gray-100 rounded-lg description">
                <h2 class="mb-4 font-semibold">
                    {{ $selectedPaintDescription?->min }} - {{ $selectedPaintDescription?->max }} csempe festésére az alább
                    felsorolt anyagokat szükséges megvásárolni
                </h2>
                <p class="mb-2">{{ $selectedPaintDescription?->description }}</p>
                <p class="mb-2"><strong>Várható végösszeg:</strong> bruttó {{ $selectedPaintDescription?->price }}Ft +
                    színezés
                </p>
                <h2 class="mt-4 mb-2 text-lg font-semibold"><strong>Rétegrend:</strong></h2>
                @isset($selectedTilePaint)
                    {{ $selectedTilePaint->paint_order }}
                @endisset
            </div>
        @endisset

        <x-filament-actions::modals />
    </div>
</div>
