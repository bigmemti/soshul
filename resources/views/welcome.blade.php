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
                        {{ __('soshul') }}
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                    <div class=" p-6 text-right ">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__('Dashboard')}}</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__('Log in')}}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 rtl:mr-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{__('Register')}}</a>
                            @endif
                        @endauth
                    </div>
                @endif

                </div>
            </header>
            <main  class="flex items-center justify-center px-8">
                <div class="flex flex-col gap-4 justify-center items-center">
                    <span class="text-red-600 text-4xl font-extrabold">
                        {{ __('important caption') }}:
                    </span>
                    <p class="dark:text-white text-xl">
                        {{ __('soshul is a tool for sharing your social media links easily and simply') }}.
                    </p>
                </div>
            </main>
            <footer class="bg-slate-800 text-white flex items-center justify-center">
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
