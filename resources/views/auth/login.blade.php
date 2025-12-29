<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-black text-white">

        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4')]
                    bg-cover bg-center opacity-20"></div>

        <div class="relative z-10 w-full max-w-md bg-black/80 p-8 rounded-xl shadow-2xl">

            <h1 class="text-3xl font-bold text-center text-red-600 mb-2">
                CINEMATCH
            </h1>

            <p class="text-center text-gray-400 mb-6">
                Conecta por el cine 🎬
            </p>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <input
                    type="email"
                    name="email"
                    placeholder="Correo electrónico"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded bg-gray-800 border border-gray-700
                           focus:ring-2 focus:ring-red-600 focus:outline-none"
                />

                <input
                    type="password"
                    name="password"
                    placeholder="Contraseña"
                    required
                    class="w-full px-4 py-3 rounded bg-gray-800 border border-gray-700
                           focus:ring-2 focus:ring-red-600 focus:outline-none"
                />

                <div class="flex items-center justify-between text-sm text-gray-400">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded">
                        Recuérdame
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="hover:underline">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 transition py-3 rounded font-semibold"
                >
                    Iniciar sesión
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-red-500 hover:underline">
                    Regístrate
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>
