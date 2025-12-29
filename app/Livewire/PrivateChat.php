<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;

class PrivateChat extends Component
{
    public User $user;
    public string $message = '';

    protected $listeners = [
        'echo-private:chat,MessageSent' => 'refreshMessages',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function refreshMessages()
    {
        // fuerza re-render
    }

    public function send()
    {
        $this->validate([
            'message' => 'required|min:1',
        ]);

        $msg = Message::create([
            'from_id' => auth()->id(),
            'to_id'   => $this->user->id,
            'content' => $this->message,
        ]);

        broadcast(new MessageSent($msg))->toOthers();

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.private-chat', [
            'messages' => Message::where(function ($q) {
                $q->where('from_id', auth()->id())
                  ->where('to_id', $this->user->id);
            })->orWhere(function ($q) {
                $q->where('from_id', $this->user->id)
                  ->where('to_id', auth()->id());
            })
            ->orderBy('created_at')
            ->get(),
        ]);
    }
}
