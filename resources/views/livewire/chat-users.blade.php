<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
@foreach($users as $user)
<a href="{{ route('chat.user', $user) }}"
   class="bg-zinc-900 p-4 rounded-xl hover:bg-red-700 transition">
   <div class="text-white font-semibold">{{ $user->name }}</div>
</a>
@endforeach
</div>
