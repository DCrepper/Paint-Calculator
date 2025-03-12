<x-mail::message>
    <x-slot name="header">
        <x-mail::header :url="config('app.url')">
            Harzo Kft.
        </x-mail::header>
    </x-slot>
    <div class="p-6 bg-gray-100 rounded-lg">
        <h1 class="mb-4 text-2xl font-bold">Új Számítási Kérelem</h1>
        <p class="mb-2"><strong>Teljes Név:</strong> {{ $data['full_name'] }}</p>
        <p class="mb-2"><strong>Email:</strong> {{ $data['email'] }}</p>
        <p class="mb-2"><strong>Kiválasztott Festékkategória:</strong> {{ $data['selectedPaintCategory']->name }}</p>
        <p class="mb-2"><strong>Kiválasztott Festék:</strong> {{ $data['tilePaint']->name }}</p>
        <p class="mb-2"><strong>Megadott felület területe:</strong> {{ $data['area'] }} m²</p>
        @isset($data['region'])
            <p class="mb-2"><strong>Megye:</strong> {{ $data['region']->name }}</p>
            <p class="mb-2"><strong>Üzlet:</strong> {{ $data['store']->name }} {{ $data['store']->address }}</p>
        @endisset
    </div>
    Köszönjük,<br>
    Harzo Kft.
    <x-slot name="footer">
        <x-mail::footer>
            &copy; {{ date('Y') }} Harzo. Minden jog fenntartva.
        </x-mail::footer>
    </x-slot>
</x-mail::message>
