<x-layouts.app>
    @vite(['resources/css/form.css'])
    <x-slot name="title">Harzo festék kalkulátor</x-slot>
    <p class="text-center w-4/5 mx-auto">
        <span class="inline-block text-left">
            A kalkulátor segítségével kiszámoljuk Neked, hogy mennyi anyagot kell megvásárolj a kiválasztott feladathoz,
            valamint leírjuk a rétegrendet és az árakat.
        </span>
    </p>

    @livewire('calculate-form')

</x-layouts.app>
