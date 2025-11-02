<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    </head>
    <body class="font-sans text-slate-900 antialiased">
        <div class="relative min-h-screen bg-gradient-to-b from-resepin-cream via-white to-resepin-cream flex flex-col items-center justify-center px-6 py-12 sm:py-20">
            <div class="absolute inset-0 -z-10 overflow-hidden">
                <div class="absolute -top-20 -left-16 h-64 w-64 rounded-full bg-resepin-tomato/20 blur-3xl"></div>
                <div class="absolute bottom-0 right-[-4rem] h-72 w-72 rounded-full bg-resepin-green/20 blur-3xl"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,77,77,0.08),_transparent_55%)]"></div>
            </div>

            <div class="text-center space-y-4">
                <a href="/" class="inline-flex items-center justify-center">
                    <x-application-logo class="w-20 h-20 fill-current text-resepin-tomato drop-shadow-md" />
                </a>
                <div class="space-y-1">
                    <p class="text-sm uppercase tracking-[0.3em] text-resepin-tomato/80">Selamat datang di Resepin</p>
                    <h1 class="text-3xl font-semibold text-slate-900">Masuk dan lanjutkan petualangan masakmu 🍳</h1>
                    <p class="text-sm text-slate-600">Kumpulkan resep favorit, simpan inspirasi baru, dan bagikan masakan terbaikmu.</p>
                </div>
            </div>

            <div class="mt-10 w-full sm:max-w-lg">
                <div class="rounded-3xl border border-resepin-tomato/20 bg-white/80 p-8 shadow-xl shadow-resepin-tomato/10 backdrop-blur">
                    {{ $slot }}
                </div>
            </div>
            <p class="mt-10 text-xs text-slate-500">© {{ date('Y') }} Resepin. Semua hak cipta dilindungi.</p>
        </div>
    </body>
</html>
