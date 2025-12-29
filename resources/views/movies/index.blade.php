<x-app-layout>
    <div class="bg-black min-h-screen py-10 px-6">

        <h1 class="text-3xl font-extrabold text-red-600 mb-8">
            Películas disponibles
        </h1>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach ($movies as $movie)
                <a href="{{ route('web.movies.show', $movie) }}"
                   class="group relative overflow-hidden rounded-lg shadow-lg">

                    <img
                        src="{{ asset($movie->image_path) }}"
                        alt="{{ $movie->title }}"
                        class="w-full h-72 object-cover transform group-hover:scale-110 transition duration-500"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition">
                        <div class="absolute bottom-3 left-3 right-3">
                            <h2 class="text-white text-sm font-bold">
                                {{ $movie->title }}
                            </h2>
                            <p class="text-xs text-gray-300">
                                {{ $movie->year }} · {{ $movie->genre }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</x-app-layout>

