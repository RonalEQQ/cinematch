<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow rounded p-4 mb-4 h-64 overflow-y-scroll">
        @foreach ($messages as $message)
            <p>
                <strong>{{ $message['user']['name'] }}:</strong>
                {{ $message['content'] }}
            </p>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input
            type="text"
            wire:model="content"
            class="w-full border rounded p-2"
            placeholder="Escribe un mensaje..."
        >
        <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">
            Enviar
        </button>
    </form>
</div>
