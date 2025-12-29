<div>
    <!-- FORM -->
    <form wire:submit.prevent="{{ $editingId ? 'update' : 'add' }}"
          class="flex gap-3 mb-6">

        <input
            type="text"
            wire:model.defer="content"
            placeholder="Escribe un comentario..."
            class="flex-1 rounded-lg bg-black border border-zinc-700 px-4 py-2 text-white focus:outline-none focus:border-red-500">

        <button class="bg-red-600 hover:bg-red-700 px-5 rounded-lg font-semibold">
            {{ $editingId ? 'Actualizar' : 'Comentar' }}
        </button>
    </form>

    <!-- LISTA -->
    <div class="space-y-4">
        @foreach ($comments as $comment)
            <div class="bg-black border border-zinc-800 rounded-lg p-4">
                <div class="flex justify-between items-center mb-1">
                    <span class="font-semibold text-red-500">
                        {{ $comment->user->name }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>

                <p class="text-gray-300">
                    {{ $comment->content }}
                </p>

                @if ($comment->user_id === auth()->id())
                    <div class="flex gap-4 mt-2 text-sm">
                        <button wire:click="edit({{ $comment->id }})"
                                class="text-yellow-400 hover:underline">
                            Editar
                        </button>

                        <button wire:click="delete({{ $comment->id }})"
                                class="text-red-500 hover:underline">
                            Eliminar
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

