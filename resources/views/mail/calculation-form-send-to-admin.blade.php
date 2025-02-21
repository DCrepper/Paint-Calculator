<x-mail::message>

    <x-slot name="header">
        <x-mail::header :url="config('app.url')">
            Harzó Kft.
        </x-mail::header>
    </x-slot>

    The body of your message.

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
