<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CineMatch') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #0b0b0b;
        }

        .poster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1rem;
            animation: scrollPosters 40s linear infinite;
        }

        @keyframes scrollPosters {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }

        .overlay {
            background: linear-gradient(to top, #0b0b0b 20%, transparent);
        }
    </style>
</head>

<body class="min-h-screen text-white relative overflow-hidden">

    {{-- Fondo animado de pósters --}}
    <div class="absolute inset-0 opacity-30">
        <div class="poster-grid">
            @for ($i = 1; $i <= 24; $i++)
                <img src="https://picsum.photos/300/450?random={{ $i }}"
                     class="rounded-xl shadow-xl hover:scale-105 transition">
            @endfor
        </div>
    </div>

    {{-- Capa oscura --}}
    <div class="absolute inset-0 overlay"></div>

    {{-- Contenido principal --}}
    <div class="relative z-10 flex flex-col min-h-screen">

        {{-- NAV --}}
        <header class="flex justify-between items-center px-10 py-6">
            <h1 class="text-4xl font-extrabold text-red-600 tracking-wide">
                CineMatch
            </h1>

            @if (Route::has('login'))
                <nav class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="px-5 py-2 bg-red-600 rounded-lg font-semibold hover:bg-red-700 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-5 py-2 border border-white rounded-lg hover:bg-white hover:text-black transition">
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="px-5 py-2 bg-red-600 rounded-lg font-semibold hover:bg-red-700 transition">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        {{-- HERO --}}
        <main class="flex flex-col justify-center flex-1 px-10 max-w-3xl">
            <h2 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                Descubre películas <br>
                <span class="text-red-600">a tu manera</span>
            </h2>

            <p class="text-lg text-gray-300 mb-8">
                CineMatch te permite explorar, gestionar y disfrutar el cine
                como nunca antes. Todo en una sola plataforma.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('register') }}"
                   class="px-8 py-4 bg-red-600 text-lg font-semibold rounded-xl hover:bg-red-700 transition">
                    Comenzar ahora
                </a>

                <a href="{{ route('login') }}"
                   class="px-8 py-4 bg-gray-800 text-lg font-semibold rounded-xl hover:bg-gray-700 transition">
                    Ya tengo cuenta
                </a>
            </div>
        </main>
    </div>

</body>
</html>
