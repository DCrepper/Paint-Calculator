<x-mail::message>
    <x-slot name="header">
        <x-mail::header :url="config('app.url')">
            Harzo Kft.
        </x-mail::header>
    </x-slot>
    Kedves {{ $data['full_name'] }},<br />
    <h2>
        A HARZO az általad megadott adatok alapján feldolgoztuk és elkészítettük a Bevásárlólistádat, amit a levélhez
        csatoltunk. Nyisd meg a csatolt dokumentumot és töltsd le a listát, hogy a vásárlás során ne maradj le semmiről!
    </h2>
    <div class="p-6 bg-gray-100 rounded-lg">
        <h1 class="mb-4 text-2xl font-bold">Új Számítási Kérelem</h1>
        <p class="mb-2"><strong>Teljes Név:</strong> {{ $data['full_name'] }}</p>
        <p class="mb-2"><strong>Email:</strong> {{ $data['email'] }}</p>
        <p class="mb-2"><strong>Kiválasztott kategória:</strong> {{ $data['selectedPaintCategory']->name }}</p>
        <p class="mb-2"><strong>Kiválasztott csomag:</strong> {{ $data['tilePaint']->name }}</p>
        <p class="mb-2"><strong>Megadott felület területe:</strong> {{ $data['area'] }} m²</p>
        <div class="{{ isset($data['region']) ? '' : 'hidden' }}">
            <p class="mb-2"><strong>Település, ahol vásárolni szeretnél:</strong>
                {{ isset($data['region']) ? $data['region']?->name : '' }}</p>
            <p class="mb-2"><strong>Festékbolt, ahol a vásárlást tervezed:</strong>
                {{ isset($data['region']) ? $data['store']?->name : '' }}
                {{ isset($data['region']) ? $data['store']->address : '' }}
            </p>
        </div>
    </div>
    <p>
        A Bevásárlólistád a csatolmányban található!
    </p>
    <br />
    <p>
        Üdvözlettel HARZO csapat
    </p>
    <x-slot name="footer">
        <x-mail::footer>
            &copy; {{ date('Y') }} Harzo. Minden jog fenntartva.
        </x-mail::footer>
    </x-slot>
</x-mail::message>
