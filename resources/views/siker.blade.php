<x-layouts.app>
    <x-slot name="title">Siker</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Siker</h1>
                    <p>Az árajánlat sikeresen lett leadva. Értesítés hamarosan megérkezik a levelező rendszerbe</p>

                    <a href="https://harzo.hu" class="btn btn-primary">Vissza a főoldalra</a>

                    <a href="{{ route('csempe-kalkulator.calculate') }}" class="btn btn-primary">
                        Új árajánlat készítése
                    </a>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
