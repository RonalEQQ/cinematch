<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-black text-white">

        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1524985069026-dd778a71c7b4')]
                    bg-cover bg-center opacity-20"></div>

        <div class="relative z-10 w-full max-w-md bg-black/80 p-8 rounded-xl shadow-2xl">

            <h1 class="text-3xl font-bold text-center text-red-600 mb-2">
                ÚNETE A CINEMATCH
            </h1>

            <p class="text-center text-gray-400 mb-6">
                Crea tu cuenta y conecta por el cine 🎬
            </p>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <input
                    type="text"
                    name="name"
                    placeholder="Nombre completo"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded bg-gray-800 border border-gray-700
                           focus:ring-2 focus:ring-red-600 focus:outline-none"
                />

                <input
                    type="email"
                    name="email"
                    placeholder="Correo electrónico"
                    value="{{ old('email') }}"
                    required
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

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirmar contraseña"
                    required
                    class="w-full px-4 py-3 rounded bg-gray-800 border border-gray-700
                           focus:ring-2 focus:ring-red-600 focus:outline-none"
                />

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="text-sm text-gray-400">
                        <label class="flex items-start gap-2">
                            <input type="checkbox" name="terms" required class="mt-1">
                            <span>
                                Acepto los
                                <a href="{{ route('terms.show') }}" target="_blank" class="underline text-red-500">
                                    Términos de Servicio
                                </a>
                                y la
                                <a href="{{ route('policy.show') }}" target="_blank" class="underline text-red-500">
                                    Política de Privacidad
                                </a>
                            </span>
                        </label>
                    </div>
                @endif

                <button
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 transition py-3 rounded font-semibold"
                >
                    Crear cuenta
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-red-500 hover:underline">
                    Inicia sesión
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>
