<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased">
        @isset($title)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ $title }}
                    </h1>
                </div>
            </header>
        @endisset
        @isset($content)
            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                {{ $content }}
            </main>
        @endisset

        {{ $slot }}

        @filamentScripts
        @vite('resources/js/app.js')
    </body>

</html>
