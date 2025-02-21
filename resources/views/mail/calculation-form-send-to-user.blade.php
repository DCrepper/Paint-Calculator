<x-mail::message>
    <x-slot name="header">
        <x-mail::header :url="config('app.url')">
            Harzó Kft.
        </x-mail::header>
    </x-slot>
    Kedves {{ $data['full_name'] }},<br />
    A számítás elkészült és sikeresen elküldtük az adminisztrátoroknak. Hamarosan választ kapsz az árajánlatra.

    Üdvözlettel Harzó csapat
</x-mail::message>
