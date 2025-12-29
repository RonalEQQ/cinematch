<x-app-layout>
    <section id="inicio" class="relative h-[85vh] overflow-hidden">

        <!-- Fondo animado elegante -->
        <div class="absolute inset-0 cinematic-bg"></div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Contenido -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
            <h1 class="text-8xl font-extrabold tracking-widest text-red-600 drop-shadow-lg">
                CINEMATH
            </h1>

            <p class="mt-6 max-w-2xl text-lg text-gray-300">
                Descubre películas, comenta en tiempo real y conéctate con otros amantes del cine.
            </p>

            <div class="mt-10 flex gap-6">
                <a href="#peliculas"
                class="bg-red-600 hover:bg-red-700 px-10 py-4 rounded-md font-semibold text-lg transition">
                    Ver películas Destacadas
                </a>

                <a href="{{ route('chat') }}"
                class="bg-white/10 hover:bg-white/20 px-10 py-4 rounded-md backdrop-blur font-semibold transition">
                    Ir al chat
                </a>
            </div>
        </div>
    </section>



    <!-- SECCIÓN PELÍCULAS -->
    <section id="peliculas" class="px-12 py-16 bg-black">

        <h2 class="text-3xl font-bold text-white mb-10 border-l-4 border-red-600 pl-4">
            Películas destacadas
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach ($movies as $movie)
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">

                        <img
                            src="{{ asset($movie->image_path) }}"
                            alt="{{ $movie->title }}"
                            class="w-full h-80 object-cover transition duration-500 group-hover:scale-110"
                        >

                        <!-- Overlay hover -->
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-end p-4">
                            <div>
                                <h3 class="text-white font-bold text-sm">
                                    {{ $movie->title }}
                                </h3>
                                <p class="text-gray-300 text-xs">
                                    {{ $movie->genre }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>



    <!-- SECCIÓN GÉNEROS -->
    <section id="generos" class="px-12 py-16 bg-gray-900">
        <h2 class="text-3xl font-bold text-white mb-6">
            Géneros
        </h2>

        <div class="flex gap-4 flex-wrap">
            <span class="genre-chip">Sci-Fi</span>
            <span class="genre-chip">T-Movies</span>
            <span class="genre-chip">Acción</span>
            <span class="genre-chip">Drama</span>
            <span class="genre-chip">Suspenso</span>
        </div>
    </section>

    <!-- CTA CHAT -->
    <section class="px-12 py-20 bg-black text-center">
        <h2 class="text-4xl font-extrabold text-white mb-4">
            💬 Conversa con otros usuarios
        </h2>

        <p class="text-gray-400 mb-8">
            Chatea y comenta películas en tiempo real.
        </p>

        <a href="{{ route('chat') }}"
           class="bg-red-600 hover:bg-red-700 text-white px-10 py-4 rounded-md font-semibold transition transform hover:scale-105">
            Ir al chat
        </a>
    </section>

</x-app-layout>

