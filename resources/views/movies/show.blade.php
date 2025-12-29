<x-app-layout>
    <div class="min-h-screen bg-black text-white px-6 py-10">

        <!-- Botón volver -->
        <a href="{{ route('web.movies.index') }}"
           class="inline-flex items-center mb-6 text-red-500 hover:text-red-400 font-semibold">
            ← Volver a películas
        </a>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- INFO PELÍCULA -->
            <div>
                <img src="{{ asset($movie->image_path) }}"
                     class="rounded-xl shadow-lg mb-4">

                <h1 class="text-3xl font-bold mb-2">
                    {{ $movie->title }}
                </h1>

                <p class="text-gray-400 mb-1">{{ $movie->year }}</p>
                <span class="inline-block bg-red-600 px-3 py-1 rounded-full text-sm">
                    {{ $movie->genre }}
                </span>

                <p class="text-gray-300 mt-4">
                    {{ $movie->description }}
                </p>
            </div>

            <!-- COMENTARIOS -->
            <div class="md:col-span-2 bg-zinc-900 rounded-xl p-6 shadow-xl">
                <h2 class="text-2xl font-bold mb-4">
                    Comentarios
                </h2>

                <livewire:movie-comments :movie="$movie" />
            </div>

        </div>
    </div>
</x-app-layout>
