<x-layouts.app>
    <x-slot name="title">Harzo festék kalkulátor</x-slot>

    @livewire('calculate-form')

    <!-- Hero Section -->
    <section class="hero min-h-[60vh] bg-base-200">
        <div class="flex-col hero-content lg:flex-row-reverse">
            <img src="https://picsum.photos/id/28/800/600" class="max-w-sm rounded-lg shadow-2xl"
                alt="Harzo.hu hero image" />
            <div>
                <h1 class="text-5xl font-bold">Üdvözöljük a calculatioin.harzo.hu oldalán!</h1>
                <p class="py-6">Cégünk professzionális szolgáltatásokat nyújt ügyfeleink számára. Töltse ki az
                    alábbi űrlapot, és kollégáink hamarosan felveszik Önnel a kapcsolatot.</p>
                <button class="btn btn-primary">Tudjon meg többet</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-base-200">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Szolgáltatásaink</h2>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="shadow-xl card bg-base-100">
                    <figure class="px-10 pt-10">
                        <i class="text-5xl fas fa-cogs text-primary"></i>
                    </figure>
                    <div class="items-center text-center card-body">
                        <h3 class="card-title">Professzionális megoldások</h3>
                        <p>Szakértői csapatunk személyre szabott megoldásokat kínál minden ügyfelünk számára.
                        </p>
                    </div>
                </div>

                <div class="shadow-xl card bg-base-100">
                    <figure class="px-10 pt-10">
                        <i class="text-5xl fas fa-headset text-primary"></i>
                    </figure>
                    <div class="items-center text-center card-body">
                        <h3 class="card-title">24/7 Támogatás</h3>
                        <p>Ügyfélszolgálatunk a hét minden napján rendelkezésére áll, hogy segítsen Önnek.</p>
                    </div>
                </div>

                <div class="shadow-xl card bg-base-100">
                    <figure class="px-10 pt-10">
                        <i class="text-5xl fas fa-chart-line text-primary"></i>
                    </figure>
                    <div class="items-center text-center card-body">
                        <h3 class="card-title">Innovatív technológiák</h3>
                        <p>A legújabb technológiákat alkalmazzuk, hogy a legjobb eredményeket biztosítsuk.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
