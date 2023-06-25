<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale()== 'fa' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .body{
                display: grid;
                grid-template-rows: 15vh auto 10vh;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="body min-h-screen bg-gray-100 dark:bg-gray-900">
            <header class="  dark:text-white flex flex-col items-center justify-center pt-4">
                <div class="mb-4">
                    <a href="{{ url('/') }}" class="text-xl ">
                        soshul
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <img class="w-16 h-16 rounded-full" src="{{ asset($user->image) }}" alt="">
                    <p class="font-bold">
                        {{ $user->nickname }}
                    </p>
                </div>
            </header>
            <main  class="flex items-center justify-center px-8">
                <div class="flex flex-col gap-4">
                    @forelse ($links as $link )
                        <div class="border-4 p-4 px-8 rounded-xl hover:scale-125 transition-all hover:transition-all" style="border-color: {{ $link->color }}">
                            <a href="{{ $link->link }}" class="flex items-center justify-center gap-6">
                                <img class="w-16 h-16 rounded-full" src="{{ asset($link->image) }}" alt="">
                                <p style="color: {{ $link->color }}" class="font-bold text-xl">
                                    {{ $link->title }}
                                </p>
                            </a>
                        </div>
                    @empty

                    @endforelse
                </div>
            </main>
            <footer class="bg-slate-800  text-white flex items-center justify-center">
                <div>
                    <span>با افتخار نیرو گرفته از
                    ©
                    <a href="https://github.com/bigmemti">
                        bigmemti
                    </a>
                    </span>
                </div>
            </footer>
        </div>
    </body>
</html>
