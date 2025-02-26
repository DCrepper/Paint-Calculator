<div class="grid grid-cols-1 gap-6 p-6 bg-white rounded-lg shadow-md sm:grid-cols-2">
    <div class="flex justify-center">
        <form wire:submit="submit" class="space-y-4">
            {{ $this->form }}

            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                {{ __('filament-actions::modal.actions.submit.label') }}
            </button>
        </form>
    </div>

    @isset($selectedPaintDescription)
        <div class="p-4 bg-gray-100 rounded-lg">
            <h2 class="mb-4 text-lg font-semibold">
                {{ $selectedPaintDescription?->min }} - {{ $selectedPaintDescription?->max }} csempe festésére az alább
                felsorolt anyagokat szükséges megvásárolni
            </h2>
            <p class="mb-2">{{ $selectedPaintDescription?->description }}</p>
            <p class="mb-2"><strong>Várható végösszeg:</strong> bruttó {{ $selectedPaintDescription?->price }}Ft + színezés
            </p>
            <h2 class="mt-4 mb-2 text-lg font-semibold"><strong>Rétegrend:</strong></h2>
            <ol class="pl-4 list-decimal list-inside">
                <li class="mb-2"><strong>Előkészítés:</strong> Alapos takarítás, zsírtalanítás. Zsírtalanításhoz
                    használható Trisó is,
                    amit a Trisó használati utasítása szerint kell alkalmazni!</li>
                <li class="mb-2"><strong>Javítások:</strong> Az elöregedett sziloplasztot el kell távolítani. Kiesett
                    fugaanyag, valamint
                    a nem kívánt lyukak, kisebb hibák javítása HARZO-Fix Kiegyenlítő és tömítőanyaggal, illetve a HARZO-Fix
                    javító tapasszal javítható. A festés megkezdése előtt, a megszáradt kisebb javítások, lyukak felületét
                    1-2 rétegben érdemes lekenni a HARZO Color Csempe és bútorfestékkel, a szívóképesség kiegyenlítése
                    érdekében.</li>
                <li class="mb-2"><strong>Alapozás:</strong> Alapozni nem kell.</li>
                <li class="mb-2"><strong>Szín kenése:</strong> Festés a HARZO Color Csempe és bútorfestékkel 2 – 3
                    rétegben. Fehér színű
                    festésnél ez több réteg is lehet. Száradási idő: kb.2-3 óra, ami függ a levegő hőmérséklettől és a
                    szellőztetés lehetőségeitől. Optimális esetben akár 1 óra múlva is átkenhető.</li>
                <li class="mb-2"><strong>Lakkozás:</strong> HARZO kétkomponensű vizes lakkal, két rétegben Száradási idő:
                    kb.2-3 óra, ami
                    függ a levegő hőmérséklettől és a szellőztetés lehetőségeitől.</li>
                <li class="mb-2"><strong>Ápolás:</strong> HARZO Fényesítő-Ápolóval két rétegben. Rétegek közötti száradási
                    idő: kb. 30-40
                    perc, hőmérséklettől függően. Ápolás után sarkok, rések csak neutrális sziloplaszttal kezelhetők.</li>
            </ol>
        </div>
    @endisset

    <x-filament-actions::modals />
</div>
