<div class="flex justify-center w-full">
    <div class="flex flex-col h-[75vh] w-full max-w-4xl bg-zinc-900 rounded-2xl shadow-2xl overflow-hidden">

        {{-- HEADER --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-700 bg-gradient-to-r from-zinc-800 to-zinc-900">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-full bg-red-600 flex items-center justify-center font-bold text-white">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold leading-none">{{ $user->name }}</p>
                    <p class="text-xs text-green-400 mt-1">● En línea</p>
                </div>
            </div>

            <a href="{{ route('chat') }}"
               class="text-red-400 hover:text-red-300 text-sm font-semibold">
                ← Volver
            </a>
        </div>

        {{-- MENSAJES --}}
        <div
            class="flex-1 overflow-y-auto px-6 py-4 space-y-4 scroll-smooth"
            id="chatBox"
        >
            @forelse ($messages as $msg)
                <div class="flex {{ $msg->from_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="
                        max-w-[70%] px-4 py-2 rounded-2xl text-sm shadow
                        {{ $msg->from_id === auth()->id()
                            ? 'bg-red-600 text-white rounded-br-none'
                            : 'bg-zinc-700 text-gray-200 rounded-bl-none'
                        }}
                    ">
                        <p class="break-words leading-relaxed">
                            {{ $msg->content }}
                        </p>

                        <p class="text-[10px] text-right mt-1 opacity-70">
                            {{ $msg->created_at->format('H:i') }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 text-sm mt-10">
                    Aún no hay mensajes 😴
                </p>
            @endforelse
        </div>

        {{-- INPUT --}}
        <form wire:submit.prevent="send"
              class="flex items-center gap-3 px-4 py-4 border-t border-zinc-700 bg-zinc-800">

            <input
                type="text"
                wire:model.live="message"
                placeholder="Escribe un mensaje..."
                class="flex-1 bg-zinc-900 border border-zinc-700 rounded-full px-5 py-3
                       focus:outline-none focus:ring-2 focus:ring-red-600 text-sm"
            >

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-500 px-6 py-3 rounded-full
                       font-semibold text-sm transition shadow-lg"
            >
                Enviar
            </button>
        </form>

    </div>
</div>

{{-- Auto scroll al final --}}
<script>
    document.addEventListener("livewire:update", () => {
        const box = document.getElementById("chatBox");
        if (box) box.scrollTop = box.scrollHeight;
    });
</script>

