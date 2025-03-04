<x-layouts.app>
    <x-slot name="title">Siker</x-slot>
    <x-slot name="content">
        <div class="container mx-auto p-4">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-lg mb-6">
                        A festés ajánlat sikeresen lett leadva. Az értesítés hamarosan megérkezik a levelező rendszerbe
                    </p>

                    <a href="https://harzo.hu"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Vissza a főoldalra
                    </a>

                    <a href="{{ route('index') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Új festés ajánlat készítése
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
